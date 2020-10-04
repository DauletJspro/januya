<?php use App\Models\Packet;use App\Models\UserPacket;use Illuminate\Support\Facades\Auth;$user_list = \App\Models\Users::where('recommend_user_id', $user_id)->take(500)->get(); ?>

@foreach($user_list as $key => $item)

    <?php
    if ($item->soc_status_id) {
        $user = \App\Models\Users::leftJoin('user_status', 'user_status.user_status_id', '=', 'users.status_id')
            ->join('user_status as u_s ','users.soc_status_id', '=', 'u_s.user_status_id')
            ->select('users.*', 'u_s.user_status_name as soc_status_name', 'user_status.user_status_name')
            ->where('user_id', $item->user_id)
            ->first();
    } else {
        $user = \App\Models\Users::leftJoin('user_status', 'user_status.user_status_id', '=', 'users.status_id')
            ->where('user_id', $item->user_id)
            ->first();
    }    

    $child_user_list = \App\Models\Users::where('recommend_user_id', $item->user_id)->take(20)->get();
    ?>

    <li class="parent">

        <?php
        $LOProfitId = UserPacket::where('is_active', 1)
            ->where('user_id', $item->user_id)
            ->whereIn('packet_id', [23, 24, 25, 26, 27])
            ->max('packet_id');

        $LOProfit = Packet::where('packet_id', $LOProfitId)->first();
        $LOProfit = $LOProfit ? $LOProfit->packet_price : 0;

        $gaps = 0;
        ?>

        @if(count($child_user_list) > 0)
            <span onclick="getChildAjaxSecond(this,'{{$item->user_id}}','{{$level}}')">+</span>
            <div class="dval act user-name">
                <div class="object-image client-image">
                    <a @if(Auth::user()->role_id == 1) href="/admin/profile/{{$user->user_id}}" target="_blank" @endif>
                        <img src="{{$user->avatar}}">
                    </a>
                </div>
                <div class="left-float client-name">
                    {{$user->login}} @if(Auth::user()->user_id == 1)  ({{$user->name}} {{$user->last_name}}
                    ). @endif @include('admin.structure.user_packet_list_loop')
                    <div style="padding-top: 5px; color: rgb(58, 58, 58);">                        
                        <p style="color: #009551; margin: 0px">Статус Januya Consulting: {{$user->user_status_name ?: 'Нету'}}</p>
                        <p style="color: #009551; margin: 0px">Статус Januya PK: {{$user->soc_status_name ?: 'Нету'}}</p>                        
                        @if($user->pv_balance)
                            <span class="badge">PV:</span> {{$user->pv_balance}} pv<br>
                        @endif
                        {{-- @if($user->gv_balance)
                            <span class="badge">GV:</span> {{$user->gv_balance}} gv<br>
                        @endif --}}
                        @if($user->cv_balance)
                            <span class="badge">CV:</span> {{$user->cv_balance}} cv<br>
                        @endif
                    </div>
                </div>
                <div class="clear-float"></div>
            </div>
            <ul class="level_{{$level}} child-list">

            </ul>
        @else
            <div class="dval act user-name">
                <div class="object-image client-image">
                    <a @if(Auth::user()->role_id == 1) href="/admin/profile/{{$user->user_id}}" target="_blank" @endif>
                        <img src="{{$user->avatar}}">
                    </a>
                </div>
                <div class="left-float client-name">
                    {{$user->login}}   @if(Auth::user()->user_id == 1) ({{$user->name}} {{$user->last_name}}
                    ) @endif @include('admin.structure.user_packet_list_loop')
                    <div style="padding-top: 5px; color: rgb(58, 58, 58);">
                        <p style="color: #009551; margin: 0px">Статус Januya Consulting: {{$user->user_status_name ?: 'Нету'}}</p>
                        <p style="color: #009551; margin: 0px">Статус Januya PK: {{$user->soc_status_name ?: 'Нету'}}</p>
                        {{-- @if($user->pv_balance)
                            <span class="badge">PV:</span> {{$user->pv_balance}} pv<br>
                        @endif
                        @if($user->gv_balance)
                            <span class="badge">GV:</span> {{$user->gv_balance}} gv<br>
                        @endif
                        @if($user->cv_balance)
                            <span class="badge">CV:</span> {{$user->cv_balance}} cv<br>
                        @endif --}}

                    </div>
                </div>
                <div class="clear-float"></div>
            </div>
        @endif
    </li>

@endforeach


