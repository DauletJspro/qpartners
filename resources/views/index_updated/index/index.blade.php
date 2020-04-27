@extends('index_updated.layout.layout')

@section('meta-tags')

    <title>Qpartners</title>
    <meta name="description"
          content="«Qpartners» - это уникальный медиа проект с широким набором возожностей для взаймодествия с участниками виртуального рынка"/>
    <meta name="keywords" content="Qpartners"/>

@endsection

@section('content')
    <main id="mt-main">
        <section class="slider-3">
            <div class="centerslider-1">
                <div class="holder">
                    <div class="img">
                        <img src="/update_design/images/carusel-image-3.jpg" alt="image description">
                    </div>
                    <div class="caption">
                        <div class="c1">
                            <div class="c2">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="holder">
                    <div class="img">
                        <img src="/update_design/images/carusel-image-2.jpeg" alt="image description">
                    </div>
                    <div class="caption">
                        <div class="c1">
                            <div class="c2">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="holder">
                    <div class="img">
                        <img src="/update_design/images/carusel-image-1.jpeg" alt="image description">
                    </div>
                    <div class="caption">
                        <div class="c1">
                            <div class="c2">

                            </div>
                        </div>
                    </div>
                </div>
                <div class="holder">
                    <div class="img">
                        <img src="/update_design/images/carusel-image-4.png" alt="image description">
                    </div>
                    <div class="caption">
                        <div class="c1">
                            <div class="c2">

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <div class="container-fluid text-center catalog-section" style="padding: 3rem 0 8rem 0;">
            <h1 class="font-weight-bold" style="color:rgba(145,26,18,1); font-size:4rem;">Наш каталог</h1>
            <div class="container">
                <div class="row" style="margin-top:5rem;">
                    <div class="col-12 col-sm-6 col-md-12 col-lg-12 col-xl-6 fancy-box">
                        <div class="fancy-cards col-12 col-sm-6 col-md-6 col-lg-6 col-xl-6">
                            <div class="fancy-card">
                                <div class="top">
                                    <div class="caption">
                                        <h3 class="title" style="font-weight:bold; font-size:3rem;">Super Gel</h3>
                                        <a href="" class="button">Посмотреть</a>
                                    </div>
                                </div>
                                <div class="middle"></div>
                                <div class="bottom"></div>
                            </div>
                        </div>
                        <div class="fancy-cards col-12 col-sm-6 col-md-6 col-lg-6 col-xl-6">
                            <div class="fancy-card">
                                <div class="top">
                                    <div class="caption">
                                        <h3 class="title" style="font-weight:bold; font-size:3rem;">Super Gel</h3>
                                        <a href="" class="button">Посмотреть</a>
                                    </div>
                                </div>
                                <div class="middle"></div>
                                <div class="bottom"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 col-md-12 col-lg-12 col-xl-6  fancy-box">
                        <div class="fancy-cards col-12 col-sm-6 col-md-6 col-lg-6 col-xl-6">
                            <div class="fancy-card">
                                <div class="top">
                                    <div class="caption">
                                        <h3 class="title" style="font-weight:bold; font-size:3rem;">Super Gel</h3>
                                        <a href="" class="button">Посмотреть</a>
                                    </div>
                                </div>
                                <div class="middle"></div>
                                <div class="bottom"></div>
                            </div>
                        </div>
                        <div class="fancy-cards col-12 col-sm-6 col-md-6 col-lg-6 col-xl-6">
                            <div class="fancy-card">
                                <div class="top">
                                    <div class="caption">
                                        <h3 class="title" style="font-weight:bold; font-size:3rem;">Super Gel</h3>
                                        <a href="" class="button">Посмотреть</a>
                                    </div>
                                </div>
                                <div class="middle"></div>
                                <div class="bottom"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid text-center catalog-section" style="padding: 3rem 0 3rem 0;">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="mt-producttabs style2 wow fadeInUp" data-wow-delay="0.6s">
                            <!-- producttabs start here -->
                            <ul class="producttabs">
                                <li><a href="#tab1" class="active">FEATURED</a></li>
                                <li><a href="#tab2">LATEST</a></li>
                                <li><a href="#tab3">BEST SELLER</a></li>
                            </ul>
                            <!-- producttabs end here -->
                            <div class="tab-content">
                                <div id="tab1">
                                    <!-- tabs slider start here -->
                                    <div class="tabs-sliderlg">
                                        <!-- slide start here -->

                                        @foreach($products as $product)
                                            <div class="slide">
                                                <!-- mt product start here -->
                                                <div class="product-3">
                                                    <!-- img start here -->
                                                    <div class="img">
                                                        @if($product->product_image)
                                                            <img alt="image description"
                                                                 src="{{$product->product_image}}">
                                                        @else
                                                            <img alt="image description"
                                                                 src="https://us.123rf.com/450wm/pavelstasevich/pavelstasevich1811/pavelstasevich181101065/112815953-stock-vector-no-image-available-icon-flat-vector.jpg?ver=6">
                                                        @endif
                                                    </div>
                                                    <!-- txt start here -->
                                                    <div class="txt">
                                                        <strong class="title">{{$product->product_name_ru }}</strong>
                                                        <span class="price"><i class="fa fa-dollar"></i> {{$product->product_price }}
                                                        &nbsp;({{ $product->product_price * (\App\Models\Currency::where(['currency_id' => 1])->first())->money }} 	&#8376;)</span>
                                                    </div>
                                                    <!-- color start here -->
                                                    <p>
                                                        {{$product->product_desc_ru}}
                                                    </p>
                                                    <!-- links start here -->
                                                    <ul class="links">
                                                        <li><a href="#"><i class="icon-handbag"></i></a></li>
                                                        <li><a href="#"><i class="icomoon icon-heart-empty"></i></a>
                                                        </li>
                                                        <li><a href="#"><i class="icomoon fa fa-eye"></i></a></li>
                                                    </ul>
                                                </div><!-- mt product 3 end here -->
                                            </div><!-- slide end here -->
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid text-center instagram-section" style="padding: 3rem 0 8rem 0;">
            <div class="col-12 text-center row">
                <div class="col-6 col-lg-offset-1">
                    <h1 style="font-family: 'Arial Black'; font-weight: bolder; color: white; font-size:350%;">МЫ В
                        INSTAGRAM</h1>
                    <div class="col-12">
                        <div class="col-lg-3">
                            <div class="fancy-box-instagram">
                                <div class="fancy-cards-instagram ">
                                    <div class="fancy-card-instagram">
                                        <div class="top">
                                            <div class="caption">
                                                <a href="" class="button">Посмотреть</a>
                                            </div>
                                        </div>
                                        <div class="middle"></div>
                                        <div class="bottom"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class=" fancy-box-instagram">
                                <div class="fancy-cards-instagram">
                                    <div class="fancy-card-instagram">
                                        <div class="top">
                                            <div class="caption">
                                                <a href="" class="button">Посмотреть</a>
                                            </div>
                                        </div>
                                        <div class="middle"></div>
                                        <div class="bottom"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class=" fancy-box-instagram">
                                <div class="fancy-cards-instagram ">
                                    <div class="fancy-card-instagram">
                                        <div class="top">
                                            <div class="caption">
                                                <a href="" class="button">Посмотреть</a>
                                            </div>
                                        </div>
                                        <div class="middle"></div>
                                        <div class="bottom"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class=" fancy-box-instagram">
                                <div class="fancy-cards-instagram">
                                    <div class="fancy-card-instagram">
                                        <div class="top">
                                            <div class="caption">
                                                <a href="" class="button">Посмотреть</a>
                                            </div>
                                        </div>
                                        <div class="middle"></div>
                                        <div class="bottom"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="col-lg-3">
                            <div class="fancy-box-instagram">
                                <div class="fancy-cards-instagram ">
                                    <div class="fancy-card-instagram">
                                        <div class="top">
                                            <div class="caption">
                                                <a href="" class="button">Посмотреть</a>
                                            </div>
                                        </div>
                                        <div class="middle"></div>
                                        <div class="bottom"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class=" fancy-box-instagram">
                                <div class="fancy-cards-instagram">
                                    <div class="fancy-card-instagram">
                                        <div class="top">
                                            <div class="caption">
                                                <a href="" class="button">Посмотреть</a>
                                            </div>
                                        </div>
                                        <div class="middle"></div>
                                        <div class="bottom"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class=" fancy-box-instagram">
                                <div class="fancy-cards">
                                    <div class="fancy-card-instagram">
                                        <div class="top">
                                            <div class="caption">
                                                <a href="" class="button">Посмотреть</a>
                                            </div>
                                        </div>
                                        <div class="middle"></div>
                                        <div class="bottom"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class=" fancy-box-instagram">
                                <div class="fancy-cards-instagram">
                                    <div class="fancy-card-instagram">
                                        <div class="top">
                                            <div class="caption">
                                                <a href="" class="button">Посмотреть</a>
                                            </div>
                                        </div>
                                        <div class="middle"></div>
                                        <div class="bottom"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-4">
                    <div class="col-12" style="width: 100%; height: 100%; padding: 92px 0 1px 0;">
                        <div class="col-12 text-center"
                             style="width: 100%; height: 100%; background-color: white; padding: 5rem 0 5rem 0;">
                            <h1 style="font-family: 'Arial Black'; font-weight: bolder;  color: black; font-size:230%;">
                                ПОДПИСЫВАЙСЯ</h1>
                            <h4 style="font-family: 'Arial';   color: black; ">Будь в курсе всего,
                                <br>
                                что у нас происходит.</h4>
                                <div class="row col-12"  style="padding: 5rem 0 0 0;">
                                    <div class="col-2 col-lg-offset-1" >
                                       <i style="font-size: 400%; color: black;" class="fa fa-facebook-square"></i>
                                    </div>
                                    <div class="col-2" >
                                        <i style="font-size: 400%; color: black;" class="fa fa-whatsapp"></i>
                                    </div>
                                    <div class="col-2" >
                                        <i style="font-size: 400%; color: black;" class="fa fa-instagram"></i>
                                    </div>
                                    <div class="col-2" >
                                        <i style="font-size: 400%; color: black;" class="fa fa-youtube"></i>
                                    </div>
                                    <div class="col-2">
                                        <i style="font-size: 400%; color: black;" class="fa fa-telegram"></i>
                                    </div>
                                </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>

    </main>
@endsection
<!-- footer of the Page end -->

<span id="back-top" class="fa fa-arrow-up"></span>

<style>
    .draggable {
        max-height: 450px;
    }

    #tab1 > div > .draggable {
        max-height: none;
    !important;
    }
</style>