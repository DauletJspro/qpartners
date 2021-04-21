<?php $title = 'Добавить под категорию'; ?>
@php($categories = \App\Models\Category::pluck('name', 'id')->toArray())
@extends('admin.layout.layout')
@section('content')

    <section class="content-header">
        <h1>
            {{ $title }}
        </h1>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-md-10" style="padding-left: 0px">
                <div class="box box-primary">
                    @if (isset($error))
                        <div class="alert alert-danger">
                            {{ $error }}
                        </div>
                    @endif
                    <div class="box-body">
                        {{ Form::open(['action' => ['Admin\SubCategoryController@store'], 'method' => 'POST']) }}
                        {{ Form::token() }}
                        <input type="hidden" name="image"
                               class="image-name">
                        <div class="form-group">
                            {{ Form::label('Название на казахском', null, ['class' => 'control-label']) }}
                            {{ Form::text('title_kz',null, ['class' => 'form-control'])}}
                        </div>
                        <div class="form-group">
                            {{ Form::label('Название на русском', null, ['class' => 'control-label']) }}
                            {{ Form::text('title_ru',null, ['class' => 'form-control'])}}
                        </div>
                        <div class="form-group">
                            {{ Form::label('Выберите категорию', null, ['class' => 'control-label']) }}
                            {{Form::select('category_id',$categories, null, ['class' => 'form-control'] )}}
                        </div>
                        {{ Form::submit('Создать', ['class'=> 'btn btn-primary']) }}
                        {{ Form::close() }}
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection