<?php

namespace App\Http\Controllers\Index;

use App\Models\Packet;
use App\Models\Review;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class PacketController extends Controller
{
    public function detail($id)
    {
        $packet = Packet::where(['packet_id' => $id])->first();
        $reviews = Review::where(['item_id' => $id])->where(['review_type_id' => Review::PACKET_REVIEW])->get();        
        $url = URL('/') . '/' . (Auth::user() ? Auth::user()->user_id : NULL) . '/' .
            \App\Http\Helpers::getTranslatedSlugRu((Auth::user() ? Auth::user()->login : null));
        return view('new_design.packet.detail', [
            'packet' => $packet,            
            'reviews' => $reviews,
            'url' => $url
        ]);

    }
}
