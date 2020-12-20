<?php $packets = \App\Models\Packet::all()?>
@extends('admin.layout.layout')
@section('breadcrump')
    <section class="content-header">
        <h1>
            Магазин
        </h1>
    </section>
@endsection
@section('content')
    <div class="row">
        <div class="col-lg-12 col-xs-12">
            <h2 class="page-header">Новые пакеты (товары) </h2>
        </div>
        {!!   view('admin.shop.packets_show', [
            'packets' => $packets
        ]) !!}

    </div>


    <div class="modal fade text-center" id="buy_modal" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h2 class="modal-title">Купить пакет</h2>
                </div>
                <div class="modal-body">
                    <div class="btn-group">
                        <button style="font-size: 2rem; font-weight: bolder;" class="btn btn-success" type="button" id="send_request_btn">
                            Отправить запрос
                        </button>
                    </div>
                    <hr>
{{--                    <div class="btn-group">--}}
{{--                        <button style="font-size: 2rem; font-weight: bolder;" class="btn btn-warning" type="button" id="buy_packet_from_balance_btn">--}}
{{--                            Снять с баланса--}}
{{--                        </button>--}}
{{--                    </div>--}}
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Закрыть</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade text-center" id="buy_modal2" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h2 class="modal-title">Купить пакет</h2>
                </div>
                <div class="modal-body">
                    <div class="btn-group">
                        <h2 class="modal-title">Окно запроса</h2>
                    </div>
                    <hr>
                    <div class="btn-group">
                        <button style="font-size: 2rem; font-weight: bolder;" class="btn btn-success" type="button" id="send_request_btn_second">
                            Отправить запрос
                        </button>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Закрыть</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade text-center" id="buy_modal3" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h2 class="modal-title">Купить пакет</h2>
                </div>
                <div class="modal-body">
                    <input type="hidden" class="form-control" id="vip_packet_id" name="packet_id">
                    <div class="form-group">
                        <label for="desired_price">Желаемая сумма</label>
                        <input type="number" class="form-control"  id="desired_price" name="desired_price" placeholder="">
                    </div>
                    <div class="form-group">
                        <label> <span id="percent_packet">15</span>% от желаемой суммой</label>
                        <input type="text" id="percent_of_price" class="form-control" placeholder="" disabled>
                    </div>
                    <div class="btn-group">
                        <button type="submit" style="font-size: 2rem; font-weight: bolder;" class="btn btn-success" id="send_packet_vip_btn">
                            Перейти к оплате
                        </button>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Закрыть</button>
                </div>
            </div>
        </div>
    </div>



@endsection


