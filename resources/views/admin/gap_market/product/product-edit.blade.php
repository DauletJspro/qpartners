<?php

use Illuminate\Support\Facades\DB;

$categories = \App\Models\SubCategory::pluck('title_ru', 'id')->toArray();
$items = \App\Models\Product::ITEM;
?>
@extends('admin.layout.layout')

@section('content')
    <section class="content-header">
        <h1>
            @if(isset($product))
                Изменить продукт
            @else
                Добавить товар
            @endif
        </h1>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="col-md-8" style="padding-left: 0px">
                    <div class="box box-primary">
                        @if (count($errors) > 0)
                            <div class="alert alert-danger">
                                <ul>
                                    Исправьте следующие ошибки
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        @if($product->product_id > 0)
                            <form action="{{ route('gap_market_product.update', $product->product_id) }}" method="POST">

                                <input type="hidden" name="_method" value="PUT">
                                @else
                                    <form action="{{ route('gap_market_product.store') }}" method="POST">
                                        @endif
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input type="hidden" name="user_id" value="{{ \Illuminate\Support\Facades\Auth::user()->user_id }}">
                                        <input type="hidden" name="city_id" value="8">
                                        <input type="hidden" value="@if(isset($product)){{ $product->product_image }}@endif{{old('product_image')}}" name="product_image"
                                               class="image-name">

                                        <div class="box-body">
                                            <div class="form-group">
                                                <label>Название (Рус)</label>
                                                <input value="@if(isset($product)){{ $product->product_name_ru }}@endif {{old('product_name_ru')}}" type="text"
                                                       class="form-control" name="product_name_ru"
                                                       placeholder="Введите">
                                            </div>
                                            <div class="form-group">
                                                <label>Цена</label>
                                                <input value="@if(isset($product)){{ $product->product_price }}@endif{{old('product_price')}}" type="text"
                                                       class="form-control" name="product_price" placeholder="Введите">
                                            </div>
                                            <div class="form-group">
                                                <label>Балл проукта</label>
                                                <input type="number" value="@if(isset($product)){{ $product->ball }}@endif{{old('ball')}}"
                                                       class="form-control" name="ball"
                                                       placeholder="Введите балл продукта">
                                            </div>
                                            <div class="form-group">
                                                <label>Cach Back (%)</label>
                                                <input min="0" max="100" value="@if(isset($product)) {{ $product->product_cash }}@endif{{old('product_cash')}}" type="number"
                                                       class="form-control" name="product_cash" placeholder="Введите">
                                            </div>
                                            <div class="form-group">
                                                <label>Краткое описание</label>
                                                <textarea class="form-control"
                                                          name="product_desc_ru">@if(isset($product)){{ $product->product_desc_ru }}@endif{{old('product_desc_ru')}}</textarea>
                                            </div>

                                            <div class="form-group">
                                                <label>Полное описание</label>
                                                <textarea rows="10" class="form-control"
                                                          name="full_description_ru"> @if(isset($product)){{ $product->full_description_ru }}@endif{{old('full_description_ru')}}</textarea>
                                            </div>

                                            <div class="form-group">
                                                <label>Информация</label>
                                                <textarea rows="5" class="form-control"
                                                          name="information">@if(isset($product)){{ $product->information }}@endif{{old('information')}}</textarea>
                                            </div>

                                            <div class="form-group">
                                                <label>Состав</label>
                                                <textarea rows="5" class="form-control"
                                                          name="composition">@if(isset($product)){{ $product->composition }}@endif{{old('composition')}}</textarea>
                                            </div>

                                            <div class="form-group">
                                                <label>Порядковый номер сортировки</label>
                                                <input value="@if(isset($product)){{ $product->sort_num }}@endif{{old('sort_num')}}" type="text" class="form-control"
                                                       name="sort_num" placeholder="Введите">
                                            </div>
                                            <div class="form-group">
                                                <div>
                                                    {!! Form::checkbox('is_popular', 1, (isset($product->is_popular) ? $product->is_popular : false)); !!}
                                                    <label>Входит в категорию "Поулярные"</label>
                                                </div>
                                                <div>
                                                    {!! Form::checkbox('is_new', 1, isset($product->is_new) ? $product->is_new : false); !!}
                                                    <label>Входит в категорию "NEW"</label>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label>Выберите под категорию</label>
                                                {!! Form::select('sub_category_id',$categories,($product->sub_category_id ? $product->sub_category_id : null),['class' => 'form-control', 'placeholder' => 'Выберите под категорию']); !!}
                                            </div>
                                            <div class="form-group">
                                                <label>Выберите назначение</label>
                                                {!! Form::select('item_id',$items,$product->item_id ? $product->item_id : null,['class' => 'form-control', 'placeholder' => 'Выберите назначение']); !!}
                                            </div>
                                        </div>
                                        <div class="box-footer">
                                            <button type="submit" class="btn btn-primary">Сохранить</button>
                                        </div>
                                    </form>
                            </form>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="box box-primary" style="padding: 30px; text-align: center">
                        <div style="padding: 20px; border: 1px solid #c2e2f0">
                            <img class="image-src"
                             src=
                            @if(isset($product))
                                {{$product->product_image}}
                            @else
                                "{{ asset('/media/default.jpg') }}"
                             @endif
                                 style="width: 100%; "/>
                        </div>
                        <div style="background-color: #c2e2f0;height: 40px;margin: 0 auto;width: 2px;"></div>
                        <form id="image_form" enctype="multipart/form-data" method="post" class="image-form">
                            <i class="fa fa-plus"></i>
                            <input id="avatar-file" type="file" onchange="uploadImage()" name="image"/>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection

