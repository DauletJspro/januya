@extends('new_design.layout.app')

@section('meta-tags')

    <title> @lang('app.contact') </title>
    <meta name="description"
          content="Наши контакты. Januya - это группа единомышленников, которые уже имеют богатый опыт работы в МЛМ - индустрии, интернет-коммерции и обладают всеми необходимыми качествами для достижения поставленных целей"/>
    <meta name="keywords" content="Наши контакты, Januya"/>

@endsection

@section('content')
    <main id="mt-main">
        <!-- Mt Contact Banner of the Page -->
        <section class="mt-contact-banner wow fadeInUp" data-wow-delay="0.4s">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 text-center">
                        <h1> @lang('app.contact') </h1>
                        <nav class="breadcrumbs">
                            {{--                            <ul class="list-unstyled">--}}
                            {{--                                <li><a href="index.html">Home <i class="fa fa-angle-right"></i></a></li>--}}
                            {{--                                <li><a href="#">Contact</a></li>--}}
                            {{--                            </ul>--}}
                        </nav>
                    </div>
                </div>
            </div>
        </section><!-- Mt Contact Banner of the Page -->
        <!-- Mt Contact Detail of the Page -->
        <section class="mt-contact-detail content-info wow fadeInUp" data-wow-delay="0.4s">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-xs-12 col-sm-8">
                        <div class="txt-wrap">
                            <h1> @lang('app.always_contact') </h1>
                            <p> @lang('app.contact_text') </p>
                        </div>
                        <ul class="list-unstyled contact-txt">
                            <li>
                                <strong> @lang('app.address') </strong>
                                <address style="line-height: 2.5rem; font-weight: 400;"> @lang('app.footer_address') <br>                                   
                                </address>
                            </li>
                            <li>
                                <strong> @lang('app.phone_number') </strong>
                                <a href="tel: +77019150511" style="line-height: 2.5rem; font-weight: 400;">  +7 (701) 101 91 90</a> <br>
                                {{-- <a href="tel: +77079912291" style="line-height: 2.5rem; font-weight: 400;"> +7 (707) 991 22 91</a> --}}
                            </li>
                            {{-- <li>
                                <strong>E mail</strong>
                                <a href="mailto:Januya.kz@gmail.com" style="line-height: 2.5rem; font-weight: 400;">Januya.kz@gmail.com</a>
                            </li> --}}
                        </ul>
                    </div>
                    <div class="col-xs-12 col-sm-4">
                        <h2> @lang('app.have_question') </h2>
                        <!-- Contact Form of the Page -->
                        <form action="#" class="contact-form">
                            <fieldset>
                                <input type="text" class="form-control" placeholder="Name">
                                <input type="email" class="form-control" placeholder="E-Mail">
                                <input type="text" class="form-control" placeholder="Subject">
                                <textarea class="form-control" placeholder="Message"></textarea>
                                <button class="btn-type3" type="submit"> @lang('app.submit') </button>
                            </fieldset>
                        </form>
                        <!-- Contact Form of the Page end -->
                    </div>
                </div>
            </div>
        </section><!-- Mt Contact Detail of the Page end -->
        <!-- Mt Map Holder of the Page -->
        {{-- <div id="map" style="width: 100%; min-height: 500px"></div> --}}
    </main>
@endsection
@section('js')
    <script src="https://api-maps.yandex.ru/2.1/?lang=ru_RU&amp;apikey=<ваш API-ключ>" type="text/javascript"></script>
    {{-- <script>
        ymaps.ready(init);

        function init() {
            var myMap = new ymaps.Map("map", {
                    center: [43.263547, 76.953172],
                    zoom: 17,
                }, {
                    searchControlProvider: 'yandex#search'
                }),
                myGeoObject = new ymaps.GeoObject({
                    geometry: {
                        type: "Point",
                        coordinates: [43.263547, 76.953172]
                    },
                    properties: {
                        iconContent: 'Qyran partners',
                    }
                }, {
                    preset: 'islands#redStretchyIcon',
                    draggable: true
                });

            myMap.geoObjects
                .add(myGeoObject);
        }

    </script> --}}
@endsection