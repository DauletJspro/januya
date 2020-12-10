@extends('admin.layout.layout')

@section('content')


    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title box-title-first">
                        <a href="/admin/vip_client"
                           class="menu-tab @if((!isset($request->is_paid) && !isset($request->is_expected)) ||  $request->is_paid == '0') active-page @endif">Все
                            пользователи</a>
                    </h3>
                    <h3 class="box-title box-title-first">
                        <a href="/admin/vip_client?is_expected=1"
                           class="menu-tab @if(isset($request->is_expected)) active-page @endif">Ожидаемые
                            пользователи</a>
                    </h3>
                    <h3 class="box-title box-title-second">
                        <a href="/admin/vip_client?is_paid=1"
                           class="menu-tab @if($request->is_paid == '1') active-page @endif">Не актуальные
                            пользователи</a>
                    </h3>                    
                    <div class="clear-float"></div>
                </div>
                <div>
                    <div style="text-align: right" class="form-group col-md-6">
                        <h4 class="box-title box-edit-click">
                            {{-- <a href="javascript:void(0)" onclick="deleteAll('user')">Удалить отмеченные</a>--}}
                        </h4>
                    </div>
                    <div style="text-align: right" class="form-group col-md-6">
                        <h4 class="box-title box-edit-click">
                            Накопленная сумма: {{ $accumulated_amount }}
                            {{-- <a href="javascript:void(0)" onclick="deleteAll('user')">Удалить отмеченные</a>--}}
                        </h4>
                    </div>
                </div>
                <div class="box-body">

                    <div class="nav-tabs-custom">

                        <div class="tab-content">
                            <div>
                                <table id="news_datatable" class="table table-bordered table-striped table-css">
                                    <thead>

                                    <tr>
                                        <th style="width: 30px">№</th>
                                        <th style="width: 15px">Аватар</th>
                                        <th>Пользователь</th>
                                        <th>Спонсор</th>
                                        <th>Email / Телефон</th>
                                        <th>Пакеты</th>
                                        <th>Дата регист.</th>
                                        <th>Город</th>                                        
                                        <th>Предоплата</th>
                                        <th>Оставшиеся сумма</th>
                                        <th>Желаемая сумма</th>
                                    </tr>
                                    </thead>

                                    <tbody>

                                    <tr>
                                        <td></td>
                                        <td>

                                        </td>
                                        <td>
                                            <form>
                                                <input value="{{$request->user_name}}" type="text" class="form-control"
                                                       name="user_name" placeholder="Поиск">
                                            </form>
                                        </td>
                                        <td>
                                            <form>
                                                <input value="{{$request->sponsor_name}}" type="text"
                                                       class="form-control" name="sponsor_name" placeholder="Поиск">
                                            </form>
                                        </td>
                                        <td></td>
                                        <td>
                                            <form>
                                                <input value="{{$request->packet_name}}" type="text"
                                                       class="form-control" name="packet_name" placeholder="Поиск">
                                            </form>
                                        </td>
                                        <td></td>
                                        <td>
                                            <form>
                                                <input value="{{$request->city_name}}" type="text" class="form-control"
                                                       name="city_name" placeholder="Поиск">
                                            </form>
                                        </td>                                       
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>

                                    @foreach($row->row as $key => $val)

                                        <tr style=" {{ $accumulated_amount >= $val->desired_price ? 'background-color: #5aea00' : '' }} ">
                                            <td> {{ $key + 1 }}</td>
                                            <td>
                                                <div class="object-image client-image">
                                                    <a href="/admin/profile/{{$val->user_id}}" target="_blank">
                                                        <img src="{{$val->avatar}}">
                                                    </a>
                                                </div>
                                                <div class="clear-float"></div>
                                            </td>
                                            <td class="arial-font">
                                                <a class="main-label" href="/admin/profile/{{$val->user_id}}"
                                                   target="_blank"><p
                                                            class="login">{{$val->login}}</p>@if(Auth::user()->user_id == 1)
                                                        <p class="client-name">{{ $val->name }} {{ $val->last_name }} {{ $val->middle_name }}</p> @if($val->is_activated == 0)
                                                            <p style="color: red">Не активирован</p> @endif @endif</a>
                                            </td>
                                            <td class="arial-font">
                                                <a class="main-label" href="/admin/profile/{{$val->recommend_id}}"
                                                   target="_blank"><p
                                                            class="login">{{$val->recommend_login}}</p>@if(Auth::user()->user_id == 1)
                                                        <p class="client-name">{{ $val->recommend_name }} {{ $val->recommend_last_name }} {{ $val->recommend_middle_name }}</p>@endif
                                                </a>
                                            </td>
                                            <td class="arial-font">
                                                <div>
                                                    {{ $val->email }} </br>
                                                    {{ $val->phone }}
                                                </div>
                                            </td>
                                            <td class="arial-font" style="text-align: center">
                                                @include('admin.vip_client.user_packet_list_loop')
                                            </td>
                                            <td class="arial-font">
                                                <div>
                                                    {{ $val->date }}
                                                </div>
                                            </td>
                                            <td class="arial-font">
                                                <div>
                                                    {{ $val->country_name_ru }}</br>
                                                    {{ $val->city_name_ru }}
                                                </div>
                                            </td>
                                            <td class="arial-font">
                                                <div>
                                                    {{ $val->country_name_ru }}</br>
                                                    {{ $val->pre_desired_price }}
                                                </div>
                                            </td>
                                            <td class="arial-font">
                                                <div>
                                                    {{ $val->country_name_ru }}</br>
                                                    {{ $val->desired_price - $val->pre_desired_price }}
                                                </div>
                                            </td>
                                            <td class="arial-font">
                                                <div>
                                                    {{ $val->country_name_ru }}</br>
                                                    {{ $val->desired_price }}
                                                </div>
                                            </td>
                                        </tr>

                                    @endforeach

                                    </tbody>

                                </table>

                            </div>

                        </div>

                    </div>


                    <div style="text-align: center">
                        {{ $row->row->appends(\Illuminate\Support\Facades\Input::except('page'))->links() }}
                    </div>

                </div>
            </div>
        </div>
    </div>    

@endsection

@section('js')
    <script>
        function share(object_tag) {
            var user_id = $(object_tag).data('user-id');
            var user_full_name = $(object_tag).data('user-full_name');
            var share = $(object_tag).data('share');
            var is_holder = $(object_tag).data('is_holder');

            $('#user_modal_full_name').text(user_full_name);
            $('#modal_user_id').val(user_id);
            $('#modal_user_share').val(share);
            $('#is_holder').val(is_holder);
            $('#myModal').modal();
        }
    </script>
@endsection