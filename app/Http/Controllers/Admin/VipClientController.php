<?php

namespace App\Http\Controllers\Admin;

use App\Models\Users;
use App\Models\UserPacket;
use App\Models\Packet;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\MessageBag;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use MongoDB\Driver\Session;
use View;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use DB;

class VipClientController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin')->except('index');
    }

    public function index(Request $request)
    {
        $vip_packets = [Packet::VIP_ECONOMY, Packet::VIP_STANDARD, Packet::VIP_PREMIUM ];
        $request->row = UserPacket::whereIn('user_packet.packet_id', $vip_packets)->where('user_packet.is_active', true)
        ->leftJoin('users', 'user_packet.user_id', '=', 'users.user_id')
        ->leftJoin('city', 'city.city_id', '=', 'users.city_id')
        ->leftJoin('country', 'country.country_id', '=', 'city.country_id')        
        ->leftJoin('packet', 'packet.packet_id', '=', 'user_packet.packet_id')
        ->leftJoin('users as recommend', 'recommend.user_id', '=', 'users.recommend_user_id')
        ->orderBy('users.user_id', 'desc')
        ->select('users.*', 'city.*', 'country.*', 'user_packet.desired_price as desired_price', 'user_packet.pre_desired_price as pre_desired_price',
            DB::raw('DATE_FORMAT(users.created_at,"%d.%m.%Y %H:%i") as date'),
            'recommend.name as recommend_name',
            'recommend.login as recommend_login',
            'recommend.user_id as recommend_id',
            'recommend.last_name as recommend_last_name',
            'recommend.middle_name as recommend_middle_name',
            'recommend.user_id as recommend_user_id'
        )
        ->groupBy('users.user_id');

        $accumulated_amount = UserPacket::whereIn('packet_id', $vip_packets)->where('is_active', true)->sum('pre_desired_price');
        $is_paid_amount = UserPacket::whereIn('packet_id', $vip_packets)->where('is_active', true)->where('is_paid', true)->sum('desired_price');
        $accumulated_amount = $accumulated_amount - $is_paid_amount;
      
        if (isset($request->user_name) && $request->user_name != '')
            $request->row->where(function ($query) use ($request) {
                $query->where('users.name', 'like', '%' . $request->user_name . '%')
                    ->orWhere('users.last_name', 'like', '%' . $request->user_name . '%')
                    ->orWhere('users.login', 'like', '%' . $request->user_name . '%')
                    ->orWhere('users.email', 'like', '%' . $request->user_name . '%')
                    ->orWhere('users.middle_name', 'like', '%' . $request->user_name . '%');
            });

        if (isset($request->sponsor_name) && $request->sponsor_name != '')
            $request->row->where(function ($query) use ($request) {
                $query->where('recommend.name', 'like', '%' . $request->sponsor_name . '%')
                    ->orWhere('recommend.last_name', 'like', '%' . $request->sponsor_name . '%')
                    ->orWhere('recommend.login', 'like', '%' . $request->sponsor_name . '%')
                    ->orWhere('recommend.email', 'like', '%' . $request->sponsor_name . '%')
                    ->orWhere('recommend.middle_name', 'like', '%' . $request->sponsor_name . '%');
            });

        if (isset($request->city_name) && $request->city_name != '')
            $request->row->where(function ($query) use ($request) {
                $query->where('city.city_name_ru', 'like', '%' . $request->city_name . '%')
                    ->orWhere('country.country_name_ru', 'like', '%' . $request->city_name . '%');
            });

        if (isset($request->is_paid))
            $request->row->where('user_packet.is_paid', $request->is_paid);
        else $request->row->where('user_packet.is_paid', '0');

        if (isset($request->is_expected))
            $request->row->where('user_packet.desired_price', '<=', $accumulated_amount);

        if (isset($request->packet_name) && $request->packet_name != '') {
            $request->row->where('packet.packet_name_ru', 'like', '%' . $request->packet_name . '%')
                ->where('user_packet.is_active', 1);
        }
        if ($request->is_interest_holder) {
            $request->row->where(['users.is_interest_holder' => true]);
        }
        
        $request->row = $request->row->paginate(10);
        // dd($request->row[0]);
        if (Auth::user()->role_id == 1) {
            return view('admin.vip_client.client', [
                'row' => $request,
                'title' => 'Все пользователи',
                'request' => $request,
                'accumulated_amount' => $accumulated_amount
            ]);
        }
        else {
            return view('admin.vip_client.users_client', [
                'row' => $request,
                'title' => 'Все пользователи',
                'request' => $request,
                'accumulated_amount' => $accumulated_amount
            ]);
        }
    }

    public function destroy($id)
    {
        $user = Users::find($id);
        $user->delete();
    }

    public function changeIsBan(Request $request)
    {
        $review = Users::find($request->id);
        $review->is_ban = $request->is_show;
        $review->save();
    }

    public function editIntersHolderStatus(Request $request)
    {
        $user_id = $request->user_id;
        $is_holder = $request->is_holder;
        $share = $request->share;

        $user = Users::where(['user_id' => $user_id])->first();
        $user->is_interest_holder = $is_holder;
        $user->share = $share;
        if ($user->save()) {
            $request->session()->flash('success', 'Вы успешно изменили статус');
            return back();
        }
        $request->session()->flash('danger', 'Произошла ошибка');
        return back();
    }

    public function changeIsPaid(Request $request)
    {
        $vip_packets = [Packet::VIP_ECONOMY, Packet::VIP_STANDARD, Packet::VIP_PREMIUM ];
        $accumulated_amount = UserPacket::whereIn('packet_id', $vip_packets)->where('is_active', true)->sum('pre_desired_price');
        $is_paid_amount = UserPacket::whereIn('packet_id', $vip_packets)->where('is_active', true)->where('is_paid', true)->sum('desired_price');
        $accumulated_amount = $accumulated_amount - $is_paid_amount;
        UserPacket::whereIn('packet_id', $vip_packets)->where(['user_id' => $request->id, 'is_active' => true, 'is_paid' => false])
        ->where('desired_price', '<=', $accumulated_amount)
        ->update(['is_paid' => $request->is_paid]);
    }
}
