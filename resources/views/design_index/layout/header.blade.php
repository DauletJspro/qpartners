<?php
use App\Models\Category;
use App\Models\City;
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

$cities_table = new City();
$cities = City::where('country_id',1)->get();

$logo_image_name = 'market.png';
$controllerName = request()->route()->getAction()['controller'];
$gapTypeActive = 0;
if ($controllerName == 'App\Http\Controllers\Index\IndexController@index') {
    $logo_image_name = 'gap.svg';
    $gapTypeActive = 1;
} elseif ($controllerName == 'App\Http\Controllers\Index\GapMarketController@show') {
    $logo_image_name = 'market.png';
    $gapTypeActive = 2;
} elseif ($controllerName == 'App\Http\Controllers\Index\GapCardController@show') {
    $logo_image_name = 'card.png';
    $gapTypeActive = 3;
}
?>

<header id="mt-header" class="style3">
    <div class="mt-top-bar">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-6" id="hidden-xs">
                    <ul class="gap-ul mt-top-bar" style="float: left;">
                        <li style="{{$gapTypeActive == 1 ? 'list-style-type: none; background-color: white; margin:0; height: 38px; padding-top: 10px': 'list-style-type:none'}}">
                            <a style="{{$gapTypeActive == 1 ? 'background:white;color:red;' : ''}}"
                               href="{{route('gap.index.show')}}">
                                GAP
                            </a>
                        </li>
                        <li style="{{$gapTypeActive == 2 ? 'list-style-type: none; background-color: white; margin:0; height: 38px; padding-top: 10px': 'list-style-type:none'}}">
                            <a style="{{$gapTypeActive == 2 ? 'background:white;color:red;' : ''}}"
                               href="{{route('gap.market.show')}}">
                                MARKET
                            </a>
                        </li>
                        <li style="{{$gapTypeActive == 3 ? 'list-style-type: none; background-color: white; margin:0; height: 38px; padding-top: 10px': 'list-style-type:none'}}">
                            <a style="{{$gapTypeActive == 3 ? 'background:white;color:red;' : '' }}"
                               href="{{route('gap.card.show')}}">
                                CARD
                            </a>
                        </li>
                        <li style="list-style-type: none;">
                            <a href="">
                                TURISM
                            </a>
                        </li>
                        <li style="list-style-type: none;">
                            <a href="">
                                ACADEMY
                            </a>
                        </li>
                        <li style="list-style-type: none;">
                            <a href="" style="">
                                MEDIA
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="col-xs-12 col-sm-6 text-right" style="display: flex; flex-direction: column;">
                    <ul class="header-items-ul mt-top-list" style="margin-left: auto">
                        <li id="phoneNumber">
                            <a href="" style="
                                font-weight: bold;
                                font-size: 1.5rem;
                            ">
                                + 7 707 369 17 77
                            </a>
                        </li>
                        <li id="language">
                            <div class="dropdown cursor-pointer">
                                <a class="icl_lang_sel_current icl_lang_sel_native">RU <i class="fa fa-angle-down"
                                                                                          aria-hidden="true"></i> </a>
                                <div class="dropdown-content">
                                    <a href="{{\App\Http\Helpers::setSessionLang('kz',$request)}}">
                                        RU
                                    </a>
                                    <a href="{{\App\Http\Helpers::setSessionLang('ru',$request)}}">
                                        KZ
                                    </a>
                                    <a href="{{\App\Http\Helpers::setSessionLang('en',$request)}}">
                                        EN
                                    </a>
                                </div>
                            </div>
                        </li>
                        <li class="">
                            <div class="dropdown">
                                <a class="" href="#">{{Lang::get('app.cabinet')}}</a>
                                <div class="dropdown-content">
                                    @if(!Auth::check())
                                        <a href="/register">Регистрация</a>
                                        <a href="/login">Войти</a>
                                    @else
                                        <a href="/admin/index">Личный кабинет</a>
                                    @endif
                                </div>
                            </div>
                        </li>
                        <li>
                            <div id="nav-icon1" onclick="{
                                let a = document.getElementById('hidden-nav');
                                console.log('', a.style.display)
                                if(a.length !== 0) {
                                    if(a.style.display === '' || a.style.display === 'none') {
                                        a.style.cssText = 'display: block !important'
                                    }
                                    else {
                                        a.style.cssText = 'display: none'
                                    }
                                }
                                console.log('ha:', a)
                                $(this).toggleClass('open');
                            }">
                                <span></span>
                                <span></span>
                                <span></span>
                            </div>
                        </li>
                    </ul>

                </div>
            </div>
        </div>
    </div>

    <div class="mt-bottom-bar">
        <div class="container">
            <div class="row">
                <div class="col-xs-12" style="display: flex; align-items: center;">
                    <div class="mt-logo fs-24" style="font-weight: 600; height: 24px; font-family: adineuePROKZ-bold">
                        <a href="/"><span style="color: red; ">GAP</span></a>
                        @if($gapTypeActive === 2)
                            <a href="/gap/market/show"><span style="color: #646464">MARKET</span></a>
                        @endif
                        @if($gapTypeActive === 3)
                            <a href="/gap/card/show"><span style="cursor:pointer;color: #646464">CARD</span></a>
                        @endif
                    </div>
                    <div class="cities dropdown cursor-pointer" style="margin-left: 4rem;">
                        <a class="icl_lang_sel_current fs-18 icl_lang_sel_native font-weight-lighter text-black mt-1" style="">
                            @if(isset($city))
                                {{$city->city_name_ru}}
                            @else
                                Шымкент
                            @endif
                            <i class="fa fa-angle-down" aria-hidden="true"></i></a>
                        <div class="dropdown-content">
                            <div class="cities-content" style="display:flex; flex-wrap: wrap; width: 800px; font-size: 12px; text-transform:capitalize; ">
                                <?php for($i = 0; $i < count($cities); $i++ ){?>
                                <a href="{{ route('city.products', $cities[$i]->city_id) }}" class="fs-14"
                                   style="width: 25%"
                                >
                                    {{$cities[$i]->city_name_ru}}
                                </a>

                                <?php } ?>
                            </div>

                        </div>
                    </div>
                    <?php $totalPrice = 0;?>
                    <?php $total = 0;?>
                    @if(Auth::user())
                        <?php $items = \App\Models\UserBasket::where(['user_id' => \Illuminate\Support\Facades\Auth::user()->user_id])->get(); ?>
                        <?php foreach ($items as $item): ?>
                        <?php $total = (\App\Models\Product::where(['product_id' => $item->product_id])->first()); ?>
                        <?php $totalPrice += $total ? $total->product_price : 0; ?>
                    <?php endforeach ?>
                    @endif
                    <nav id="nav" style="float:none; margin-left: auto; font-weight: bold;">
                        <ul class="">

                            <li>
                                <a class="drop-link" href="">О НАС<i class="fa fa-angle-down"
                                                                     aria-hidden="true"></i></a>
                                <div class="s-drop">
                                    <ul>
{{--                                        <li><a href="/about_us/guide">Руководство компании</a></li>--}}
{{--                                        <li><a href="/about_us/administration">Администрация компании</a></li>--}}
{{--                                        <li><a href="/about_us/leaders">Лидеры компании</a></li>--}}
                                        <li><a href="/about_us/guide">О Кооперативе</a></li>
                                        <li><a href="/about_us/chairperson">Председатель Кооператива</a></li>
                                        <li><a href="{{route('faq.show')}}">Часто задаваемые вопросы</a></li>
                                    </ul>
                                </div>
                            </li>
                            <li>
                                <a class="drop-link" href="blog-right-sidebar.html">Программы<i class="fa fa-angle-down"
                                                                                                aria-hidden="true"></i></a>
                                <div class="s-drop">
                                    <ul>
                                        <li><a href="{{ route('program.initial') }}">с первоначальным взносом</a></li>
                                        <li><a href="{{ route('program.share') }}">с паевым взносом</a></li>
                                    </ul>
                                </div>
                            </li>
                            <li>
                                <a href="{{route('advantage.index')}}">
                                    Преимущества
                                </a>
                            </li>
                            <li>
                                <a class="drop-link" href="blog-right-sidebar.html">НОВОСТИ<i class="fa fa-angle-down"
                                                                                              aria-hidden="true"></i></a>
                                <div class="s-drop">
                                    <ul>
                                        <li><a href="/news">Новости кооператива</a></li>
                                        <li><a href="{{route('gallery.show')}}">Фото и видео галерея</a></li>
                                    </ul>
                                </div>
                            </li>

                            <li>
                                <a class="drop-link" href="homepage1.html">КОНТАКТЫ<i class="fa fa-angle-down"
                                                                                      aria-hidden="true"></i></a>
                                <div class="s-drop">
                                    <ul>
                                        <li><a href="{{route('contact.show')}}">Головной офис</a></li>
                                        <li><a href="{{route('representative.show')}}">Представители</a></li>
                                    </ul>
                                </div>
                            </li>
                            <li class="hide_nav_li">
                                <a href="{{route('shop.show')}}">Магазин</a>
                            </li>
                            <li class="hide_nav_li">
                                <a class="" href="{{ route('basket.show') }}">Корзина</a>
                            </li>

                            <li class="hide_nav_li">
                                <a class="" href="{{ route('favorite.showUserItem') }}">Избранные</a>
                            </li>

                            <li class="hide_nav_li nav_li_lang">
                                <a href="{{\App\Http\Helpers::setSessionLang('kz',$request)}}">
                                    KZ
                                </a>
                                <a href="{{\App\Http\Helpers::setSessionLang('ru',$request)}}">
                                    RU
                                </a>
                                <a href="{{\App\Http\Helpers::setSessionLang('en',$request)}}">
                                    EN
                                </a>
                            </li>

                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <span class="mt-side-over"></span>
    <div style="display: flex; background: white;">
        <ul class="" id="hidden-nav">
            <li style="{{$gapTypeActive == 1 ? 'list-style-type: none; background-color: white; margin:0; height: 38px; padding-top: 10px': 'list-style-type:none'}}">
                <a style="{{$gapTypeActive == 1 ? 'background:white;color:red;' : ''}}"
                   href="{{route('gap.index.show')}}">
                    GAP
                </a>
            </li>
            <li style="{{$gapTypeActive == 2 ? 'list-style-type: none; background-color: white; margin:0; height: 38px; padding-top: 10px': 'list-style-type:none'}}">
                <a style="{{$gapTypeActive == 2 ? 'background:white;color:red;' : ''}}"
                   href="{{route('gap.market.show')}}">
                    MARKET
                </a>
            </li>
            <li style="{{$gapTypeActive == 3 ? 'list-style-type: none; background-color: white; margin:0; height: 38px; padding-top: 10px': 'list-style-type:none'}}">
                <a style="{{$gapTypeActive == 3 ? 'background:white;color:red;' : '' }}"
                   href="{{route('gap.card.show')}}">
                    CARD
                </a>
            </li>
            <li style="list-style-type: none;">
                <a href="">
                    TURISM
                </a>
            </li>
            <li style="list-style-type: none;">
                <a href="">
                    ACADEMY
                </a>
            </li>
            <li style="list-style-type: none;">
                <a href="" style="">
                    MEDIA
                </a>
            </li>
            <li id="">
                <a href="" style="
                                font-weight: bold;
                                font-size: 1.5rem;
                            ">
                    + 7 707 369 17 77
                </a>
            </li>
            <li id="">
                <div class="dropdown cursor-pointer">
                    <a class="icl_lang_sel_current icl_lang_sel_native">RU <i class="fa fa-angle-down"
                                                                              aria-hidden="true"></i> </a>
                    <div class="dropdown-content">
                        <a href="{{\App\Http\Helpers::setSessionLang('kz',$request)}}">
                            RU
                        </a>
                        <a href="{{\App\Http\Helpers::setSessionLang('ru',$request)}}">
                            KZ
                        </a>
                        <a href="{{\App\Http\Helpers::setSessionLang('en',$request)}}">
                            EN
                        </a>
                    </div>
                </div>
            </li>
        </ul>
    </div>
</header>

@section('js')
@endsection
<style>
    @font-face {
        src: url("/fonts/adineuePROKZ-Bold.ttf");
        font-family: adineuePROKZ-bold;
    }
    .dropbtn {
        color: white;
        padding: 16px;
        border: none;
    }

    .dropdown {
        display: inline-block;
    }

    .dropdown-content {
        display: none;
        position: absolute;
        background-color: #f1f1f1;
        box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
        z-index: 1;
    }

    .dropdown-content a {
        color: black;
        padding: 8px;
        text-decoration: none;
        display: block;
        border-radius: 4px;
        border: 1px solid white;
        align-items: center
    }

    .dropdown-content a:hover {
        background-color: red !important;
        color: white !important;


    }


    .dropdown:hover .dropdown-content {
        display: block;

    / / display: grid;
    / / width: 60 %;
    / / grid-template-columns: repeat(4, 1 fr);
    / / background-color: white;
    }
    .fs-14 {
        font-size: 14px;
    }

    #hidden-nav {
        display: none !important;
        padding: 0;
        text-align: center;
        margin: 0 auto;
        position: fixed;
        height: 100vh;
        background-color: white;
        width: 100vw;
    }

    #mt-header.style3 .mt-top-bar {
        background-color: #FF0000 !important;
    }

    .gap-ul {
        margin-bottom: 0 !important;
    }

    .gap-ul li {
        margin-top: 0.7rem;
        float: left !important;
        display: block;
        padding-top: 0.2rem;
        font-size: 1.4rem;
        font-weight: bolder;
        padding-right: 1rem;
        padding-left: 1rem;
        border-right: 2px solid white;
    }

    .header-items-ul li a {
        background-color: transparent !important;
    }

    .dropdown-content a {
        color: black !important;
    }

    .ml-4 {
        margin-left: 4rem;
    }

    .fs-24 {
        font-size: 24px;
    }

    .cursor-pointer {
        cursor: pointer;
    }

    .font-weight-lighter {
        font-weight: lighter;
    }

    .mt-1 {
        margin-top: 0.8rem;
    }
    .fs-18 {
        font-size: 18px;
    }
    .text-black {
        color: black;
    }
    #nav-icon1{
        top: 6px;
        width: 30px;
        height: 35px;
        position: relative;
        -webkit-transform: rotate(0deg);
        -moz-transform: rotate(0deg);
        -o-transform: rotate(0deg);
        transform: rotate(0deg);
        -webkit-transition: .5s ease-in-out;
        -moz-transition: .5s ease-in-out;
        -o-transition: .5s ease-in-out;
        transition: .5s ease-in-out;
        cursor: pointer;
        display: none;
    }

    #nav-icon1 span {
        display: block;
        position: absolute;
        height: 4px;
        width: 100%;
        background: #ffffff;
        border-radius: 9px;
        opacity: 1;
        left: 0;
        -webkit-transform: rotate(0deg);
        -moz-transform: rotate(0deg);
        -o-transform: rotate(0deg);
        transform: rotate(0deg);
        -webkit-transition: .25s ease-in-out;
        -moz-transition: .25s ease-in-out;
        -o-transition: .25s ease-in-out;
        transition: .25s ease-in-out;
    }

    #nav-icon1 span:nth-child(1) {
        top: 0px;
    }

    #nav-icon1 span:nth-child(2) {
        top: 9px;
    }

    #nav-icon1 span:nth-child(3) {
        top: 18px;
    }

    #nav-icon1.open span:nth-child(1) {
        top: 9px;
        -webkit-transform: rotate(135deg);
        -moz-transform: rotate(135deg);
        -o-transform: rotate(135deg);
        transform: rotate(135deg);
    }

    #nav-icon1.open span:nth-child(2) {
        opacity: 0;
        left: -60px;
    }

    #nav-icon1.open span:nth-child(3) {
        top: 9px;
        -webkit-transform: rotate(-135deg);
        -moz-transform: rotate(-135deg);
        -o-transform: rotate(-135deg);
        transform: rotate(-135deg);
    }


</style>
