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
                                <p style="color:red; font-weight: bold;">@if(isset($error)){{$error}}@endif</p>
                                <fieldset>
                                    <div class="row">
                                        <div class="col-xs-12 col-sm-6">
                                            <input required class="input" type="text" name="name" value="{{$row->name}}"
                                                   class="form-control" placeholder="Имя"/>
                                        </div>
                                        <div class="col-xs-12 col-sm-6">
                                            <input required class="input" type="text" name="last_name"
                                                   value="{{$row->last_name}}" class="form-control"
                                                   placeholder="Фамилия"/>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-xs-12 col-sm-6">
                                            <input required class="input" type="email" name="email" class="form-control"
                                                   value="{{$row->email}}" placeholder="Email"/>
                                        </div>
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
                                    </div>
                                    <div class="row">
                                        <div class="col-xs-12 col-sm-6">
                                            <input class="input" required type="password" value="{{$row->password}}"
                                                   name="password" class="form-control" placeholder="Пароль"/>
                                        </div>
                                        <div class="col-xs-12 col-sm-6">
                                            <input class="input" required type="password" value="{{$row->confirm_password}}"
                                                   name="confirm_password" class="form-control"
                                                   placeholder="Повторите пароль"/>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-xs-12 col-sm-6">
                                            <select class="input" onchange="getCityListByCountry(this)" required name="country_id" data-placeholder="Выберите страну" class="form-control" data-live-search="true">
                                                <option value="">Выберите страну</option>
                                                @foreach($country_row as $item)
                                                    <option @if($row->country_id == $item->country_id) {{'selected'}} @endif value="{{$item->country_id}}">{{$item['country_name_ru']}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-xs-12 col-sm-6">
                                            <input class="input" required type="text" name="phone" value="{{$row->phone}}" class="form-control" placeholder="Телефон"/>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-xs-12 col-sm-6">
                                            <select class="input" id="city_id" required name="city_id" data-placeholder="Выберите город" class="form-control" data-live-search="true">
                                                <option value="">Выберите город</option>
                                                @foreach($city_row as $item)
                                                    <option @if($row->city_id == $item->city_id) {{'selected'}} @endif value="{{$item->city_id}}">{{$item['city_name_ru']}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn-type1" style="margin-top: 2rem;width:100%;">Зарегистрироваться</button>
                                </fieldset>
                            </form>
                            <ul class="mt-socialicons" style="margin-top: 3rem;">
                                <li class="mt-facebook"><a href="#"><i class="fa fa-facebook-f"></i></a></li>
                                <li class="mt-twitter"><a href="#"><i class="fa fa-twitter"></i></a></li>
                                <li class="mt-linkedin"><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                <li class="mt-dribbble"><a href="#"><i class="fa fa-dribbble"></i></a></li>
                                <li class="mt-pinterest"><a href="#"><i class="fa fa-openid"></i></a></li>
                                <li class="mt-youtube"><a href="#"><i class="fa fa-youtube-play"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection