<?php

use Illuminate\Support\Facades\Session;

?>
@extends('design_index.layout.layout')

@section('meta-tags')

    <title>Qpartners</title>
    <meta name="description"
          content="«Qpartners» - это уникальный медиа проект с широким набором возожностей для взаймодествия с участниками виртуального рынка"/>
    <meta name="keywords" content="Qpartners"/>
    <script src="https://apps.elfsight.com/p/platform.js" defer></script>

@endsection


@section('content')

    <main id="mt-main">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="banner-frame toppadding-zero">
                        <div class="banner-5 white wow fadeInLeft" data-wow-delay="0.4s">
                            <div style="max-width: 100%; height: 590px; background-image: url('/new_design/images/banners/banner1.svg'); background-size: cover; background-position: center;"></div>
                            <div class="holder">
                                <div class="texts" style=" font-family: adineue PRO KZ Bold;color:white;">
                                    <span class="mb-0" style="font-size:44px;font-weight:bold;">СВОЙ ДОМ</span>
                                    <p style="font-size:44px;font-weight:bold;">БЕЗ ИПОТЕКИ</p>
                                    <span style="font-size: 19px;font-family:'Montserrat';" class="p-0">Рассрочка до 120 месяцев на </hr style="list-style:none;"> жилье</span>
                                </div>
                                <div class="holder-inner">
                                    <a href="/programs/1" class="btn-shop">
                                        <span style="color: #fff !important;">ПОДРОБНЕЕ</span>
                                        <i class="fa fa-angle-right" style="background: #ffd700; color: #000;"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="banner-6 white wow fadeInRight" data-wow-delay="0.4s">
                            <div style="max-width: 100%; height: 590px; background-image: url('/new_design/images/banners/banner2.svg'); background-size: cover; background-position: center;background-repeat: no-repeat;"></div>
                            <div class="holder">
                                <div class="texts" style="font-family: adineue PRO KZ Bold;color:white;">
                                    <span style="font-size:28px;font-weight:bold;">АВТОМОБИЛЬ</span>
                                    <p style="font-size:28px;font-weight:bold;">В РАССРОЧКУ</p>
                                    <span style="font-size: 14px;font-family:'Montserrat';"  class="p-0">Получи авто через месяц</span>
                                </div>
                                <div class="holder-inner">
                                    <a href="/programs/2" class="btn-shop">
                                        <span style="color: #fff !important;">ЗАБРАТЬ</span>
                                        <i class="fa fa-angle-right" style="background: #fff; color: #000;"></i>
                                    </a>
                                </div>
                            </div>
                        </div><!-- banner 5 white end here -->
                        <!-- banner box two start here -->
                        <div class="banner-box two">
                            <!-- banner 7 right start here -->
                            <div class="banner-7 left wow fadeInUp" data-wow-delay="0.4s">
                                <div style="background-image: url('/new_design/images/banners/banner3.svg'); background-position: center; background-size: cover; height: 285px; max-width: 100%; "></div>
                                <div class="holder">
                                    <div class="texts" style="color:white;">
                                        <p style="font-size:28px;font-weight:bold;">ЖИЛЬЕ ДЛЯ</p>
                                        <p style="font-size:28px;font-weight:bold;">МОЛОДЕЖИ</p>
                                        <span style="font-size: 14px;font-family:'Montserrat';color:white;float:left;" class="p-0">от 18 до 29 лет</span>
                                    </div>
                                    <div class="holder-inner">
{{--                                        <a href="product-detail.html" class="btn-shop">--}}
                                        <a href="/programs/5" class="btn-shop">
                                            <span style="color: white;">ПОДРОБНЕЕ</span>
                                            <i class="fa fa-angle-right" style="background: #fff; color: #000;"></i>
                                        </a>
                                    </div>
                                </div>
                            </div><!-- banner 7 right end here -->
                            <!-- banner 8 start here -->
                            <div class="banner-8 wow fadeInDown" data-wow-delay="0.4s">
                                <div style="background-image: url('/new_design/images/banners/banner4.svg'); background-position: center; background-size: cover; height: 285px; max-width: 100%; "></div>
                                <div class="holder">
                                    <div class="texts" style="font-family: adineue PRO KZ Bold;color:white;">
                                        <span style="font-size:28px;font-weight:bold;">ДОМ ДЛЯ</span>
                                        <p style="font-size:28px;font-weight:bold;">ВСЕЙ СЕМЬИ</p>
                                        <span style="font-size: 14px;width:150px;font-family:'Montserrat';color:white;position:absolute;" class="p-0">Жилье для </hr> молодых семей</span>
                                    </div>
                                    <div class="holder-inner">
{{--                                        <a href="product-detail.html" class="btn-shop">--}}
                                        <a href="/programs/6" class="btn-shop">
                                            <span style="color: white !important;font-weight:300;">Подробнее</span>
                                            <i class="fa fa-angle-right" style="background: #fff; color: black;"></i>
                                        </a>
                                    </div>
                                </div>
                            </div><!-- banner 8 start here -->
                        </div>
                    </div>
                    <div class="banner-frame mt-paddingsmzero">
                        <!-- banner box third start here -->
                        <div class="banner-box third">
                            <!-- banner 12 right white start here -->
                            <div class="banner-12 white wow fadeInUp" data-wow-delay="0.4s">
                                <img src="/new_design/images/banners/banner5.svg"
                                     alt="image description"
                                     style="height: 277px;  width: 420px;">
                                <div class="holder">
                                    <div class="texts" style="font-family: adineue PRO KZ Bold;color:white;">
                                        <span style="font-size:28px;font-weight:bold;">ГАРАНТИЯ</span>
                                        <span style="font-size: 14px;width:200px;font-family:'Montserrat';color:#fff;float:left;" class="p-0">Ваши вклады и права </hr> защищены законом РК</span>
                                    </div>
                                    <div class="holder-inner">
                                        <a href="/shop" class="btn-shop" style="background: none">
                                            <span style="color: white !important;font-weight:300;">Подробнее</span>
                                            <i class="fa fa-angle-right" style="background: #fff; color: black;"></i>
                                        </a>
                                    </div>
                                </div>
                            </div><!-- banner 12 right white end here -->
                            <!-- banner 13 right start here -->
                            <div class="banner-13 right wow fadeInDown" data-wow-delay="0.4s">
                                <img src="/new_design/images/banners/banner6.svg"
                                     alt="image description"
                                     style="height: 277px;  width: 420px;">
                                <div class="holder">
                                    <div class="texts" style="font-family: adineue PRO KZ Bold;color:white; text-align: left">
                                        <span style="font-size:28px;font-weight:bold;">ВОПРОСЫ И ОТВЕТЫ</span>
                                        <span style="font-size: 14px;width:200px;font-family:'Montserrat';color:white;" class="p-0">Ответы на часто задаваемые вопросы</span>
                                    </div>
                                    <div class="holder-inner">
                                        <a href="/faq" class="btn-shop" style="background: none">
                                            <span style="color: white !important;font-weight:300;">Подробнее</span>
                                            <i class="fa fa-angle-right" style="background: #fff; color: black;"></i>
                                        </a>
                                    </div>
                                </div>
                            </div><!-- banner 13 right end here -->
                        </div><!-- banner box third end here -->
                        <!-- slider 7 start here -->
                        <div class="slider-7 wow fadeInRight" data-wow-delay="0.4s">
                            <!-- slider start here -->
                            <div class="slider banner-slider">
                                <!-- holder start here -->
                                <div class="s-holder">
                                    <img src="/new_design/images/main_page_images/qpartners 1.jpg"
                                         alt="image description">
                                    {{-- <div class="s-box">
                                        <strong class="s-title text-uppercase">Супер акция 5+2</strong>
                                        <span class="heading"
                                              style="font-weight: bold;font-size: 40px;">Super Elixir for Man</span>
                                        <div class="s-txt">
                                            <p class="s-text-p">улучшает мужское здоровье. <br>
                                                Является эффективным иммуностимулятором, <br>
                                                активный гемостимулятор.
                                            </p>
                                            <div class="s-text-p-2">
                                                1. Super Elixir For Man <br>
                                                2. Super Elixir Nephro <br>
                                                3. Super Elixir For Bronchi <br>
                                                4. Super Cream Spasm <br>
                                                5. Super Detox Universal <br>
                                            </div>
                                            <div class="s-text-p-3-div">
                                                <h4 class="s-text-p-3-title text-uppercase">
                                                    В ПОДАРОК
                                                </h4>
                                                <div class="s-text-p-3">
                                                    1. Super Elixir Anti-Stress <br>
                                                    2. Super Elixir Immuno
                                                </div>
                                            </div>

                                        </div>
                                        <a class="s-text-p-3-button">
                                            ПОДРОБНЕЕ
                                        </a>
                                    </div> --}}
                                </div><!-- holder end here -->
                                <!-- holder start here -->
                                <div class="s-holder s-holder-2">
                                    <img src="/new_design/images/main_page_images/qpartners 2.jpg"
                                         alt="image description">
                                    {{-- <div class="s-box">
                                        <strong class="s-title text-uppercase">Супер акция 5+2</strong>
                                        <span class="heading"
                                              style="font-weight: bold;font-size: 40px;color: #ac2709;">Super Elixir Hepato</span>
                                        <div class="s-txt" style="color: white;">
                                            <p class="s-text-p">обладает противовирусным, желчегонным <br>
                                                и рассасывающим действием. <br>
                                                Восстанавливает работу печени.
                                            </p>
                                            <div class="s-text-p-2">
                                                1. Super Elixir Hepato <br>
                                                2. Super Elixir Gastro <br>
                                                3. Super Elixir Bronchi <br>
                                                4. Super Cream Spasm <br>
                                                5. Super Detox Universal <br>
                                            </div>
                                            <div class="s-text-p-3-div">
                                                <h4 class="s-text-p-3-title text-uppercase">
                                                    В ПОДАРОК
                                                </h4>
                                                <div class="s-text-p-3">
                                                    1. Super Elixir Anti-Stress <br>
                                                    2. Super Elixir Immuno
                                                </div>
                                            </div>

                                        </div>
                                        <a class="s-text-p-3-button s-holder-2-button">
                                            ПОДРОБНЕЕ
                                        </a>
                                    </div> --}}
                                </div>
                                <div class="s-holder s-holder-3">
                                    <img src="/new_design/images/main_page_images/qpartners 3.jpg"
                                         alt="image description">
                                    {{-- <div class="s-box">
                                        <strong style="color: white;" class="s-title text-uppercase">Супер акция
                                            5+2</strong>
                                        <span class="heading"
                                              style="font-weight: bold;font-size: 40px;color: black;">Super Elixir For Woman</span>
                                        <div class="s-txt" style="color: black;float: none;">
                                            <p class="s-text-p"
                                               style="float: left; background-color: rgba(255,255,255,0.5); padding: 5px;">
                                                поддерживает и восстанавливает<br>
                                                женское здоровье. Обладает <br>
                                                общеукрепляющим <br>
                                                действием.
                                            </p>
                                            <div style="float: right;margin-right: 30px;">
                                                <div class="s-text-p-2">
                                                    1. Super Elixir for Woman <br>
                                                    2. Super Elixir Gastro <br>
                                                    3. Super Elixir Bronchi <br>
                                                    4. Super Cream Spasm <br>
                                                    5. Super Detox Universal <br>
                                                </div>
                                                <div class="s-text-p-3-div">
                                                    <h4 class="s-text-p-3-title text-uppercase">
                                                        В ПОДАРОК
                                                    </h4>
                                                    <div class="s-text-p-3">
                                                        1. Super Elixir Anti-Stress <br>
                                                        2. Super Elixir Immuno
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                        <a class="s-text-p-3-button s-holder-2-button" style="    margin-top: 360px;margin-right: -230px;">
                                            ПОДРОБНЕЕ
                                        </a>
                                    </div> --}}
                                </div>
                                <div class="s-holder s-holder-4">
                                    <img src="/new_design/images/main_page_images/qpartners 4.jpg"
                                         alt="image description">
                                    {{-- <div class="s-box">
                                        <strong style="color: white; background-color: #77a100;" class="s-title text-uppercase">Супер акция
                                            5+2</strong>
                                        <span class="heading"
                                              style="font-weight: bold;font-size: 40px;color: #77a100;">Super Elixir For Woman</span>
                                        <div class="s-txt" style="color: black;float: none;">
                                            <p class="s-text-p"
                                               style="background-color:rgba(255,255,255,0.5);float: left; padding: 5px;">
                                                очищает организм от паразитов, <br>
                                                улучшает работу желудочно-кишечного <br>
                                                тракта.
                                            </p>
                                            <div style="float: right;margin-right: 30px;">
                                                <div class="s-text-p-2">
                                                    1. Super Elixir Clean <br>
                                                    2. Super Elixir For Man <br>
                                                    3. Super Elixir For Woman <br>
                                                    4. Super Cream Spasm <br>
                                                    5. Super Detox Universal <br>
                                                </div>
                                                <div class="s-text-p-3-div">
                                                    <h4 class="s-text-p-3-title text-uppercase">
                                                        В ПОДАРОК
                                                    </h4>
                                                    <div class="s-text-p-3">
                                                        1. Super Elixir Anti-Stress <br>
                                                        2. Super Elixir Immuno
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                        <a class="s-text-p-3-button s-holder-2-button" style="    margin-top: 360px;
    margin-right: -230px;background-color: #77a100 !important;">
                                            ПОДРОБНЕЕ
                                        </a>
                                    </div> --}}
                                </div>
                            </div>
                        </div><!-- slider 7 end here -->
                    </div>

                    <div class="banner-frame nospace wow fadeInUp" data-wow-delay="0.6s">
                        <!-- banner 9 start here -->
                        <div class="banner-9">
                            <img src="/new_design/images/banners/banner8.svg" alt="image description">
                            <div class="holder">
                                <div class="texts" style="color:#fff; adineue PRO KZ Bold;">
                                    <p style="font-size:28px;font-weight:bold;">ПРЕИМУЩЕСТВО №1 </p>
                                    <span style="font-size: 1.5rem;font-family:'Montserrat';color:#fff;float:left;" class="p-0">Вступительный взнос от 60 000 тенге</span>
                                </div>
                                <div class="holder-inner">
{{--                                    <a href="product-detail.html" class="btn-shop">--}}
                                    <a href="/faq" class="btn-shop">
                                        <span style="color: #fff!important;text-transform:lowercase;font-size: 1.5rem">подробнее</span>
                                        <i class="fa fa-angle-right" style="background: #fff; color: #000;"></i>
                                    </a>
                                </div>
                            </div>
                        </div><!-- banner 9 end here -->
                        <!-- banner 10 start here -->
                        <div class="banner-10">
                            <img src="/new_design/images/banners/banner9.svg" alt="image description">
                            <div class="holder">
                                <div class="texts" style="color:white;">
                                    <p style="font-size:28px;font-weight:bold;">ПРЕИМУЩЕСТВО №2</p>
                                    <span style="font-size: 1.5rem;font-family:'Montserrat';color:white;" class="p-0">Паевый взнос 10 000 тенге</span>
                                </div>
                                <div class="holder-inner">
{{--                                    <a href="product-detail.html" class="btn-shop">--}}
                                    <a href="/faq" class="btn-shop">
                                        <span style="color: white !important;text-transform:lowercase;font-size: 1.5rem">подробнее</span>
                                        <i class="fa fa-angle-right" style="background: #fff; color: #000;"></i>
                                    </a>
                                </div>
                            </div>
                        </div><!-- banner 10 end here -->
                        <!-- banner 11 start here -->
                        <div class="banner-11">
                            <img src="/new_design/images/banners/banner10.svg" alt="image description">
                            <div class="holder">
                                <div class="texts" style="color:white;">
                                    <p style="font-size:28px;font-weight:bold;">ПРЕИМУЩЕСТВО №3</p>
                                    <span style="font-size: 1.5rem;font-family:'Montserrat';color:white;float:left;" class="p-0">Cрок получения рассрочки от 1 месяца</span>
                                </div>
                                <div class="holder-inner" style="float:left;">
{{--                                    <a href="product-detail.html" class="btn-shop">--}}
                                    <a href="/faq" class="btn-shop">
                                        <span style="color: white;text-transform:lowercase;font-size: 1.5rem">подробнее</span>
                                        <i class="fa fa-angle-right" style="background: #fff; color: #000;"></i>
                                    </a>
                                </div>
                            </div>
                        </div><!-- banner 11 end here -->
                    </div><!-- banner frame end here -->

{{--                    <div class="mt-producttabs style2 wow fadeInUp" data-wow-delay="0.4s">--}}
{{--                        <!-- producttabs start here -->--}}
{{--                        <ul class="producttabs">--}}
{{--                            <li><a href="#tab1" class="active">Элексиры</a></li>--}}
{{--                            <li><a href="#tab2">Спреи</a></li>--}}
{{--                            <li><a href="#tab3">Гели</a></li>--}}
{{--                            <li><a href="#tab4">Крема</a></li>--}}
{{--                        </ul>--}}
{{--                        <!-- producttabs end here -->--}}
{{--                        <div class="tab-content">--}}
{{--                            <div id="tab1">--}}
{{--                                <div class="tabs-sliderlg">--}}
{{--                                    @foreach($elixirs as $product)--}}
{{--                                        <div class="slide">--}}
{{--                                            <div class="mt-product1 large">--}}
{{--                                                <div class="box">--}}
{{--                                                    <div class="b1">--}}
{{--                                                        <div class="b2">--}}
{{--                                                            <a href="{{ route('product.detail',$product->product_id, ['id' => $product->product_id]) }}">--}}
{{--                                                                <div class="product_image"--}}
{{--                                                                     style="background-image: url('{{$product->product_image}}');">--}}
{{--                                                                </div>--}}
{{--                                                            </a>--}}
{{--                                                            <ul class="mt-stars">--}}
{{--                                                                @for($i = 0; $i<5;$i++)--}}
{{--                                                                    @if($i < \App\Models\Review::ratingCalculator($product->product_id, \App\Models\Review::PRODUCT_REVIEW))--}}
{{--                                                                        <li><i class="fa fa-star"></i></li>--}}
{{--                                                                    @else--}}
{{--                                                                        <li><i class="fa fa-star-o"></i></li>--}}
{{--                                                                    @endif--}}
{{--                                                                @endfor--}}

{{--                                                            </ul>--}}
{{--                                                            <ul class="links">--}}
{{--                                                                <li>--}}
{{--                                                                    <a style="cursor: pointer;"--}}
{{--                                                                       data-item-id="{{$product->product_id}}"--}}
{{--                                                                       data-user-id="{{Auth::user() ? Auth::user()->user_id : NULL}}"--}}
{{--                                                                       data-method="add"--}}
{{--                                                                       data-route="{{route('basket.isAjax')}}"--}}
{{--                                                                       onclick="addItemToBasket(this)"--}}
{{--                                                                    ><i class="icon-handbag"></i><span>Добавить в корзину</span></a>--}}
{{--                                                                </li>--}}
{{--                                                                <li><a style="cursor: pointer;"--}}
{{--                                                                       data-item-id="{{$product->product_id}}"--}}
{{--                                                                       data-method="add"--}}
{{--                                                                       data-user-id="{{Auth::user() ? Auth::user()->user_id : NULL}}"--}}
{{--                                                                       data-session-id="{{ Session::getId()}}"--}}
{{--                                                                       data-route="{{route('favorite.isAjax')}}"--}}
{{--                                                                       onclick="addItemToFavorites(this)"--}}
{{--                                                                    ><i--}}
{{--                                                                                class="icomoon icon-heart-empty"></i></a>--}}
{{--                                                                </li>--}}
{{--                                                                <li><a href="#"><i--}}
{{--                                                                                class="icomoon icon-exchange"></i></a>--}}
{{--                                                                </li>--}}
{{--                                                            </ul>--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                                <div class="txt">--}}
{{--                                                    <strong class="title"><a--}}
{{--                                                                href="{{ route('product.detail',$product->product_id, ['id' => $product->product_id]) }}">{{$product->product_name_ru}}</a></strong>--}}
{{--                                                    <p>{{$product->product_desc_ru}}</p>--}}
{{--                                                    <span class="price"><i--}}
{{--                                                                class="fa fa-dollar"></i> <span>{{$product->product_price}}--}}
{{--                                                               ({{$product->product_price * (\App\Models\Currency::where(['currency_id' => 1 ])->first())->money}}   &#8376;) </span></span>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    @endforeach--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div id="tab2">--}}
{{--                                <div class="tabs-sliderlg">--}}
{{--                                    @foreach($sprays as $product)--}}
{{--                                        <div class="slide">--}}
{{--                                            <div class="mt-product1 large">--}}
{{--                                                <div class="box">--}}
{{--                                                    <div class="b1">--}}
{{--                                                        <div class="b2">--}}
{{--                                                            <a href="{{ route('product.detail',$product->product_id, ['id' => $product->product_id]) }}">--}}
{{--                                                                <div class="product_image"--}}
{{--                                                                     style="background-image: url('{{$product->product_image}}');">--}}

{{--                                                                </div>--}}
{{--                                                            </a>--}}
{{--                                                            <ul class="mt-stars">--}}
{{--                                                                <li><i class="fa fa-star"></i></li>--}}
{{--                                                                <li><i class="fa fa-star"></i></li>--}}
{{--                                                                <li><i class="fa fa-star"></i></li>--}}
{{--                                                                <li><i class="fa fa-star-o"></i></li>--}}
{{--                                                            </ul>--}}
{{--                                                            <ul class="links">--}}
{{--                                                                <li>--}}
{{--                                                                    <a style="cursor: pointer;"--}}
{{--                                                                       data-item-id="{{$product->product_id}}"--}}
{{--                                                                       data-user-id="{{Auth::user() ? Auth::user()->user_id : NULL}}"--}}
{{--                                                                       data-method="add"--}}
{{--                                                                       data-route="{{route('basket.isAjax')}}"--}}
{{--                                                                       onclick="addItemToBasket(this)"--}}
{{--                                                                    ><i class="icon-handbag"></i><span>Добавить в карзину</span></a>--}}
{{--                                                                </li>--}}
{{--                                                                <li><a style="cursor: pointer;"--}}
{{--                                                                       data-item-id="{{$product->product_id}}"--}}
{{--                                                                       data-method="add"--}}
{{--                                                                       data-user-id="{{Auth::user() ? Auth::user()->user_id : NULL}}"--}}
{{--                                                                       data-session-id="{{ Session::getId()}}"--}}
{{--                                                                       data-route="{{route('favorite.isAjax')}}"--}}
{{--                                                                       onclick="addItemToFavorites(this)"--}}
{{--                                                                    ><i--}}
{{--                                                                                class="icomoon icon-heart-empty"></i></a>--}}
{{--                                                                </li>--}}
{{--                                                                <li><a href="#"><i--}}
{{--                                                                                class="icomoon icon-exchange"></i></a>--}}
{{--                                                                </li>--}}
{{--                                                            </ul>--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                                <div class="txt">--}}
{{--                                                    <strong class="title"><a--}}
{{--                                                                href="{{ route('product.detail',$product->product_id, ['id' => $product->product_id]) }}">{{$product->product_name_ru}}</a></strong>--}}
{{--                                                    <p>{{$product->product_desc_ru}}</p>--}}
{{--                                                    <span class="price"><i--}}
{{--                                                                class="fa fa-dollar"></i> <span>{{$product->product_price}}--}}
{{--                                                               ({{$product->product_price * (\App\Models\Currency::where(['currency_id' => 1 ])->first())->money}}   &#8376;) </span></span>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    @endforeach--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div id="tab3">--}}
{{--                                <div class="tabs-sliderlg">--}}
{{--                                    @foreach($gels as $product)--}}
{{--                                        <div class="slide">--}}
{{--                                            <div class="mt-product1 large">--}}
{{--                                                <div class="box">--}}
{{--                                                    <div class="b1">--}}
{{--                                                        <div class="b2">--}}
{{--                                                            <a href="{{ route('product.detail',$product->product_id, ['id' => $product->product_id]) }}">--}}
{{--                                                                <div class="product_image"--}}
{{--                                                                     style="background-image: url('{{$product->product_image}}');">--}}
{{--                                                                </div>--}}
{{--                                                            </a>--}}
{{--                                                            <ul class="mt-stars">--}}
{{--                                                                <li><i class="fa fa-star"></i></li>--}}
{{--                                                                <li><i class="fa fa-star"></i></li>--}}
{{--                                                                <li><i class="fa fa-star"></i></li>--}}
{{--                                                                <li><i class="fa fa-star-o"></i></li>--}}
{{--                                                            </ul>--}}
{{--                                                            <ul class="links">--}}
{{--                                                                <li>--}}
{{--                                                                    <a style="cursor: pointer;"--}}
{{--                                                                       data-item-id="{{$product->product_id}}"--}}
{{--                                                                       data-user-id="{{Auth::user() ? Auth::user()->user_id : NULL}}"--}}
{{--                                                                       data-method="add"--}}
{{--                                                                       data-route="{{route('basket.isAjax')}}"--}}
{{--                                                                       onclick="addItemToBasket(this)"--}}
{{--                                                                    ><i class="icon-handbag"></i><span>Добавить в карзину</span></a>--}}
{{--                                                                </li>--}}
{{--                                                                <li><a style="cursor: pointer;"--}}
{{--                                                                       data-item-id="{{$product->product_id}}"--}}
{{--                                                                       data-method="add"--}}
{{--                                                                       data-user-id="{{Auth::user() ? Auth::user()->user_id : NULL}}"--}}
{{--                                                                       data-session-id="{{ Session::getId()}}"--}}
{{--                                                                       data-route="{{route('favorite.isAjax')}}"--}}
{{--                                                                       onclick="addItemToFavorites(this)"><i--}}
{{--                                                                                class="icomoon icon-heart-empty"></i></a>--}}
{{--                                                                </li>--}}
{{--                                                                <li><a href="#"><i--}}
{{--                                                                                class="icomoon icon-exchange"></i></a>--}}
{{--                                                                </li>--}}
{{--                                                            </ul>--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                                <div class="txt">--}}
{{--                                                    <strong class="title"><a--}}
{{--                                                                href="{{ route('product.detail',$product->product_id, ['id' => $product->product_id]) }}">{{$product->product_name_ru}}</a></strong>--}}
{{--                                                    <p>{{$product->product_desc_ru}}</p>--}}
{{--                                                    <span class="price"><i--}}
{{--                                                                class="fa fa-dollar"></i> <span>{{$product->product_price}}--}}
{{--                                                               ({{$product->product_price * (\App\Models\Currency::where(['currency_id' => 1 ])->first())->money}}   &#8376;) </span></span>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    @endforeach--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div id="tab4">--}}
{{--                                <div class="tabs-sliderlg">--}}
{{--                                    @foreach($creams as $product)--}}
{{--                                        <div class="slide">--}}
{{--                                            <div class="mt-product1 large">--}}
{{--                                                <div class="box">--}}
{{--                                                    <div class="b1">--}}
{{--                                                        <div class="b2">--}}
{{--                                                            <a href="{{ route('product.detail',$product->product_id, ['id' => $product->product_id]) }}">--}}
{{--                                                                <div class="product_image"--}}
{{--                                                                     style="background-image: url('{{$product->product_image}}');">--}}
{{--                                                                </div>--}}
{{--                                                            </a>--}}
{{--                                                            <ul class="mt-stars">--}}
{{--                                                                <li><i class="fa fa-star"></i></li>--}}
{{--                                                                <li><i class="fa fa-star"></i></li>--}}
{{--                                                                <li><i class="fa fa-star"></i></li>--}}
{{--                                                                <li><i class="fa fa-star-o"></i></li>--}}
{{--                                                            </ul>--}}
{{--                                                            <ul class="links">--}}
{{--                                                                <li>--}}
{{--                                                                    <a style="cursor: pointer;"--}}
{{--                                                                       data-item-id="{{$product->product_id}}"--}}
{{--                                                                       data-user-id="{{Auth::user() ? Auth::user()->user_id : NULL}}"--}}
{{--                                                                       data-method="add"--}}
{{--                                                                       data-route="{{route('basket.isAjax')}}"--}}
{{--                                                                       onclick="addItemToBasket(this)"--}}
{{--                                                                    ><i class="icon-handbag"></i><span>Добавить в карзину</span></a>--}}
{{--                                                                </li>--}}
{{--                                                                <li><a style="cursor: pointer;"--}}
{{--                                                                       data-item-id="{{$product->product_id}}"--}}
{{--                                                                       data-method="add"--}}
{{--                                                                       data-user-id="{{Auth::user() ? Auth::user()->user_id : NULL}}"--}}
{{--                                                                       data-session-id="{{ Session::getId()}}"--}}
{{--                                                                       data-route="{{route('favorite.isAjax')}}"--}}
{{--                                                                       onclick="addItemToFavorites(this)"><i--}}
{{--                                                                                class="icomoon icon-heart-empty"></i></a>--}}
{{--                                                                </li>--}}
{{--                                                                <li><a href="#"><i--}}
{{--                                                                                class="icomoon icon-exchange"></i></a>--}}
{{--                                                                </li>--}}
{{--                                                            </ul>--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                                <div class="txt">--}}
{{--                                                    <strong class="title"><a--}}
{{--                                                                href="{{ route('product.detail',$product->product_id, ['id' => $product->product_id]) }}">{{$product->product_name_ru}}</a></strong>--}}
{{--                                                    <p>{{$product->product_desc_ru}}</p>--}}
{{--                                                    <span class="price"><i--}}
{{--                                                                class="fa fa-dollar"></i> <span>{{$product->product_price}}--}}
{{--                                                               ({{$product->product_price * (\App\Models\Currency::where(['currency_id' => 1 ])->first())->money}}   &#8376;) </span></span>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    @endforeach--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="mt-producttabs style3 wow fadeInUp" data-wow-delay="0.4s">--}}
{{--                        <h2 class="heading">Популярные</h2>--}}
{{--                        <div class="tabs-slider">--}}
{{--                            @foreach($popularProducts as $product)--}}
{{--                                <div class="slide">--}}
{{--                                    <div class="mt-product1">--}}
{{--                                        <div class="box">--}}
{{--                                            <div class="b1">--}}
{{--                                                <div class="b2">--}}
{{--                                                    <div class="product_new_image" style="background-image: url('{{$product->product_image}}')">--}}
{{--                                                    </div>--}}
{{--                                                    <span class="caption">--}}
{{--                                                        @if($product->is_new)--}}
{{--                                                            <span class="new">new</span>--}}
{{--                                                        @endif--}}
{{--														</span>--}}
{{--                                                    <ul class="mt-stars">--}}
{{--                                                        @for($i = 0; $i<5;$i++)--}}
{{--                                                            @if($i < \App\Models\Review::ratingCalculator($product->product_id, \App\Models\Review::PRODUCT_REVIEW))--}}
{{--                                                                <li><i class="fa fa-star"></i></li>--}}
{{--                                                            @else--}}
{{--                                                                <li><i class="fa fa-star-o"></i></li>--}}
{{--                                                            @endif--}}
{{--                                                        @endfor--}}
{{--                                                    </ul>--}}
{{--                                                    <ul class="links">--}}
{{--                                                        <li>--}}
{{--                                                            <a style="cursor: pointer;"--}}
{{--                                                               data-item-id="{{$product->product_id}}"--}}
{{--                                                               data-method="add"--}}
{{--                                                               data-user-id="{{Auth::user() ? Auth::user()->user_id : NULL}}"--}}
{{--                                                               data-route="{{route('basket.isAjax')}}"--}}
{{--                                                               onclick="addItemToBasket(this)"--}}
{{--                                                            >--}}
{{--                                                                <i class="icon-handbag"></i><span>Добавить</span></a>--}}
{{--                                                        </li>--}}
{{--                                                        <li><a style="cursor: pointer;"--}}
{{--                                                               data-item-id="{{$product->product_id}}"--}}
{{--                                                               data-method="add"--}}
{{--                                                               data-user-id="{{Auth::user() ? Auth::user()->user_id : NULL}}"--}}
{{--                                                               data-session-id="{{ Session::getId()}}"--}}
{{--                                                               data-route="{{route('favorite.isAjax')}}"--}}
{{--                                                               onclick="addItemToFavorites(this)"--}}
{{--                                                            >--}}
{{--                                                                <i class="fa fa-heart"></i></a>--}}
{{--                                                        </li>--}}
{{--                                                        <li><a href="#"><i class="icomoon icon-exchange"></i></a>--}}
{{--                                                        </li>--}}
{{--                                                    </ul>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                        <div class="txt">--}}
{{--                                            <strong class="title"><a--}}
{{--                                                        href="{{ route('product.detail',$product->product_id, ['id' => $product->product_id]) }}">{{$product->product_name}}</a></strong>--}}
{{--                                            <span class="price"><i--}}
{{--                                                        class="fa fa-dollar"></i> <span>{{$product->product_price}}</span> 	({{$product->product_price * (\App\Models\Currency::where(['currency_id' => 1])->first())->money}} &#8376;)</span>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            @endforeach--}}
{{--                        </div>--}}
{{--                    </div>--}}

                    <div id="" style="margin-top: 50px">
                        <h3 class="" style="color: black;font-family: Montserrat; font-weight: 600; text-transform: uppercase">Отзывы</h3>
                        <div class=" " style="padding-top: 30px">
                            <div class="container" id="youtube-reviews" style="display: flex; flex-wrap: wrap; justify-content: space-between;">
                                <iframe width="270" height="330" src="https://www.youtube.com/embed/T_mnUMLTLiA" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                <iframe width="270" height="330" src="https://www.youtube.com/embed/5h-3wXYzS8M" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                <iframe width="270" height="330" src="https://www.youtube.com/embed/nd5kU_oQp1g" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                <iframe width="270" height="330" src="https://www.youtube.com/embed/hDk8i4oZW_I" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                            </div>
                        </div>
                    </div>

                    <div class="mt-patners wow fadeInUp" data-wow-delay="0.4s" style="margin-top: 50px">
                        <h3 class="heading" style="color: black">Наши бренды</h3>
                        <div class="container" id="my-brands" style="display: flex; flex-wrap: wrap; justify-content: center;font-weight: 600;  width: 100%; font-family: adineuePROKZ-bold; font-size: 18px; margin-top: 50px">
                            <a href="/gap/market/show" style="width: 15%;color: red; display: flex; margin-bottom: 10px; background-color: #f3f1f1; ">GAP<span style="color: #646464; margin-left: 6px"> MARKET</span></a>
                            <a href="/" style="width: 15%; color: red;display: flex; margin-bottom: 10px; background-color: #f3f1f1; ">GAP <span style="color: #646464; margin-left: 6px"> TURISM</span></a>
                            <a href="/gap/card/show" style="text-align: center; width: 15%; color: red; display: flex; margin-bottom: 10px; background-color: #f3f1f1;">GAP<span style="color: #646464;  margin-left: 6px"> CARD</span></a>
                            <a href="/" style="width: 15%; color: red; display: flex; margin-bottom: 10px; background-color: #f3f1f1;">GAP <span style="color: #646464;  margin-left: 6px"> ACADEMY</span></a>
                            <a href="/" style="width: 15%; color: red; display: flex; margin-bottom: 10px; background-color: #f3f1f1;">GAP <span style="color: #646464;  margin-left: 6px"> MEDIA</span></a>
                            <a href="/" style="width: 15%; background-color: #f3f1f1;text-align: center; padding: 8px 0; margin-bottom: 10px;"><img src="/new_design/images/banners/natural.svg" style=" width: 60%; height: 100%" alt="image not found"/></a>
                        </div>
                    </div>
                    <div id="insta-posts" style="margin: 50px 0">
                        <h3 class="" style="color: black;font-family: Montserrat; font-weight: 600; text-transform: uppercase">МЫ В INSTAGRAM</h3>
                        <div class="container"  style="display: flex; justify-content: space-between; flex-wrap: wrap; margin-top: 50px">
                            <blockquote class="instagram-media insta-post" data-instgrm-captioned data-instgrm-permalink="https://www.instagram.com/p/CPP6mB9HDQ_/?utm_source=ig_embed&amp;utm_campaign=loading" data-instgrm-version="13" style=" background:#FFF; border:0; border-radius:3px; box-shadow:0 0 1px 0 rgba(0,0,0,0.5),0 1px 10px 0 rgba(0,0,0,0.15); margin: 1px; !important; padding:0; width:99.375%; width:-webkit-calc(100% - 2px); width:calc(100% - 2px);"><div style="padding:16px;"> <a href="https://www.instagram.com/p/CPP6mB9HDQ_/?utm_source=ig_embed&amp;utm_campaign=loading" style=" background:#FFFFFF; line-height:0; padding:0 0; text-align:center; text-decoration:none; width:100%;" target="_blank"> <div style=" display: flex; flex-direction: row; align-items: center;"> <div style="background-color: #F4F4F4; border-radius: 50%; flex-grow: 0; height: 40px; margin-right: 14px; width: 40px;"></div> <div style="display: flex; flex-direction: column; flex-grow: 1; justify-content: center;"> <div style=" background-color: #F4F4F4; border-radius: 4px; flex-grow: 0; height: 14px; margin-bottom: 6px; width: 100px;"></div> <div style=" background-color: #F4F4F4; border-radius: 4px; flex-grow: 0; height: 14px; width: 60px;"></div></div></div><div style="padding: 19% 0;"></div> <div style="display:block; height:50px; margin:0 auto 12px; width:50px;"><svg width="50px" height="50px" viewBox="0 0 60 60" version="1.1" xmlns="https://www.w3.org/2000/svg" xmlns:xlink="https://www.w3.org/1999/xlink"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><g transform="translate(-511.000000, -20.000000)" fill="#000000"><g><path d="M556.869,30.41 C554.814,30.41 553.148,32.076 553.148,34.131 C553.148,36.186 554.814,37.852 556.869,37.852 C558.924,37.852 560.59,36.186 560.59,34.131 C560.59,32.076 558.924,30.41 556.869,30.41 M541,60.657 C535.114,60.657 530.342,55.887 530.342,50 C530.342,44.114 535.114,39.342 541,39.342 C546.887,39.342 551.658,44.114 551.658,50 C551.658,55.887 546.887,60.657 541,60.657 M541,33.886 C532.1,33.886 524.886,41.1 524.886,50 C524.886,58.899 532.1,66.113 541,66.113 C549.9,66.113 557.115,58.899 557.115,50 C557.115,41.1 549.9,33.886 541,33.886 M565.378,62.101 C565.244,65.022 564.756,66.606 564.346,67.663 C563.803,69.06 563.154,70.057 562.106,71.106 C561.058,72.155 560.06,72.803 558.662,73.347 C557.607,73.757 556.021,74.244 553.102,74.378 C549.944,74.521 548.997,74.552 541,74.552 C533.003,74.552 532.056,74.521 528.898,74.378 C525.979,74.244 524.393,73.757 523.338,73.347 C521.94,72.803 520.942,72.155 519.894,71.106 C518.846,70.057 518.197,69.06 517.654,67.663 C517.244,66.606 516.755,65.022 516.623,62.101 C516.479,58.943 516.448,57.996 516.448,50 C516.448,42.003 516.479,41.056 516.623,37.899 C516.755,34.978 517.244,33.391 517.654,32.338 C518.197,30.938 518.846,29.942 519.894,28.894 C520.942,27.846 521.94,27.196 523.338,26.654 C524.393,26.244 525.979,25.756 528.898,25.623 C532.057,25.479 533.004,25.448 541,25.448 C548.997,25.448 549.943,25.479 553.102,25.623 C556.021,25.756 557.607,26.244 558.662,26.654 C560.06,27.196 561.058,27.846 562.106,28.894 C563.154,29.942 563.803,30.938 564.346,32.338 C564.756,33.391 565.244,34.978 565.378,37.899 C565.522,41.056 565.552,42.003 565.552,50 C565.552,57.996 565.522,58.943 565.378,62.101 M570.82,37.631 C570.674,34.438 570.167,32.258 569.425,30.349 C568.659,28.377 567.633,26.702 565.965,25.035 C564.297,23.368 562.623,22.342 560.652,21.575 C558.743,20.834 556.562,20.326 553.369,20.18 C550.169,20.033 549.148,20 541,20 C532.853,20 531.831,20.033 528.631,20.18 C525.438,20.326 523.257,20.834 521.349,21.575 C519.376,22.342 517.703,23.368 516.035,25.035 C514.368,26.702 513.342,28.377 512.574,30.349 C511.834,32.258 511.326,34.438 511.181,37.631 C511.035,40.831 511,41.851 511,50 C511,58.147 511.035,59.17 511.181,62.369 C511.326,65.562 511.834,67.743 512.574,69.651 C513.342,71.625 514.368,73.296 516.035,74.965 C517.703,76.634 519.376,77.658 521.349,78.425 C523.257,79.167 525.438,79.673 528.631,79.82 C531.831,79.965 532.853,80.001 541,80.001 C549.148,80.001 550.169,79.965 553.369,79.82 C556.562,79.673 558.743,79.167 560.652,78.425 C562.623,77.658 564.297,76.634 565.965,74.965 C567.633,73.296 568.659,71.625 569.425,69.651 C570.167,67.743 570.674,65.562 570.82,62.369 C570.966,59.17 571,58.147 571,50 C571,41.851 570.966,40.831 570.82,37.631"></path></g></g></g></svg></div><div style="padding-top: 8px;"> <div style=" color:#3897f0; font-family:Arial,sans-serif; font-size:14px; font-style:normal; font-weight:550; line-height:18px;"> Посмотреть эту публикацию в Instagram</div></div><div style="padding: 12.5% 0;"></div> <div style="display: flex; flex-direction: row; margin-bottom: 14px; align-items: center;"><div> <div style="background-color: #F4F4F4; border-radius: 50%; height: 12.5px; width: 12.5px; transform: translateX(0px) translateY(7px);"></div> <div style="background-color: #F4F4F4; height: 12.5px; transform: rotate(-45deg) translateX(3px) translateY(1px); width: 12.5px; flex-grow: 0; margin-right: 14px; margin-left: 2px;"></div> <div style="background-color: #F4F4F4; border-radius: 50%; height: 12.5px; width: 12.5px; transform: translateX(9px) translateY(-18px);"></div></div><div style="margin-left: 8px;"> <div style=" background-color: #F4F4F4; border-radius: 50%; flex-grow: 0; height: 20px; width: 20px;"></div> <div style=" width: 0; height: 0; border-top: 2px solid transparent; border-left: 6px solid #f4f4f4; border-bottom: 2px solid transparent; transform: translateX(16px) translateY(-4px) rotate(30deg)"></div></div><div style="margin-left: auto;"> <div style=" width: 0px; border-top: 8px solid #F4F4F4; border-right: 8px solid transparent; transform: translateY(16px);"></div> <div style=" background-color: #F4F4F4; flex-grow: 0; height: 12px; width: 16px; transform: translateY(-4px);"></div> <div style=" width: 0; height: 0; border-top: 8px solid #F4F4F4; border-left: 8px solid transparent; transform: translateY(-4px) translateX(8px);"></div></div></div> <div style="display: flex; flex-direction: column; flex-grow: 1; justify-content: center; margin-bottom: 24px;"> <div style=" background-color: #F4F4F4; border-radius: 4px; flex-grow: 0; height: 14px; margin-bottom: 6px; width: 224px;"></div> <div style=" background-color: #F4F4F4; border-radius: 4px; flex-grow: 0; height: 14px; width: 144px;"></div></div></a><p style=" color:#c9c8cd; font-family:Arial,sans-serif; font-size:14px; line-height:17px; margin-bottom:0; margin-top:8px; overflow:hidden; padding:8px 0 7px; text-align:center; text-overflow:ellipsis; white-space:nowrap;"><a href="https://www.instagram.com/p/CPP6mB9HDQ_/?utm_source=ig_embed&amp;utm_campaign=loading" style=" color:#c9c8cd; font-family:Arial,sans-serif; font-size:14px; font-style:normal; font-weight:normal; line-height:17px; text-decoration:none;" target="_blank">Публикация от ЖИЛЬЕ И АВТОМОБИЛЬ В РАССРОЧКУ (@gap24.kz)</a></p></div></blockquote> <script async src="//www.instagram.com/embed.js"></script>
                            <blockquote class="instagram-media insta-post" data-instgrm-captioned data-instgrm-permalink="https://www.instagram.com/p/CPKx4ynnoP-/?utm_source=ig_embed&amp;utm_campaign=loading" data-instgrm-version="13" style=" background:#FFF; border:0; border-radius:3px; box-shadow:0 0 1px 0 rgba(0,0,0,0.5),0 1px 10px 0 rgba(0,0,0,0.15); margin: 1px; !important; padding:0; width:99.375%; width:-webkit-calc(100% - 2px); width:calc(100% - 2px);"><div style="padding:16px;"> <a href="https://www.instagram.com/p/CPKx4ynnoP-/?utm_source=ig_embed&amp;utm_campaign=loading" style=" background:#FFFFFF; line-height:0; padding:0 0; text-align:center; text-decoration:none; width:100%;" target="_blank"> <div style=" display: flex; flex-direction: row; align-items: center;"> <div style="background-color: #F4F4F4; border-radius: 50%; flex-grow: 0; height: 40px; margin-right: 14px; width: 40px;"></div> <div style="display: flex; flex-direction: column; flex-grow: 1; justify-content: center;"> <div style=" background-color: #F4F4F4; border-radius: 4px; flex-grow: 0; height: 14px; margin-bottom: 6px; width: 100px;"></div> <div style=" background-color: #F4F4F4; border-radius: 4px; flex-grow: 0; height: 14px; width: 60px;"></div></div></div><div style="padding: 19% 0;"></div> <div style="display:block; height:50px; margin:0 auto 12px; width:50px;"><svg width="50px" height="50px" viewBox="0 0 60 60" version="1.1" xmlns="https://www.w3.org/2000/svg" xmlns:xlink="https://www.w3.org/1999/xlink"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><g transform="translate(-511.000000, -20.000000)" fill="#000000"><g><path d="M556.869,30.41 C554.814,30.41 553.148,32.076 553.148,34.131 C553.148,36.186 554.814,37.852 556.869,37.852 C558.924,37.852 560.59,36.186 560.59,34.131 C560.59,32.076 558.924,30.41 556.869,30.41 M541,60.657 C535.114,60.657 530.342,55.887 530.342,50 C530.342,44.114 535.114,39.342 541,39.342 C546.887,39.342 551.658,44.114 551.658,50 C551.658,55.887 546.887,60.657 541,60.657 M541,33.886 C532.1,33.886 524.886,41.1 524.886,50 C524.886,58.899 532.1,66.113 541,66.113 C549.9,66.113 557.115,58.899 557.115,50 C557.115,41.1 549.9,33.886 541,33.886 M565.378,62.101 C565.244,65.022 564.756,66.606 564.346,67.663 C563.803,69.06 563.154,70.057 562.106,71.106 C561.058,72.155 560.06,72.803 558.662,73.347 C557.607,73.757 556.021,74.244 553.102,74.378 C549.944,74.521 548.997,74.552 541,74.552 C533.003,74.552 532.056,74.521 528.898,74.378 C525.979,74.244 524.393,73.757 523.338,73.347 C521.94,72.803 520.942,72.155 519.894,71.106 C518.846,70.057 518.197,69.06 517.654,67.663 C517.244,66.606 516.755,65.022 516.623,62.101 C516.479,58.943 516.448,57.996 516.448,50 C516.448,42.003 516.479,41.056 516.623,37.899 C516.755,34.978 517.244,33.391 517.654,32.338 C518.197,30.938 518.846,29.942 519.894,28.894 C520.942,27.846 521.94,27.196 523.338,26.654 C524.393,26.244 525.979,25.756 528.898,25.623 C532.057,25.479 533.004,25.448 541,25.448 C548.997,25.448 549.943,25.479 553.102,25.623 C556.021,25.756 557.607,26.244 558.662,26.654 C560.06,27.196 561.058,27.846 562.106,28.894 C563.154,29.942 563.803,30.938 564.346,32.338 C564.756,33.391 565.244,34.978 565.378,37.899 C565.522,41.056 565.552,42.003 565.552,50 C565.552,57.996 565.522,58.943 565.378,62.101 M570.82,37.631 C570.674,34.438 570.167,32.258 569.425,30.349 C568.659,28.377 567.633,26.702 565.965,25.035 C564.297,23.368 562.623,22.342 560.652,21.575 C558.743,20.834 556.562,20.326 553.369,20.18 C550.169,20.033 549.148,20 541,20 C532.853,20 531.831,20.033 528.631,20.18 C525.438,20.326 523.257,20.834 521.349,21.575 C519.376,22.342 517.703,23.368 516.035,25.035 C514.368,26.702 513.342,28.377 512.574,30.349 C511.834,32.258 511.326,34.438 511.181,37.631 C511.035,40.831 511,41.851 511,50 C511,58.147 511.035,59.17 511.181,62.369 C511.326,65.562 511.834,67.743 512.574,69.651 C513.342,71.625 514.368,73.296 516.035,74.965 C517.703,76.634 519.376,77.658 521.349,78.425 C523.257,79.167 525.438,79.673 528.631,79.82 C531.831,79.965 532.853,80.001 541,80.001 C549.148,80.001 550.169,79.965 553.369,79.82 C556.562,79.673 558.743,79.167 560.652,78.425 C562.623,77.658 564.297,76.634 565.965,74.965 C567.633,73.296 568.659,71.625 569.425,69.651 C570.167,67.743 570.674,65.562 570.82,62.369 C570.966,59.17 571,58.147 571,50 C571,41.851 570.966,40.831 570.82,37.631"></path></g></g></g></svg></div><div style="padding-top: 8px;"> <div style=" color:#3897f0; font-family:Arial,sans-serif; font-size:14px; font-style:normal; font-weight:550; line-height:18px;"> Посмотреть эту публикацию в Instagram</div></div><div style="padding: 12.5% 0;"></div> <div style="display: flex; flex-direction: row; margin-bottom: 14px; align-items: center;"><div> <div style="background-color: #F4F4F4; border-radius: 50%; height: 12.5px; width: 12.5px; transform: translateX(0px) translateY(7px);"></div> <div style="background-color: #F4F4F4; height: 12.5px; transform: rotate(-45deg) translateX(3px) translateY(1px); width: 12.5px; flex-grow: 0; margin-right: 14px; margin-left: 2px;"></div> <div style="background-color: #F4F4F4; border-radius: 50%; height: 12.5px; width: 12.5px; transform: translateX(9px) translateY(-18px);"></div></div><div style="margin-left: 8px;"> <div style=" background-color: #F4F4F4; border-radius: 50%; flex-grow: 0; height: 20px; width: 20px;"></div> <div style=" width: 0; height: 0; border-top: 2px solid transparent; border-left: 6px solid #f4f4f4; border-bottom: 2px solid transparent; transform: translateX(16px) translateY(-4px) rotate(30deg)"></div></div><div style="margin-left: auto;"> <div style=" width: 0px; border-top: 8px solid #F4F4F4; border-right: 8px solid transparent; transform: translateY(16px);"></div> <div style=" background-color: #F4F4F4; flex-grow: 0; height: 12px; width: 16px; transform: translateY(-4px);"></div> <div style=" width: 0; height: 0; border-top: 8px solid #F4F4F4; border-left: 8px solid transparent; transform: translateY(-4px) translateX(8px);"></div></div></div> <div style="display: flex; flex-direction: column; flex-grow: 1; justify-content: center; margin-bottom: 24px;"> <div style=" background-color: #F4F4F4; border-radius: 4px; flex-grow: 0; height: 14px; margin-bottom: 6px; width: 224px;"></div> <div style=" background-color: #F4F4F4; border-radius: 4px; flex-grow: 0; height: 14px; width: 144px;"></div></div></a><p style=" color:#c9c8cd; font-family:Arial,sans-serif; font-size:14px; line-height:17px; margin-bottom:0; margin-top:8px; overflow:hidden; padding:8px 0 7px; text-align:center; text-overflow:ellipsis; white-space:nowrap;"><a href="https://www.instagram.com/p/CPKx4ynnoP-/?utm_source=ig_embed&amp;utm_campaign=loading" style=" color:#c9c8cd; font-family:Arial,sans-serif; font-size:14px; font-style:normal; font-weight:normal; line-height:17px; text-decoration:none;" target="_blank">Публикация от ЖИЛЬЕ И АВТОМОБИЛЬ В РАССРОЧКУ (@gap24.kz)</a></p></div></blockquote> <script async src="//www.instagram.com/embed.js"></script>
                            <blockquote class="instagram-media insta-post" data-instgrm-captioned data-instgrm-permalink="https://www.instagram.com/p/CPIj8GyHLfu/?utm_source=ig_embed&amp;utm_campaign=loading" data-instgrm-version="13" style=" background:#FFF; border:0; border-radius:3px; box-shadow:0 0 1px 0 rgba(0,0,0,0.5),0 1px 10px 0 rgba(0,0,0,0.15); margin: 1px; !important; padding:0; width:99.375%; width:-webkit-calc(100% - 2px); width:calc(100% - 2px);"><div style="padding:16px;"> <a href="https://www.instagram.com/p/CPIj8GyHLfu/?utm_source=ig_embed&amp;utm_campaign=loading" style=" background:#FFFFFF; line-height:0; padding:0 0; text-align:center; text-decoration:none; width:100%;" target="_blank"> <div style=" display: flex; flex-direction: row; align-items: center;"> <div style="background-color: #F4F4F4; border-radius: 50%; flex-grow: 0; height: 40px; margin-right: 14px; width: 40px;"></div> <div style="display: flex; flex-direction: column; flex-grow: 1; justify-content: center;"> <div style=" background-color: #F4F4F4; border-radius: 4px; flex-grow: 0; height: 14px; margin-bottom: 6px; width: 100px;"></div> <div style=" background-color: #F4F4F4; border-radius: 4px; flex-grow: 0; height: 14px; width: 60px;"></div></div></div><div style="padding: 19% 0;"></div> <div style="display:block; height:50px; margin:0 auto 12px; width:50px;"><svg width="50px" height="50px" viewBox="0 0 60 60" version="1.1" xmlns="https://www.w3.org/2000/svg" xmlns:xlink="https://www.w3.org/1999/xlink"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><g transform="translate(-511.000000, -20.000000)" fill="#000000"><g><path d="M556.869,30.41 C554.814,30.41 553.148,32.076 553.148,34.131 C553.148,36.186 554.814,37.852 556.869,37.852 C558.924,37.852 560.59,36.186 560.59,34.131 C560.59,32.076 558.924,30.41 556.869,30.41 M541,60.657 C535.114,60.657 530.342,55.887 530.342,50 C530.342,44.114 535.114,39.342 541,39.342 C546.887,39.342 551.658,44.114 551.658,50 C551.658,55.887 546.887,60.657 541,60.657 M541,33.886 C532.1,33.886 524.886,41.1 524.886,50 C524.886,58.899 532.1,66.113 541,66.113 C549.9,66.113 557.115,58.899 557.115,50 C557.115,41.1 549.9,33.886 541,33.886 M565.378,62.101 C565.244,65.022 564.756,66.606 564.346,67.663 C563.803,69.06 563.154,70.057 562.106,71.106 C561.058,72.155 560.06,72.803 558.662,73.347 C557.607,73.757 556.021,74.244 553.102,74.378 C549.944,74.521 548.997,74.552 541,74.552 C533.003,74.552 532.056,74.521 528.898,74.378 C525.979,74.244 524.393,73.757 523.338,73.347 C521.94,72.803 520.942,72.155 519.894,71.106 C518.846,70.057 518.197,69.06 517.654,67.663 C517.244,66.606 516.755,65.022 516.623,62.101 C516.479,58.943 516.448,57.996 516.448,50 C516.448,42.003 516.479,41.056 516.623,37.899 C516.755,34.978 517.244,33.391 517.654,32.338 C518.197,30.938 518.846,29.942 519.894,28.894 C520.942,27.846 521.94,27.196 523.338,26.654 C524.393,26.244 525.979,25.756 528.898,25.623 C532.057,25.479 533.004,25.448 541,25.448 C548.997,25.448 549.943,25.479 553.102,25.623 C556.021,25.756 557.607,26.244 558.662,26.654 C560.06,27.196 561.058,27.846 562.106,28.894 C563.154,29.942 563.803,30.938 564.346,32.338 C564.756,33.391 565.244,34.978 565.378,37.899 C565.522,41.056 565.552,42.003 565.552,50 C565.552,57.996 565.522,58.943 565.378,62.101 M570.82,37.631 C570.674,34.438 570.167,32.258 569.425,30.349 C568.659,28.377 567.633,26.702 565.965,25.035 C564.297,23.368 562.623,22.342 560.652,21.575 C558.743,20.834 556.562,20.326 553.369,20.18 C550.169,20.033 549.148,20 541,20 C532.853,20 531.831,20.033 528.631,20.18 C525.438,20.326 523.257,20.834 521.349,21.575 C519.376,22.342 517.703,23.368 516.035,25.035 C514.368,26.702 513.342,28.377 512.574,30.349 C511.834,32.258 511.326,34.438 511.181,37.631 C511.035,40.831 511,41.851 511,50 C511,58.147 511.035,59.17 511.181,62.369 C511.326,65.562 511.834,67.743 512.574,69.651 C513.342,71.625 514.368,73.296 516.035,74.965 C517.703,76.634 519.376,77.658 521.349,78.425 C523.257,79.167 525.438,79.673 528.631,79.82 C531.831,79.965 532.853,80.001 541,80.001 C549.148,80.001 550.169,79.965 553.369,79.82 C556.562,79.673 558.743,79.167 560.652,78.425 C562.623,77.658 564.297,76.634 565.965,74.965 C567.633,73.296 568.659,71.625 569.425,69.651 C570.167,67.743 570.674,65.562 570.82,62.369 C570.966,59.17 571,58.147 571,50 C571,41.851 570.966,40.831 570.82,37.631"></path></g></g></g></svg></div><div style="padding-top: 8px;"> <div style=" color:#3897f0; font-family:Arial,sans-serif; font-size:14px; font-style:normal; font-weight:550; line-height:18px;"> Посмотреть эту публикацию в Instagram</div></div><div style="padding: 12.5% 0;"></div> <div style="display: flex; flex-direction: row; margin-bottom: 14px; align-items: center;"><div> <div style="background-color: #F4F4F4; border-radius: 50%; height: 12.5px; width: 12.5px; transform: translateX(0px) translateY(7px);"></div> <div style="background-color: #F4F4F4; height: 12.5px; transform: rotate(-45deg) translateX(3px) translateY(1px); width: 12.5px; flex-grow: 0; margin-right: 14px; margin-left: 2px;"></div> <div style="background-color: #F4F4F4; border-radius: 50%; height: 12.5px; width: 12.5px; transform: translateX(9px) translateY(-18px);"></div></div><div style="margin-left: 8px;"> <div style=" background-color: #F4F4F4; border-radius: 50%; flex-grow: 0; height: 20px; width: 20px;"></div> <div style=" width: 0; height: 0; border-top: 2px solid transparent; border-left: 6px solid #f4f4f4; border-bottom: 2px solid transparent; transform: translateX(16px) translateY(-4px) rotate(30deg)"></div></div><div style="margin-left: auto;"> <div style=" width: 0px; border-top: 8px solid #F4F4F4; border-right: 8px solid transparent; transform: translateY(16px);"></div> <div style=" background-color: #F4F4F4; flex-grow: 0; height: 12px; width: 16px; transform: translateY(-4px);"></div> <div style=" width: 0; height: 0; border-top: 8px solid #F4F4F4; border-left: 8px solid transparent; transform: translateY(-4px) translateX(8px);"></div></div></div> <div style="display: flex; flex-direction: column; flex-grow: 1; justify-content: center; margin-bottom: 24px;"> <div style=" background-color: #F4F4F4; border-radius: 4px; flex-grow: 0; height: 14px; margin-bottom: 6px; width: 224px;"></div> <div style=" background-color: #F4F4F4; border-radius: 4px; flex-grow: 0; height: 14px; width: 144px;"></div></div></a><p style=" color:#c9c8cd; font-family:Arial,sans-serif; font-size:14px; line-height:17px; margin-bottom:0; margin-top:8px; overflow:hidden; padding:8px 0 7px; text-align:center; text-overflow:ellipsis; white-space:nowrap;"><a href="https://www.instagram.com/p/CPIj8GyHLfu/?utm_source=ig_embed&amp;utm_campaign=loading" style=" color:#c9c8cd; font-family:Arial,sans-serif; font-size:14px; font-style:normal; font-weight:normal; line-height:17px; text-decoration:none;" target="_blank">Публикация от ЖИЛЬЕ И АВТОМОБИЛЬ В РАССРОЧКУ (@gap24.kz)</a></p></div></blockquote> <script async src="//www.instagram.com/embed.js"></script>
                            <blockquote class="instagram-media insta-post" data-instgrm-captioned data-instgrm-permalink="https://www.instagram.com/p/CPFwLHpnyKz/?utm_source=ig_embed&amp;utm_campaign=loading" data-instgrm-version="13" style=" background:#FFF; border:0; border-radius:3px; box-shadow:0 0 1px 0 rgba(0,0,0,0.5),0 1px 10px 0 rgba(0,0,0,0.15); margin: 1px; !important; padding:0; width:99.375%; width:-webkit-calc(100% - 2px); width:calc(100% - 2px);"><div style="padding:16px;"> <a href="https://www.instagram.com/p/CPFwLHpnyKz/?utm_source=ig_embed&amp;utm_campaign=loading" style=" background:#FFFFFF; line-height:0; padding:0 0; text-align:center; text-decoration:none; width:100%;" target="_blank"> <div style=" display: flex; flex-direction: row; align-items: center;"> <div style="background-color: #F4F4F4; border-radius: 50%; flex-grow: 0; height: 40px; margin-right: 14px; width: 40px;"></div> <div style="display: flex; flex-direction: column; flex-grow: 1; justify-content: center;"> <div style=" background-color: #F4F4F4; border-radius: 4px; flex-grow: 0; height: 14px; margin-bottom: 6px; width: 100px;"></div> <div style=" background-color: #F4F4F4; border-radius: 4px; flex-grow: 0; height: 14px; width: 60px;"></div></div></div><div style="padding: 19% 0;"></div> <div style="display:block; height:50px; margin:0 auto 12px; width:50px;"><svg width="50px" height="50px" viewBox="0 0 60 60" version="1.1" xmlns="https://www.w3.org/2000/svg" xmlns:xlink="https://www.w3.org/1999/xlink"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><g transform="translate(-511.000000, -20.000000)" fill="#000000"><g><path d="M556.869,30.41 C554.814,30.41 553.148,32.076 553.148,34.131 C553.148,36.186 554.814,37.852 556.869,37.852 C558.924,37.852 560.59,36.186 560.59,34.131 C560.59,32.076 558.924,30.41 556.869,30.41 M541,60.657 C535.114,60.657 530.342,55.887 530.342,50 C530.342,44.114 535.114,39.342 541,39.342 C546.887,39.342 551.658,44.114 551.658,50 C551.658,55.887 546.887,60.657 541,60.657 M541,33.886 C532.1,33.886 524.886,41.1 524.886,50 C524.886,58.899 532.1,66.113 541,66.113 C549.9,66.113 557.115,58.899 557.115,50 C557.115,41.1 549.9,33.886 541,33.886 M565.378,62.101 C565.244,65.022 564.756,66.606 564.346,67.663 C563.803,69.06 563.154,70.057 562.106,71.106 C561.058,72.155 560.06,72.803 558.662,73.347 C557.607,73.757 556.021,74.244 553.102,74.378 C549.944,74.521 548.997,74.552 541,74.552 C533.003,74.552 532.056,74.521 528.898,74.378 C525.979,74.244 524.393,73.757 523.338,73.347 C521.94,72.803 520.942,72.155 519.894,71.106 C518.846,70.057 518.197,69.06 517.654,67.663 C517.244,66.606 516.755,65.022 516.623,62.101 C516.479,58.943 516.448,57.996 516.448,50 C516.448,42.003 516.479,41.056 516.623,37.899 C516.755,34.978 517.244,33.391 517.654,32.338 C518.197,30.938 518.846,29.942 519.894,28.894 C520.942,27.846 521.94,27.196 523.338,26.654 C524.393,26.244 525.979,25.756 528.898,25.623 C532.057,25.479 533.004,25.448 541,25.448 C548.997,25.448 549.943,25.479 553.102,25.623 C556.021,25.756 557.607,26.244 558.662,26.654 C560.06,27.196 561.058,27.846 562.106,28.894 C563.154,29.942 563.803,30.938 564.346,32.338 C564.756,33.391 565.244,34.978 565.378,37.899 C565.522,41.056 565.552,42.003 565.552,50 C565.552,57.996 565.522,58.943 565.378,62.101 M570.82,37.631 C570.674,34.438 570.167,32.258 569.425,30.349 C568.659,28.377 567.633,26.702 565.965,25.035 C564.297,23.368 562.623,22.342 560.652,21.575 C558.743,20.834 556.562,20.326 553.369,20.18 C550.169,20.033 549.148,20 541,20 C532.853,20 531.831,20.033 528.631,20.18 C525.438,20.326 523.257,20.834 521.349,21.575 C519.376,22.342 517.703,23.368 516.035,25.035 C514.368,26.702 513.342,28.377 512.574,30.349 C511.834,32.258 511.326,34.438 511.181,37.631 C511.035,40.831 511,41.851 511,50 C511,58.147 511.035,59.17 511.181,62.369 C511.326,65.562 511.834,67.743 512.574,69.651 C513.342,71.625 514.368,73.296 516.035,74.965 C517.703,76.634 519.376,77.658 521.349,78.425 C523.257,79.167 525.438,79.673 528.631,79.82 C531.831,79.965 532.853,80.001 541,80.001 C549.148,80.001 550.169,79.965 553.369,79.82 C556.562,79.673 558.743,79.167 560.652,78.425 C562.623,77.658 564.297,76.634 565.965,74.965 C567.633,73.296 568.659,71.625 569.425,69.651 C570.167,67.743 570.674,65.562 570.82,62.369 C570.966,59.17 571,58.147 571,50 C571,41.851 570.966,40.831 570.82,37.631"></path></g></g></g></svg></div><div style="padding-top: 8px;"> <div style=" color:#3897f0; font-family:Arial,sans-serif; font-size:14px; font-style:normal; font-weight:550; line-height:18px;"> Посмотреть эту публикацию в Instagram</div></div><div style="padding: 12.5% 0;"></div> <div style="display: flex; flex-direction: row; margin-bottom: 14px; align-items: center;"><div> <div style="background-color: #F4F4F4; border-radius: 50%; height: 12.5px; width: 12.5px; transform: translateX(0px) translateY(7px);"></div> <div style="background-color: #F4F4F4; height: 12.5px; transform: rotate(-45deg) translateX(3px) translateY(1px); width: 12.5px; flex-grow: 0; margin-right: 14px; margin-left: 2px;"></div> <div style="background-color: #F4F4F4; border-radius: 50%; height: 12.5px; width: 12.5px; transform: translateX(9px) translateY(-18px);"></div></div><div style="margin-left: 8px;"> <div style=" background-color: #F4F4F4; border-radius: 50%; flex-grow: 0; height: 20px; width: 20px;"></div> <div style=" width: 0; height: 0; border-top: 2px solid transparent; border-left: 6px solid #f4f4f4; border-bottom: 2px solid transparent; transform: translateX(16px) translateY(-4px) rotate(30deg)"></div></div><div style="margin-left: auto;"> <div style=" width: 0px; border-top: 8px solid #F4F4F4; border-right: 8px solid transparent; transform: translateY(16px);"></div> <div style=" background-color: #F4F4F4; flex-grow: 0; height: 12px; width: 16px; transform: translateY(-4px);"></div> <div style=" width: 0; height: 0; border-top: 8px solid #F4F4F4; border-left: 8px solid transparent; transform: translateY(-4px) translateX(8px);"></div></div></div> <div style="display: flex; flex-direction: column; flex-grow: 1; justify-content: center; margin-bottom: 24px;"> <div style=" background-color: #F4F4F4; border-radius: 4px; flex-grow: 0; height: 14px; margin-bottom: 6px; width: 224px;"></div> <div style=" background-color: #F4F4F4; border-radius: 4px; flex-grow: 0; height: 14px; width: 144px;"></div></div></a><p style=" color:#c9c8cd; font-family:Arial,sans-serif; font-size:14px; line-height:17px; margin-bottom:0; margin-top:8px; overflow:hidden; padding:8px 0 7px; text-align:center; text-overflow:ellipsis; white-space:nowrap;"><a href="https://www.instagram.com/p/CPFwLHpnyKz/?utm_source=ig_embed&amp;utm_campaign=loading" style=" color:#c9c8cd; font-family:Arial,sans-serif; font-size:14px; font-style:normal; font-weight:normal; line-height:17px; text-decoration:none;" target="_blank">Публикация от ЖИЛЬЕ И АВТОМОБИЛЬ В РАССРОЧКУ (@gap24.kz)</a></p></div></blockquote> <script async src="//www.instagram.com/embed.js"></script>
                        </div>
                        <div class="elfsight-app-af4dc4e1-d2a2-4390-984b-045d87d2ae45"></div>
                    </div>
                    <!-- <div class="banner-frame nospace wow fadeInUp" data-wow-delay="0.4s">
                         <h2 class="heading" style="letter-spacing: 1px; ">ПРОДВИЖЕНИЕ В INSTAGRAM</h2>
                         <div style="margin-top: 3rem;">
                             <div class="banner-9">
                                 <img src="/new_design/images/insta_1.png" alt="image description">
                                 <div class="holder">
                                     <h2><span>Хочешь</span><strong>1 млн. подписчиков?</strong></h2>
                                     <a class="btn-shop" href="product-detail.html">
                                         <span>Хочу</span>
                                         <i class="fa fa-angle-right"></i>
                                     </a>
                                 </div>
                             </div>
                             <div class="banner-10">
                                 <img src="/new_design/images/insta_2.png" alt="image description">
                                 <div class="holder">
                                     <h2><span>Продвигай</span><strong>свой аккаунт</strong></h2>
                                     <a class="btn-shop" href="product-detail.html">
                                         <span>Продвигать</span>
                                         <i class="fa fa-angle-right"></i>
                                     </a>
                                 </div>
                             </div>
                             <div class="banner-11">
                                 <img src="/new_design/images/insta_3.png" alt="image description">
                                 <div class="holder">
                                     <h2><span>Зарабатывай</span><strong>от 1000$ за 1 пост</strong></h2>
                                     <a class="btn-shop" href="product-detail.html">
                                         <span>Зарабатывать</span>
                                         <i class="fa fa-angle-right"></i>
                                     </a>
                                 </div>
                             </div>
                         </div>
                     </div>-->
                    @if(App::environment('hola'))
                        <div class="mt-producttabs style4 wow fadeInUp" data-wow-delay="0.4s">
                            <h2 class="heading">МЫ В INSTAGRAM</h2>
                            <div class="tab-content">
                                <div id="tab1">
                                    <div class="tabs-sliderlg">
                                        <div class="slide">
                                            <div class="mt-product1 large">
                                                <div class="box">
                                                    <div class="b1">
                                                        <div class="b2">
                                                            <a href="https://www.instagram.com/p/B_17-MYJDaU/?igshid=1jr9c3tss0z8q"
                                                               target="_blank">
                                                                <div class="insta_image"
                                                                     style="background-image: url('https://www.instagram.com/p/B_17-MYJDaU/media/?size=m');
                                                                        background-size: contain;">
                                                                </div>
                                                            </a>
                                                            <ul class="links">
                                                                <li>
                                                                    <a href="https://www.instagram.com/p/B_17-MYJDaU/?igshid=1jr9c3tss0z8q"
                                                                       target="_blank"><i
                                                                                class="fa fa-search"></i><span>Подробнее</span></a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="slide">
                                            <div class="mt-product1 large">
                                                <div class="box">
                                                    <div class="b1">
                                                        <div class="b2">
                                                            <a href="https://www.instagram.com/p/B_yso1ygEKe/?igshid=1w9pvg8ny5dy3"
                                                               target="_blank">
                                                                <div class="insta_image"
                                                                     style="background-image: url('https://www.instagram.com/p/B_yso1ygEKe/media/?size=m');
                                                                        background-size: contain;">
                                                                </div>
                                                            </a>
                                                            <ul class="links">
                                                                <li>
                                                                    <a href="https://www.instagram.com/p/B_yso1ygEKe/?igshid=1w9pvg8ny5dy3"
                                                                       target="_blank"><i
                                                                                class="fa fa-search"></i><span>Подробнее</span></a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="slide">
                                            <div class="mt-product1 large">
                                                <div class="box">
                                                    <div class="b1">
                                                        <div class="b2">
                                                            <a href="https://www.instagram.com/p/B_l0FblJOE2/?igshid=1o1kyh6pyy8fj"
                                                               target="_blank">
                                                                <div class="insta_image"
                                                                     style="background-image: url('https://www.instagram.com/p/B_l0FblJOE2/media/?size=m');
                                                                        background-size: contain;">
                                                                </div>
                                                            </a>
                                                            <ul class="links">
                                                                <li>
                                                                    <a href="https://www.instagram.com/p/B_l0FblJOE2/?igshid=1o1kyh6pyy8fj"
                                                                       target="_blank"><i
                                                                                class="fa fa-search"></i><span>Подробнее</span></a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="slide">
                                            <div class="mt-product1 large">
                                                <div class="box">
                                                    <div class="b1">
                                                        <div class="b2">
                                                            <a href="https://www.instagram.com/p/B_hM0fdpGXv/?igshid=1dp0gvsveld2f"
                                                               target="_blank">
                                                                <div class="insta_image"
                                                                     style="background-image: url('https://www.instagram.com/p/B_hM0fdpGXv/media/?size=m');
                                                                        background-size: contain;">
                                                                </div>
                                                            </a>
                                                            <ul class="links">
                                                                <li>
                                                                    <a href="https://www.instagram.com/p/B_hM0fdpGXv/?igshid=1dp0gvsveld2f"
                                                                       target="_blank"><i
                                                                                class="fa fa-search"></i><span>Подробнее</span></a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="slide">
                                            <div class="mt-product1 large">
                                                <div class="box">
                                                    <div class="b1">
                                                        <div class="b2">
                                                            <a href="https://www.instagram.com/p/B_ePhRGpXP7/?igshid=ueow4438kns0"
                                                               target="_blank">
                                                                <div class="insta_image"
                                                                     style="background-image: url('https://www.instagram.com/p/B_ePhRGpXP7/media/?size=m');
                                                                        background-size: contain;">
                                                                </div>
                                                            </a>
                                                            <ul class="links">
                                                                <li>
                                                                    <a href="https://www.instagram.com/p/B_ePhRGpXP7/?igshid=ueow4438kns0"
                                                                       target="_blank"><i
                                                                                class="fa fa-search"></i><span>Подробнее</span></a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="slide">
                                            <div class="mt-product1 large">
                                                <div class="box">
                                                    <div class="b1">
                                                        <div class="b2">
                                                            <a href="https://www.instagram.com/p/B_TygfspnQ5/?igshid=mhn1mobymsvz"
                                                               target="_blank">
                                                                <div class="insta_image"
                                                                     style="background-image: url('https://www.instagram.com/p/B_TygfspnQ5/media/?size=m');
                                                                        background-size: contain;">
                                                                </div>
                                                            </a>
                                                            <ul class="links">
                                                                <li>
                                                                    <a href="https://www.instagram.com/p/B_TygfspnQ5/?igshid=mhn1mobymsvz"
                                                                       target="_blank"><i
                                                                                class="fa fa-search"></i><span>Подробнее</span></a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </main>


@endsection
<style>
    #my-brands a {
        margin-left: 10px;
        justify-content: center;
        align-items: center;
        height: 50px;
    }

    .insta-post {
        max-width:270px !important;
        min-width:270px !important;
        max-height: 367px !important;
    }
</style>