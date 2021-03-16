@extends('design_index.layout.layout')

@section('meta-tags')
    <link rel="stylesheet" href="/new_design/css/opportunity-responsive.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <title>Qpartners</title>
    <meta name="description"
          content="«Qpartners» - это уникальный медиа проект с широким набором возожностей для взаймодествия с участниками виртуального рынка"/>
    <meta name="keywords" content="Qpartners"/>

@endsection
<div id="myModal" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog"
     aria-labelledby="myLargeModalLabel">
    <div class="modal-dialog modal-lg">
        <div class="modal-content" style="height:700px; width:100%;padding-top: 50px;">
            <iframe id="myFrame" style="width: 100%; height: 100%;"
                    frameborder="0" allowfullscreen="true" webkitallowfullscreen="true" mozallowfullscreen="true">
            </iframe>
        </div>
    </div>
</div>
@section('content')

    <main id="mt-main">
        <section class="mt-mainslider4 add" style="
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            background-image: url('/new_design/images/NewResource/big.png');
            margin-left: auto;
            margin-right: auto;
            position: relative;
        ">
            <div class="text-center" style="font-size: 24px;color: #fff;font-family: 'Montserrat';font-weight: bolder;">
                <p class="gap" style="">G A P</p>
                <p class="gap-small" style="position: absolute;top: 50%;font-size: 24px;color: #fff;font-family: 'Montserrat';font-weight: bolder;right: 20%;">Global Asar Project</p>
                <p class="gap-text" style="">ПОСТРОИМ ЯРКОЕ БУДУЩЕЕ ВМЕСТЕ!</p>
            </div>
        </section>
        <section class="mt-section-1">
            <div class="container" style="margin-top: 0;padding:50px 0;">
                <div class="row row-1 text-center">
                    <div class="col-sm-12 col-md-4  col-lg-4 col-xl-4 col-xs-12" style="margin-bottom:15px;">

                        <div class="packet-body">
                            <div class="my-img-circle text-center" style="padding: 0 60px;">
                                <img class="rounded-circle " src="/new_design/images/NewResource/2.png"  alt="">
                            </div>
                            <p style="font-family:'Montserrat';font-size:20px;color:#000;margin:0;">Жилищная программа</p>
                            <div class="packet-name text-center">
                                BASPANA
                            </div>
                            <a style="background: #ff0000;color: #ffffff;border-radius:5px;font-size:18px;width:240px;padding: 5px 40px;" class="about-button">ПОДРОБНЕЕ</a>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4 col-xs-12" style="margin-bottom:15px;">

                        <div class="packet-body">
                            <div class=" text-center" style="padding: 0 60px;">
                                <img class="rounded-circle" src="/new_design/images/NewResource/3.png" alt="">
                            </div>
                            <p style="font-family:'Montserrat';font-size:20px;color:#000;margin:0;">Автопрограмма</p>
                            <div class="packet-name text-center">
                                TULPAR
                            </div>
                            <a style="background: #ff0000;color: #ffffff;border-radius:5px;font-size:18px;width:240px;padding: 5px 40px;" class="about-button">ПОДРОБНЕЕ</a>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4 col-xs-12" style="margin-bottom:15px;">

                        <div class="packet-body">
                            <div class=" text-center" style="padding: 0 60px;">
                                <img class="rounded-circle" src="/new_design/images/NewResource/4.png" alt="">
                            </div>
                            <p style="font-family:'Montserrat';font-size:20px;color:#000;margin:0;">Партнерская программа</p>
                            <div class="packet-name text-center">
                                ACTIV
                            </div>
                            <a style="background: #ff0000;color: #ffffff;border-radius:5px;font-size:18px;width:240px;padding: 5px 40px;" class="about-button">ПОДРОБНЕЕ</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="mt-section-2">
            <div class="container" style="margin-top: 0;padding-top: 70px;">
                <div class="row row-1 text-center" style="align-items:center;">
                    <div class="col-sm-12 col-md-6 col-lg-4 col-lg-offset-2 col-xl-3 col-xs-12" style="text-align:left;">
                        <h2 style="font-family: 'adineue PRO KZ Bold';font-size: xxx-large;color: #000;margin-bottom:0px;">СУММА ЗАЙМА</h2>
                        <h2 style="font-family: 'adineue PRO KZ Bold';font-size: xxx-large;color: #000;margin-top:0px;"> ДО <span style="color:#f00;"> 9 000 000 </span>  тг.</h2>
                        <h5 style="font-family: 'Montserrat';font-size:large;color: #000;text-align:left; margin:28px 0px 18px 0px;">Мы предлагаем уникальные программы по приобретению жилья автомобилья в рассрочку.</h5>
                        <h5 style="font-family: 'Montserrat';font-size:large;color: #000;text-align:left;">Данная программа не имеет аналогов на рынке.</h5>
                        <div style="margin:20px 0 20px 0">
                            <a class="download-marketing" href="/presentation/Презент Актив.pdf" target="_blank">
                                СКАЧАТЬ ПРОГРАММУ
                                <span>PDF</span>
                            </a>
                        </div>
                        <a class="download-marketing" href="https://youtu.be/cbMPm_caz3c" target="_blank">
                            ПОСМОТРЕТЬ
                            <span>MP4</span>
                        </a>

                    </div>
                    <div class="col-sm-12 col-md-6 col-lg-4 col-xl-3 col-xs-12">
                        <div class=" text-center">
                            <img class="rounded-circle" src="/new_design/images/NewResource/5.png" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="mt-section-1">
            <div class="container" style="margin-top: 0;padding:75px 0;">
                <h1 style="font-family: 'adineue PRO KZ Bold';font-size:x-large;color: #000;padding-bottom:20px;"><span style="color:#f00;">ПРЕМУЩЕСТВА</span> СОЦИАЛЬНОЙ ПРОГРАММЫ?</h1>
                <div class="row row-1 text-center">
                    <div class="col-sm-12 col-md-6  col-lg-3 col-xl-3 col-xs-12">

                        <div class="packet-body">
                            <div class="my-img-circle text-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="rubicons wallet" width="104" height="104" viewBox="0 0 24 24" stroke="red" stroke-width="1.5" fill="none">
                                    <path d="M3 7.5V19c0 1.1046.8954 2 2 2h16V9H4.5C3.6716 9 3 8.3284 3 7.5zm0 0C3 6.6716 3.6716 6 4.5 6H11M5 9l12-6 3 6" stroke-linecap="round"></path>
                                    <path d="M21 15h-4" stroke-linecap="round" stroke-dasharray="0.01 3"></path>
                                </svg>
                            </div>
                            <p style="font-family:'Montserrat';font-size:18px;color:#000;margin:0;">ОТСУТСТВИЕ ПЕРЕПЛАТ</p>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-6 col-lg-3 col-xl-3 col-xs-12">

                        <div class="packet-body">
                            <div class=" text-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="rubicons percent" width="104" height="104" viewBox="0 0 24 24" stroke="red" stroke-width="1.5" fill="none">
                                    <path d="M7 11c1.6569 0 3-1.567 3-3.5S8.6569 4 7 4 4 5.567 4 7.5 5.3431 11 7 11zM17 20c1.6569 0 3-1.567 3-3.5S18.6569 13 17 13s-3 1.567-3 3.5 1.3431 3.5 3 3.5zM7 20L17 4" stroke-linecap="round"></path>
                                </svg>
                            </div>
                            <p style="font-family:'Montserrat';font-size:18px;color:#000;margin:0;">БЕЗ ПРОЦЕНТОВ</p>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-6 col-lg-3 col-xl-3 col-xs-12">

                        <div class="packet-body">
                            <div class=" text-center">
                                <svg fill="none" class="rubicons clipboard-check" xmlns="http://www.w3.org/2000/svg" width="104" height="104"" viewBox="0 0 24 24" stroke="red" stroke-width="1.5">
                                <path d="M9.667 13.389l1.5 1.5L15 10.667" stroke-linecap="round"></path>
                                <path d="M15.625 4H19v17H5V4h3.375" stroke-linecap="round"></path>
                                <path d="M15 3H9v3h6V3z" stroke-linecap="round"></path>
                                </svg>
                            </div>
                            <p style="font-family:'Montserrat';font-size:18px;color:#000;margin:0;">БЕЗ ПОДТВЕРЖДЕНИЕ ДОХОДА</p>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-6 col-lg-3 col-xl-3 col-xs-12" style="margin-top:0!important;">

                        <div class="packet-body">
                            <div class=" text-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="rubicons stopwatch" width="104" height="104" viewBox="0 0 24 24" stroke="red" stroke-width="1.5" fill="none">
                                    <circle cx="12" cy="13" r="8"></circle>
                                    <path d="M15.5 9.5L12 13.2857M13 3h-2M17 6.5l1-1M7 6.5l-1-1" stroke-linecap="round"></path>
                                </svg>
                            </div>
                            <p style="font-family:'Montserrat';font-size:18px;color:#000;margin:0;">БЫСТРОЕ ПОЛУЧЕНИЕ ЗАЙМА</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="mt-section-2">
            <div class="container" style="margin-top: 0;padding:75px 0;">
                <div class="row row-1 text-center">
                    <div class="table-responsive">
                        <div class="col-lg-12 row">
                            <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-xs-12">
                                <div class="packet-body">
                                    <h1 style="font-family: 'adineue PRO KZ Bold';font-size:x-large;color: #000;"><span style="color:#f00;">СОЦИАЛЬНЫЕ</span> ПАКЕТЫ</h1>
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-xs-12">
                                <p class="bold-tx pt-80"> Инструмент </p>
                            </div>
                            <div class="col-xl-2 col-lg-2 col-md-12 col-sm-12 col-xs-12">
                                <p class="bold-tx pt-80">  Продукция </p>
                            </div>
                            <div class="col-xl-2 col-lg-2 col-md-12 col-sm-12 col-xs-12">
                                <p class="bold-tx pt-80">  Ур.дохода </p>
                            </div>
                            <div class="col-xl-2 col-lg-2 col-md-12 col-sm-12 col-xs-12">
                                <p class="bold-tx pt-80">  Макс.доход </p>
                            </div>
                        </div>

                        <div class="col-lg-12 row main-tx">
                            <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-xs-12">
                                <div class="packet-body">
                                    <div class="my-img-circle text-center">
                                        <img style="padding: 30px;" class="rounded-circle" src="/new_design/images/NewResource/6.png" alt="">
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-xs-12">
                                <p class="pt-80"> Маркетинг план каталог продукций </p>
                            </div>
                            <div class="col-xl-2 col-lg-2 col-md-12 col-sm-12 col-xs-12">
                                <p class="pt-80"> 6 штук </p>
                            </div>
                            <div class="col-xl-2 col-lg-2 col-md-12 col-sm-12 col-xs-12">
                                <p class="pt-80">  по маркетинг программе </p>
                            </div>
                            <div class="col-xl-2 col-lg-2 col-md-12 col-sm-12 col-xs-12">
                                <p class="pt-80">  1 180 000 тг. </p>
                            </div>
                            <div class="col-lg-12">
                                <a href="product-detail.html" class="btn-shop">
                                    <span style="color:#fff!important;background:#30adfa; border-radius:10px; padding:3px 40px;font-weight:300;font-family: 'adineue PRO KZ Bold';float:right;">купить пакет</span>
                                </a>
                            </div>
                        </div>

                        <div class="col-lg-12 row main-tx">
                            <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-xs-12">
                                <div class="packet-body">
                                    <div class="my-img-circle text-center">
                                        <img style="padding: 30px;" class="rounded-circle" src="/new_design/images/NewResource/7.png" alt="">
                                    </div>
                                </div>
                            </div>
                            <div style="" class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-xs-12">
                                <p class="pt-80"> Маркетинг план каталог продукций </p>
                            </div>
                            <div class="col-xl-2 col-lg-2 col-md-12 col-sm-12 col-xs-12">
                                <p class="pt-80"> 12 штук </p>
                            </div>
                            <div class="col-xl-2 col-lg-2 col-md-12 col-sm-12 col-xs-12">
                                <p class="pt-80">  по маркетинг программе </p>
                            </div>
                            <div class="col-xl-2 col-lg-2 col-md-12 col-sm-12 col-xs-12">
                                <p class="pt-80">  4 180 000 тг. </p>
                            </div>
                            <div class="col-lg-12">
                                <a href="product-detail.html" class="btn-shop">
                                    <span style="color:#fff!important;background:#fa7028; border-radius:10px; padding:3px 40px;font-weight:300;font-family: 'adineue PRO KZ Bold';float:right;">купить пакет</span>
                                </a>
                            </div>
                        </div>

                        <div class="col-lg-12 row main-tx">
                            <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-xs-12">
                                <div class="packet-body">
                                    <div class="my-img-circle text-center">
                                        <img style="padding: 30px;" class="rounded-circle" src="/new_design/images/NewResource/8.png" alt="">
                                    </div>
                                </div>
                            </div>
                            <div style="" class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-xs-12">
                                <p class="pt-80"> Маркетинг план каталог продукций </p>
                            </div>
                            <div class="col-xl-2 col-lg-2 col-md-12 col-sm-12 col-xs-12">
                                <p class="pt-80"> 12 штук + 9 штук </p>
                            </div>
                            <div class="col-xl-2 col-lg-2 col-md-12 col-sm-12 col-xs-12">
                                <p class="pt-80">  по маркетинг программе </p>
                            </div>
                            <div class="col-xl-2 col-lg-2 col-md-12 col-sm-12 col-xs-12">
                                <p class="pt-80">  13 180 000 тг. </p>
                            </div>
                            <div class="col-lg-12">
                                <a href="product-detail.html" class="btn-shop">
                                    <span style="color:#fff!important;background:#7823f8; border-radius:10px; padding:3px 40px;font-weight:300;font-family: 'adineue PRO KZ Bold';float:right;">купить пакет</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="row" style="padding-bottom: 25px;">
            <div class="container">
                <div class="why-we-are-text" style="padding-top:40px;">
                    <h3>ВРУЧЕНИЕ<span style="color: #ff0000;"> ЖИЛЬЯ И АВТОМОБИЛЕЙ </span>УЧАСТНИКАМ</h3>
                </div>
                <div class="col-xs-12">
                    <div class="mt-productsc style2 wow fadeInUp" data-wow-delay="0.4s">
                        <div id="mt-productscrollbar" class="row video_scollar">
                            <div class="mt-holder">
                                <div class="mt-product1 large">
                                    <div class="box">
                                        <div style="
                                             width: 350px;
                                             height: 200px;
                                             position: relative;
                                             background-color: black;
                                             display: flex;
                                             align-items: center;
                                             justify-content: center;
                                             background-image: url('/new_design/images/video/marat_and_woman.jpg');
                                             background-position: center;
                                             background-size: cover;
                                             background-repeat: no-repeat;
                                        ">
                                            <a href="">
                                                <div data-youtube-url="vf6sX0K4w6E" style="cursor: pointer;"
                                                     class="red_play_button"
                                                     onclick="openModal(this)">
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="txt text-center" style="margin-top: 30px">
                                        <strong class="mini_video_title" style="">
                                            Вручение автомобиля <br>
                                            партнеру
                                        </strong>
                                    </div>
                                </div>
                                <div class="mt-product1 large">
                                    <div class="box">
                                        <div style="
                                             width: 350px;
                                             height: 200px;
                                             position: relative;
                                             background-color: black;
                                             display: flex;
                                             align-items: center;
                                             justify-content: center;
                                              background-image: url('/new_design/images/video/two_womans.jpg');
                                             background-position: center;
                                             background-size: cover;
                                             background-repeat: no-repeat;
                                        ">
                                            <a href="">
                                                <div data-youtube-url="X8YFOThoC9k" style="cursor: pointer;"
                                                     class="red_play_button"
                                                     onclick="openModal(this)">
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="txt text-center" style="margin-top: 30px">
                                        <strong class="mini_video_title" style="">
                                            Вручение автомобиля <br>
                                            партнеру
                                        </strong>
                                    </div>
                                </div>
                                <div class="mt-product1 large">
                                    <div class="box">
                                        <div style="
                                             width: 350px;
                                             height: 200px;
                                             position: relative;
                                             background-color: black;
                                             display: flex;
                                             align-items: center;
                                             justify-content: center;
                                             background-image: url('/new_design/images/video/mans_and_girls.jpg');
                                             background-position: center;
                                             background-size: cover;
                                             background-repeat: no-repeat;
                                        ">
                                            <a href="">
                                                <div data-youtube-url="cBh56bfkwb0" style="cursor: pointer;"
                                                     class="red_play_button"
                                                     onclick="openModal(this)">
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="txt text-center" style="margin-top: 30px">
                                        <strong class="mini_video_title" style="">
                                            Вручение автомобиля <br>
                                            партнеру
                                        </strong>
                                    </div>
                                </div>
                                <div class="mt-product1 large">
                                    <div class="box">
                                        <div style="
                                             width: 350px;
                                             height: 200px;
                                             position: relative;
                                             background-color: black;
                                             display: flex;
                                             align-items: center;
                                             justify-content: center;
                                             background-image: url('/new_design/images/video/car_with_bubble.jpg');
                                             background-position: center;
                                             background-size: cover;
                                             background-repeat: no-repeat;
                                        ">
                                            <a href="">
                                                <div data-youtube-url="5gJmiQKZoTg" style="cursor: pointer;"
                                                     class="red_play_button"
                                                     onclick="openModal(this)">
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="txt text-center" style="margin-top: 30px">
                                        <strong class="mini_video_title" style="">
                                            Вручение автомобиля <br>
                                            партнеру
                                        </strong>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="slider-5" style="background: transparent !important;padding-bottom: 100px;">
            <div class="container">
                <div class="row">
                    <div class="col-sm-4 text-center">
                        <h3 class="time-text">GLOBAL ASAR PROJECT</h3>
                        <article>
                            <div class="mid clearfix">
                                <div id="counter">
                                    <div data-num="110" class="number">110</div>
                                    <div class="text-st">УЧАСТНИКОВ <span style="color: #ff0000;"> СОЦИАЛЬНОЙ ПРОГРАММЫ</span></div>
                                </div>
                            </div>
                        </article>
                    </div>
                    <div class="col-sm-4 text-center">
                        <h3 class="time-text">BASPANA</h3>
                        <article>
                            <div class="mid clearfix">
                                <div id="counter">
                                    <div data-num="57" class="number">57</div>
                                    <div class="text-st">УЧАСТНИКАМ<span style="color: #ff0000;"> ВЫДАНО ЖИЛЬЕ</span></div>
                                </div>
                            </div>
                        </article>
                    </div>
                    <div class="col-sm-4 text-center">
                        <h3 class="time-text">TULPAR</h3>
                        <article>
                            <div class="mid clearfix">
                                <div id="counter">
                                    <div data-num="25" class="number">25</div>
                                    <div class="text-st">УЧАСТНИКАМ<span style="color: #ff0000;"> ВЫДАН АВТОМОБИЛЬ</span></div>
                                </div>
                            </div>
                        </article>
                    </div>
                    <div class="col-sm-6 text-center">
                        <a href="/register" class="want-to-be-partner-box-a">
                            <div class="want-to-be-partner-box text-center">
                                СТАТЬ УЧАСТНИКОМ
                            </div>
                        </a>
                    </div>
                    <div class="col-sm-6 text-center">
                        <a href="/register" class="want-to-be-partner-box-a">
                            <div class="want-to-be-partner-box text-center">
                                ПОДЕЛИТЬСЯ
                            </div>
                        </a>
                    </div>
                </div>
            </div>


            </div>
        </section>
        <section class="" style="background: rgba(232, 232, 232, 0.5); padding-top: 50px; padding-bottom: 50px;">
            <div class="container">
                <div class="col-xs-12" style="padding-bottom: 30px;">
                    <h2 class="have-a-question">Остались вопросы?</h2>
                    <span class="have-a-question-span">Напишите в любое время! </span>
                    {{Form::open(['action' => ['Index\FaqController@opportunityFaqStore'], 'method' => 'POST', 'class'=> 'contact-form' ])}}
                    {{Form::token()}}
                    <fieldset class="have-a-question-fieldset">
                        <input type="text" required name="user_name" class="form-control" placeholder="Имя">
                        <input type="email" required name="user_email" class="form-control" placeholder="E-Mail">
                        <input type="text" required name="user_phone" class="form-control" placeholder="Номер телефона">
                        <textarea rows="10" class="form-control" name="question"
                                  placeholder="Текст ..."></textarea>
                        <button type="submit" class="have-a-question-button">
                            Отправить
                        </button>
                    </fieldset>
                    {{Form::close()}}
                </div>
            </div>
        </section>

        <div class="modal fade bs-example-modal-lg" id="share_modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                    aria-hidden="true">&times;</span></button>
                        <div class="title-group"
                             style="margin-left: 20px; font-size: 120%; color: black; font-weight: 400;">
                            <h4 class="modal-title">Пригласить друга</h4>
                            <h5 class="modal-title">Вы можете поделиться со своими друзьями в социальной сети</h5>
                            <h5 class="modal-title">http://local.qpartners.club/1/admin</h5>
                        </div>
                    </div>
                    <div class="modal-body">
                        <ul style="list-style: none;">
                            <li>
                                <a href="https://api.whatsapp.com/send?text={{$url}}" style="
                                padding:5px 10px 5px 10px;
                                border: 2px solid lightgreen;
                                border-radius: 3px;
                                font-size: 130%;
                                ">
                                    <i style="font-weight: 500;color: lightgreen;" class="fa fa-whatsapp"></i>
                                    <span style="font-weight: 500;color: black;margin-left: 1rem;">Поделиться через Whatsapp</span>
                                </a>

                            </li>
                            <li style="margin-top: 15px;">
                                <a href="https://telegram.me/share/url?url={{$url}}" style="
                                padding:5px 10px 5px 10px;
                                border: 2px solid dodgerblue;
                                border-radius: 3px;
                                font-size: 130%;
                                ">
                                    <i style="
                                    background-image: url('https://bitnovosti.com/wp-content/uploads/2017/02/telegram-icon-7.png');
                                    background-position: center;
                                    background-size: cover;
                                    width: 18px;height: 18px;
                                    bottom: -5px;
                                    "
                                       class="fa fa-telegram"
                                    >

                                    </i>
                                    <span style="font-weight: 500;color: black;margin-left: 1rem;">Поделиться через Telegram</span>
                                </a>

                            </li>
                            <li style="margin-top: 15px;">
                                <a href="https://www.facebook.com/sharer.php?u={{$url}}" style="
                                padding:5px 10px 5px 10px;
                                border: 2px solid dodgerblue;
                                border-radius: 3px;
                                font-size: 130%;
                                ">
                                    <i style="font-weight: 500;color: dodgerblue;" class="fa fa-facebook"></i>
                                    <span style="font-weight: 500;color: black;margin-left: 1rem;">Поделиться через Facebook</span>
                                </a>

                            </li>
                            <li style="margin-top: 15px;">
                                <a href="http://vk.com/share.php?url={{$url}}" style="
                                padding:5px 10px 5px 10px;
                                border: 2px solid dodgerblue;
                                border-radius: 3px;
                                font-size: 130%;
                                ">
                                    <i style="font-weight: 500;color: dodgerblue;" class="fa fa-vk"></i>
                                    <span style="font-weight: 500;color: black;margin-left: 1rem;">Поделиться через VK</span>
                                </a>

                            </li>
                            <li style="margin-top: 15px;">
                                <a href="https://twitter.com/share?url={{$url}}" style="
                                padding:5px 10px 5px 10px;
                                border: 2px solid dodgerblue;
                                border-radius: 3px;
                                font-size: 130%;
                                ">
                                    <i style="font-weight: 500;color: dodgerblue;" class="fa fa-twitter"></i>
                                    <span style="font-weight: 500;color: black;margin-left: 1rem;">Поделиться через Twiiter</span>
                                </a>

                            </li>
                        </ul>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Закрыть</button>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection

<style>
    #mCSB_1_dragger_horizontal {
        background: #ff0000 !important;
    }
</style>
@section('js')
    <script>
        function openModal(tag_object) {
            var videoIdInYouTube = $(tag_object).data('youtube-url');
            var url = ('https://www.youtube.com/embed/' + videoIdInYouTube);
            document.getElementById("myFrame").src = url;
            $('#myModal').modal('toggle');
        }
    </script>

    <script>
        var time = 2,
            cc = 1;
        $(window).scroll(function() {
            $('#counter').each(function() {
                var
                    cPos = $(this).offset().top,
                    topWindow = $(window).scrollTop();
                if (cPos < topWindow + 200) {
                    if (cc < 2) {
                        $(".number").addClass("viz");
                        $('div').each(function() {
                            var
                                i = 1,
                                num = $(this).data('num'),
                                step = 1000 * time / num,
                                that = $(this),
                                int = setInterval(function() {
                                    if (i <= num) {
                                        that.html(i);
                                    } else {
                                        cc = cc + 2;
                                        clearInterval(int);
                                    }
                                    i++;
                                }, step);
                        });
                    }
                }
            });
        });

    </script>
@endsection
