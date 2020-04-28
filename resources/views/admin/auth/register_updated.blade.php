@extends('index_updated.layout.layout')
@section('meta-tags')

    <title>Qpartners</title>
    <meta name="description"
          content="«Qpartners» - это уникальный медиа проект с широким набором возожностей для взаймодествия с участниками виртуального рынка"/>
    <meta name="keywords" content="Qpartners"/>

@endsection
@section('content')
    <section class="mt-detail-sec toppadding-zero" style="margin-top: 5rem;">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-10 col-sm-push-1">
                    <div class="holder" style="margin: 0;">
                        <div class="mt-side-widget">
                            <header>
                                <h2 style="margin: 0 0 5px;font-weight: bold;">Регистрация</h2>
                            </header>
                            <form method="post" action="/register">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <p style="color:red; font-weight: bold; font-size: 120%:">@if(isset($error)){{$error}}@endif</p>
                                <fieldset>
                                    <div class="row">
                                        <div class="col-xs-12 col-sm-6">
                                            <input required class="input" type="text" name="name" value="{{$row->name}}"
                                                   class="form-control" placeholder="Имя"/>
                                        </div>
                                        <div class="col-xs-12 col-sm-6">
                                            <input required class="input" type="email" name="email" class="form-control"
                                                   value="{{$row->email}}" placeholder="Email"/>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-xs-12 col-sm-6">
                                            <input required class="input" type="text" name="login"
                                                   value="{{$row->login}}" class="form-control"
                                                   placeholder="Логин"/>
                                        </div>
                                        <div class="col-xs-12 col-sm-6">
                                            <input class="input" required type="password" value="{{$row->password}}"
                                                   name="password" class="form-control" placeholder="Пароль"/>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-xs-12 col-sm-6 form-group">
                                            <select class="input" required name="recommend_user_id"
                                                    data-placeholder="Выберите спонсора"
                                                    class="form-control selectpicker" data-live-search="true">
                                                <option value="">Выберите спонсора</option>
                                                @foreach($recommend_row as $item)
                                                    <option @if($row->recommend_user_id == $item->user_id || (isset($_GET['id']) && $_GET['id'] == $item->user_id) ) {{'selected'}} @endif value="{{$item->user_id}}">{{$item['login']}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-xs-12 col-sm-6">
                                            <input class="input" required type="password"
                                                   value="{{$row->confirm_password}}"
                                                   name="confirm_password" class="form-control"
                                                   placeholder="Повторите пароль"/>
                                        </div>
                                    </div>
                                    <div class="col-md-12 agree-label">
                                        <input required type="checkbox" value="1" id="agree_checkbox"><span style="font-size: 120%;font-weight: bold;">Регистрируясь на
                                        сайте вы подтверждаете, что ознакомлены с <a target="_blank"
                                                                                     style="font-weight: bold; color: #0d6aad;"
                                                                                     href="/file/dogovor_QT.pdf">Договором</a>
                                        и <a target="_blank" style="font-weight: bold;color: #0d6aad;" href="/presentation/qaz.pdf?v=1">презентацией</a>.</span>
                                    </div>
                                    <button type="submit" class="btn-type1" style="margin-top: 2rem;width:100%;font-size: 130%; font-weight: bold;">
                                        Зарегистрироваться
                                    </button>
                                </fieldset>
                                <div class="footer">
                                    <div class="form-group" style="text-align: center;font-size: 120%;font-weight: bold;">
                                        Если Вы уже зарегистрированы на нашем сайте, нажмите <a style="font-weight: bold; color: #0d6aad;" href="/login">«Войти»</a>
                                    </div>
                                    <div class="form-group" style="text-align: center">
                                        <a style="font-weight: bold; font-size: 130%; color: #0d6aad;" href="/">Главная страница</a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection