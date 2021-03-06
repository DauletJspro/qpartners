<?php $title = 'Изменить категорий'; ?>
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
                            <form action="{{route('gap_category.update', ['gap_category' => $gapCategory->id])}}"
                                  method="post">
                                {{ Form::token() }}
                                <input name="_method" type="hidden" value="PUT">
                                <div class="form-group">
                                    {{ Form::label('Название на казахском', null, ['class' => 'control-label']) }}
                                    {{ Form::text('title_kz',$gapCategory->title_kz, ['class' => 'form-control'])}}
                                </div>
                                <div class="form-group">
                                    {{ Form::label('Название на русском', null, ['class' => 'control-label']) }}
                                    {{ Form::text('title_ru',$gapCategory->title_ru, ['class' => 'form-control'])}}
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