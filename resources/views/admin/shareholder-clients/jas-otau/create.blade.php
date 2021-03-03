@extends('admin.layout.layout')

@section('content')
    <section class="content-header">
        <h3 class="box-title box-title-second">
            <a href="/admin/jasotau">JasOtau</a>
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
                            <form action="{{route('jasotau.store')}}" method="POST">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <div class="box-body">
                                            <div class="form-group">
                                                <label>Название Группы</label>
                                                <input value="{{ $item->group_name }}" type="text"
                                                       class="form-control" name="group_name"
                                                       placeholder="Введите">
                                            </div>
                                            <div class="form-group">
                                                <label>Название программы</label>
                                                {{Form::select('program_id', $listOfProgram, null, ['class' => 'form-control','placeholder' => 'Выберите название программы'])}}
                                            </div>
                                        <div class="box-footer">
                                            <button type="submit" class="btn btn-primary">Сохранить</button>
                                        </div>
                                        </div>
                                    </form>

                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection

