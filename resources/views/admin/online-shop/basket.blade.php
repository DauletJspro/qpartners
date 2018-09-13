@extends('admin.layout.layout')

@section('breadcrump')

    <section class="content-header">
        <h1>
            Корзина
        </h1>

        <div style="text-align: right">
            <a style="font-size: 20px;text-decoration: underline;" href="/admin/online">Перейти в магазин<span id="basket_count" class="label label-primary pull-right" style=" background-color: rgb(253, 58, 53) ! important; font-size: 15px; border-radius: 50%">{{$row->basket_count}}</span></a>
        </div>
    </section>

@endsection

@section('content')

    <div class="row">
        <div class="col-lg-12 col-xs-12">
            <h2 class="page-header">Корзина</h2>
        </div>
        <div class="col-xs-12">
            <div class="box">
                @include('admin.online-shop.basket-list-loop')
            </div>
        </div>
    </div>

@endsection


