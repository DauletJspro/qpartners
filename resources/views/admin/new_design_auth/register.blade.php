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
<script>

    function displayInfo(value) {
        document.getElementById("registrate-section").style.display = 'block';

        let shareholder = document.getElementById("shareholder");
        let activePartner = document.getElementById("activePartner");
        let entrepreneur = document.getElementById("entrepreneur");
        let consumer = document.getElementById("consumer");
        let seller = document.getElementById("seller");
        let user = document.getElementById("user");
        console.log('activePartner');

        if(value === 'shareholder') {
            shareholder.classList.add("register-types-btn-selected");
            activePartner.classList.remove('register-types-btn-selected');
            entrepreneur.classList.remove('register-types-btn-selected');
            consumer.classList.remove('register-types-btn-selected');
            seller.classList.remove('register-types-btn-selected');
            user.classList.remove('register-types-btn-selected');
            document.getElementById('speakers').style.display = 'none';
            document.getElementById('sponsors').style.display = 'none';
            document.getElementById('inviters').style.display = 'none';
            document.getElementById('iin').style.display = 'block';
            document.getElementById('bin').style.display = 'none';
            document.getElementById('office').style.display = 'block';
            document.getElementById('company-address').style.display = 'none';
            document.getElementById('company-name').style.display = 'none';

        }

        else if(value === 'activePartner') {
            shareholder.classList.remove("register-types-btn-selected");
            activePartner.classList.add('register-types-btn-selected');
            entrepreneur.classList.remove('register-types-btn-selected');
            consumer.classList.remove('register-types-btn-selected');
            seller.classList.remove('register-types-btn-selected');
            user.classList.remove('register-types-btn-selected');
            document.getElementById('speakers').style.display = 'block';
            document.getElementById('sponsors').style.display = 'block';
            document.getElementById('inviters').style.display = 'block';
            document.getElementById('iin').style.display = 'block';
            document.getElementById('bin').style.display = 'none';
            document.getElementById('office').style.display = 'block';
            document.getElementById('company-address').style.display = 'none';
            document.getElementById('company-name').style.display = 'none';
        }
        else if(value === 'entrepreneur') {
            shareholder.classList.remove("register-types-btn-selected");
            activePartner.classList.remove('register-types-btn-selected');
            entrepreneur.classList.add('register-types-btn-selected');
            consumer.classList.remove('register-types-btn-selected');
            seller.classList.remove('register-types-btn-selected');
            user.classList.remove('register-types-btn-selected');
            document.getElementById('speakers').style.display = 'none';
            document.getElementById('sponsors').style.display = 'none';
            document.getElementById('inviters').style.display = 'none';
            document.getElementById('iin').style.display = 'none';
            document.getElementById('bin').style.display = 'block';
            document.getElementById('office').style.display = 'none';
            document.getElementById('company-address').style.display = 'block';
            document.getElementById('company-name').style.display = 'block';
        }
        else if(value === 'consumer') {
            shareholder.classList.remove("register-types-btn-selected");
            activePartner.classList.remove('register-types-btn-selected');
            entrepreneur.classList.remove('register-types-btn-selected');
            consumer.classList.add('register-types-btn-selected');
            seller.classList.remove('register-types-btn-selected');
            user.classList.remove('register-types-btn-selected');
            document.getElementById('speakers').style.display = 'none';
            document.getElementById('sponsors').style.display = 'block';
            document.getElementById('inviters').style.display = 'none';
            document.getElementById('iin').style.display = 'none';
            document.getElementById('bin').style.display = 'none';
            document.getElementById('company-address').style.display = 'none';
            document.getElementById('company-name').style.display = 'none';
            document.getElementById('office').style.display = 'none';
        }
        else if(value === 'seller') {
            shareholder.classList.remove("register-types-btn-selected");
            activePartner.classList.remove('register-types-btn-selected');
            entrepreneur.classList.remove('register-types-btn-selected');
            consumer.classList.remove('register-types-btn-selected');
            seller.classList.add('register-types-btn-selected');
            user.classList.remove('register-types-btn-selected');
            document.getElementById('speakers').style.display = 'none';
            document.getElementById('sponsors').style.display = 'none';
            document.getElementById('inviters').style.display = 'none';
            document.getElementById('iin').style.display = 'none';
            document.getElementById('bin').style.display = 'none';
            document.getElementById('company-address').style.display = 'none';
            document.getElementById('company-name').style.display = 'none';
            document.getElementById('office').style.display = 'none';
        }
        else if(value === 'user') {
            shareholder.classList.remove("register-types-btn-selected");
            activePartner.classList.remove('register-types-btn-selected');
            entrepreneur.classList.remove('register-types-btn-selected');
            consumer.classList.remove('register-types-btn-selected');
            seller.classList.remove('register-types-btn-selected');
            user.classList.add('register-types-btn-selected');
            document.getElementById('speakers').style.display = 'none';
            document.getElementById('sponsors').style.display = 'block';
            document.getElementById('inviters').style.display = 'none';
            document.getElementById('iin').style.display = 'none';
            document.getElementById('bin').style.display = 'none';
            document.getElementById('company-address').style.display = 'none';
            document.getElementById('company-name').style.display = 'none';
            document.getElementById('office').style.display = 'none';
        }

    }
</script>

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
        <div class="register-image w-100 text-uppercase"><span class="programs-image-text" >регистрация</span></div>
        <div class="container">
            <nav class="breadcrumbs text-center fs-11" style="margin-top: 30px">
                <ul class="list-unstyled d-flex-row font-weight-lighter text-uppercase">
                    <a href="/" class="my-text font-weight-400">главная <i class="fa fa-angle-right ml-1"></i></a>

                    <a class="my-text font-weight-400 ml-1">программы</a>
                </ul>
            </nav>
        </div>

        <br>
        <div class="text-uppercase fs-27 black-text-color text-center font-weight-600" style="letter-spacing: 3px">выберите форму регистрации</div>
        <div class="container mb-7">
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
                                <div style="">
                                    <header class="text-center">
                                        <h1>Регистрация</h1>
                                        <p>Еще нету аккаунта?</p>
                                    </header>
                                    @if(isset($error))
                                        <div class="alert alert-danger">
                                            <p style="color:red">{{$error}}</p>
                                        </div>
                                    @endif
                                    <form method="post" action="/register">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <div class="row">
                                            <div class="col-xs-12 col-sm-6 form-group">
                                                <input id="first-name" required type="text" name="name" value="{{$row->name}}"
                                                       class="form-control input" placeholder="Имя"/>
                                                <input id="last-name" type="text" name="last_name" value="{{$row->last_name}}"
                                                       class="form-control input" placeholder="Фамилия"/>
                                                <input id="login" type="text" name="login" value="{{$row->login}}"
                                                       class="form-control input" placeholder="Логин"/>
                                                <input id="iin" type="text" name="iin" value="{{$row->iin}}"
                                                       class="form-control input" placeholder="ИИН"/>
                                                <input id="bin" type="text" name="bin" value="{{$row->iin}}"
                                                       class="form-control input" placeholder="БИН"/>
                                                <input id="company-name" required type="text" name="company-name" value="{{$row->company_name}}"
                                                       class="form-control input" placeholder="Название компании"/>
                                                <div id="sponsors">
                                                    {{Form::select('is_activated', $activate, 1, ['class' => 'form-control selectpicker input','placeholder' => 'Выберите название программы', 'data-live-search' => 'true'])}}
                                                        <select required name="recommend_user_id"
                                                            data-placeholder="Выберите спонсора (1 уровень)"
                                                            class="form-control selectpicker input"
                                                            data-live-search="true">
                                                        <option value="">Выберите спонсора (1 уровень)</option>
                                                        @if( isset($row->recommend_user_id) || (isset($_GET['id']) && $_GET['id']))
                                                            <?php  $item = \App\Models\Users::where(['user_id' => (isset($_GET['id']) ? $_GET['id'] : $row->recommend_user_id)])->first(); ?>
                                                            <option selected
                                                                    value="{{$item->user_id}}"> {{$item->login}}
                                                            </option>
                                                        @endif
                                                        @foreach($recommend_row as $item)
                                                            <option @if($row->recommend_user_id == $item->user_id || (isset($_GET['id']) && $_GET['id'] == $item->user_id) ) {{'selected'}} @endif value="{{$item->user_id}}">
                                                                {{$item['login']}}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>

                                                <div id="inviters">
                                                    <select required name="inviter_user_id"
                                                            data-placeholder="Выберите пригласителя"
                                                            class="form-control selectpicker input"
                                                            data-live-search="true">
                                                        <option value="">Выберите пригласителя</option>
                                                        @if( isset($row->recommend_user_id) || (isset($_GET['id']) && $_GET['id']))
                                                            <?php  $item = \App\Models\Users::where(['user_id' => (isset($_GET['id']) ? $_GET['id'] : $row->recommend_user_id)])->first(); ?>
                                                            <option selected
                                                                    value="{{$item->user_id}}"> {{sprintf('%s (%s)',$item->login, $item->last_name)}}
                                                            </option>
                                                        @endif
                                                        @foreach($recommend_row as $item)
                                                            <option @if($row->recommend_user_id == $item->user_id || (isset($_GET['id']) && $_GET['id'] == $item->user_id) ) {{'selected'}} @endif value="{{$item->user_id}}">
                                                                {{$item['login']}}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-xs-12 col-sm-6 form-group">
                                                <input id="email" required type="email" name="email" class="form-control input"
                                                       value="{{$row->email}}" placeholder="Email"/>
                                                <input id="phone" required type="tel" name="phone" class="form-control input"
                                                       value="{{$row->phone}}" placeholder="Номер телефона"/>
                                                <input id="password" required type="password" value="{{$row->password}}"
                                                       name="password" class="form-control input"
                                                       placeholder="Пароль"/>
                                                <input id="confirm-password" required type="password" value="{{$row->confirm_password}}"
                                                       name="confirm_password" class="form-control input"
                                                       placeholder="Повторите пароль"/>
                                                <input id="company-address" required type="text" name="company-address" value="{{$row->company_address}}"
                                                       class="form-control input" placeholder="Адрес компании"/>

                                                <div id="speakers">
                                                    <select required name="speaker_id"
                                                            data-placeholder="Выберите спикера"
                                                            class="form-control selectpicker input"
                                                            data-live-search="true">
                                                        <option value="">Выберите спикера</option>
                                                        @foreach($speaker_row as $item)
                                                            <option @if($row->speaker_id == $item->user_id || (isset($_GET['id']) && $_GET['id'] == $item->user_id)) {{'selected'}} @endif value="{{$item->user_id}}">{{$item['login']}} {{--({{$item['last_name']}} {{$item['name']}} {{$item['middle_name']}})--}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>

                                                <div id="office">
                                                    <select required name="office_director_id"
                                                            data-placeholder="Выберите директора офиса"
                                                            class="form-control selectpicker input"
                                                            data-live-search="true">
                                                        <option value="">Выберите офис</option>
                                                        @foreach($office_row as $item)
                                                            <option @if($row->office_director_id == $item->user_id || (isset($_GET['id']) && $_GET['id'] == $item->user_id)) {{'selected'}} @endif value="{{$item->user_id}}">{{$item['office_name']}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-md-6 offset-md-4">
                                                {!! NoCaptcha::display() !!}
                                                @if ($errors->has('g-recaptcha-response'))
                                                    <span class="help-block">
                                                     <strong>{{ $errors->first('g-recaptcha-response') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                        <br>
                                        <div class="" style="width: 100%; display: flex">
                                            <button type="submit" class="btn btn-danger font-weight-600" style="background: red !important; border-radius: 20px; margin: 0 auto; font-size: 22px !important; padding: 5px 20px">Зарегистрироваться
                                            </button>
                                        </div>

                                    </form>
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
        background-image:url('/new_design/images/banners/montazhnaya1.png');
        height: 172px;
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