@extends('admin.layout.layout')
@section('content')
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                @if(\Illuminate\Support\Facades\Auth::user()->role_id == 1)
                <div class="panel-heading">Вопрос клиенту</div>
                @else
                    <div class="panel-heading">Вопрос администратору</div>
                @endif

                <div class="panel-body">
                    @include('admin.tickets.includes.flash')

                    <form class="form-horizontal" role="form" method="POST" action="{{ url('admin/new_ticket') }}">
                        {!! csrf_field() !!}

                        <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                            <label for="title" class="col-md-4 control-label">Загаловок</label>

                            <div class="col-md-6">
                                <input id="title" type="text" class="form-control" name="title" value="{{ old('title') }}">

                                @if ($errors->has('title'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('title') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('category') ? ' has-error' : '' }}">
                            <label for="category" class="col-md-4 control-label">Категории</label>

                            <div class="col-md-6">
                                <select id="category" type="category" class="form-control" name="category">
                                    <option value="">Выберите категорию</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>

                                @if ($errors->has('category'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('category') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        @if(\Illuminate\Support\Facades\Auth::user()->role_id == 1)
                        <div class="form-group{{ $errors->has('recipient') ? ' has-error' : '' }}">
                            <label for="recipient" class="col-md-4 control-label">Список пользователей</label>

                            <div class="col-md-6">
                                <select id="recipient" type="recipient" class="form-control selectpicker"
                                        name="recipient" data-live-search="true">
                                    <option value="">Выберите получателя</option>
                                @foreach ($users as $user)
                                        <option value="{{ $user->user_id }}">{{ $user->login }}</option>
                                    @endforeach
                                </select>

                                @if ($errors->has('recipient'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('recipient') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        @endif

                        <div class="form-group{{ $errors->has('priority') ? ' has-error' : '' }}">
                            <label for="priority" class="col-md-4 control-label">Приоритет</label>

                            <div class="col-md-6">
                                <select id="priority" type="" class="form-control" name="priority">
                                    <option value="">Выберите приоритет</option>
                                    <option value="low">Низкий</option>
                                    <option value="medium">Среднии</option>
                                    <option value="high">Высокий</option>
                                </select>

                                @if ($errors->has('priority'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('priority') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('message') ? ' has-error' : '' }}">
                            <label for="message" class="col-md-4 control-label">Сообщение</label>

                            <div class="col-md-6">
                                <textarea rows="10" id="message" class="form-control" name="message"></textarea>

                                @if ($errors->has('message'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('message') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-btn fa-ticket"></i> Отправить
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
<style>
    .bootstrap-select > .dropdown-toggle, .btn-default:active, .btn-default.active, .open>.dropdown-toggle.btn-default {
        height: 34px!important;
    }
</style>


