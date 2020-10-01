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
                    </div>
                    <div class="nav-tabs-custom">

                        <div class="tab-content">
                            <div>
                                <form class="submit_form">
                                    <table id="news_datatable" class="table table-bordered table-striped table-css">
                                        <thead>
                                        <tr>
                                            <th style="width: 30px">№</th>
                                            <th>Пользователь</th>
                                            <th>Контакты</th>
                                            <th style="width: 150px">Адрес</th>
                                            <th style="width: 100px">Сумма</th>
                                            <th>Номер заказа</th>
                                            <th>Номер транзакции</th>
                                            <th>Оплачено</th>
                                            <th>Дата</th>
                                        </tr>
                                        </thead>

                                        <tbody>

                                        {{-- <tr style="background-color: #ebebeb">
                                            <td></td>
                                            <td><input value="{{$request->recipient_name}}" type="text"
                                                       class="form-control" name="recipient_name" placeholder="Поиск">
                                            </td>
                                            <td><input value="{{$request->user_name}}" type="text" class="form-control"
                                                       name="user_name" placeholder="Поиск"></td>
                                            <td><input value="{{$request->operation_type}}" type="text"
                                                       class="form-control" name="operation_type" placeholder="Поиск">
                                            </td>
                                            <td><input value="{{$request->operation}}" type="text" class="form-control"
                                                       name="operation" placeholder="Поиск"></td>
                                            <td colspan="3" style="text-align: center">
                                                от <input style="width: 35%; display: inline-block"
                                                          value="{{$request->date_from}}" type="text"
                                                          class="form-control datetimepicker-input date-submit"
                                                          name="date_from" placeholder="Дата">
                                                - до <input style="width: 35%; display: inline-block"
                                                            value="{{$request->date_to}}" type="text"
                                                            class="form-control datetimepicker-input date-submit"
                                                            name="date_to" placeholder="Дата">
                                                <input type="submit" value="ОК" style="padding: 5px 7px">
                                            </td>
                                        </tr> --}}
                                        @foreach($row as $key => $val)
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
                                                    {{ $val->payment_id }}
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
                                            </tr>
                                        @endforeach

                                        {{-- <tr>
                                            <td colspan="5" style="text-align: right"><b>Общая сумма:</b></td>
                                            <td colspan="1"><b>{{round($row_sum,2)}} $
                                                    ({{round($row_sum * Currency::DollarToKzt,2)}}
                                                    тг)</b></td>
                                            <td colspan="2"></td>
                                        </tr> --}}
                                        </tbody>

                                    </table>
                                </form>
                            </div>

                        </div>
                    </div>


                    <div style="text-align: center">
                        {{ $row->appends(\Illuminate\Support\Facades\Input::except('page'))->links() }}
                    </div>

                </div>
            </div>
        </div>
    </div>

@endsection 