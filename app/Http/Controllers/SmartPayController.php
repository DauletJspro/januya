<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Packet;
use App\Models\Users;
use App\Models\UserPacket;
use App\Models\Product;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use App\Http\Helpers;

class SmartPayController extends Controller
{
    public function createOrder(Request $request) {
        $validator = Validator::make($request->all(), [
            'products' => 'required_without:packet_id|array',
            'products_count' => 'required_without:packet_id|array',
            'packet_id' => 'required_without:products|integer|exists:packet',        
        ]);

        if ($validator->fails()) {
            $messages = $validator->errors();
            $error = $messages->all();            
            return redirect()->back()->withInput(['error' => $error[0]]);
        }
        $price = 0;
        $order_code = time();
        if ($request->products) {
            $products_id = $request->products;
            $products = Product::select('product_id', 'product_name_ru', 'product_price')->whereIn('product_id', $products_id)->get();
            $products = collect($products);
            foreach($products as $product) {
                $product['count'] = $request->products_count[$product->product_id];
            }
            if (count($products) != count($products_id)) {                   
                return redirect()->back()->withInput(['error' => 'Временно недоступно']);
            }
            foreach ($products as $product) {
                if (Auth::check()) {
                    $userPacket = UserPacket::where('user_id', Auth::user()->user_id)->where('is_active', true)->get();
                    if ($userPacket) {
                        $discount_price = $product->product_price - ($product->product_price * \App\Models\Currency::PartnerDiscount);
                        $discount_price = $discount_price * \App\Models\Currency::pvToKzt();                        
                        $discount_price = round($discount_price) * $request->products_count[$product->product_id];
                        $price += $discount_price;
                    }
                }
                else {
                    $product_price = $product->product_price * \App\Models\Currency::pvToKzt();
                    $product_price = round($product_price) * $request->products_count[$product->product_id];
                    $price += $product_price;
                }
            }
            $name = 'Покупка товаров на сайте Januya.kz';
        }
        else {
            if (!Auth::check()) {                
                return redirect()->back()->withInput(['error' => 'Временно недоступно']);
            }
            $packet = Packet::find($request->packet_id);
            $price = ($packet->packet_price - \App\Models\UserPacket::userHasPacketsPrice($packet->packet_id)) * \App\Models\Currency::pvToKzt();
            $name = 'Покупка пакета' . $packet->packet_name_ru . 'на сайте Januya.kz';
        }
        $data = [
            'MERCHANT_ID' => env('SMART_PAY_MERCHANT_ID'),
            'PAYMENT_AMOUNT' => 100,
            'PAYMENT_ORDER_ID' => $order_code,
            'PAYMENT_INFO' => $name,
            'PAYMENT_CALLBACK_URL' => env('SMART_PAY_CALLBACK_URL'),
            'PAYMENT_RETURN_URL' => env('SMART_PAY_RETURN_URL'),
            'PAYMENT_RETURN_FAIL_URL' => env('SMART_PAY_FAIL_URL'),
        ];

        $sign = Helpers::make_signature($data, env('SMART_PAY_KEY')); // формируем ключ
        $data['PAYMENT_HASH'] = $sign;
        $response = Helpers::send_request('https://spos.kz/merchant/api/create_invoice', $data);        
        if($response->status === 0) { // проверяем статус выполнения            
            $data_order = [
                'order_code' => $order_code,
                'user_id' => Auth::check() ? Auth::user()->user_id : null,
                'username' => Auth::check() ? Auth::user()->name .' '. Auth::user()->last_name : $request->username,
                'email' => Auth::check() ? Auth::user()->email : $request->email,
                'address' => $request->address ?? null,
                'contact' => Auth::check() ? Auth::user()->phone : $request->contact,
                'sum' => $price,
                'products' => $request->products ? \json_encode($products) : null,
                'packet_id' => $request->packet_id ?? null,
                'payment_id' => $response->data->id
            ];
            $order = Order::createOrder($data_order);             
            if ($order) {
                return  redirect()->away($response->data->url); // направляем пользователя на страницу оплаты
            }
            return redirect()->back()->withInput(['error' => 'Временно недоступно']);
            // $payment_id = $response->data->id; // для удобства можно привязать к номеру заказа, чтобы проверять статус, используя запрос /merchant/api/status            
            // header("Location: {$response->data->url}", TRUE, 301);             
        } else { // произошла ошибка при выполнении (на стороне Smart Pay)             
            return redirect()->back()->withInput(['error' => 'Временно недоступно']);
        }
    }

    public function callback(Request $request) {

        $input_data = $request->all();
        Log::info($request);
        if(env('SMART_PAY_MERCHANT_ID') == $input_data['MERCHANT_ID']) {
            $sign = make_signature($input_data, env('SMART_PAY_KEY'));
        
            if($input_data['PAYMENT_HASH'] == $sign) {                
                // маркируем заказ с ИД PAYMENT_ORDER_ID как оплаченый
                return response()->json(['RESULT'=>'OK']);
            } else {
                // не совпадает цифровая подпись.
                return response()->json(['RESULT' => 'RETRY', 'DESC' => 'invalid_signature']);
            }
        }
        return response()->json(['RESULT' => 'RETRY', 'DESC' => 'invalid_signature']);
    }

    public function fail(Request $request) {
        Log::info($request);
        return $request;
    }

    public function return(Request $request) {

        Log::info($request);
        return redirect('/')->withInput(['success' => 'Оплата прошла удачно']);
        return $request;
    }
}
