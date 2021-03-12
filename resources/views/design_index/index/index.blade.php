<?php

use Illuminate\Support\Facades\Session;

?>
@extends('design_index.layout.layout')

@section('meta-tags')

    <title>Qpartners</title>
    <meta name="description"
          content="«Qpartners» - это уникальный медиа проект с широким набором возожностей для взаймодествия с участниками виртуального рынка"/>
    <meta name="keywords" content="Qpartners"/>

@endsection


@section('content')

    <main id="mt-main">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="banner-frame toppadding-zero">
                        <div class="banner-5 white wow fadeInLeft" data-wow-delay="0.4s">
                            <div style="max-width: 100%; height: 590px; background-image: url('/new_design/images/NewResource/img-1.jpg'); background-size: cover; background-position: center;"></div>
                            <div class="holder">
                                <div class="texts" style=" font-family: adineue PRO KZ Bold;color:#000;">
                                    <span class="mb-0" style="font-size:44px;font-weight:bold;">МОЙ ДОМ</span>
                                    <p style="font-size:44px;font-weight:bold;">МОЯ КРЕПОСТЬ</p>
                                    <span style="font-size: 19px;font-family:'Montserrat';" class="p-0">Стань обладателем собственного</hr style="list-style:none;"> дома</span>
                                </div>
                                <div class="holder-inner">
                                    <a href="/baspana" class="btn-shop">
                                        <span style="color: #fff !important;">ПОДРОБНЕЕ</span>
                                        <i class="fa fa-angle-right" style="background: #ffd700; color: #000;"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="banner-6 white wow fadeInRight" data-wow-delay="0.4s">
                            <div style="max-width: 100%; height: 590px; background-image: url('/new_design/images/NewResource/img-2.png'); background-size: cover; background-position: center;background-repeat: no-repeat;"></div>
                            <div class="holder">
                                <div class="texts" style="font-family: adineue PRO KZ Bold;color:#000;">
                                    <span style="font-size:28px;font-weight:bold;">АВТОМОБИЛЬ</span>
                                    <p style="font-size:28px;font-weight:bold;">ДЛЯ ДУШИ</p>
                                    <span style="font-size: 14px;font-family:'Montserrat';"  class="p-0">Получи автомобиль за 0 тенге</span>
                                </div>
                                <div class="holder-inner">
                                    <a href="/tulpar" class="btn-shop">
                                        <span style="color: #fff !important;">ЗАБРАТЬ</span>
                                        <i class="fa fa-angle-right" style="background: #fff; color: #000;"></i>
                                    </a>
                                </div>
                            </div>
                        </div><!-- banner 5 white end here -->
                        <!-- banner box two start here -->
                        <div class="banner-box two">
                            <!-- banner 7 right start here -->
                            <div class="banner-7 right wow fadeInUp" data-wow-delay="0.4s">
                                <div style="background-image: url('/new_design/images/NewResource/img-3.png'); background-position: center; background-size: cover; height: 285px; max-width: 100%; "></div>
                                <div class="holder">
                                    <div class="texts" style="color:#ffd700;">
                                        <span style="font-size:28px;font-weight:bold;">НОВЕНЬКИЙ</span>
                                        <p style="font-size:28px;font-weight:bold;">СМАРТФОН!</p>
                                        <span style="font-size: 14px;font-family:'Montserrat';color:#000;float:left;" class="p-0">Поспеши!</span>
                                    </div>
                                    <div class="holder-inner">
                                        <a href="product-detail.html" class="btn-shop">
                                            <span style="color: #000 !important;">ПОДРОБНЕЕ</span>
                                            <i class="fa fa-angle-right" style="background: #fff; color: #000;"></i>
                                        </a>
                                    </div>
                                </div>
                            </div><!-- banner 7 right end here -->
                            <!-- banner 8 start here -->
                            <div class="banner-8 wow fadeInDown" data-wow-delay="0.4s">
                                <div style="background-image: url('/new_design/images/NewResource/img-4.png'); background-position: center; background-size: cover; height: 285px; max-width: 100%; "></div>
                                <div class="holder">
                                    <div class="texts" style="font-family: adineue PRO KZ Bold;color:#fff;">
                                        <span style="font-size:28px;font-weight:bold;">ПУТЕШЕСТВИЕ</span>
                                        <p style="font-size:28px;font-weight:bold;">БЕЗ ГРАНИЦ!</p>
                                        <span style="font-size: 14px;width:150px;font-family:'Montserrat';color:#fff;position:absolute;left:55%;" class="p-0">А ты готов </hr> к приключениям?!</span>
                                    </div>
                                    <div class="holder-inner">
                                        <a href="product-detail.html" class="btn-shop">
                                            <span style="color: #000 !important;font-weight:300;">ГОТОВ</span>
                                            <i class="fa fa-angle-right" style="background: #fff; color: #000;"></i>
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
                                <img src="/new_design/images/NewResource/img-5.png"
                                     alt="image description"
                                     style="height: 277px;  width: 420px;">
                                <div class="holder">
                                    <div class="texts" style="font-family: adineue PRO KZ Bold;color:#fff;">
                                        <span style="font-size:28px;font-weight:bold;">SUPER ELIXIR</span>
                                        <p style="font-size:28px;font-weight:bold;">FOR MAN</p>
                                        <span style="font-size: 14px;width:200px;font-family:'Montserrat';color:#fff;float:left;" class="p-0">МУЖСКАЯ СИЛА </hr> В МУЖСКОМ ЗДОРОВЬИ</span>
                                    </div>
                                    <div class="holder-inner">
                                        <a href="/shop" class="btn-shop">
                                            <spanstyle="color:#000!important;font-weight:300;">ПОДРОБНЕЕ</span>
                                        </a>
                                    </div>
                                </div>
                            </div><!-- banner 12 right white end here -->
                            <!-- banner 13 right start here -->
                            <div class="banner-13 right wow fadeInDown" data-wow-delay="0.4s">
                                <img src="/new_design/images/NewResource/img-6.png"
                                     alt="image description"
                                     style="height: 277px;  width: 420px;">
                                <div class="holder">
                                    <div class="texts" style="font-family: adineue PRO KZ Bold;color:#fff;">
                                        <span style="font-size:28px;font-weight:bold;">SUPER ELIXIR</span>
                                        <p style="font-size:28px;font-weight:bold;">FOR <span style="color:#f00;">WOMAN</span></p>
                                        <span style="font-size: 14px;width:200px;font-family:'Montserrat';color:#000;float:right;" class="p-0">ТВОЙ ВНЕШНИЙ ВИД ТВОЙ ЗАЛОГ УСПЕХА</span>
                                    </div>
                                    <div class="holder-inner">
                                        <a href="/shop" class="btn-shop">
                                            <span style="color: #fff !important;font-weight:300;">ПОДРОБНЕЕ</span>
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
                            <img src="/new_design/images/NewResource/img-ban-1.png" alt="image description">
                            <div class="holder">
                                <div class="texts" style="color:#fff; adineue PRO KZ Bold;">
                                    <p style="font-size:28px;font-weight:bold;">ДОХОДНОСТЬ</p>
                                    <span style="font-size: 20px;font-family:'Montserrat';color:#fff;float:left;" class="p-0">80% от оборота!</span>
                                </div>
                                <div class="holder-inner">
                                    <a href="product-detail.html" class="btn-shop">
                                        <span style="color: #fff!important;text-transform:lowercase;">подробнее</span>
                                        <i class="fa fa-angle-right" style="background: #fff; color: #000;"></i>
                                    </a>
                                </div>
                            </div>
                        </div><!-- banner 9 end here -->
                        <!-- banner 10 start here -->
                        <div class="banner-10">
                            <img src="/new_design/images/NewResource/img-ban-2.png" alt="image description">
                            <div class="holder">
                                <div class="texts" style="color:#000;">
                                    <p style="font-size:28px;font-weight:bold;">БОНУСЫ</p>
                                    <span style="font-size: 20px;font-family:'Montserrat';color:#000;" class="p-0">8 видов!</span>
                                </div>
                                <div class="holder-inner">
                                    <a href="product-detail.html" class="btn-shop">
                                        <span style="color: #000!important;text-transform:lowercase;">подробнее</span>
                                        <i class="fa fa-angle-right" style="background: #fff; color: #000;"></i>
                                    </a>
                                </div>
                            </div>
                        </div><!-- banner 10 end here -->
                        <!-- banner 11 start here -->
                        <div class="banner-11">
                            <img src="/new_design/images/NewResource/img-ban-3.png" alt="image description">
                            <div class="holder">
                                <div class="texts" style="color:#000;">
                                    <p style="font-size:28px;font-weight:bold;">ЗАРАБОТОК</p>
                                    <span style="font-size: 20px;font-family:'Montserrat';color:#000;float:left;" class="p-0">более 44 000 000</span>
                                </div>
                                <div class="holder-inner" style="float:left;">
                                    <a href="product-detail.html" class="btn-shop">
                                        <span style="color: #000!important;text-transform:lowercase;">подробнее</span>
                                        <i class="fa fa-angle-right" style="background: #fff; color: #000;"></i>
                                    </a>
                                </div>
                            </div>
                        </div><!-- banner 11 end here -->
                    </div><!-- banner frame end here -->

                    <div class="mt-producttabs style2 wow fadeInUp" data-wow-delay="0.4s">
                        <!-- producttabs start here -->
                        <ul class="producttabs">
                            <li><a href="#tab1" class="active">Элексиры</a></li>
                            <li><a href="#tab2">Спреи</a></li>
                            <li><a href="#tab3">Гели</a></li>
                            <li><a href="#tab4">Крема</a></li>
                        </ul>
                        <!-- producttabs end here -->
                        <div class="tab-content">
                            <div id="tab1">
                                <div class="tabs-sliderlg">
                                    @foreach($elixirs as $product)
                                        <div class="slide">
                                            <div class="mt-product1 large">
                                                <div class="box">
                                                    <div class="b1">
                                                        <div class="b2">
                                                            <a href="{{ route('product.detail',$product->product_id, ['id' => $product->product_id]) }}">
                                                                <div class="product_image"
                                                                     style="background-image: url('{{$product->product_image}}');">
                                                                </div>
                                                            </a>
                                                            <ul class="mt-stars">
                                                                @for($i = 0; $i<5;$i++)
                                                                    @if($i < \App\Models\Review::ratingCalculator($product->product_id, \App\Models\Review::PRODUCT_REVIEW))
                                                                        <li><i class="fa fa-star"></i></li>
                                                                    @else
                                                                        <li><i class="fa fa-star-o"></i></li>
                                                                    @endif
                                                                @endfor

                                                            </ul>
                                                            <ul class="links">
                                                                <li>
                                                                    <a style="cursor: pointer;"
                                                                       data-item-id="{{$product->product_id}}"
                                                                       data-user-id="{{Auth::user() ? Auth::user()->user_id : NULL}}"
                                                                       data-method="add"
                                                                       data-route="{{route('basket.isAjax')}}"
                                                                       onclick="addItemToBasket(this)"
                                                                    ><i class="icon-handbag"></i><span>Добавить в корзину</span></a>
                                                                </li>
                                                                <li><a style="cursor: pointer;"
                                                                       data-item-id="{{$product->product_id}}"
                                                                       data-method="add"
                                                                       data-user-id="{{Auth::user() ? Auth::user()->user_id : NULL}}"
                                                                       data-session-id="{{ Session::getId()}}"
                                                                       data-route="{{route('favorite.isAjax')}}"
                                                                       onclick="addItemToFavorites(this)"
                                                                    ><i
                                                                                class="icomoon icon-heart-empty"></i></a>
                                                                </li>
                                                                <li><a href="#"><i
                                                                                class="icomoon icon-exchange"></i></a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="txt">
                                                    <strong class="title"><a
                                                                href="{{ route('product.detail',$product->product_id, ['id' => $product->product_id]) }}">{{$product->product_name_ru}}</a></strong>
                                                    <p>{{$product->product_desc_ru}}</p>
                                                    <span class="price"><i
                                                                class="fa fa-dollar"></i> <span>{{$product->product_price}}
                                                               ({{$product->product_price * (\App\Models\Currency::where(['currency_id' => 1 ])->first())->money}}   &#8376;) </span></span>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            <div id="tab2">
                                <div class="tabs-sliderlg">
                                    @foreach($sprays as $product)
                                        <div class="slide">
                                            <div class="mt-product1 large">
                                                <div class="box">
                                                    <div class="b1">
                                                        <div class="b2">
                                                            <a href="{{ route('product.detail',$product->product_id, ['id' => $product->product_id]) }}">
                                                                <div class="product_image"
                                                                     style="background-image: url('{{$product->product_image}}');">

                                                                </div>
                                                            </a>
                                                            <ul class="mt-stars">
                                                                <li><i class="fa fa-star"></i></li>
                                                                <li><i class="fa fa-star"></i></li>
                                                                <li><i class="fa fa-star"></i></li>
                                                                <li><i class="fa fa-star-o"></i></li>
                                                            </ul>
                                                            <ul class="links">
                                                                <li>
                                                                    <a style="cursor: pointer;"
                                                                       data-item-id="{{$product->product_id}}"
                                                                       data-user-id="{{Auth::user() ? Auth::user()->user_id : NULL}}"
                                                                       data-method="add"
                                                                       data-route="{{route('basket.isAjax')}}"
                                                                       onclick="addItemToBasket(this)"
                                                                    ><i class="icon-handbag"></i><span>Добавить в карзину</span></a>
                                                                </li>
                                                                <li><a style="cursor: pointer;"
                                                                       data-item-id="{{$product->product_id}}"
                                                                       data-method="add"
                                                                       data-user-id="{{Auth::user() ? Auth::user()->user_id : NULL}}"
                                                                       data-session-id="{{ Session::getId()}}"
                                                                       data-route="{{route('favorite.isAjax')}}"
                                                                       onclick="addItemToFavorites(this)"
                                                                    ><i
                                                                                class="icomoon icon-heart-empty"></i></a>
                                                                </li>
                                                                <li><a href="#"><i
                                                                                class="icomoon icon-exchange"></i></a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="txt">
                                                    <strong class="title"><a
                                                                href="{{ route('product.detail',$product->product_id, ['id' => $product->product_id]) }}">{{$product->product_name_ru}}</a></strong>
                                                    <p>{{$product->product_desc_ru}}</p>
                                                    <span class="price"><i
                                                                class="fa fa-dollar"></i> <span>{{$product->product_price}}
                                                               ({{$product->product_price * (\App\Models\Currency::where(['currency_id' => 1 ])->first())->money}}   &#8376;) </span></span>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            <div id="tab3">
                                <div class="tabs-sliderlg">
                                    @foreach($gels as $product)
                                        <div class="slide">
                                            <div class="mt-product1 large">
                                                <div class="box">
                                                    <div class="b1">
                                                        <div class="b2">
                                                            <a href="{{ route('product.detail',$product->product_id, ['id' => $product->product_id]) }}">
                                                                <div class="product_image"
                                                                     style="background-image: url('{{$product->product_image}}');">
                                                                </div>
                                                            </a>
                                                            <ul class="mt-stars">
                                                                <li><i class="fa fa-star"></i></li>
                                                                <li><i class="fa fa-star"></i></li>
                                                                <li><i class="fa fa-star"></i></li>
                                                                <li><i class="fa fa-star-o"></i></li>
                                                            </ul>
                                                            <ul class="links">
                                                                <li>
                                                                    <a style="cursor: pointer;"
                                                                       data-item-id="{{$product->product_id}}"
                                                                       data-user-id="{{Auth::user() ? Auth::user()->user_id : NULL}}"
                                                                       data-method="add"
                                                                       data-route="{{route('basket.isAjax')}}"
                                                                       onclick="addItemToBasket(this)"
                                                                    ><i class="icon-handbag"></i><span>Добавить в карзину</span></a>
                                                                </li>
                                                                <li><a style="cursor: pointer;"
                                                                       data-item-id="{{$product->product_id}}"
                                                                       data-method="add"
                                                                       data-user-id="{{Auth::user() ? Auth::user()->user_id : NULL}}"
                                                                       data-session-id="{{ Session::getId()}}"
                                                                       data-route="{{route('favorite.isAjax')}}"
                                                                       onclick="addItemToFavorites(this)"><i
                                                                                class="icomoon icon-heart-empty"></i></a>
                                                                </li>
                                                                <li><a href="#"><i
                                                                                class="icomoon icon-exchange"></i></a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="txt">
                                                    <strong class="title"><a
                                                                href="{{ route('product.detail',$product->product_id, ['id' => $product->product_id]) }}">{{$product->product_name_ru}}</a></strong>
                                                    <p>{{$product->product_desc_ru}}</p>
                                                    <span class="price"><i
                                                                class="fa fa-dollar"></i> <span>{{$product->product_price}}
                                                               ({{$product->product_price * (\App\Models\Currency::where(['currency_id' => 1 ])->first())->money}}   &#8376;) </span></span>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            <div id="tab4">
                                <div class="tabs-sliderlg">
                                    @foreach($creams as $product)
                                        <div class="slide">
                                            <div class="mt-product1 large">
                                                <div class="box">
                                                    <div class="b1">
                                                        <div class="b2">
                                                            <a href="{{ route('product.detail',$product->product_id, ['id' => $product->product_id]) }}">
                                                                <div class="product_image"
                                                                     style="background-image: url('{{$product->product_image}}');">
                                                                </div>
                                                            </a>
                                                            <ul class="mt-stars">
                                                                <li><i class="fa fa-star"></i></li>
                                                                <li><i class="fa fa-star"></i></li>
                                                                <li><i class="fa fa-star"></i></li>
                                                                <li><i class="fa fa-star-o"></i></li>
                                                            </ul>
                                                            <ul class="links">
                                                                <li>
                                                                    <a style="cursor: pointer;"
                                                                       data-item-id="{{$product->product_id}}"
                                                                       data-user-id="{{Auth::user() ? Auth::user()->user_id : NULL}}"
                                                                       data-method="add"
                                                                       data-route="{{route('basket.isAjax')}}"
                                                                       onclick="addItemToBasket(this)"
                                                                    ><i class="icon-handbag"></i><span>Добавить в карзину</span></a>
                                                                </li>
                                                                <li><a style="cursor: pointer;"
                                                                       data-item-id="{{$product->product_id}}"
                                                                       data-method="add"
                                                                       data-user-id="{{Auth::user() ? Auth::user()->user_id : NULL}}"
                                                                       data-session-id="{{ Session::getId()}}"
                                                                       data-route="{{route('favorite.isAjax')}}"
                                                                       onclick="addItemToFavorites(this)"><i
                                                                                class="icomoon icon-heart-empty"></i></a>
                                                                </li>
                                                                <li><a href="#"><i
                                                                                class="icomoon icon-exchange"></i></a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="txt">
                                                    <strong class="title"><a
                                                                href="{{ route('product.detail',$product->product_id, ['id' => $product->product_id]) }}">{{$product->product_name_ru}}</a></strong>
                                                    <p>{{$product->product_desc_ru}}</p>
                                                    <span class="price"><i
                                                                class="fa fa-dollar"></i> <span>{{$product->product_price}}
                                                               ({{$product->product_price * (\App\Models\Currency::where(['currency_id' => 1 ])->first())->money}}   &#8376;) </span></span>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mt-producttabs style3 wow fadeInUp" data-wow-delay="0.4s">
                        <h2 class="heading">Популярные</h2>
                        <div class="tabs-slider">
                            @foreach($popularProducts as $product)
                                <div class="slide">
                                    <div class="mt-product1">
                                        <div class="box">
                                            <div class="b1">
                                                <div class="b2">
                                                    <div class="product_new_image" style="background-image: url('{{$product->product_image}}')">
                                                    </div>
                                                    <span class="caption">
                                                        @if($product->is_new)
                                                            <span class="new">new</span>
                                                        @endif
														</span>
                                                    <ul class="mt-stars">
                                                        @for($i = 0; $i<5;$i++)
                                                            @if($i < \App\Models\Review::ratingCalculator($product->product_id, \App\Models\Review::PRODUCT_REVIEW))
                                                                <li><i class="fa fa-star"></i></li>
                                                            @else
                                                                <li><i class="fa fa-star-o"></i></li>
                                                            @endif
                                                        @endfor
                                                    </ul>
                                                    <ul class="links">
                                                        <li>
                                                            <a style="cursor: pointer;"
                                                               data-item-id="{{$product->product_id}}"
                                                               data-method="add"
                                                               data-user-id="{{Auth::user() ? Auth::user()->user_id : NULL}}"
                                                               data-route="{{route('basket.isAjax')}}"
                                                               onclick="addItemToBasket(this)"
                                                            >
                                                                <i class="icon-handbag"></i><span>Добавить</span></a>
                                                        </li>
                                                        <li><a style="cursor: pointer;"
                                                               data-item-id="{{$product->product_id}}"
                                                               data-method="add"
                                                               data-user-id="{{Auth::user() ? Auth::user()->user_id : NULL}}"
                                                               data-session-id="{{ Session::getId()}}"
                                                               data-route="{{route('favorite.isAjax')}}"
                                                               onclick="addItemToFavorites(this)"
                                                            >
                                                                <i class="fa fa-heart"></i></a>
                                                        </li>
                                                        <li><a href="#"><i class="icomoon icon-exchange"></i></a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="txt">
                                            <strong class="title"><a
                                                        href="{{ route('product.detail',$product->product_id, ['id' => $product->product_id]) }}">{{$product->product_name}}</a></strong>
                                            <span class="price"><i
                                                        class="fa fa-dollar"></i> <span>{{$product->product_price}}</span> 	({{$product->product_price * (\App\Models\Currency::where(['currency_id' => 1])->first())->money}} &#8376;)</span>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <div id="product-masonry">
                        <div class="container">
                            <div class="row">
                                <div class="col-xs-12">
                                    <h2 class="heading" style="color: #3a3a3a;margin: 0 0 7px;text-transform: uppercase;padding-bottom:25px; font: 700 26px/30px 'Montserrat', sans-serif;">ОТЗЫВЫ</h2>
                                    <ul class="masonry-list">
                                        <li class="fil1">
                                            <!-- mt product start here -->
                                            <div class="mt-product1 large">
                                                <!-- box start here -->
                                                <div class="box">
                                                    <iframe width="250" height="250" src="https://www.youtube.com/embed/YXdlHaZtQxw" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                                </div><!-- box end here -->
                                            </div><!-- mt product1 end here -->
                                        </li>
                                        <li class="fil2">
                                            <!-- mt product start here -->
                                            <div class="mt-product1 large">
                                                <!-- box start here -->
                                                <div class="box">
                                                    <iframe width="250" height="250" src="https://www.youtube.com/embed/vrA0RLhLo-8" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                                </div><!-- box end here -->

                                            </div><!-- mt product1 end here -->
                                        </li>
                                        <li class="fil3">
                                            <!-- mt product start here -->
                                            <div class="mt-product1 large">
                                                <!-- box start here -->
                                                <div class="box">
                                                    <iframe width="250" height="250" src="https://www.youtube.com/embed/YXdlHaZtQxw" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                                </div><!-- box end here -->
                                            </div><!-- mt product1 end here -->
                                        </li>
                                        <li class="fil1">
                                            <!-- mt product start here -->
                                            <div class="mt-product1 large">
                                                <!-- box start here -->
                                                <div class="box">
                                                    <iframe width="250" height="250" src="https://www.youtube.com/embed/vrA0RLhLo-8" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                                </div><!-- box end here -->
                                            </div><!-- mt product1 end here -->
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="mt-patners wow fadeInUp" data-wow-delay="0.4s">
                        <h2 class="heading">Наши бренды</h2>
                        <div class="patner-slider">
                            @foreach($brands as $brand)
                                <div class="slide">
                                    <div class="box1">
                                        <div class="box2">
                                            <a href="#">
                                                <img src="{{$brand->image}}" alt="">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
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