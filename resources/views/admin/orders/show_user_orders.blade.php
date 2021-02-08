<?php

use \App\Models\Currency;

?>
@extends('admin.layout.layout')

@section('content')

    <div class="row">
        <div class="col-xs-12">
            <div class="box">


                <div class="box-body">
                    <div class="box-header">
                        <h1 class="box-title main-title">
                            Заказы
                        </h1>
                        <br>
                        <br>
                        <p>
                            Если вы получили заказ, пожалуйста нажмите кнопку доставленно!
                        </p>
                    </div>
                    <div class="nav-tabs-custom">

                        <div class="tab-content">
                            <div>
                                    <table id="news_datatable" class="table table-bordered table-striped table-css">
                                        <thead>
                                        <tr>
                                            <th style="width: 30px">№</th>
                                            <th>Пользователь</th>
                                            <th>Контакты</th>
                                            <th style="width: 150px">Адрес</th>
                                            <th style="width: 100px">Сумма</th>
                                            <th>Номер заказа</th>
                                            <th>Оплачено</th>
                                            <th>Дата</th>
                                            <th></th>

                                        </tr>
                                        </thead>

                                        <tbody>
                                        @foreach($getOrders as $key => $val)
                                            <tr @if($val->is_paid == 1) style="background-color: #91ff91 !important;" @endif>
                                                <td> {{ $key + 1 }}</td>
                                                    <td class="arial-font">
                                                        {{ $val->username }}
                                                    </td>
                                                    <td class="arial-font">
                                                        {{ $val->contact }}
                                                    </td>
                                                    <td class="arial-font">
                                                        {{ $val->address }}
                                                    </td>
                                                    <td class="arial-font">
                                                        {{ $val->sum }} тг
                                                    </td>
                                                    <td class="arial-font">
                                                        {{ $val->order_code }}
                                                    </td>
                                                    <td class="arial-font">
                                                        @if ($val->is_paid)
                                                            ДА
                                                        @else
                                                            НЕТ
                                                        @endif
                                                    </td>
                                                    <td class="arial-font">
                                                        {{ $val->created_at }}
                                                    </td>
                                                <form method="POST" action="{{route('orders.update', $val->id)}}">
                                                    {{ csrf_field() }}
                                                    <td>
                                                        <button type="submit" class="btn btn-primary">Доставленно</button>
                                                    </td>
                                                </form>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                            </div>

                        </div>
                    </div>
                </div>

@endsection