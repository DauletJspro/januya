@extends('admin.layout.layout')

@section('breadcrump')

    <section class="content-header">
        <h1>
            Магазин
        </h1>

        <div class="alert alert-warning">
            <h4>* Активный Консультант - это Партнер совершающий покупку продукции не менее 25$ (12 500тг) каждый месяц</h4>            
        </div>

        <div style="text-align: right">
            <a style="font-size: 20px;text-decoration: underline;" href="/admin/basket">Посмотреть корзину <span id="basket_count" class="label label-primary pull-right" style=" background-color: rgb(253, 58, 53) ! important; font-size: 15px; border-radius: 50%">{{$row->basket_count}}</span></a>
        </div>
    </section>

@endsection

@section('content')

    <div class="row">
        <div class="col-lg-12 col-xs-12">
            <h2 class="page-header">Список товаров</h2>
        </div>

        @include('admin.online-shop.product-list-loop')

    </div>

    <div class="text-center">
        {!! $row->products->links() !!}
    </div>

    <div class="modal-dialog" id="shop_modal" style="display: none;">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" onclick="closeModal()"><span aria-hidden="true">×</span></button>
                <h2 class="modal-title" id="modal_title"></h2>
            </div>
            <div class="modal-body">
                <p id="modal_desc"></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" onclick="closeModal()">Закрыть</button>
            </div>
        </div><!-- /.modal-content -->
    </div>



@endsection


