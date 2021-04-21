@extends('admin.layout.layout')

@section('content')
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title box-title-first">
                        <a class="menu-tab active-page" href="/admin/category">Все категорий</a>
                        <a class="menu-tab active-page" href="/admin/sub_category">Все под категорий</a>
                        <a class="menu-tab active-page" href="/admin/product">Все товары</a>
                        <a class="menu-tab active-page" href="/admin/brand">Все бренды</a>
                    </h3>
                    <div style="float: right;">
                        <a href="/admin/product/create">
                            <button class="btn btn-primary box-add-btn">Добавить товар</button>
                        </a>
                        <a href="/admin/category/create">
                            <button class="btn btn-success box-add-btn">Добавить категорию</button>
                        </a>
                        <br>
                        <a href="/admin/sub_category/create">
                            <button class="btn btn-success box-add-btn">Добавить под категорию</button>
                        </a>
                        <a href="/admin/brand/create">
                            <button class="btn btn-warning box-add-btn">Добавить бренд</button>
                        </a>
                    </div>
                    <div class="clear-float"></div>
                </div>
                <div class="box-body">
                    <table id="packet_datatable" class="table table-bordered table-striped">
                        <thead>
                        <tr style="border: 1px">
                            <th style="width: 30px">№</th>
                            <th>Название на казахском</th>
                            <th>Название на русском</th>
                            <th>Категория</th>
                            <th>Дата создание</th>
                            <th>Дата редактирование</th>

                            <th style="width: 15px"></th>
                            <th style="width: 15px"></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($subCategories as $category)
                            <tr>
                                <td>{{ $category->id }}</td>
                                <td>{{ $category->title_kz }}</td>
                                <td>{{ $category->title_ru }}</td>
                                <td>{{ isset($category->category) ?  $category->category->name : 'Не указано' }}</td>
                                <td>{{ $category->created_at}}</td>
                                <td>{{ $category->updated_at}}</td>
                                <td style="text-align: center">
                                    <a href="/admin/sub_category/{{ $category->id }}/edit">
                                        <li class="fa fa-pencil" style="font-size: 20px;"></li>
                                    </a>
                                </td>
                                <td style="text-align: center">
                                    <a href="javascript:void(0)"
                                       onclick="delItem(this,'{{ $category->id }}','sub_category')">
                                        <li class="fa fa-trash-o" style="font-size: 20px; color: red;"></li>
                                    </a>
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