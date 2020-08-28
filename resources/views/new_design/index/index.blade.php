@extends('new_design.layout.app')
@section('meta-tags')

    <title>Главная</title>
    <meta name="description"
          content="«JanELim» - это уникальный медиа проект с широким набором возожностей для взаймодествия с участниками виртуального рынка"/>
    <meta name="keywords" content="Jan Elim"/>

@endsection
@section('content')
<!-- mt main start here -->
<main id="mt-main">
    @include('new_design.index._first_section')
    <div class="container">
        <div class="row">
            @include('new_design.index._second_section')
            @include('new_design.index._third_section')            
        </div>
    </div>
</main>
<!-- footer of the Page -->
@endsection