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
                            <div style="max-width: 100%; height: 590px; background-image: url('/new_design/images/home.jpg'); background-size: cover; background-position: center;"></div>
                            <div class="holder">
                                <div class="texts" style="background-color: rgba(0,0,0,0.5); padding: 2rem 4rem;">
                                    <strong class="title">жилищная программа</strong>
                                    <h3 style="font-weight: bold;">Купи жилье за 200$</h3>
                                    <p>Собственное жилье в рассрочку без процентов, коммисси, перепат и подтверждения
                                        дохода</p>
                                    <span class="price-add">$ 200.00</span>
                                    <a href="product-detail.html" class="btn-shop">
                                        <span><strong style="color: white;">забрать сейчас</strong></span>
                                        <i class="fa fa-angle-right" style="color: white;"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="banner-6 white wow fadeInRight" data-wow-delay="0.4s">
                            <div style="max-width: 100%; height: 590px; background-image: url('/new_design/images/car.jpg'); background-size: cover; background-position: center;background-repeat: no-repeat;"></div>
                            <div class="holder">
                                <div style="background-color: rgba(0,0,0,0.5); width: 100%; padding: 2rem 1rem">
                                    <strong class="sub-title"
                                            style="font-size: 110%; font-weight: bold;">Автопрограмма</strong>
                                    <h3>Забирай свой автомобиль</h3>
                                </div>
                                <a href="product-detail.html" class="btn-shop">
                                    <span><strong>забрать сейчас</strong></span>
                                    <i class="fa fa-angle-right"></i>
                                </a>
                            </div>
                        </div><!-- banner 5 white end here -->
                        <!-- banner box two start here -->
                        <div class="banner-box two">
                            <!-- banner 7 right start here -->
                            <div class="banner-7 right wow fadeInUp" data-wow-delay="0.4s">
                                <div style="background-image: url('/new_design/images/businnes.jpg'); background-position: center; background-size: cover; height: 285px; max-width: 100%; "></div>
                                <div class="holder">
                                    <div class="text-center" style="background-color: rgba(0,0,0,0.5); width: 100%; padding: 2rem 1rem;">
                                        <h2><strong style="color: white; font-weight: bold;">МСБ программа</strong></h2>
                                        <h2 style="margin-top: 2rem;"><strong style="color: white;">Даем грант для
                                                бизнеса</strong></h2>
                                    </div>
                                    <div class="price-tag">
                                        <span class="price">$ 400000</span>
                                        <a class="shop-now" href="product-detail.html">получить</a>
                                    </div>
                                </div>
                            </div><!-- banner 7 right end here -->
                            <!-- banner 8 start here -->
                            <div class="banner-8 wow fadeInDown" data-wow-delay="0.4s">
                                <div style="background-image: url('/new_design/images/travel.jpg'); background-position: center; background-size: cover; height: 285px; max-width: 100%; "></div>
                                <div class="holder text-center">
                                    <div style="background-color: rgba(0,0,0,0.5); width: 100%; padding: 2rem 1rem;">
                                        <h2><strong style="color: white; font-weight: bold;">тут программа</strong></h2>
                                        <h2 style="margin-top: 2rem;"><strong style="color: white;">Выбирай куда полетишь</strong></h2>
                                        <div class="price-tag text-left" style="padding-top: 0; margin-left: 0.8rem;">
                                            <a class="btn-shop" href="product-detail.html">
                                                <span>Выбрать</span>
                                                <i class="fa fa-angle-right"></i>
                                            </a>
                                        </div>
                                    </div>

                                </div>
                            </div><!-- banner 8 start here -->
                        </div>
                    </div>
                    <div class="banner-frame mt-paddingsmzero">
                        <!-- banner box third start here -->
                        <div class="banner-box third">
                            <!-- banner 12 right white start here -->
                            <div class="banner-12 right white wow fadeInUp" data-wow-delay="0.4s">
                                <img src="/new_design/images/income.jpg" alt="image description" style="height: 260px;  width: 420px;">
{{--                                <div style="background-image: url('/new_design/images/income.jpg'); background-position: center; background-size: cover; height: 230px;  width: 420px;"></div>--}}
                                <div class="holder">
                                    <h2 style="padding-bottom: 1rem;"><span>Заработок</span><strong>Начни зарабатывать от 200$ в месяц</strong></h2>
                                    <a class="btn-shop" href="product-detail.html">
                                        <span>начать</span>
                                        <i class="fa fa-angle-right"></i>
                                    </a>
                                </div>
                            </div><!-- banner 12 right white end here -->
                            <!-- banner 13 right start here -->
                            <div class="banner-13 right wow fadeInDown" data-wow-delay="0.4s">
                                <img src="/new_design/images/marketing.png" alt="image description" style="height: 295px;  width: 420px;">
                                <div class="holder">
                                    <h3 style="background-color: lightgreen; padding-right: 1rem;margin: 0;">Бизнес</h3>
                                    <h3 style="background-color: rgba(0,0,0,0.5);padding-right: 1rem;"><strong style="color: white;">Построй свой бизнес с обооротом 100000$</strong>
                                    </h3>
                                    <a class="btn-shop" href="product-detail.html">
                                        <span>строить</span>
                                        <i class="fa fa-angle-right"></i>
                                    </a>
                                </div>
                            </div><!-- banner 13 right end here -->
                        </div><!-- banner box third end here -->
                        <!-- slider 7 start here -->
                        <div class="slider-7 wow fadeInRight" data-wow-delay="0.4s">
                            <!-- slider start here -->
                            <div class="slider banner-slider">
                                <!-- holder start here -->
                                <div class="s-holder">
                                    <img src="http://placehold.it/765x580" alt="image description">
                                    <div class="s-box">
                                        <strong class="s-title">Жилищная программа для лидеров</strong>
                                        <span class="heading">Закройте Diamond Director</span>
                                        <span class="heading add">и получите ключи от <br> собственного дома</span>
                                        <div class="s-txt">
                                            <p>Закройте статус Diamond Director в течений 180 дней <br>
                                                и получите ключи от собственного жилья досрочно </p>
                                        </div>
                                    </div>
                                </div><!-- holder end here -->
                                <!-- holder start here -->
                                <div class="s-holder">
                                    <img src="http://placehold.it/765x580" alt="image description">
                                    <div class="s-box">
                                        <strong class="s-title">FURNITURE DESIGNS IDEAS</strong>
                                        <span class="heading">Upholstered fabric</span>
                                        <span class="heading add">Counter stool</span>
                                        <div class="s-txt">
                                            <p>Consectetur adipisicing elit. Beatae accusamus, optio,
                                                repellendus inventore</p>
                                        </div>
                                    </div>
                                </div><!-- holder end here -->
                                <!-- holder start here -->
                                <div class="s-holder">
                                    <img src="http://placehold.it/765x580" alt="image description">
                                    <div class="s-box">
                                        <strong class="s-title">KITCHEN ACCESSORIES</strong>
                                        <span class="heading">Wooden chopping board</span>
                                        <span class="heading add">Chopping Boards</span>
                                        <div class="s-txt">
                                            <p>Remo is a cutting board in solid oak wood, with an explicit
                                                reference to the oars of the boats.</p>
                                        </div>
                                    </div>
                                </div><!-- holder end here -->
                                <!-- holder star here -->
                                <div class="s-holder">
                                    <img src="http://placehold.it/765x580" alt="image description">
                                    <div class="s-box">
                                        <strong class="s-title">FURNITURE DESIGNS IDEAS</strong>
                                        <span class="heading add">NEW</span>
                                        <span class="heading add">COLLECTION</span>
                                        <div class="s-txt">
                                            <p>Consectetur adipisicing elit. Beatae accusamus, optio,
                                                repellendus inventore</p>
                                        </div>
                                        <a href="product-detail.html" class="s-shop">SHOP NOW</a>
                                    </div>
                                </div><!-- holder end here -->
                            </div>
                        </div><!-- slider 7 end here -->
                    </div>
                    <div class="mt-producttabs style2 wow fadeInUp" data-wow-delay="0.4s">
                        <!-- producttabs start here -->
                        <ul class="producttabs">
                            <li><a href="#tab1" class="active">Элексиры</a></li>
                            <li><a href="#tab2">Спреи</a></li>
                            <li><a href="#tab3">Гели</a></li>
                            <li><a href="#tab3">Крема</a></li>
                        </ul>
                        <!-- producttabs end here -->
                        <div class="tab-content">
                            <div id="tab1">
                                <div class="tabs-sliderlg">
                                    @foreach($products as $product)
                                        <div class="slide">
                                            <div class="mt-product1 large">
                                                <div class="box">
                                                    <div class="b1">
                                                        <div class="b2">
                                                            <a href="#">
                                                                <div style="width: 270px;
                                                                        height: 290px;
                                                                        background-image: url('{{$product->product_image}}');
                                                                        background-position: center;
                                                                        background-size: cover;">

                                                                </div>
                                                            </a>
                                                            <ul class="mt-stars">
                                                                <li><i class="fa fa-star"></i></li>
                                                                <li><i class="fa fa-star"></i></li>
                                                                <li><i class="fa fa-star"></i></li>
                                                                <li><i class="fa fa-star-o"></i></li>
                                                            </ul>
                                                            <ul class="links">
                                                                <li><a href="#"><i class="icon-handbag"></i><span>Добавить в карзину</span></a>
                                                                </li>
                                                                <li><a href="#"><i
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
                                                                href="product-detail.html">{{$product->product_name_ru}}</a></strong>
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
                                <!-- tabs slider start here -->
                                <div class="tabs-sliderlg">
                                    <!-- slide start here -->
                                    <div class="slide">
                                        <!-- mt product1 large start here -->
                                        <div class="mt-product1 large">
                                            <div class="box">
                                                <div class="b1">
                                                    <div class="b2">
                                                        <a href="product-detail.html"><img
                                                                    src="http://placehold.it/275x290"
                                                                    alt="image description"></a>
                                                        <ul class="links">
                                                            <li><a href="#"><i class="icon-handbag"></i><span>Add to Cart</span></a>
                                                            </li>
                                                            <li><a href="#"><i
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
                                                <strong class="title"><a href="product-detail.html">Marvelous
                                                        Modern 3 Seater</a></strong>
                                                <span class="price"><i
                                                            class="fa fa-eur"></i> <span>599,00</span></span>
                                            </div>
                                        </div><!-- mt product1 center end here -->
                                    </div>
                                    <!-- slide end here -->
                                    <!-- slide start here -->
                                    <div class="slide">
                                        <!-- mt product1 large start here -->
                                        <div class="mt-product1 large">
                                            <div class="box">
                                                <div class="b1">
                                                    <div class="b2">
                                                        <a href="product-detail.html"><img
                                                                    src="http://placehold.it/275x290"
                                                                    alt="image description"></a>
                                                        <ul class="mt-stars">
                                                            <li><i class="fa fa-star"></i></li>
                                                            <li><i class="fa fa-star"></i></li>
                                                            <li><i class="fa fa-star"></i></li>
                                                            <li><i class="fa fa-star-o"></i></li>
                                                        </ul>
                                                        <ul class="links">
                                                            <li><a href="#"><i class="icon-handbag"></i><span>Add to Cart</span></a>
                                                            </li>
                                                            <li><a href="#"><i
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
                                                <strong class="title"><a href="product-detail.html">Bombi
                                                        Chair</a></strong>
                                                <span class="price"><i
                                                            class="fa fa-eur"></i> <span>399,00</span></span>
                                            </div>
                                        </div><!-- mt product1 center end here -->
                                    </div>
                                    <!-- slide end here -->
                                    <!-- slide start here -->
                                    <div class="slide">
                                        <!-- mt product1 large start here -->
                                        <div class="mt-product1 large">
                                            <div class="box">
                                                <div class="b1">
                                                    <div class="b2">
                                                        <a href="product-detail.html"><img
                                                                    src="http://placehold.it/275x290"
                                                                    alt="image description"></a>
                                                        <span class="caption">
																	<span class="off">15% Off</span>
																</span>
                                                        <ul class="mt-stars">
                                                            <li><i class="fa fa-star"></i></li>
                                                            <li><i class="fa fa-star"></i></li>
                                                            <li><i class="fa fa-star"></i></li>
                                                            <li><i class="fa fa-star-o"></i></li>
                                                        </ul>
                                                        <ul class="links">
                                                            <li><a href="#"><i class="icon-handbag"></i><span>Add to Cart</span></a>
                                                            </li>
                                                            <li><a href="#"><i
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
                                                <strong class="title"><a href="product-detail.html">Chair with
                                                        armrests</a></strong>
                                                <span class="price"><i
                                                            class="fa fa-eur"></i> <span>200,00</span></span>
                                            </div>
                                        </div><!-- mt product1 center end here -->
                                    </div>
                                    <!-- slide end here -->
                                    <!-- slide start here -->
                                    <div class="slide">
                                        <!-- mt product1 large start here -->
                                        <div class="mt-product1 large">
                                            <div class="box">
                                                <div class="b1">
                                                    <div class="b2">
                                                        <a href="product-detail.html"><img
                                                                    src="http://placehold.it/275x290"
                                                                    alt="image description"></a>
                                                        <ul class="mt-stars">
                                                            <li><i class="fa fa-star"></i></li>
                                                            <li><i class="fa fa-star"></i></li>
                                                            <li><i class="fa fa-star"></i></li>
                                                            <li><i class="fa fa-star-o"></i></li>
                                                        </ul>
                                                        <ul class="links">
                                                            <li><a href="#"><i class="icon-handbag"></i><span>Add to Cart</span></a>
                                                            </li>
                                                            <li><a href="#"><i
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
                                                <strong class="title"><a href="product-detail.html">Bombi
                                                        Chair</a></strong>
                                                <span class="price"><i
                                                            class="fa fa-eur"></i> <span>399,00</span></span>
                                            </div>
                                        </div><!-- mt product1 center end here -->
                                    </div>
                                    <!-- slide end here -->
                                    <!-- slide start here -->
                                    <div class="slide">
                                        <!-- mt product1 large start here -->
                                        <div class="mt-product1 large">
                                            <div class="box">
                                                <div class="b1">
                                                    <div class="b2">
                                                        <a href="product-detail.html"><img
                                                                    src="http://placehold.it/275x290"
                                                                    alt="image description"></a>
                                                        <ul class="links">
                                                            <li><a href="#"><i class="icon-handbag"></i><span>Add to Cart</span></a>
                                                            </li>
                                                            <li><a href="#"><i
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
                                                <strong class="title"><a href="product-detail.html">Marvelous
                                                        Modern 3 Seater</a></strong>
                                                <span class="price"><i
                                                            class="fa fa-eur"></i> <span>599,00</span></span>
                                            </div>
                                        </div><!-- mt product1 center end here -->
                                    </div>
                                </div>
                                <!-- tabs slider end here -->
                            </div>
                            <div id="tab3">
                                <!-- tabs slider start here -->
                                <div class="tabs-sliderlg">
                                    <!-- slide start here -->
                                    <div class="slide">
                                        <!-- mt product1 large start here -->
                                        <div class="mt-product1 large">
                                            <div class="box">
                                                <div class="b1">
                                                    <div class="b2">
                                                        <a href="product-detail.html"><img
                                                                    src="http://placehold.it/275x290"
                                                                    alt="image description"></a>
                                                        <span class="caption">
																	<span class="off">15% Off</span>
																</span>
                                                        <ul class="mt-stars">
                                                            <li><i class="fa fa-star"></i></li>
                                                            <li><i class="fa fa-star"></i></li>
                                                            <li><i class="fa fa-star"></i></li>
                                                            <li><i class="fa fa-star-o"></i></li>
                                                        </ul>
                                                        <ul class="links">
                                                            <li><a href="#"><i class="icon-handbag"></i><span>Add to Cart</span></a>
                                                            </li>
                                                            <li><a href="#"><i
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
                                                <strong class="title"><a href="product-detail.html">Chair with
                                                        armrests</a></strong>
                                                <span class="price"><i
                                                            class="fa fa-eur"></i> <span>200,00</span></span>
                                            </div>
                                        </div><!-- mt product1 center end here -->
                                    </div>
                                    <!-- slide end here -->
                                    <!-- slide start here -->
                                    <div class="slide">
                                        <!-- mt product1 large start here -->
                                        <div class="mt-product1 large">
                                            <div class="box">
                                                <div class="b1">
                                                    <div class="b2">
                                                        <a href="product-detail.html"><img
                                                                    src="http://placehold.it/275x290"
                                                                    alt="image description"></a>
                                                        <ul class="mt-stars">
                                                            <li><i class="fa fa-star"></i></li>
                                                            <li><i class="fa fa-star"></i></li>
                                                            <li><i class="fa fa-star"></i></li>
                                                            <li><i class="fa fa-star-o"></i></li>
                                                        </ul>
                                                        <ul class="links">
                                                            <li><a href="#"><i class="icon-handbag"></i><span>Add to Cart</span></a>
                                                            </li>
                                                            <li><a href="#"><i
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
                                                <strong class="title"><a href="product-detail.html">Bombi
                                                        Chair</a></strong>
                                                <span class="price"><i
                                                            class="fa fa-eur"></i> <span>399,00</span></span>
                                            </div>
                                        </div><!-- mt product1 center end here -->
                                    </div>
                                    <!-- slide end here -->
                                    <!-- slide start here -->
                                    <div class="slide">
                                        <!-- mt product1 large start here -->
                                        <div class="mt-product1 large">
                                            <div class="box">
                                                <div class="b1">
                                                    <div class="b2">
                                                        <a href="product-detail.html"><img
                                                                    src="http://placehold.it/275x290"
                                                                    alt="image description"></a>
                                                        <ul class="links">
                                                            <li><a href="#"><i class="icon-handbag"></i><span>Add to Cart</span></a>
                                                            </li>
                                                            <li><a href="#"><i
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
                                                <strong class="title"><a href="product-detail.html">Marvelous
                                                        Modern 3 Seater</a></strong>
                                                <span class="price"><i
                                                            class="fa fa-eur"></i> <span>599,00</span></span>
                                            </div>
                                        </div><!-- mt product1 center end here -->
                                    </div>
                                    <!-- slide end here -->
                                    <!-- slide start here -->
                                    <div class="slide">
                                        <!-- mt product1 large start here -->
                                        <div class="mt-product1 large">
                                            <div class="box">
                                                <div class="b1">
                                                    <div class="b2">
                                                        <a href="product-detail.html"><img
                                                                    src="http://placehold.it/275x290"
                                                                    alt="image description"></a>
                                                        <ul class="mt-stars">
                                                            <li><i class="fa fa-star"></i></li>
                                                            <li><i class="fa fa-star"></i></li>
                                                            <li><i class="fa fa-star"></i></li>
                                                            <li><i class="fa fa-star-o"></i></li>
                                                        </ul>
                                                        <ul class="links">
                                                            <li><a href="#"><i class="icon-handbag"></i><span>Add to Cart</span></a>
                                                            </li>
                                                            <li><a href="#"><i
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
                                                <strong class="title"><a href="product-detail.html">Bombi
                                                        Chair</a></strong>
                                                <span class="price"><i
                                                            class="fa fa-eur"></i> <span>399,00</span></span>
                                            </div>
                                        </div><!-- mt product1 center end here -->
                                    </div>
                                    <!-- slide end here -->
                                    <!-- slide start here -->
                                    <div class="slide">
                                        <!-- mt product1 large start here -->
                                        <div class="mt-product1 large">
                                            <div class="box">
                                                <div class="b1">
                                                    <div class="b2">
                                                        <a href="product-detail.html"><img
                                                                    src="http://placehold.it/275x290"
                                                                    alt="image description"></a>
                                                        <ul class="links">
                                                            <li><a href="#"><i class="icon-handbag"></i><span>Add to Cart</span></a>
                                                            </li>
                                                            <li><a href="#"><i
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
                                                <strong class="title"><a href="product-detail.html">Marvelous
                                                        Modern 3 Seater</a></strong>
                                                <span class="price"><i
                                                            class="fa fa-eur"></i> <span>599,00</span></span>
                                            </div>
                                        </div><!-- mt product1 center end here -->
                                    </div>
                                </div>
                                <!-- tabs slider end here -->
                            </div>
                        </div>
                    </div>
                    <div class="mt-producttabs style3 wow fadeInUp" data-wow-delay="0.4s">
                        <h2 class="heading">Популярные</h2>
                        <div class="tabs-slider">
                            @foreach($products as $product)
                                <div class="slide">
                                    <div class="mt-product1">
                                        <div class="box">
                                            <div class="b1">
                                                <div class="b2">
                                                    <a href="product-detail.html">
                                                        <div style="background-position: center; background-size: cover; width: 215px; height: 215px; background-image: url('{{$product->product_image}}')">

                                                        </div>
                                                    </a>
                                                    <span class="caption">
															<span class="new">new</span>
														</span>
                                                    <ul class="mt-stars">
                                                        <li><i class="fa fa-star"></i></li>
                                                        <li><i class="fa fa-star"></i></li>
                                                        <li><i class="fa fa-star"></i></li>
                                                        <li><i class="fa fa-star-o"></i></li>
                                                    </ul>
                                                    <ul class="links">
                                                        <li><a href="#"><i
                                                                        class="icon-handbag"></i><span>Добавить</span></a>
                                                        </li>
                                                        <li><a href="#"><i class="icomoon icon-heart-empty"></i></a>
                                                        </li>
                                                        <li><a href="#"><i class="icomoon icon-exchange"></i></a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="txt">
                                            <strong class="title"><a
                                                        href="product-detail.html">{{$product->product_name}}</a></strong>
                                            <span class="price"><i
                                                        class="fa fa-dollar"></i> <span>{{$product->product_price}}</span> 	({{$product->product_price * (\App\Models\Currency::where(['currency_id' => 1])->first())->money}} &#8376;)</span>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="mt-patners wow fadeInUp" data-wow-delay="0.4s">
                        <h2 class="heading">Линейка <span>продукции</span></h2>
                        <div class="patner-slider">
                            <div class="slide">
                                <div class="box1">
                                    <div class="box2"><a href="#"><img src="/new_design/images/logo/img01.jpg"
                                                                       alt="img"></a></div>
                                </div>
                            </div>
                            <div class="slide">
                                <div class="box1">
                                    <div class="box2"><a href="#"><img src="/new_design/images/logo/img02.jpg"
                                                                       alt="img"></a></div>
                                </div>
                            </div>
                            <div class="slide">
                                <div class="box1">
                                    <div class="box2"><a href="#"><img src="/new_design/images/logo/img03.jpg"
                                                                       alt="img"></a></div>
                                </div>
                            </div>
                            <div class="slide">
                                <div class="box1">
                                    <div class="box2"><a href="#"><img src="/new_design/images/logo/img04.jpg"
                                                                       alt="img"></a></div>
                                </div>
                            </div>
                            <div class="slide">
                                <div class="box1">
                                    <div class="box2"><a href="#"><img src="/new_design/images/logo/img05.jpg"
                                                                       alt="img"></a></div>
                                </div>
                            </div>
                            <div class="slide">
                                <div class="box1">
                                    <div class="box2"><a href="#"><img src="/new_design/images/logo/img06.jpg"
                                                                       alt="img"></a></div>
                                </div>
                            </div>
                            <div class="slide">
                                <div class="box1">
                                    <div class="box2"><a href="#"><img src="/new_design/images/logo/img02.jpg"
                                                                       alt="img"></a></div>
                                </div>
                            </div>
                            <div class="slide">
                                <div class="box1">
                                    <div class="box2"><a href="#"><img src="/new_design/images/logo/img03.jpg"
                                                                       alt="img"></a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="banner-frame nospace wow fadeInUp" data-wow-delay="0.4s">
                        <div class="banner-9">
                            <img src="http://placehold.it/400x210" alt="image description">
                            <div class="holder">
                                <h2><span>Wall Decor</span><strong>CLOCKs</strong></h2>
                                <a class="btn-shop" href="product-detail.html">
                                    <span>VIEW</span>
                                    <i class="fa fa-angle-right"></i>
                                </a>
                            </div>
                        </div>
                        <div class="banner-10">
                            <img src="http://placehold.it/400x210" alt="image description">
                            <div class="holder">
                                <h2><span>Coffee Tables</span><strong>S.O.S. BLOCKS</strong></h2>
                                <a class="btn-shop" href="product-detail.html">
                                    <span>VIEW</span>
                                    <i class="fa fa-angle-right"></i>
                                </a>
                            </div>
                        </div>
                        <div class="banner-11">
                            <img src="http://placehold.it/400x210" alt="image description">
                            <div class="holder">
                                <h2><span>Floor Lamps</span><strong>ROCKING LAMP</strong></h2>
                                <a class="btn-shop" href="product-detail.html">
                                    <span>VIEW</span>
                                    <i class="fa fa-angle-right"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="mt-producttabs style4 wow fadeInUp" data-wow-delay="0.4s">
                        <h2 class="heading">МЫ В INSTAGRAM</h2>
                        <div class="tab-content">
                            <div id="tab1">
                                <!-- tabs slider start here -->
                                <div class="tabs-sliderlg">
                                    <!-- slide start here -->
                                    <div class="slide">
                                        <!-- mt product1 large start here -->
                                        <div class="mt-product1 large">
                                            <div class="box">
                                                <div class="b1">
                                                    <div class="b2">
                                                        <a href="product-detail.html"><img
                                                                    src="http://placehold.it/275x290"
                                                                    alt="image description"></a>
                                                        <ul class="mt-stars">
                                                            <li><i class="fa fa-star"></i></li>
                                                            <li><i class="fa fa-star"></i></li>
                                                            <li><i class="fa fa-star"></i></li>
                                                            <li><i class="fa fa-star-o"></i></li>
                                                        </ul>
                                                        <ul class="links">
                                                            <li><a href="#"><i class="icon-handbag"></i><span>Add to Cart</span></a>
                                                            </li>
                                                            <li><a href="#"><i
                                                                            class="icomoon icon-heart-empty"></i></a>
                                                            </li>
                                                            <li><a href="#"><i
                                                                            class="icomoon icon-exchange"></i></a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div><!-- mt product1 center end here -->
                                    </div>
                                    <!-- slide end here -->
                                    <!-- slide start here -->
                                    <div class="slide">
                                        <!-- mt product1 large start here -->
                                        <div class="mt-product1 large">
                                            <div class="box">
                                                <div class="b1">
                                                    <div class="b2">
                                                        <a href="product-detail.html"><img
                                                                    src="http://placehold.it/275x290"
                                                                    alt="image description"></a>
                                                        <ul class="links">
                                                            <li><a href="#"><i class="icon-handbag"></i><span>Add to Cart</span></a>
                                                            </li>
                                                            <li><a href="#"><i
                                                                            class="icomoon icon-heart-empty"></i></a>
                                                            </li>
                                                            <li><a href="#"><i
                                                                            class="icomoon icon-exchange"></i></a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div><!-- mt product1 center end here -->
                                    </div>
                                    <!-- slide end here -->
                                    <!-- slide start here -->
                                    <div class="slide">
                                        <!-- mt product1 large start here -->
                                        <div class="mt-product1 large">
                                            <div class="box">
                                                <div class="b1">
                                                    <div class="b2">
                                                        <a href="product-detail.html"><img
                                                                    src="http://placehold.it/275x290"
                                                                    alt="image description"></a>
                                                        <span class="caption">
																	<span class="off">15% Off</span>
																</span>
                                                        <ul class="mt-stars">
                                                            <li><i class="fa fa-star"></i></li>
                                                            <li><i class="fa fa-star"></i></li>
                                                            <li><i class="fa fa-star"></i></li>
                                                            <li><i class="fa fa-star-o"></i></li>
                                                        </ul>
                                                        <ul class="links">
                                                            <li><a href="#"><i class="icon-handbag"></i><span>Add to Cart</span></a>
                                                            </li>
                                                            <li><a href="#"><i
                                                                            class="icomoon icon-heart-empty"></i></a>
                                                            </li>
                                                            <li><a href="#"><i
                                                                            class="icomoon icon-exchange"></i></a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div><!-- mt product1 center end here -->
                                    </div>
                                    <!-- slide end here -->
                                    <!-- slide start here -->
                                    <div class="slide">
                                        <!-- mt product1 large start here -->
                                        <div class="mt-product1 large">
                                            <div class="box">
                                                <div class="b1">
                                                    <div class="b2">
                                                        <a href="product-detail.html"><img
                                                                    src="http://placehold.it/275x290"
                                                                    alt="image description"></a>
                                                        <ul class="mt-stars">
                                                            <li><i class="fa fa-star"></i></li>
                                                            <li><i class="fa fa-star"></i></li>
                                                            <li><i class="fa fa-star"></i></li>
                                                            <li><i class="fa fa-star-o"></i></li>
                                                        </ul>
                                                        <ul class="links">
                                                            <li><a href="#"><i class="icon-handbag"></i><span>Add to Cart</span></a>
                                                            </li>
                                                            <li><a href="#"><i
                                                                            class="icomoon icon-heart-empty"></i></a>
                                                            </li>
                                                            <li><a href="#"><i
                                                                            class="icomoon icon-exchange"></i></a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div><!-- mt product1 center end here -->
                                    </div>
                                    <!-- slide end here -->
                                    <!-- slide start here -->
                                    <div class="slide">
                                        <!-- mt product1 large start here -->
                                        <div class="mt-product1 large">
                                            <div class="box">
                                                <div class="b1">
                                                    <div class="b2">
                                                        <a href="product-detail.html"><img
                                                                    src="http://placehold.it/275x290"
                                                                    alt="image description"></a>
                                                        <ul class="links">
                                                            <li><a href="#"><i class="icon-handbag"></i><span>Add to Cart</span></a>
                                                            </li>
                                                            <li><a href="#"><i
                                                                            class="icomoon icon-heart-empty"></i></a>
                                                            </li>
                                                            <li><a href="#"><i
                                                                            class="icomoon icon-exchange"></i></a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div><!-- mt product1 center end here -->
                                    </div>
                                </div>
                                <!-- tabs slider end here -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

@endsection