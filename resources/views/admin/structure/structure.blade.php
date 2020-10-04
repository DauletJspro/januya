@extends('admin.layout.layout')

@section('breadcrump')

    <section class="content-header">
        <h1>
            Структура
        </h1>
    </section>

@endsection

@section('content')

    <div class="row">
        <div class="col-lg-12 col-xs-12">
            <div class="structure-list">
                <div class="obsdiv" style="padding: 0 10px">
                    <div class="ulist">
                        <?php
                            use App\Models\Packet;use App\Models\UserPacket;use Illuminate\Support\Facades\Auth;$user_id = Auth::user()->user_id;
                            if (Auth::user()->role_id == 1) $user_id = 1;
                            $user_list = \App\Models\Users::where('recommend_user_id', $user_id)->take(20)->get();

                            if (Auth::user()->soc_status_id) {
                                $user = \App\Models\Users::leftJoin('user_status', 'user_status.user_status_id', '=', 'users.status_id')                            
                                    ->join('user_status as u_s ','users.soc_status_id', '=', 'u_s.user_status_id')
                                    ->select('users.*', 'u_s.user_status_name as soc_status_name', 'user_status.user_status_name')
                                    ->where('user_id', $user_id)
                                    ->first();
                            } else {
                                $user = \App\Models\Users::leftJoin('user_status', 'user_status.user_status_id', '=', 'users.status_id')                                                            
                                    ->where('user_id', $user_id)
                                    ->first();
                            }
                        ?>

                        <ul class="level_1">
                            <li class="parent">

                                @if(count($user_list) > 0)
                                    <span onclick="opUl(this)">+</span>
                                    <div class="dval act user-name">
                                        <div class="object-image client-image">
                                            <a @if(Auth::user()->role_id == 1) href="/admin/profile/{{$user->user_id}}"
                                               target="_blank" @endif>
                                                <img src="{{$user->avatar}}">
                                            </a>
                                        </div>
                                        <div class="left-float client-name">
                                            {{$user->login}}  @if(Auth::user()->user_id == 1)
                                                ({{$user->name}} {{$user->last_name}}
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
                                    <ul class="level_2">
                                        {!! view('admin.structure.structure-list-loop-ajax',['user_id' => $user_id,'level' => '3']) !!}
                                    </ul>
                                @else
                                    <div class="dval act user-name">
                                        <div class="object-image client-image">
                                            <a @if(Auth::user()->role_id == 1) href="/admin/profile/{{$user->user_id}}"
                                               target="_blank" @endif>
                                                <img src="{{$user->avatar}}">
                                            </a>
                                        </div>
                                        <div class="left-float client-name">
                                            {{$user->login}}  @if(Auth::user()->user_id == 1) {{$user->name}} {{$user->last_name}} @endif @include('admin.structure.user_packet_list_loop')
                                            <div style="padding-top: 5px; color: rgb(58, 58, 58);">
                                                <p style="color: #009551; margin: 0px">Квалификация: {{$user->user_status_name ?: 'Нету'}}</p>
                                                @if($user->pv_balance)
                                                    <span class="badge">PV:</span> {{$user->pv_balance}} pv<br>
                                                @endif
                                                @if($user->gv_balance)
                                                    <span class="badge">GV:</span> {{$user->gv_balance}} gv<br>
                                                @endif
                                                @if($user->cv_balance)
                                                    <span class="badge">CV:</span> {{$user->cv_balance}} cv<br>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="clear-float"></div>
                                    </div>
                                @endif
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

