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

$logo_image_name = 'market.png';
$controllerName = request()->route()->getAction()['controller'];
$gapTypeActive = 0;
if ($controllerName == 'App\Http\Controllers\Index\GapMarketController@show') {
    $logo_image_name = 'market.png';
    $gapTypeActive = 1;
} elseif ($controllerName == 'App\Http\Controllers\Index\GapCardController@show') {
    $logo_image_name = 'card.png';
    $gapTypeActive = 2;
}
?>
<header id="mt-header" class="style3">
    <div class="mt-top-bar">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-6 hidden-xs">
                    <ul class="gap-ul mt-top-bar" style="float: left;">
                        <li style="list-style-type: none;">
                            <a style="{{$gapTypeActive == 1 ? 'background:white;color:red;' : ''}}"
                               href="{{route('gap.market.show')}}">
                                GAP MARKET
                            </a>
                        </li>
                        <li style="list-style-type: none;">
                            <a style="{{$gapTypeActive == 2 ? 'background:white;color:red;' : '' }}" href="{{route('gap.card.show')}}">
                                GAP CARD
                            </a>
                        </li>
                        <li style="list-style-type: none;">
                            <a href="">
                                GAP TURISM
                            </a>
                        </li>
                        <li style="list-style-type: none;">
                            <a href="">
                                GAP ACADEMY
                            </a>
                        </li>
                        <li style="list-style-type: none;">
                            <a href="">
                                GAP TURISM
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="col-xs-12 col-sm-6 text-right">
                    <ul class="header-items-ul mt-top-list">
                        <li class="hidden-xs">
                            <a href="" style="
                                font-weight: bold;
                                font-size: 1.2rem;
                            ">
                                + 7 707 369 17 77
                            </a>
                        </li>
                        <li class="hidden-xs">
                            <div class="dropdown">
                                <a class="icl_lang_sel_current icl_lang_sel_native">Almaty <i
                                            class="fa fa-arrow-down"></i></a>
                            </div>
                        </li>
                        <li class="hidden-xs">
                            <div class="dropdown">
                                <a class="icl_lang_sel_current icl_lang_sel_native">RU <i
                                            class="fa fa-arrow-down"></i> </a>
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
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="mt-bottom-bar">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="mt-logo"><a href="/"><img src="/new_design/images/logo/gap/{{$logo_image_name}}"
                                                          alt="schon"
                                                          style="height: 30px; width: 140px;"></a>
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
                    <ul class="mt-icon-list">
                        <li class="hidden-lg hidden-md">
                            <a href="#" class="bar-opener mobile-toggle">
                                <span class="bar"></span>
                                <span class="bar small"></span>
                                <span class="bar"></span>
                            </a>
                        </li>
                        <li></li>
                    </ul>
                    <nav id="nav">
                        <ul>
                            <li>
                                <a class="drop-link" href="">О НАС<i class="fa fa-angle-down"
                                                                     aria-hidden="true"></i></a>
                                <div class="s-drop">
                                    <ul>
                                        <li><a href="/about_us/guide">Руководство компании</a></li>
                                        <li><a href="/about_us/administration">Администрация компании</a></li>
                                        <li><a href="/about_us/leaders">Лидеры компании</a></li>
                                        <li><a href="{{route('faq.show')}}">часто задаваемые вопросы</a></li>
                                    </ul>
                                </div>
                            </li>
                            <li>
                                <a class="drop-link" href="blog-right-sidebar.html">Программы<i class="fa fa-angle-down"
                                                                                                aria-hidden="true"></i></a>
                                <div class="s-drop">
                                    <ul>
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
                                        <li><a href="/news">Новости компании</a></li>
                                        <li><a href="/news">Новости команды</a></li>
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
</header>

@section('js')
@endsection
<style>
    .dropbtn {
        color: white;
        padding: 16px;
        border: none;
    }

    .dropdown {
        position: relative;
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
        padding: 12px 16px;
        text-decoration: none;
        display: block;
    }

    .dropdown-content a:hover {
        background-color: #ddd;
    }

    .dropdown:hover .dropdown-content {
        display: block;
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
</style>
