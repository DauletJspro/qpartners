@extends('index_updated.layout.layout')
@section('meta-tags')

    <title>Qpartners</title>
    <meta name="description"
          content="«Qpartners» - это уникальный медиа проект с широким набором возожностей для взаймодествия с участниками виртуального рынка"/>
    <meta name="keywords" content="Qpartners"/>

@endsection
@section('content')
    <section class="mt-detail-sec toppadding-zero">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-8 col-sm-push-2">
                    <div class="holder" style="margin: 0;">
                        <div class="mt-side-widget">
                            <header>
                                <h2 style="margin: 0 0 5px;">Авторизация</h2>
                            </header>
                            <form method="post" action="/login">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <p style="color:red; font-weight: bold;">@if(isset($error)){{$error}}@endif</p>
                                @if(isset($is_confirm_email))
                                    <a style="font-weight: bold; text-decoration: underline" href="/confirm-email">Отправить
                                        код на почту повторно</a>
                                @endif
                                <fieldset>
                                    <input class="input" required type="text" name="login" value="@if(isset($login)){{$login}}@endif" class="form-control" placeholder="E-mail"/>
                                    <input class="input" required type="password" name="password" class="form-control" placeholder="Пароль"/>
                                    <div class="box">
                                        Если вы еще не зарегистрированы на нашем сайте, вы можете сделать это перейдя по ссылке <a href="/register" style="font-weight: bold; text-decoration: underline">регистрация</a>
                                    </div>
                                    <button type="submit" class="btn-type1" style="width: 100%;">Войти</button>
                                </fieldset>

                                <div class="footer" style="margin-top: 3rem;">
                                    <div class="form-group" style="text-align: center">
                                        <div class="col-md-6">
                                            <a style="font-weight: bold; text-decoration: underline" href="/reset-password">Забыли пароль?</a>
                                        </div>
                                        <div class="col-md-6">
                                            <a style="font-weight: bold; text-decoration: underline" href="/">главная страница</a>
                                        </div>
                                        <div style="clear:both"></div>
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