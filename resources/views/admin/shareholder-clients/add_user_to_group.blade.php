@extends('admin.layout.layout')

@section('content')
    <section class="content-header">
        <h3 class="box-title box-title-second">
            <a href="/admin/cooperative">Авто программа</a>
        </h3>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="col-md-8" style="padding-left: 0px">
                    <div class="box box-primary">
                        @if (isset($error))
                            <div class="alert alert-danger">
                                {{ $error }}
                            </div>
                        @endif
                        <form action="{{route('client.auto.update', $user->user_id)}}" method="POST">
                            <input type="hidden" name="_method" value="PUT">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <div class="box-body">
                                <div class="form-group">
                                    <label>Логин пользователя: {{$user->login}}</label>
                                    <p class="login"></p>
                                    <label>ИИН пользователя: {{$user->iin}}</label>
                                    <p class="login"></p>
                                    <div class="form-group">
                                        <label>Название программы:</label>
                                        {{Form::select('group_id', $listOfGroup, null, ['class' => 'form-control','placeholder' => 'Выберите название программы'])}}
                                    </div>
                                </div>
                                <div class="box-footer">
                                    <button type="submit" class="btn btn-primary">Добавить</button>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection

