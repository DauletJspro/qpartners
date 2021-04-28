
<?php
$programs= collect([
        [
            'imgSrc'=> "baspana.jpg",
            'body'=> "BASPANA - жилье для большой семьи в рассрочку"
        ],
        [
            'imgSrc'=> "tulpar.jpg",
            'body'=> "TULPAR - автомобиль для всей семьи в рассрочку"
        ],
        [
            'imgSrc'=> "jastar.jpg",
            'body'=> "JASTAR - жилье для молодежи в рассрочку"
        ],
        [
            'imgSrc'=> "jas-otau.jpg",
            'body'=> "JAS OTAU - жилье для молодых семей в рассрочку"
        ],
        [
            'imgSrc'=> "qoldau.jpg",
            'body'=> "QOLDAU - жилье медработников и учителей в рассрочку"
        ],
        [
            'imgSrc'=> "qamqor.jpg",
            'body'=> "QAMQOR - жилье для социально уязвимых слоев населения в рассрочку"
        ],
    ]
);
?>

@extends('design_index.layout.layout')

@section('meta-tags')
    <title>Qpartners Shop</title>
    <meta name="description"
          content="«Qpartners» - это уникальный медиа проект с широким набором возожностей для взаймодествия с участниками виртуального рынка"/>
    <meta name="keywords" content="Qpartners"/>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
@endsection

@section('content')
    <div class="container mb-7">
        <div class="programs-image w-100 text-uppercase"><span class="programs-image-text" >программы</span></div>
        <div class="mt-2">
            <div class="col-md-3 text-uppercase">
                <div class="fs-18 my-text">категории</div>

                <div class="d-flex-column pl-1 mt-1">

                    <div class="pl-1"><a class="my-text fs-18" href="{{ route('program.initial') }}" name="initial">с первоначальным взносом</a></div>
                    <div class="bg-silver mt-1 pl-1"><a class="my-text fs-18" href="{{ route('program.share') }}" name="share">с паевым взносом</a></div>

                    <div class="mt-5">
                        <div class="">
                            <a class="my-text fs-18" href="#">компания</a>
                        </div>
                        <div class="pl-1 mt-1">
                            <a class="my-text" href="#">о нас</a>
                        </div>
                        <div class="pl-1">
                            <a class="my-text" href="#">контакты</a>
                        </div>
                    </div>
                    <div class="mt-5">
                        <div class="">
                            <a class="my-text fs-18" href="#">компания</a>
                        </div>
                        <div class="pl-1 mt-1">
                            <a class="my-text" href="#">часто задаваемые вопросы</a>
                        </div>
                        <div class="pl-1">
                            <a class="my-text" href="#">написать нам</a>
                        </div>
                        <div class="pl-1">
                            <a class="my-text" href="#">правила сервиса</a>
                        </div>
                        <div class="pl-1">
                            <a class="my-text" href="#">купить карту</a>
                        </div>
                    </div>
                    <div class="mt-5">
                        <div class="">
                            <a class="my-text fs-18" href="#">предпринимателям</a>
                        </div>
                        <div class="pl-1 mt-1">
                            <a class="my-text" href="#">для вашего бизнеса</a>
                        </div>
                        <div class="pl-1">
                            <a class="my-text" href="#">сотрудничества</a>
                        </div>
                    </div>
                    <div><a class="my-text" href="#"></a></div>
                    <div><a class="my-text" href="#"></a></div>
                </div>
            </div>
            <div class="col-9 d-flex-column">
                <div class=" d-flex-row">
                    <!-- Breadcrumbs of the Page -->
                    <nav class="breadcrumbs black-text-color text-center">
                        <ul class="list-unstyled d-flex-row font-weight-lighter">
                            <a href="/" class="my-text font-weight-400">главная <i class="fa fa-angle-right ml-1"></i></a>
                            <span class="font-weight-400 ml-1 text-silver ">программы</span>
                        </ul>
                    </nav>
                    <!-- Breadcrumbs of the Page end -->

                    <div class="ml-auto d-flex-row">
                        <button class="bg-white border-radius-30 border-silver px-15 py-05">Сортировка<i class="fa fa-angle-down" style="margin-left: 4px"></i></button>
                        <div class="ml-3 border-radius-60"><i class="gg-microsoft"></i></div>
                        <div class="ml-2 border-radius-50"><i class="gg-feed"></i></div>
                    </div>
                </div>
                <div class="d-flex-row flex-wrap pt-2">

                    @foreach($programs as $program)
                        <div class="d-flex-column w-31 ml-2 mt-1">
                            <img src="/new_design/images/banners/{{$program["imgSrc"]}}" alt="programs img not found"/>
                            <p class="text-black mt-1 w-75 font-weight-600">{{$program["body"]}}</p>
                            <button class="mr-auto bg-red color-white border-radius-30 px-15 py-05 d-flex-row" style="border: none">
                                Подробнее
                                <img style="width: 10px; height: 10px; margin-top: 6px; margin-left: 5px"
                                     src="/new_design/images/right-navigation.svg"
                                     alt="right navigation img not found"
                                >
                            </button>
                        </div>
                    @endforeach

                </div>
            </div>
        </div>
    </div>
@endsection

<style>
    @import url('https://css.gg/feed.css');
    @import url('https://css.gg/microsoft.css');
    .w-31 {
        width: 31%;
    }
    .w-75 {
        width: 75%;
    }
    .color-white {
        color: white;
    }
    .border-radius-50 {
        border-radius: 50%;
        border:1px solid silver;
        padding-top: 16px;
        padding-left: 18px;
        padding-right: 18px;
    }
    .border-radius-60 {
        border-radius: 50%;
        border:1px solid silver;
        padding: 8px;
    }
    .border-radius-30 {
        border-radius: 30px;
    }
    .border-silver {
        border:1px solid silver;
    }
    .flex-wrap {
        flex-wrap: wrap;
    }
    .pt-2 {
        padding-top: 20px;
    }
    .pt-13 {
        padding-top: 13px
    }
    .pt-5 {
        padding-top: 5px;
    }
    .ml-1 {
        margin-left: 10px;
    }
    .ml-2 {
        margin-left: 20px;
    }
    .ml-3 {
        margin-left: 30px;
    }
    .px-15 {
        padding-left: 15px;
        padding-right: 15px;
    }
    .py-05 {
        padding-top: 5px;
        padding-bottom: 5px;
    }

    .bg-white {
        background: white;
    }
    .bg-red {
        background: red;
    }
    .bg-silver {
        background: #d7d7d7;
    }
    .ml-auto {
        margin-left: auto;
    }
    .mr-auto {
        margin-right: auto;
    }
    a:hover {
        color: #8e8e8e !important;
    }
    .mb-7 {
        margin-bottom: 70px;
    }
    .mt-2 {
        margin-top: 20px;
    }
    .fs-18 {
        font-size: 18px;
    }
    .mt-1 {
        margin-top: 10px;
    }
    .mt-5 {
        margin-top: 50px;
    }
    .pl-2 {
        padding-left: 20px;
    }
    .pl-1 {
        padding-left: 10px;
    }
    .font-weight-lighter {
        font-weight: lighter
    }
    .font-weight-400 {
        font-weight: 400 !important;
    }
    .font-weight-600 {
        font-weight: 600 !important;
    }
    .programs-image {
        background-image:url('/new_design/images/programs.png');
        height: 172px;
        font-size: 4rem;
        color: white;
        text-align: center;
        background-size: 100%;
        padding-top: 60px;
        font-weight: 600;
        letter-spacing: 4px;
    }
    .programs-image-text {
        text-shadow: 1px 1px 1px black;
    }
    .my-text {
        color: black !important;
        font-weight: 600;
        letter-spacing: 2px;
    }

    .text-silver {
        color: #8d8c8c !important;
        letter-spacing: 2px;
    }
    .text-black {
        color: black !important;
        font-weight: 500;
    }
    .fs-27 {
        font-size: 27px;

    }
    .d-flex-column {
        display: flex;
        flex-direction: column;
    }
    .d-flex-row {
        display: flex;
    }

</style>