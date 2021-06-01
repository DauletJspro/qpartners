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
                                        <th style="width: 150px">Карта</th>
                                        <th style="width: 100px">Сумма</th>
                                        <th>Скидка(%)</th>
                                        <th>Дата</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($orders as $key => $val)
                                        <tr @if($val->is_paid == 1) style="background-color: #91ff91 !important;" @endif>
                                            <td> {{ $key + 1 }}</td>
                                            <td class="arial-font">
                                                {{ $val->first_name }} {{ $val->last_name }}
                                            </td>
                                            <td class="arial-font">
                                                {{ $val->phone }}
                                            </td>
                                            <td class="arial-font">
                                                {{ $val->address }}
                                            </td>
                                            <td class="arial-font">
                                                <a href="{{ route('gap_card.detail', $val->gap_card->id) }}">
                                                    {{ $val->gap_card->title_ru }}
                                                </a>
                                            </td>
                                            <td class="arial-font">
                                                {{ $val->total_price }} $ ({{round($val->total_price * \App\Models\Currency::where('currency_name','тенге')->first()->money,2)}})
                                            </td>
                                            <td class="arial-font">
                                                {{ $val->gap_card->discount_percentage }}
                                            </td>
                                            <td class="arial-font">
                                                {{ $val->created_at }}
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>

                        </div>
                    </div>
                </div>

@endsection