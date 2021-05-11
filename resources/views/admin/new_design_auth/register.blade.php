@extends('design_index.layout.layout')

@section('meta-tags')

    <title>Qpartners</title>
    <meta name="description"
          content="«Qpartners» - это уникальный медиа проект с широким набором возожностей для взаймодествия с участниками виртуального рынка"/>
    <meta name="keywords" content="Qpartners"/>

@endsection

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.1/css/bootstrap-select.css"/>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.1/js/bootstrap-select.js"></script>
<?php
$display_value = false;
if ($role_id == \App\Models\Role::CLIENT && $is_activated == true) {
    $display_value = 'activePartner';
} elseif ($role_id == \App\Models\Role::CLIENT && $is_activated == false) {
    $display_value = 'shareholder';
} elseif ($role_id == \App\Models\Role::ENTREPRENEUR) {
    $display_value = 'entrepreneur';
} elseif ($role_id == \App\Models\Role::CONSUMER) {
    $display_value = 'consumer';
} elseif ($role_id == \App\Models\Role::SELLER) {
    $display_value = 'seller';
} elseif ($role_id == \App\Models\Role::USER) {
    $display_value = 'user';
}

?>


@section('content')

    <div class="mt-search-popup">
        <div class="mt-holder">
            <a href="#" class="search-close"><span></span><span></span></a>
            <div class="mt-frame">
                <form action="#">
                    <input type="text" placeholder="Search...">
                    <span class="icon-microphone"></span>
                    <button class="icon-magnifier" type="submit"></button>
                </form>
            </div>
        </div>
    </div>
    <main id="mt-main">
        <div class="register-image text-uppercase">
            <p class="programs-image-text" style="margin:0; position: absolute; text-align: center; width: 100%; padding: 55px 0 0 10px">регистрация</p>

            <img src="/new_design/images/banners/montazhnaya1.png" alt="img not found" style="width: 100%; height: 100%">
        </div>
        <div class="container">
            <nav class="breadcrumbs text-center fs-11" style="margin-top: 30px">
                <ul class="list-unstyled d-flex-row font-weight-lighter text-uppercase">
                    <a href="/" class="my-text font-weight-400">главная <i class="fa fa-angle-right ml-1"></i></a>
                    <a class="my-text font-weight-400 ml-1">регистрация</a>
                </ul>
            </nav>
        </div>

        <br>
        <div class="text-uppercase fs-27 black-text-color text-center font-weight-600" style="letter-spacing: 3px">выберите форму регистрации</div>
        <div class="container">
            <div class=" d-flex-row text-center mt-2 flex-wrap" style="font-size: 16px">
                <div class="register-types-btn bg-red color-white text-uppercase" onclick="displayInfo('shareholder')" id="shareholder">
                    пайщик
                </div>
                <div class="register-types-btn bg-red color-white text-uppercase" onclick="displayInfo('activePartner')" id="activePartner">
                    активный партнер
                </div>
                <div class="register-types-btn bg-red color-white text-uppercase" onclick="displayInfo('entrepreneur')" id="entrepreneur">
                    предприниматель
                </div>
                <div class="register-types-btn bg-red color-white text-uppercase" onclick="displayInfo('consumer')" id="consumer">
                    потребитель
                </div>
                <div class="register-types-btn bg-red color-white text-uppercase" onclick="displayInfo('seller')" id="seller">
                    продавец
                </div>
                <div class="register-types-btn bg-red color-white text-uppercase"onclick="displayInfo('user')" id="user"  style="margin-right: 0">
                    пользователь
                </div>

            </div>
        </div>
        <section class="mt-detail-sec toppadding-zero" id="registrate-section">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-sm-10 col-sm-push-1">
                        <div class="holder" style="margin: 0; padding-top: 0; font-family: 'Droid Serif', serif; border: none">
                            <div class="mt-side-widget">
                                <div style="" id="form-parent">
{{--                                    <header class="text-center">--}}
{{--                                        <h1>Регистрация</h1>--}}
{{--                                        <p>Еще нету аккаунта?</p>--}}
{{--                                    </header>--}}
                                    @if(isset($error))
                                        <div class="alert alert-danger">
                                            <p style="color:red">{{$error}}</p>
                                        </div>
                                    @endif

                                    <div id="shareholder-block">@include('admin.new_design_auth.shareholder')</div>
                                    <div id="activePartner-block">@include('admin.new_design_auth.active-partner')</div>
                                    <div id="entrepreneur-block">@include('admin.new_design_auth.entrepreneur')</div>
                                    <div id="consumer-block">@include('admin.new_design_auth.consumer')</div>
                                    <div id="seller-block">@include('admin.new_design_auth.seller')</div>
                                    <div id="user-block">@include('admin.new_design_auth.user')</div>

                                    <header>
                                        <div class="form-group text-center already-registered-div">
                                            Если Вы уже зарегистрированы на нашем сайте, нажмите <a
                                                    style="font-weight: bold; text-decoration: underline; color: black;"
                                                    href="/login">«Войти»</a>
                                        </div>
                                        <div class="form-group main-page-div" style="text-align: center">
                                            <a style="font-weight: bold; text-decoration: underline; color: black;"
                                               href="/">Главная страница</a>
                                        </div>
                                    </header>
                                    <ul class="mt-socialicons">
                                        <li class="mt-facebook"><a href="#"><i class="fa fa-facebook-f"></i></a></li>
                                        <li style="background-color: lightgreen;"><a href="#"><i
                                                        class="fa fa-whatsapp"></i></a></li>
                                        <li class="mt-youtube"><a href="#"><i class="fa fa-youtube-play"></i></a></li>
                                    </ul>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

@endsection

@push('scripts')
    {!! NoCaptcha::renderJs() !!}
@endpush

<script>

    $(document).ready(function() {
        var display_value = '{{$display_value}}';
        if (display_value) {
            displayInfo(display_value);
        } else {
            displayInfo('activePartner');
        }
    });



    function displayInfo(value) {

        document.getElementById("registrate-section").style.display = 'block';

        let shareholder = document.getElementById("shareholder");
        let activePartner = document.getElementById("activePartner");
        let entrepreneur = document.getElementById("entrepreneur");
        let consumer = document.getElementById("consumer");
        let seller = document.getElementById("seller");
        let user = document.getElementById("user");

        if (value == 'shareholder') {
            shareholder.classList.add("register-types-btn-selected");
            activePartner.classList.remove('register-types-btn-selected');
            entrepreneur.classList.remove('register-types-btn-selected');
            consumer.classList.remove('register-types-btn-selected');
            seller.classList.remove('register-types-btn-selected');
            user.classList.remove('register-types-btn-selected');
            document.getElementById('shareholder-block').style.display = 'block';
            document.getElementById('activePartner-block').style.display = 'none';
            document.getElementById('entrepreneur-block').style.display = 'none';
            document.getElementById('consumer-block').style.display = 'none';
            document.getElementById('seller-block').style.display = 'none';
            document.getElementById('user-block').style.display = 'none';

        } else if (value == 'activePartner') {
            shareholder.classList.remove("register-types-btn-selected");
            activePartner.classList.add('register-types-btn-selected');
            entrepreneur.classList.remove('register-types-btn-selected');
            consumer.classList.remove('register-types-btn-selected');
            seller.classList.remove('register-types-btn-selected');
            user.classList.remove('register-types-btn-selected');

            document.getElementById('shareholder-block').style.display = 'none';
            document.getElementById('activePartner-block').style.display = 'block';
            document.getElementById('entrepreneur-block').style.display = 'none';
            document.getElementById('consumer-block').style.display = 'none';
            document.getElementById('seller-block').style.display = 'none';
            document.getElementById('user-block').style.display = 'none';
        } else if (value == 'entrepreneur') {
            shareholder.classList.remove("register-types-btn-selected");
            activePartner.classList.remove('register-types-btn-selected');
            entrepreneur.classList.add('register-types-btn-selected');
            consumer.classList.remove('register-types-btn-selected');
            seller.classList.remove('register-types-btn-selected');
            user.classList.remove('register-types-btn-selected');

            document.getElementById('shareholder-block').style.display = 'none';
            document.getElementById('activePartner-block').style.display = 'none';
            document.getElementById('entrepreneur-block').style.display = 'block';
            document.getElementById('consumer-block').style.display = 'none';
            document.getElementById('seller-block').style.display = 'none';
            document.getElementById('user-block').style.display = 'none';
        } else if (value == 'consumer') {
            shareholder.classList.remove("register-types-btn-selected");
            activePartner.classList.remove('register-types-btn-selected');
            entrepreneur.classList.remove('register-types-btn-selected');
            consumer.classList.add('register-types-btn-selected');
            seller.classList.remove('register-types-btn-selected');
            user.classList.remove('register-types-btn-selected');

            document.getElementById('shareholder-block').style.display = 'none';
            document.getElementById('activePartner-block').style.display = 'none';
            document.getElementById('entrepreneur-block').style.display = 'none';
            document.getElementById('consumer-block').style.display = 'block';
            document.getElementById('seller-block').style.display = 'none';
            document.getElementById('user-block').style.display = 'none';
        } else if (value == 'seller') {
            shareholder.classList.remove("register-types-btn-selected");
            activePartner.classList.remove('register-types-btn-selected');
            entrepreneur.classList.remove('register-types-btn-selected');
            consumer.classList.remove('register-types-btn-selected');
            seller.classList.add('register-types-btn-selected');
            user.classList.remove('register-types-btn-selected');

            document.getElementById('shareholder-block').style.display = 'none';
            document.getElementById('activePartner-block').style.display = 'none';
            document.getElementById('entrepreneur-block').style.display = 'none';
            document.getElementById('consumer-block').style.display = 'none';
            document.getElementById('seller-block').style.display = 'block';
            document.getElementById('user-block').style.display = 'none';
        } else if (value == 'user') {
            shareholder.classList.remove("register-types-btn-selected");
            activePartner.classList.remove('register-types-btn-selected');
            entrepreneur.classList.remove('register-types-btn-selected');
            consumer.classList.remove('register-types-btn-selected');
            seller.classList.remove('register-types-btn-selected');
            user.classList.add('register-types-btn-selected');

            document.getElementById('shareholder-block').style.display = 'none';
            document.getElementById('activePartner-block').style.display = 'none';
            document.getElementById('entrepreneur-block').style.display = 'none';
            document.getElementById('consumer-block').style.display = 'none';
            document.getElementById('seller-block').style.display = 'none';
            document.getElementById('user-block').style.display = 'block';
        }

    }
</script>
<style>
    #registrate-section {
        display: none;
    }
    .register-types-btn {
        height: 47px;
        margin-right: 10px;
        cursor: pointer;
        margin-top: 10px;
        padding: 14px 10px 0 10px;
        min-width: 15.8%;
    }
    .register-types-btn:hover {
        background-color: #cebfbf;
        color: black;
    }
    .register-types-btn-selected {
        background-color: #F6F6F6 !important;
        color: red !important;
    }
    .register-image {
        /*background-image:url('/new_design/images/banners/montazhnaya1.png');*/
        height: 230px;
        font-size: 4rem;
        color: white;
        text-align: center;
        background-size: 100% 100;
        padding-top: 60px;
        font-weight: 600;
        letter-spacing: 4px;
        background-repeat: no-repeat;
    }
    .program-block-width {
        width: 31%;
    }

    .black-text-color {
        color: black;
    }
    .w-75 {
        width: 75%;
    }
    .color-white {
        color: white;
    }
    .flex-wrap {
        flex-wrap: wrap;
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
    .button-hover:hover {
        background-color: #c60303 !important;

    }
    .a-hover:hover {
        color: white !important;

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