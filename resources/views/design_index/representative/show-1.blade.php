@extends('design_index.layout.layout')
@section('meta-tags')

    <title>Qpartners Shop</title>
    <meta name="description"
          content="«Qpartners» - это уникальный медиа проект с широким набором возожностей для взаймодествия с участниками виртуального рынка"/>
    <meta name="keywords" content="Qpartners"/>

@endsection


@section('content')
    <main id="mt-main">
        <!-- Mt Content Banner of the Page -->
        <section class="mt-contact-banner">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 text-center">
                        <h1>СПИСОК ПРЕДСТАВИТЕЛЕЙ</h1>
                        <nav class="breadcrumbs">
                            <ul class="list-unstyled">
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </section>
        <!-- Mt Content Banner of the Page end -->
        <!-- Mt About Section of the Page -->
        <section class="mt-about-sec" style="padding-bottom: 0;">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="txt wow fadeInUp" data-wow-delay="0.4s">
                            <h2>СПИСОК ПРЕДСТАВИТЕЛЕЙ С КОНТАКТАМИ</h2>
                            <p>
                                В нижеследующем списке Вы можете ознакомиться с представителями компании Qyran Partners
                                Club
                                <br>
                                Для каждого региона назначается свой представитель компании
                                <br>
                                Если у вас есть вопросы то Вы можете обратиться в представителю в вашем регионе
                                <br>
                                Контактные данные представителя Вашего региона Вы можете найти в этом списке
                                <br>
                                <br>
                                Если Вы в списке не нашли представителя своего региона, то Вы можете стать первым
                                представителем компании в своем регионе
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <div class="container faq-section mt-about-sec">
            <div class="row txt">
                <div class="col-xs-12">
                    <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                        <?php $counter = 0; ?>
                        @foreach($cities as $city)
                            <?php $counter++; ?>
                            <div class="panel panel-default">
                                <div class="panel-heading" role="tab" id="heading{{$city->city_id}}">
                                    <h4 class="panel-title">
                                        <a class="collapsed" role="button" data-toggle="collapse"
                                           data-parent="#accordion"
                                           href="#collapse{{$city->city_id}}" aria-expanded="false"
                                           aria-controls="collapse{{$city->city_id}}">
                                            {{ sprintf('%s &emsp; г. %s', $counter,$city->city_name_ru)}}
                                        </a>
                                    </h4>
                                </div>
                                <div id="collapse{{$city->city_id}}" class="panel-collapse collapse" role="tabpanel"
                                     aria-labelledby="heading{{$city->city_id}}">
                                    <div class="panel-body">
                                        <?php
                                        $subCounter = 0;
                                        $representatives = \App\Models\Representative::where(['city_id' => $city->city_id])->get();
                                        ?>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
