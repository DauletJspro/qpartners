@extends('design_index.layout.layout')

@section('meta-tags')
    <link rel="stylesheet" href="/new_design/css/opportunity-responsive.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <title>Qpartners</title>
    <meta name="description"
          content="«Qpartners» - это уникальный медиа проект с широким набором возожностей для взаймодествия с участниками виртуального рынка"/>
    <meta name="keywords" content="Qpartners"/>
    <script src="/custom/js/jssor.slider-28.1.0.min.js" type="text/javascript"></script>
    <script type="text/javascript">
        window.jssor_1_slider_init = function() {

            var jssor_1_options = {
              $AutoPlay: 1,
              $SlideWidth: 720,
              $ArrowNavigatorOptions: {
                $Class: $JssorArrowNavigator$
              },
              $BulletNavigatorOptions: {
                $Class: $JssorBulletNavigator$,
                $SpacingX: 16,
                $SpacingY: 16
              }
            };

            var jssor_1_slider = new $JssorSlider$("jssor_1", jssor_1_options);

            /*#region responsive code begin*/

            var MAX_WIDTH = 980;

            function ScaleSlider() {
                var containerElement = jssor_1_slider.$Elmt.parentNode;
                var containerWidth = containerElement.clientWidth;

                if (containerWidth) {

                    var expectedWidth = Math.min(MAX_WIDTH || containerWidth, containerWidth);

                    jssor_1_slider.$ScaleWidth(expectedWidth);
                }
                else {
                    window.setTimeout(ScaleSlider, 30);
                }
            }

            ScaleSlider();

            $Jssor$.$AddEvent(window, "load", ScaleSlider);
            $Jssor$.$AddEvent(window, "resize", ScaleSlider);
            $Jssor$.$AddEvent(window, "orientationchange", ScaleSlider);
            /*#endregion responsive code end*/
        };
    </script>
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
            background-image: url('/new_design/images/Partner/1.png');
            margin-left: auto;
            margin-right: auto;
            position: relative;
        ">
             <div class="container">
                 <div class="row">
                     <div class="col-md-6" style="display:inline-block;">
                         <div style="position:absolute;padding-top: 18%;left:5%; min-height:320px;">
                         <iframe width="560" height="315" src="https://www.youtube.com/embed/YXdlHaZtQxw" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                          </div> 
                     </div>  
                     <div class="col-md-6" style="display:inline-block;">   
                         <div class="text-center" style="padding-top: 23%; width:320px; min-height:180px; margin:auto;">
                                <form method="POST" action="http://localhost/faq/opportunity-faq-store" accept-charset="UTF-8" class="contact-form"><input name="_token" type="hidden" value="AFgCPHMDQTZEDbRvBvIjtUXlCrIGlXWNiVVQVX32">
                                    <input name="_token" type="hidden" value="AFgCPHMDQTZEDbRvBvIjtUXlCrIGlXWNiVVQVX32">
                                    <fieldset class="have-a-question-fieldset">
                                        <input type="text" required="" name="user_name" class="form-control" placeholder="Имя">
                                        <input type="email" required="" name="user_email" class="form-control" placeholder="Фамилия">
                                        <input type="text" required="" name="user_phone" class="form-control" placeholder="Номер телефона">
                                        <button type="submit" class="float-left" style="padding:6px 36px; font-size:18px; background:#000;color:#fff; border:0;border-radius:5px;margin-top:10px;">
                                            Стать Партнером
                                        </button>
                                        <button href="#" style="padding:6px 30px; background:#000;color:#fff; font-size:18px; border:0;border-radius:5px;margin-top:10px;" class="float-right">
                                            Войти
                                        </button>
                                    </fieldset>
                                </form>
                         </div>
                      </div>
                 </div> 
             </div>         
        </section>
        <section class="mt-section-1">
            <div class="container" style="margin-top: 0;padding:50px 10px;">
                <div class="row row-1 text-center">
                        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6 col-xs-12" style="margin-bottom:15px;">
                        <p style="font-family:'Montserrat';font-size:18px;color:#000;margin:0;padding: 0 63px;"> ПОСТРОЙ СВОЙ БИЗНЕС С ДОХОДОМ БОЛЕЕ 44 000 000 ТЕНГЕ</p>
                            <div class="packet-body">
                                <div class="my-img-circle text-center" style="padding: 0 60px;">
                                <iframe width="470" height="315" src="https://www.youtube.com/embed/YXdlHaZtQxw" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                </div>
                            </div>
                            <div class="row" style="padding:0 80px;">
                                <a><div class="col-sm-12 col-md-6 col-lg-6 col-xl-6 col-xs-12 but-part" style="margin-top: 18px;
    padding: 10px 20px;
    font-size: 13px;
    color: #000;
    font-weight: 600;
    font-family: 'Montserrat';
    line-height: 1.2;
    text-align: center;
    background-color: rgb(255, 255, 255);2
    border: solid 2px #ff0000;
    border-radius: 10px;">
                                    СТАТЬ ПАРТНЕРОМ
                                </div></a>
                                <a href="/presentation/QPClub.pdf" target="_blank"><div class="col-sm-12 col-md-6 col-lg-6 col-xl-6 col-xs-12" style="margin-top: 18px;
    padding:10px 20px;
    font-size: 13px;
    color: #000;
    font-weight: 600;
    font-family: 'Montserrat';
    line-height: 1.2;
    text-align: center;
    background-color: rgb(255, 255, 255);
    border: solid 2px #ff0000;
    border-radius: 10px;">
                                    СКАЧАТЬ ПРЕЗЕНТАЦИЮ
                                </div></a>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6 col-xs-12" style="margin-bottom:15px;">
                        <p style="font-family:'Montserrat';font-size:18px;color:#000;margin:0;padding: 0 48px;">НАТУРАЛЬНЫЕ СРЕДСТВА ДЛЯ КРЕПКОГО ЗДОРОВЬЯ</p>
                            <div class="packet-body">
                                <div class=" text-center" style="padding: 0 60px;">
                                <iframe width="470" height="315" src="https://www.youtube.com/embed/vrA0RLhLo-8" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                </div>
                            </div>
                            <div class="row" style="padding:0 80px;">
                                <a><div class="col-sm-12 col-md-6 col-lg-6 col-xl-6 col-xs-12 but-part" style="margin-top: 18px;
    padding: 10px 20px;
    font-size: 13px;
    color: #000;
    font-weight: 600;
    font-family: 'Montserrat';
    line-height: 1.2;
    text-align: center;
    background-color: rgb(255, 255, 255);
    border: solid 2px #35CD31;
    border-radius: 10px;">
                                    СТАТЬ ПАРТНЕРОМ
                                </div></a>
                                <a href="/presentation/Catalog.pdf" target="_blank"><div class="col-sm-12 col-md-6 col-lg-6 col-xl-6 col-xs-12" style="margin-top: 18px;
    padding:10px 20px;
    font-size: 13px;
    color: #000;
    font-weight: 600;
    font-family: 'Montserrat';
    line-height: 1.2;
    text-align: center;
    background-color: rgb(255, 255, 255);
    border: solid 2px #35CD31;
    border-radius: 10px;">
                                    СКАЧАТЬ ПРЕЗЕНТАЦИЮ
                                </div></a>
                            </div>
                        </div>
                 </div>
             </div>
        </section>
        <section class="mt-section-2">
            <div class="container" style="margin-top: 0;padding-top: 70px;">
                <div class="row row-1 text-center" style="align-items:center;">
                    <div class="col-sm-6 col-md-6 col-lg-4 col-lg-offset-2 col-xl-3 col-xs-6" style="text-align:left;">
                       <h2 style="font-family: 'adineue PRO KZ Bold';font-size: xx-large;color: #000;margin-bottom:0px;">МАРКЕТИНГ ПЛАН</h2>
                       <h2 style="font-family: 'adineue PRO KZ Bold';font-size: xx-large;color: #000;margin-top:0px;"> С ДОХОДНОСТЬЮ 80% </h2>
                       <h5 style="font-family: 'Montserrat';font-size:large;color: #000;text-align:left; margin:28px 0px 18px 0px;">Мы предлагаем маркетинг план, который обеспечит Вам высокий и стабильный доход.</h5>
                       <h5 style="font-family: 'Montserrat';font-size:large;color: #000;text-align:left;">80% дохода от товарооборота, компания отдает в сеть.</h5>
                       <div style="margin:20px 0 20px 0">  
                            <a class="download-marketing" href="/presentation/marketing_plan.pdf" target="_blank">
                                СКАЧАТЬ МАРКЕТИНГ
                                <span>PDF</span>
                            </a>
                            </div>
                            <a class="download-marketing" href="/presentation/marketing_plan.pdf" target="_blank">
                                СКАЧАТЬ МАРКЕТИНГ
                                <span>PDF</span>
                            </a>
                            
                    </div>
                        <div class="col-sm-6 col-md-6 col-lg-4  col-xl-3 col-xs-6">
                                <div class=" text-center">
                                    <img class="rounded-circle" src="/new_design/images/Partner/4.png" alt="">
                               </div>
                        </div>
                 </div>
             </div>
        </section>
        <section class="mt-section-2" style="background:#fff;">
            <div class="container" style="margin-top: 15px;padding:75px 0;border-radius:10px;background:#e1e0df;">
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
                                          <img class="rounded-circle" src="/new_design/images/Partner/p-1.png" alt="">
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
                                <p class="pt-80"> до 4 уровня </p>
                            </div>
                            <div class="col-xl-2 col-lg-2 col-md-12 col-sm-12 col-xs-12">
                                <p class="pt-80">  100 000 тг/мес. </p>
                            </div>
                            <div class="col-lg-12">
                                <a href="product-detail.html" class="btn-shop">
                                    <span style="color:#fff!important;background:#ca313f; border-radius:10px; padding:3px 40px;font-weight:300;font-family: 'adineue PRO KZ Bold';float:right;">купить пакет</span>
                                </a>
                            </div>
                       </div>
 
                      <div class="col-lg-12 row main-tx">
                          <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-xs-12">
                                <div class="packet-body">
                                    <div class="my-img-circle text-center">
                                        <img class="rounded-circle" src="/new_design/images/Partner/p-2.png" alt="">
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
                                <p class="pt-80">  до 4 уровня </p>
                            </div>
                            <div class="col-xl-2 col-lg-2 col-md-12 col-sm-12 col-xs-12">
                                <p class="pt-80">  250 000 тг/мес. </p>
                            </div>
                            <div class="col-lg-12">
                                <a href="product-detail.html" class="btn-shop">
                                    <span style="color:#fff!important;background:#04ad5d; border-radius:10px; padding:3px 40px;font-weight:300;font-family: 'adineue PRO KZ Bold';float:right;">купить пакет</span>
                                </a>
                            </div>
                      </div>

                      <div class="col-lg-12 row main-tx">
                          <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-xs-12">
                                <div class="packet-body">
                                    <div class="my-img-circle text-center">
                                        <img class="rounded-circle" src="/new_design/images/Partner/p-3.png" alt="">
                                    </div>
                                </div>
                          </div>
                          <div style="" class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-xs-12">
                                 <p class="pt-80"> Маркетинг план каталог продукций </p>
                            </div>
                            <div class="col-xl-2 col-lg-2 col-md-12 col-sm-12 col-xs-12">
                                <p class="pt-80"> 18 штук </p>
                            </div>
                            <div class="col-xl-2 col-lg-2 col-md-12 col-sm-12 col-xs-12">
                                <p class="pt-80">  до 4 уровня </p>
                            </div>
                            <div class="col-xl-2 col-lg-2 col-md-12 col-sm-12 col-xs-12">
                                <p class="pt-80">  неогранично </p>
                            </div>
                            <div class="col-lg-12">
                                <a href="product-detail.html" class="btn-shop">
                                    <span style="color:#fff!important;background:#eca000; border-radius:10px; padding:3px 40px;font-weight:300;font-family: 'adineue PRO KZ Bold';float:right;">купить пакет</span>
                                </a>
                            </div>
                      </div>
                    </div>
                 </div>
             </div>
        </section>

     
    <style>
        /*jssor slider loading skin spin css*/
        .jssorl-009-spin img {
            animation-name: jssorl-009-spin;
            animation-duration: 1.6s;
            animation-iteration-count: infinite;
            animation-timing-function: linear;
        }

        @keyframes jssorl-009-spin {
            from { transform: rotate(0deg); }
            to { transform: rotate(360deg); }
        }

        /*jssor slider bullet skin 051 css*/
        .jssorb051 .i {position:absolute;cursor:pointer;}
        .jssorb051 .i .b {fill:#fff;fill-opacity:0.3;}
        .jssorb051 .i:hover .b {fill-opacity:.7;}
        .jssorb051 .iav .b {fill-opacity: 1;}
        .jssorb051 .i.idn {opacity:.3;}

        /*jssor slider arrow skin 051 css*/
        .jssora051 {display:block;position:absolute;cursor:pointer;}
        .jssora051 .a {fill:none;stroke:#fff;stroke-width:360;stroke-miterlimit:10;}
        .jssora051:hover {opacity:.8;}
        .jssora051.jssora051dn {opacity:.5;}
        .jssora051.jssora051ds {opacity:.3;pointer-events:none;}
    </style>
    <section style="margin-top:60px;">
    <div id="jssor_1" style="position:relative;margin:0 auto;top:0px;left:0px;width:1080px;height:380px;overflow:hidden;visibility:hidden;">
        <!-- Loading Screen -->
        <div data-u="loading" class="jssorl-009-spin" style="position:absolute;top:0px;left:0px;width:100%;height:100%;text-align:center;background-color:rgba(0,0,0,0.7);">
            <img style="margin-top:-19px;position:relative;top:50%;width:38px;height:38px;" src="img/spin.svg" />
        </div>
        <div data-u="slides" style="cursor:default;position:relative;top:0px;left:0px;width:1080px;height:380px;overflow:hidden;">
            <div>
                <h4>ПОСТРОЙ СВОЙ ДОМ МЕЧТЫ</h4>
                <img data-u="image"  src="/new_design/images/Partner/8.png" />
            </div>
            <div>
                <img data-u="image" src="/new_design/images/Partner/9.png" />
            </div>
            <div>
                <img data-u="image" src="/new_design/images/Partner/10.png" />
            </div>
        </div><a data-scale="0" href="https://www.jssor.com" style="display:none;position:absolute;">animation</a>
        <!-- Bullet Navigator -->
        <div data-u="navigator" class="jssorb051" style="position:absolute;bottom:16px;right:16px;" data-autocenter="1" data-scale="0.5" data-scale-bottom="0.75">
            <div data-u="prototype" class="i" style="width:12px;height:12px;">
                <svg viewbox="0 0 16000 16000" style="position:absolute;top:0;left:0;width:100%;height:100%;">
                    <circle class="b" cx="8000" cy="8000" r="5800"></circle>
                </svg>
            </div>
        </div>
        <!-- Arrow Navigator -->
        <div data-u="arrowleft" class="jssora051" style="width:65px;height:65px;top:0px;left:35px;" data-autocenter="2" data-scale="0.75" data-scale-left="0.75">
            <svg viewbox="0 0 16000 16000" style="position:absolute;top:0;left:0;width:100%;height:100%;">
                <polyline class="a" points="11040,1920 4960,8000 11040,14080 "></polyline>
            </svg>
        </div>
        <div data-u="arrowright" class="jssora051" style="width:65px;height:65px;top:0px;right:35px;" data-autocenter="2" data-scale="0.75" data-scale-right="0.75">
            <svg viewbox="0 0 16000 16000" style="position:absolute;top:0;left:0;width:100%;height:100%;">
                <polyline class="a" points="4960,1920 11040,8000 4960,14080 "></polyline>
            </svg>
        </div>
    </div>
    </section>
        <section class="row" style="padding-bottom: 25px;">
            <div class="container">
            <div class="why-we-are-text" style="padding-top:40px;">
                    <h3>ИСТОРИИ <span style="font-weight:bold;"> УСПЕХА </span>НАШИХ<span style="font-weight:bold;"> ПАРТНЕРОВ </span></h3>
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
                <div class="why-we-are-text" style="padding-top:40px;">
                    <h3>ПОЧЕМУ ВЫ ДОЛЖНЫ РАБОТАТЬ С НАМИ!</h3>
                </div>
                <div class="row">
                    <div class="col-sm-4 text-center"> 
                         <article style="background:#fff;">
                              <div class="mid clearfix">
                                <div id="counter">
                                    <img class="rounded-circle" src="/new_design/images/Partner/11.png" alt="">
                                    <div class="text-st">ВЫСОКОДОХОДНАЯ И УНИКАЛЬНАЯ МАРКЕТИНГ ПРОГРАММА</div>
                                </div>
                              </div>
                          </article>
                         </div>
                         <div class="col-sm-4 text-center">
                         <article style="background:#fff;">
                              <div class="mid clearfix">
                                <div id="counter">
                                    <img class="rounded-circle" src="/new_design/images/Partner/12.png" alt="">
                                    <div class="text-st">ОЗДОРОВИТЕЛЬНАЯ И НАТУРАЛЬНАЯ ПРОДУКЦИЯ</div>
                                </div>
                              </div>
                          </article>
                         </div>
                         <div class="col-sm-4 text-center">
                         <article style="background:#fff;">
                              <div class="mid clearfix">
                                <div id="counter">
                                    <img class="rounded-circle" src="/new_design/images/Partner/13.png" alt=""> 
                                    <div class="text-st">ЛУЧШИЕ УСЛОВИЯ ДЛЯ ПРИОБРЕТЕНИЕ АВТОМОБИЛЬЯ И ДОМА</div>
                                </div>
                              </div>
                          </article>  
                        </div>
                        <div class="col-sm-6 text-center"> 
                        <a href="/presentation/Презент.pdf" target="_blank" href="/form" class="want-to-be-partner-box-a">
                            <div class="want-to-be-partner-box text-center">
                                    СТАТЬ УЧАСТНИКОМ
                            </div>
                         </a>
                        </div>
                        <div href="/presentation/Презент.pdf" target="_blank" class="col-sm-6 text-center"> 
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

    <script type="text/javascript">jssor_1_slider_init();
    </script>

    <script>
        function openModal(tag_object) {
            var videoIdInYouTube = $(tag_object).data('youtube-url');
            var url = ('https://www.youtube.com/embed/' + videoIdInYouTube);
            document.getElementById("myFrame").src = url;
            $('#myModal').modal('toggle');
        }
    </script>

    
       
@endsection

