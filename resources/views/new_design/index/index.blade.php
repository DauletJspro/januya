@extends('new_design.layout.app')
@section('meta-tags')

    <title>Главная</title>
    <meta name="description"
          content="«Januya» - это уникальный медиа проект с широким набором возожностей для взаймодествия с участниками виртуального рынка"/>
    <meta name="keywords" content="Januya"/>

@endsection
@section('content')
<!-- mt main start here -->
<main id="mt-main">
    <div class="container">
        <div class="row">
            <div class="col-xs-12 paddingbootom-md">
                @include('new_design.index._first_section')
                @include('new_design.index._third_section')            
                @include('new_design.index._second_section')
            </div>
        </div>
    </div>
</main>
<!-- footer of the Page -->
@endsection