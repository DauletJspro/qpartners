@extends('admin.layout.layout')

@section('content')

    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <div class="clear-float"></div>
                </div>

                <div class="box-body">

                    <div class="col-md-12">
                        <h3 class="box-title box-title-first">
                            <a class="menu-tab ">Отправить на другой аккаунт</a>
                        </h3>
                        <div class="form-group">
                            <label style="font-weight: 400; font-size: 18px">Ваша текущая сумма: <b>{{Auth::user()->user_money}} $</b> ({{Auth::user()->user_money * 400}} тг) </label></br>
                            {{--<label style="font-weight: 400; font-size: 18px">Активация за месяц: <b>{{$status->user_month_activation_money}}</b> ({{($status->user_month_activation_money * 300)}} тг) </label></br>--}}
                            {{--<label style="font-weight: 400; font-size: 18px">Доступная сумма: <b>@if(Auth::user()->user_money - $status->user_month_activation_money > 0){{Auth::user()->user_money - $status->user_month_activation_money}} $</b> ({{(Auth::user()->user_money - $status->user_month_activation_money) * 400}} тг)@else 0$ @endif </label>--}}
                        </div>
                        <div class="form-group">
                            <label>Укажите сумму ($)</label>
                            <input id="money" min="0" onchange="changeMoney()" required value="" type="numeric" class="form-control" name="money" placeholder="Введите">
                            {{--<p style="font-family: Tahoma; font-weight: 700; margin-top: 9px; font-size: 13px; color: rgb(253, 58, 53);">Комиссия 10%: <span id="money_label" style="color: black"></span></p>--}}
                        </div>
                        <div class="form-group">
                            <label>Напишите логин получателя</label>
                            <select id="recipient_id" required name="recipient_id" data-placeholder="Выберите спонсора" class="form-control selectpicker" data-live-search="true">
                                <option value=""></option>
                                @foreach($users_row as $item)
                                    <option value="{{$item->user_id}}">{{$item['login']}} ({{$item['last_name']}} {{$item['name']}} {{$item['middle_name']}})</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Комментарии</label>
                            <textarea class="form-control" id="comment"></textarea>
                        </div>
                        <div class="box-footer">
                            <button type="button" class="btn btn-primary" onclick="sendMoneyToOtherAccount()">Отправить запрос</button>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

@endsection