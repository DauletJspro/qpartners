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
                        @if (isset($error))
                            <div class="alert alert-danger">
                                {{ $error }}
                            </div>
                        @endif
                        <div class="box-body">
                            {{ Form::open(['action' => ['Admin\GapCardItemController@store'],
                            'method' => 'POST',
                             'enctype'=>"multipart/form-data",
                            ]) }}
                            {{ Form::token() }}
                            <div class="form-group">
                                {{ Form::label('Название на казахском', null, ['class' => 'control-label']) }}
                                {{ Form::text('title_kz',null, ['class' => 'form-control'])}}
                            </div>
                            <div class="form-group">
                                {{ Form::label('Название на русском', null, ['class' => 'control-label']) }}
                                {{ Form::text('title_ru',null, ['class' => 'form-control'])}}
                            </div>

                            <div class="form-group">
                                {{ Form::label('Описание на казахском', null, ['class' => 'control-label']) }}
                                {{ Form::textarea('description_kz',null, ['class' => 'form-control', 'rows' => 5])}}
                            </div>
                            <div class="form-group">
                                {{ Form::label('Описание на русском', null, ['class' => 'control-label']) }}
                                {{ Form::textarea('description_ru',null, ['class' => 'form-control', 'rows' => 5])}}
                            </div>

                            <div class="form-group">
                                {{ Form::label('Скидка в процентах (%)', null, ['class' => 'control-label']) }}
                                {{ Form::number('discount_percentage',null, ['class' => 'form-control'])}}
                            </div>

                            <div class="form-group">
                                {{ Form::label('Цена', null, ['class' => 'control-label']) }}
                                {{ Form::number('price',null, ['class' => 'form-control'])}}
                            </div>

                            <div class="form-group">
                                {{ Form::label('Выберите под категорию', null, ['class' => 'control-label']) }}
                                {{ Form::select('gap_card_sub_category_id',
                                    $subCategories,
                                    null,
                                    ['class' => 'form-control'])}}
                            </div>

                            <div class="form-group">
                                {{ Form::label('Изображение', null, ['class' => 'control-label']) }}
                                {{ Form::file('image',null, ['class' => 'form-control'])}}
                            </div>


                            {{ Form::submit('Создать', ['class'=> 'btn btn-primary']) }}
                            {{ Form::close() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection