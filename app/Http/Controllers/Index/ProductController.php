<?php

namespace App\Http\Controllers\Index;

use App\Models\Product;
use App\Models\Review;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    public function detail($id)
    {
        $product = Product::where(['product_id' => $id])->first();
        $reviews = Review::where(['item_id' => $id])->where(['review_type_id' => Review::PRODUCT_REVIEW])->get();
        $relatedProducts = Product::where(['category_id' => $product->category_id])->whereNotIn('product_id', [$product->product_id])->limit(5)->get();
        $url = URL('/') . '/' . Auth::user()->user_id . '/' . \App\Http\Helpers::getTranslatedSlugRu(Auth::user()->login);
        return view('design_index.product.detail', [
            'product' => $product,
            'relatedProducts' => $relatedProducts,
            'reviews' => $reviews,
            'url' => $url
        ]);

    }
}
