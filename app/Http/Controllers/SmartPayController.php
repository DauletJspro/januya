<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Log;

class SmartPayController extends Controller
{
    public function getProductPrice(Request $request) {
        $product = Product::find($request->product_id);
        if ($product == null) {
            $result['message'] = 'Такого продукта не существует';
            $result['status'] = false;
            return response()->json($result);
        }

        $result['message'] = $product->product_price * \App\Models\Currency::DollarToKzt;
        $result['status'] = true;
        return response()->json($result);        
    }

    public function smartpayProcessing(Request $request) {
        Log::info($request);
        return $request;
    }
}
