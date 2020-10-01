<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Packet;
use App\Models\Users;
use App\Models\UserPacket;
use App\Models\UserOperation;
use App\Models\UserStatus;
use App\Models\Product;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use App\Http\Helpers;

class SmartPayController extends Controller
{   
    public $sentMoney = 0;
    public function createOrder(Request $request) {  
        $result['message'] = 'Временно недоступно';
        $result['status'] = false;      
        if (!$request->packet_id) {                        
            return response()->json($result);
        }
        $price = 0;
        $order_code = time();
           
        if (!Auth::check()) {                
            return response()->json($result);
        }
        $packet = Packet::where('packet_id', $request->packet_id)->first();
        $packet_old_price = 0;
        if ($packet->is_upgrade_packet == 1) {

            $is_check = UserPacket::where('user_id', Auth::user()->user_id)
                ->where('is_active', '=', '0')
                ->where('user_packet.packet_id', '!=', 9)
                ->where('is_portfolio', '=', $packet->is_portfolio)
                ->count();

            if ($is_check > 0) {
                $result['message'] = 'Вы уже отправили запрос на другой пакет, сначала отмените тот запрос';
                $result['status'] = false;
                return response()->json($result);
            }

            if ($request->packet_id > 2) {
                $is_check = UserPacket::where('user_id', Auth::user()->user_id)
                    ->where('packet_id', '>=', $request->packet_id)
                    ->where('is_portfolio', '=', $packet->is_portfolio)
                    ->where('user_packet.packet_id', '!=', 9)
                    ->where('is_active', 1)
                    ->count();

                if ($is_check > 0) {
                    $result['message'] = 'Вы не можете купить этот пакет, так как вы уже приобрели другой пакет';
                    $result['status'] = false;
                    return response()->json($result);
                }
            }
            $packet_old_price = UserPacket::beforePurchaseSum(Auth::user()->user_id);
        }
        $price = ($packet->packet_price - $packet_old_price) * \App\Models\Currency::pvToKzt();
        $name = 'Покупка пакета' . $packet->packet_name_ru . 'на сайте Januya.kz';        
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
                return redirect()->away($response->data->url);
                // return response()->json(['url' => $response->data->url]); // направляем пользователя на страницу оплаты
            }
            return response()->json($result);
            // $payment_id = $response->data->id; // для удобства можно привязать к номеру заказа, чтобы проверять статус, используя запрос /merchant/api/status
            // header("Location: {$response->data->url}", TRUE, 301);
        } else { // произошла ошибка при выполнении (на стороне Smart Pay)
            return response()->json($result);
        }
    }

    
    public function callback(Request $request) {

        $input_data = $request->all();
        Log::info($input_data);
        Log::info('callback');
        if(env('SMART_PAY_MERCHANT_ID') == $input_data['MERCHANT_ID']) {
            $sign = Helpers::make_signature($input_data, env('SMART_PAY_KEY'));
        
            if($input_data['PAYMENT_HASH'] == $sign) {
                if (!$input_data['PAYMENT_STATUS'] == 'paid') {
                   return response()->json(['RESULT' => 'RETRY', 'DESC' => 'invalid_signature']);
                }
                $order = Order::getByCode($input_data['PAYMENT_ORDER_ID']);
                if ($order) {                    
                    Order::changeIsPaid($input_data['PAYMENT_ORDER_ID']);                    
                    $packet = Packet::where('packet_id', $order->packet_id)->first();

                    $user_packet = new UserPacket();
                    $user_packet->user_id = $order->user_id;
                    $user_packet->packet_id = $order->packet_id;
                    $user_packet->user_packet_type = null;
                    $user_packet->packet_price = $packet->packet_price;
                    $user_packet->is_active = false;
                    $user_packet->is_portfolio = '';
                    $user_packet->save();                    
                    $bonus_system = app(\App\Http\Controllers\Admin\PacketController::class)->implementPacketBonuses($user_packet->user_packet_id);
                }
                // маркируем заказ с ИД PAYMENT_ORDER_ID как оплаченый
                return response()->json(['RESULT'=>'OK']);
            } else {
                // не совпадает цифровая подпись.
                return response()->json(['RESULT' => 'RETRY', 'DESC' => 'invalid_signature']);
            }
        }
        return response()->json(['RESULT' => 'RETRY', 'DESC' => 'invalid_signature']);
    }

    public function createOrderProduct(Request $request) {
        $result['message'] = 'Временно недоступно';
        $result['status'] = false;
        if (!$request->products && !$request->products_count) {
            return response()->json($result);
        }
        $price = 0;
        $order_code = time();
        $products_id = $request->products;
        $products = Product::select('product_id', 'product_name_ru', 'product_price')->whereIn('product_id', $products_id)->get();
        $products = collect($products);
        foreach($products as $product) {
            $product['count'] = $request->products_count[$product->product_id];
        }
        if (count($products) != count($products_id)) {                   
            return response()->json($result);
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
        

        $data = [
            'MERCHANT_ID' => env('SMART_PAY_MERCHANT_ID'),
            'PAYMENT_AMOUNT' => 100,
            'PAYMENT_ORDER_ID' => $order_code,
            'PAYMENT_INFO' => $name,
            'PAYMENT_CALLBACK_URL' => env('SMART_PAY_CALLBACK_PRODUCT_URL'),
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
                return response()->json(['url' => $response->data->url]); // направляем пользователя на страницу оплаты
            }
            return response()->json($result);
            // $payment_id = $response->data->id; // для удобства можно привязать к номеру заказа, чтобы проверять статус, используя запрос /merchant/api/status
            // header("Location: {$response->data->url}", TRUE, 301);
        } else { // произошла ошибка при выполнении (на стороне Smart Pay)
            return response()->json($result);
        }
    }

    public function callbackProduct() {
        $input_data = $request->all();
        Log::info($input_data);
        Log::info('callback');
        if(env('SMART_PAY_MERCHANT_ID') == $input_data['MERCHANT_ID']) {
            $sign = make_signature($input_data, env('SMART_PAY_KEY'));
        
            if($input_data['PAYMENT_HASH'] == $sign) {
                $order = Order::getByCode($input_data['PAYMENT_ORDER_ID']);
                if ($order) {
                    Order::changeIsPaid($input_data['PAYMENT_ORDER_ID']);
                    if ($order->user_id) {
                        $inviter_order = 1;
                        $user = Users::where(['user_id' => $order->user_id])->first();
                        $inviter = Users::where(['user_id' => $user->recommend_user_id])->first();
                        $actualStatuses = [UserStatus::PARTNER, UserStatus::MANAGER, UserStatus::DIRECTOR, UserStatus::SILVER_DIRECTOR];
                        while ($inviter) {                
                            $bonus = 0;
                            $dollar_sum = round($order->sum / \App\Models\Currency::pvToKzt());
                            $bonusPercentage = round($dollar_sum * (8 / 100));
                            $inviterPacketId = UserPacket::where(['user_id' => $inviter->user_id])->where(['is_active' => true])->get();
                            $inviterCount = (count($inviterPacketId));
                            if ($inviterCount) {
                                if (in_array($inviter->status_id, $actualStatuses)) {                                        
                                    $bonus = $bonusPercentage; 
                                }
                            }
                
                            if ($bonus) {
                                $operation = new UserOperation();
                                $operation->author_id = $user->user_id;
                                $operation->recipient_id = $inviter->user_id;
                                $operation->money = $bonus;
                                $operation->operation_id = 1;
                                $operation->operation_type_id = 1;
                                $operation->operation_comment = 'За покупку продукта. Уровень - ' . $inviter_order;
                                $operation->save();
                                $inviter->user_money = $inviter->user_money + $bonus;
                                $inviter->save();
                                $this->sentMoney += $bonus;                                    
                            }
                            $inviter = Users::where(['user_id' => $inviter->recommend_user_id])->first();
                            if (!$inviter || $inviter_order >= 8) {
                                break;
                            }
                
                            $inviter_order++;
                        }

                        //пополнение фонда компании
                        $company_money = $price - $this->sentMoney;
                        $operation = new UserOperation();
                        $operation->author_id = $order->user_id;
                        $operation->recipient_id = 1;
                        $operation->money = $company_money;
                        $operation->operation_id = 1;
                        $operation->operation_type_id = 6;
                        $operation->operation_comment = 'За покупку продукта';
                        $operation->save();

                        $company = Users::where('user_id', 1)->first();
                        $company->user_money = $company->user_money + $company_money;
                        $company->save();
                    }
                }                
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

        Log::info('return');
        return redirect('/')->withInput(['success' => 'Оплата прошла удачно']);
        return $request;
    }
}
