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
                            Рейтинги
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
                                        <th style="width: 150px">Карта</th>
                                        <th style="width: 100px">Рейтинг</th>
                                        <th>Дата</th>

                                    </tr>
                                    </thead>

                                    <tbody>
                                    @foreach($ratings as $key => $val)
                                        <tr @if($val->is_paid == 1) style="background-color: #91ff91 !important;" @endif>
                                            <td> {{ $key + 1 }}</td>
                                            <td class="arial-font">
                                                <a href="{{ route('gap_card.detail', $val->gap_card->id) }}">
                                                    {{ $val->gap_card->title_ru }}
                                                </a>
                                            </td>
                                            <td class="arial-font">
                                                {{ $val->rating }}
                                                <i class="fa fa-star"></i>
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