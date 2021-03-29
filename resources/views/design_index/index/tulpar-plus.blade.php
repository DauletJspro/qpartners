@extends('design_index.layout.layout')

<style>
    li {
        list-style-type: none; /* Убираем маркеры */
    }
    #mt-section-1 > ul {
        color:#000;
        font-size:18px;
    }
    p {
        font-size:large;
    }
</style>

@section('meta-tags')
    <link rel="stylesheet" href="/new_design/css/opportunity-responsive.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" href="/fontawesome/font-awesome.css">
    <title>Qpartners</title>
    <meta name="description"
          content="«Qpartners» - это уникальный медиа проект с широким набором возожностей для взаймодествия с участниками виртуального рынка"/>
    <meta name="keywords" content="Qpartners"/>

@endsection
<div id="myModal" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog"
     aria-labelledby="myLadialogrgeModalLabel">
    <div class="modal- modal-lg">
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
            background-image: url('/new_design/images/Partner/b-0.png');
            margin-left: auto;
            margin-right: auto;
            position: relative;
            min-height: 258px;
        ">
            <div class="holder">
                <div class="texts" style="font-family: Akrobat;color: #000;position: absolute;left: 10%;top: 24%;width: 458px;font-weight: bold;">
                    <span class="mb-0" style="font-size:42px;font-weight:bold;">СОЦИАЛЬНАЯ ПРОГРАММА ДЛЯ СЧАСТЛИВОЙ СЕМЬИ</span>
                </div>
            </div>
        </section>
        <section class="mt-section-1" style="font-family:Akrobat;">
            <div class="container" style="margin-top: 0;padding:50px 10px; color:#000;">
                <div class="row row-1 text-center">
                    <div class="col-sm-12 col-md-12 col-lg-8 col-xl-8 col-xs-12" style="margin-bottom:15px; text-align: left;">
                        <div class="packet-body">
                            <div class="my-img-circle text-center" style="padding: 0;">
                                <img class="rounded-circle " src="/new_design/images/Partner/tulpar+.png" width='790' height='380' alt="">
                                <div class="holder" style="position: absolute;top: 2%;text-align:left;left: 10%;">
                                    <div class="texts" style="font-family: Akrobat;color: #000;position: absolute;left: 10%;top: 32%;width: 370px;font-weight: bold;">
                                        <span class="mb-0" style="font-size:44px;font-weight:bold;color:#ffd700;line-height: 1;"> АВТОМОБИЛЬ ДЛЯ ВСЕЙ СЕМЬИ ЗА</span>
                                        <p class="mb-0" style="font-size:20px;font-weight:bold;color:#fff;">Внеси первоначальный взнос ежемесячно и получи рассрочку на автомобиль!</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <h4 style="font-size: 30px;font-weight: bold; text-align:center;">АВТО В РАССРОЧКУ "TULPAR+"</h4>

                        <p><span style="font-weight:bold;">Хотите приобрести автомобиль? Но не знаете как? </span></p>
                        <p>Тогда эта программа для Вас! Здесь Вы можете оформить рассрочку в течений <span style="font-weight:bold;"> от 1 до 6 месяцев. </span></p>
                        <p>Став участником<span style="font-weight:bold;"> Социальной программы GAP Вы можете оформить рассрочку на сумму</span><span style="font-weight:bold;"> до 9 000 000 KZT по программе "TULPAR+".</span></p>
                        <p ><span style="font-weight:bold;">Для получения рассрочки Вам необходимо:</span></p>
                        <div class="col-sm-12">
                            <div class="text-center" style="padding: 0 60px;">
                                <img class="rounded-circle " src="/new_design/images/Partner/Авто Тулпар.png" alt="">
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="text-center" style="padding: 0 60px;">
                                <img class="rounded-circle " src="/new_design/images/Partner/Авто Тулпар плюс.png" alt="">
                            </div>
                        </div>
                        <p><span style="font-weight:bold;">После внесения Вступительного и Первоначального взноса Вы получите одобрение на получение займа на сумму до<span style="font-weight:bold;"> 9 000 000 согласно программе "TULPAR+".</p>
                        <p>После получения суммы, Вам выставляется<span style="font-weight:bold;"> график погашения займа, которая начнет действовать со следующего месяца с даты оформления займа.</p>
                        <div class="col-sm-12">
                            <div class="text-center" style="padding: 0 60px;">
                                <img class="rounded-circle " src="/new_design/images/Partner/Авто Тулпар плюс1.png" alt="">
                            </div>
                        </div>
                        <p style="color:red;font-weight:bold;">Важно!</p>
                        <p>Займ Вы получите <span style="font-weight:bold;"> в течений 6 месяцев.</span>с момента внесения первонального взноса.</p>
                        <p style="color:red;font-weight:bold;">Кратко о программе "TULPAR+"!</p>
                        <p><span style="font-weight:bold;">Сумма рассрочки: до 9 000 000 KZT </span></p>
                        <p><span style="font-weight:bold;">Срок рассрочки: до 60 месяцев </span></p>
                        <p><span style="font-weight:bold;">Срок получения займа: от 1 до 6 месяцев</span></p>
                        <p><span style="font-weight:bold;">Вступительны взнос: до 240 000 KZT </span></p>
                        <p><span style="font-weight:bold;">Первоначальный взнос: 30%, 50% или 70% </span></p>
                        <p><span style="font-weight:bold;">Погашение: до 105 000 KZT ежемесячно</span></p>

                        <p><span style="font-weight:bold;">Не упустите свой шанс обладателем своего автомобилья!</span></p>

                        <div class="col-sm-6 text-center">
                            <a href="/presentation/Презент.pdf" target="_blank" class="want-to-be-partner-box-a">
                                <div class="want-to-be-partner-box text-center" style="font-size:15px;">
                                    СКАЧАТЬ ПРЕЗЕНТАЦИЮ
                                </div>
                            </a>
                        </div>
                        <div class="col-sm-6 text-center">
                            <a href="/form" class="want-to-be-partner-box-a">
                                <div class="want-to-be-partner-box text-center" style="font-size:15px;">
                                    УЧАСТВОВАТЬ В ПРОГРАММЕ
                                </div>
                            </a>
                        </div>

                    </div>

                    <div class="col-sm-12 col-md-12 col-lg-4 col-xl-4 col-xs-12" style="margin-bottom:15px;">
                        <h3 style="text-align: right;">СОЦИАЛЬНЫЕ ПРОГРАММЫ</h3>
                        <div class="packet-body">
                            <ul style="text-align: right;font-size:18px;">
                                <li><a href="/baspana">Жильё в рассрочку "BASPANA"</a></li>
                                <li><a href="/baspana-plus">Жильё в рассрочку "BASPANA+"</a></li>
                                <li><a href="/tulpar">Авто в рассрочку "TULPAR"</a></li>
                                <li><a href="/tulpar-plus">Авто в рассрочку "TULPAR+"</a></li>
                                <li><a href="/activ-car">Авто по программе "ACTIV"</a></li>
                                <li><a href="/activ-home">Жильё по программе "ACTIV"</a></li>
                            </ul>
                        </div>

                        <h3 style="text-align: right;">НОВОСТИ СОЦИАЛЬНОЙ ПРОГРАММЫ</h3>
                        <ul style="float:right;text-align: right;">
                            <li>
                                <div class="card" style="margin-bottom:4px;">
                                    <div class="card-horizontal" style="display: flex;flex: 1 1 auto;">
                                        <div class="card-body">
                                            <h4 class="card-title">Свой дом за счет компании!</h4>
                                        </div>
                                        <div class="img-square-wrapper">
                                            <img class="" src="/new_design/images/Partner/bb.png" width="60" height="60" alt="Card image cap">
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="card">
                                    <div class="card-horizontal" style="display: flex;flex: 1 1 auto;">
                                        <div class="card-body">
                                            <h4 class="card-title">Свой авто за счет компании!</h4>
                                        </div>
                                        <div class="img-square-wrapper">
                                            <img class="" src="/new_design/images/Partner/bb.png" width="60" height="60" alt="Card image cap">
                                        </div>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            </div>
        </section>

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
@endsection



