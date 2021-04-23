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
                <div class="col-xs-12 col-sm-6 hidden-xs">
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
                            <a style="{{$gapTypeActive == 3 ? 'background:white;color:red;' : '' }}" href="{{route('gap.card.show')}}">
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
                                TURISM
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="col-xs-12 col-sm-6 text-right">
                    <ul class="header-items-ul mt-top-list">
                        <li class="hidden-xs">
                            <a href="" style="
                                font-weight: bold;
                                font-size: 1.5rem;
                            ">
                                + 7 707 369 17 77
                            </a>
                        </li>
                        <li class="hidden-xs">
                            <div class="dropdown cursor-pointer">
                                <a class="icl_lang_sel_current icl_lang_sel_native">RU <i class="fa fa-angle-down"  aria-hidden="true"></i> </a>
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
                                        <a href="{{ route('check-list.register')}}">Регистрация</a>
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
                                                          style="height: 20px; width: 100px; margin-top: 0.5rem"></a>
                    </div>
                    <div class="dropdown ml-4 fs-24 cursor-pointer">
                        <a class="icl_lang_sel_current icl_lang_sel_native font-weight-lighter">
                            @if(isset($city))
                                {{$city->city_name_ru}}
                            @else
                                Шымкент
                            @endif
                            <i class="fa fa-angle-down"  aria-hidden="true"></i></a>
                        <div style="position:absolute;">
                            <div class="dropdown-content">
                                <?php for($i = 0; $i < count($cities); $i++ ){?>
                                    <a href="{{ route('city.products', $cities[$i]->city_id) }}" class="fs-14" name="city" id="city">
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
      <!--              <ul class="mt-icon-list">
                        <li class="hidden-lg hidden-md">
                            <a href="#" class="bar-opener mobile-toggle">
                                <span class="bar"></span>
                                <span class="bar small"></span>
                                <span class="bar"></span>
                            </a>
                        </li>
                        <li></li>
                    </ul>-->
                    <nav id="nav" style="float:none;">
                        <div class="dropdown cursor-pointer" style="margin-left: 5rem;">
                            <a class="icl_lang_sel_current fs-18 icl_lang_sel_native font-weight-lighter mt-1" style="">Алматы <i class="fa fa-angle-down"  aria-hidden="true"></i></a>
                            <div class="dropdown-content">
                                <div style="display:flex; flex-wrap: wrap; width: 800px; font-size: 12px; text-transform:capitalize">
                                    <?php for($i = 0; $i < count($cities); $i++ ){?>
                                        <a href="" class="fs-14" style="width: 25%" >
                                            {{$cities[$i]->city_name_ru}}
                                        </a>

                                     <?php } ?>
                                </div>

                            </div>
                        </div>
                        <ul class="">

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
        background-color: #fad749 !important;
        color: white !important;

    }

    .dropdown:hover .dropdown-content {
        display:block;

//         display: grid;
//         width: 60%;
//         grid-template-columns: repeat(4, 1fr);
//         background-color: white;
    }
    .fs-14 {
        font-size: 14px;
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
</style>
