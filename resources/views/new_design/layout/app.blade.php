<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
  
    @yield('meta-tags')    
    <link rel="shortcut icon" href="/favicon.png?v=4" />
  
    <!--[if lte IE 9]><link rel="stylesheet" type="text/css" href="/wp-content/plugins/js_composer/assets/css/vc_lte_ie9.min.css" media="screen"><![endif]-->

    <!-- include the site stylesheet -->
    <link href='https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,200,200italic,300,300italic,400italic,600,600italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Oxygen:400,300,700' rel='stylesheet' type='text/css'>
    <!-- include the site stylesheet -->
    <link rel="stylesheet" href="{{ asset('custom2/css/bootstrap.css') }}">
    <!-- include the site stylesheet -->
    <link rel="stylesheet" href="{{ asset('custom2/css/animate.css') }}">
    <!-- include the site stylesheet -->
    <link rel="stylesheet" href="{{ asset('custom2/css/icon-fonts.css') }}">
    <!-- include the site stylesheet -->
    <link rel="stylesheet" href="{{ asset('custom2/css/main.css') }}">
    <!-- include the site stylesheet -->
    <link rel="stylesheet" href="{{ asset('custom2/css/custom.css') }}">
    <!-- include the site stylesheet -->
    <link rel="stylesheet" href="{{ asset('custom2/css/responsive.css') }}">
  
</head>
<body>
  <!-- main container of all the page elements -->
  <div id="wrapper">
    <!-- Page Loader -->
    <div id="pre-loader" class="loader-container">
      <div class="loader">
        <img src="{{ asset('custom2/img/logo/Logo.png') }}" alt="loader">
      </div>
    </div>    
    <!-- W1 start here -->
    <div class="w1">
      @if (Route::is('basket.show', 'favorite.showUserItem'))
        @include('new_design.layout.header_v2')    
      @else
        @include('new_design.layout.header')
      @endif      
      @yield('content')
      @include('new_design.layout._detail_modal')
      @include('new_design.layout.footer')      
    </div><!-- W1 end here -->
		<span id="back-top" class="fa fa-arrow-up"></span>
	</div>
	<!-- include jQuery -->
	<script src="{{ asset('custom2/js/jquery.js') }}"></script>
	<!-- include jQuery -->
	<script src="{{ asset('custom2/js/plugins.js') }}"></script>
	<!-- include jQuery -->
  <script src="{{ asset('custom2/js/jquery.main.js') }}"></script>
  @stack('scripts')
</body>
</html>