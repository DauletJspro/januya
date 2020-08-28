<?php

namespace App\Http\Controllers\Admin;

use App\Models\Blog;
use App\Models\Packet;
use App\Models\UserPacket;
use App\Models\Users;
use App\Models\UserStatus;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use View;
use DB;

class ShopController extends Controller
{
    public function __construct()
    {
        $this->middleware('profile');
    }

    public function index(Request $request)
    {

        $packets = Packet::where(['is_show' => true])->get();


        return view('admin.shop.shop', [
            'packets' => $packets
        ]);
    }
}
