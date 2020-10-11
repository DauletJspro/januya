<?php
use App\Models\Category;
use Illuminate\Support\Facades\Auth;

$categories = Category::where(['is_show' => true])->limit(15)->get();
$MAC = exec('getmac');
$MAC = strtok($MAC, ' ');
if (Auth::user()) {
    $favorites = \App\Models\Favorite::where(['user_id' => Auth::user()->user_id])->get();
} else {
    $favorites = \App\Models\Favorite::where(['ip_address' => $MAC])->get();
}
$needSubsidiaryIds = [5, 7, 8];
$subsidiaries = \App\Models\Brand::whereIn('id', $needSubsidiaryIds)->get();

?>
<!-- mt header style7 start here -->
<header id="mt-header" class="style7">
    <!-- mt-top-bar start here -->
    <div class="mt-top-bar">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-6 hidden-xs">
                    <span class="tel active" onclick="tel:+77011019190"> <i class="fa fa-phone" aria-hidden="true"></i> +7 (701) 101 91 90</span>
                    {{-- <a class="tel" href="mailto:Januya.kz@gmail.com"> <i class="fa fa-envelope-o" aria-hidden="true"></i> Januya.kz@gmail.com</a> --}}
                </div>
                <div class="col-xs-12 col-sm-6 text-right">
                    <!-- mt-top-list start here -->
                    <ul class="mt-top-list">
                        @if(!Auth::check())                            
                            <li><a href="/register"> @lang('app.sign_up') </a></li>
                            <li class="active"><a href="/login"> @lang('app.sign_in') </a></li>                            
                        @else
                            <li class="active"><a href="/admin/index"> @lang('app.cabinet') </a></li>                            
                        @endif                        
                        <div class="mt-top-lang" style="display: none">
                            <a href="#" class="lang-opener" style="font-size: 12px; font-weight: bold;">{{ App::getLocale() }}<i class="fa fa-angle-down" aria-hidden="true"></i></a>
                            <div class="drop">
                                <ul>
                                    @if (App::isLocale('en'))
                                        <li><a href="{{\App\Http\Helpers::setSessionLang('ru',$request)}}">ru</a></li>
                                        <li><a href="{{\App\Http\Helpers::setSessionLang('kz',$request)}}">kz</a></li>
                                    @elseif (App::isLocale('kz'))
                                        <li><a href="{{\App\Http\Helpers::setSessionLang('ru',$request)}}">ru</a></li>
                                        <li><a href="{{\App\Http\Helpers::setSessionLang('en',$request)}}">en</a></li>
                                    @else
                                        <li><a href="{{\App\Http\Helpers::setSessionLang('kz',$request)}}">kz</a></li>
                                        <li><a href="{{\App\Http\Helpers::setSessionLang('en',$request)}}">en</a></li>
                                    @endif                                    
                                </ul>
                            </div>
                        </div>                        
                    </ul><!-- mt-top-list end here -->                    
                </div>
            </div>
        </div>
    </div><!-- mt-top-bar end here -->
    <!-- mt-bottom-bar start here -->
    <div class="mt-bottom-bar">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="mt-logo"><a href="/"><img src="/custom2/img/logo/logo_text-removebg.png" alt="schon"></a></div>
                    <?php $totalPrice = 0;?>
                    <?php $total = 0;?>
                    @if(Auth::user())
                        <?php $items = \App\Models\UserBasket::where(['user_id' => \Illuminate\Support\Facades\Auth::user()->user_id])->get(); ?>
                        <?php foreach ($items as $item): ?>
                        <?php $total = (\App\Models\Product::where(['product_id' => $item->product_id])->first()); ?>
                        <?php $totalPrice += $total ? $total->product_price : 0; ?>
                        <?php endforeach ?>
                    @endif
                    <!-- mt-icon-list start here -->
                    <ul class="mt-icon-list">
                        {{-- <li><a href="#" class="icon-user"></a></li> --}}
                        {{-- <li>
                            <a href="{{ route('favorite.showUserItem') }}" class="icon-heart">											
                                <span style="margin-bottom: -3px;" class="num">{{count($favorites)}}</span></a>
                        </li>									
                        <li>
                            <a href="{{ route('basket.show') }}" class="icon-handbag">											
                                <span class="num">{{isset($items) ? count($items) : 0}}</span>
                            </a>									
                        </li> --}}
                        <li class="hidden-lg hidden-md">
                            <a class="bar-opener mobile-toggle" href="#">
                                <span class="bar"></span>
                                <span class="bar small"></span>
                                <span class="bar"></span>
                            </a>
                        </li>
                    </ul><!-- mt-icon-list end here -->								
                    <!-- navigation start here -->
                    <nav id="nav">
                        <ul>
                            <li>
                                <a class="" href="/about-us"> @lang('app.about_us') </a>
                            </li>
                            <li>
                                <a class="drop-link" href="#"> @lang('app.products') <i class="fa fa-angle-down hidden-lg hidden-md" aria-hidden="true"></i></a>
                                <div class="s-drop open">
                                    <ul>
                                        @foreach ($products as $product)
                                            <li><a href="{{ route('product.detail',$product->product_id, ['id' => $product->product_id]) }}">{{$product->product_name_ru}}</a></li>
                                        @endforeach
                                    </ul>
                                </div>
                            </li>
                            <li>
                                <a class="" href="/opportunity">  @lang('app.opportunities') </a> 
                            </li>
                            <li>
                                <a class="" href="{{ route('contact.show') }}"> @lang('app.contact') </a>
                            </li>
                        </ul>
                    </nav><!-- navigation end here -->
                </div>
            </div>
        </div>
    </div>
</header>
<!-- mt main start here -->