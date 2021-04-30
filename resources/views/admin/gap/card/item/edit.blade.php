<?php $title = 'Добавить GAP центры'; ?>
@php ($subCategories = \App\Models\GapCardSubCategory::pluck('title_ru', 'id')->toArray())
@extends('admin.layout.layout')

@section('content')

    <section class="content-header">
        <h1>
            {{ $title }}
        </h1>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="col-md-12" style="padding-left: 0px">
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
                        <div class="box-body">
                            <form action="{{route('gap_item.update', ['gap_item' =>$gapCardItem->id ])}}"
                                  method="post"
                                  enctype="multipart/form-data">
                                <input name="_method" type="hidden" value="PUT">
                                {{ Form::token() }}
                                <div class="form-group">
                                    {{ Form::label('Название на казахском', null, ['class' => 'control-label']) }}
                                    {{ Form::text('title_kz',$gapCardItem->title_kz, ['class' => 'form-control'])}}
                                </div>
                                <div class="form-group">
                                    {{ Form::label('Название на русском', null, ['class' => 'control-label']) }}
                                    {{ Form::text('title_ru',$gapCardItem->title_ru, ['class' => 'form-control'])}}
                                </div>

                                <div class="form-group">
                                    {{ Form::label('Описание на казахском', null, ['class' => 'control-label']) }}
                                    {{ Form::textarea('description_kz',$gapCardItem->description_kz, ['class' => 'form-control', 'rows' => 5])}}
                                </div>
                                <div class="form-group">
                                    {{ Form::label('Описание на русском', null, ['class' => 'control-label']) }}
                                    {{ Form::textarea('description_ru',$gapCardItem->description_ru, ['class' => 'form-control', 'rows' => 5])}}
                                </div>

                                <div class="form-group">
                                    {{ Form::label('Скидка в процентах (%)', null, ['class' => 'control-label']) }}
                                    {{ Form::number('discount_percentage',$gapCardItem->discount_percentage, ['class' => 'form-control'])}}
                                </div>

                                <div class="form-group">
                                    {{ Form::label('Цена', null, ['class' => 'control-label']) }}
                                    {{ Form::number('price',$gapCardItem->price, ['class' => 'form-control'])}}
                                </div>

                                <div class="form-group">
                                    {{ Form::label('Выберите под категорию', null, ['class' => 'control-label']) }}
                                    {{ Form::select('gap_card_sub_category_id',
                                        $subCategories,
                                        $gapCardItem->gap_card_sub_category_id,
                                        ['class' => 'form-control'])}}
                                </div>
                                <div class="card">
                                    <div class="card-body">
                                        {{Form::label('Текущее изображение', null, ['class' => 'control-label']) }}
                                        <br>
                                        <img style="width:100px;height: 100px;"
                                             src="{{asset('/admin/image/gap_item/' . $gapCardItem->image)}}"
                                             alt="">
                                    </div>
                                </div>
                                <div class="form-group">
                                    {{ Form::label('Изображение', null, ['class' => 'control-label']) }}
                                    {{ Form::file('image',null, ['class' => 'form-control'])}}
                                </div>


                                {{ Form::submit('Создать', ['class'=> 'btn btn-primary']) }}
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection