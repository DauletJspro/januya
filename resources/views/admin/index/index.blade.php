@extends('admin.layout.layout')

@section('breadcrump')


@endsection

@section('content')
    <div class="row">
        <div style="padding-left: 2rem;"><h3 style="font-size: 3rem;">Личный доход</h3></div>
        <div class="col-sm-3 col-lg-3 col-xs-6 col-md-4">
            <div class="card">
                <div class="card-body text-center">
                    <h5 class="card-title">На сегодня</h5>
                    <p class="card-text">100 pv</p>
                    <p class="card-text">1000 &#8376; </p>
                    <a href="#" class="btn btn-primary">Доход</a>
                </div>
            </div>
        </div>
        <div class="col-sm-3 col-lg-3 col-xs-6 col-md-4">
            <div class="card">
                <div class="card-body text-center">
                    <h5 class="card-title">За последнюю неделю</h5>
                    <p class="card-text">100 pv</p>
                    <p class="card-text">1000 &#8376; </p>
                    <a href="#" class="btn btn-primary">Доход</a>
                </div>
            </div>
        </div>
        <div class="col-sm-3 col-lg-3 col-xs-6 col-md-4">
            <div class="card">
                <div class="card-body text-center">
                    <h5 class="card-title">За последний месяц</h5>
                    <p class="card-text">100 pv</p>
                    <p class="card-text">1000 &#8376; </p>
                    <a href="#" class="btn btn-primary">Доход</a>
                </div>
            </div>
        </div>
        <div class="col-sm-3 col-lg-3 col-xs-6 col-md-4">
            <div class="card">
                <div class="card-body text-center">
                    <h5 class="card-title">За весь период</h5>
                    <p class="card-text">100 pv</p>
                    <p class="card-text">1000 &#8376; </p>
                    <a href="#" class="btn btn-primary">Доход</a>
                </div>
            </div>
        </div>

    </div>
    <div class="row">
        <div style="padding-left: 2rem;"><h3 style="font-size: 3rem;">Групповой доход</h3></div>
        <div class="col-sm-3 col-lg-3 col-xs-6 col-md-4">
            <div class="card">
                <div class="card-body text-center">
                    <h5 class="card-title">На сегодня</h5>
                    <p class="card-text">100 gv</p>
                    <p class="card-text">1000 &#8376; </p>
                    <a href="#" class="btn btn-primary">Доход</a>
                </div>
            </div>
        </div>
        <div class="col-sm-3 col-lg-3 col-xs-6 col-md-4">
            <div class="card">
                <div class="card-body text-center">
                    <h5 class="card-title">За последнюю неделю</h5>
                    <p class="card-text">100 gv</p>
                    <p class="card-text">1000 &#8376; </p>
                    <a href="#" class="btn btn-primary">Доход</a>
                </div>
            </div>
        </div>
        <div class="col-sm-3 col-lg-3 col-xs-6 col-md-4">
            <div class="card">
                <div class="card-body text-center">
                    <h5 class="card-title">За последний месяц</h5>
                    <p class="card-text">100 gv</p>
                    <p class="card-text">1000 &#8376; </p>
                    <a href="#" class="btn btn-primary">Доход</a>
                </div>
            </div>
        </div>
        <div class="col-sm-3 col-lg-3 col-xs-6 col-md-4">
            <div class="card">
                <div class="card-body text-center">
                    <h5 class="card-title">За весь период</h5>
                    <p class="card-text">100 gv</p>
                    <p class="card-text">1000 &#8376; </p>
                    <a href="#" class="btn btn-primary">Доход</a>
                </div>
            </div>
        </div>

    </div>
    <div class="row">
        <div style="padding-left: 2rem;"><h3 style="font-size: 3rem;">Текущий счет</h3></div>
        <div class="col-sm-3 col-lg-3 col-xs-6 col-md-4">
            <div class="card">
                <div class="card-body text-center">
                    <h5 class="card-title">На сегодня</h5>
                    <p class="card-text">100 gv</p>
                    <p class="card-text">1000 &#8376; </p>
                    <a href="#" class="btn btn-primary">Доход</a>
                </div>
            </div>
        </div>
        <div class="col-sm-3 col-lg-3 col-xs-6 col-md-4">
            <div class="card">
                <div class="card-body text-center">
                    <h5 class="card-title">За последнюю неделю</h5>
                    <p class="card-text">100 gv</p>
                    <p class="card-text">1000 &#8376; </p>
                    <a href="#" class="btn btn-primary">Доход</a>
                </div>
            </div>
        </div>
        <div class="col-sm-3 col-lg-3 col-xs-6 col-md-4">
            <div class="card">
                <div class="card-body text-center">
                    <h5 class="card-title">За последний месяц</h5>
                    <p class="card-text">100 gv</p>
                    <p class="card-text">1000 &#8376; </p>
                    <a href="#" class="btn btn-primary">Доход</a>
                </div>
            </div>
        </div>
        <div class="col-sm-3 col-lg-3 col-xs-6 col-md-4">
            <div class="card">
                <div class="card-body text-center">
                    <h5 class="card-title">За весь период</h5>
                    <p class="card-text">100 gv</p>
                    <p class="card-text">1000 &#8376; </p>
                    <a href="#" class="btn btn-primary">Доход</a>
                </div>
            </div>
        </div>

    </div>
@endsection

<style>
    .card {
        padding: 20px;
        font-size: 2rem;
        border: 3px solid green;
        border-radius: 5px;
    }

    .card-text {
        font-size: 3rem;
        font-weight: bolder;
        color: green;
    }

    .card-title {
        font-size: 3rem;
    }

    .card-body a {
        width: 100%;
        font-size: 2rem
    }
</style>


