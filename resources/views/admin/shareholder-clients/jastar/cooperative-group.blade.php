@extends('admin.layout.layout')

@section('content')


    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title box-title-first">
                        <a href="client/share"
                           class="menu-tab @if((!isset($request->is_ban) && !isset($request->is_active)) ||  $request->is_ban == '0') active-page @endif">Все
                            пайщики</a>
                    </h3>
                    <h3 class="box-title box-title-first">
                        <a href=""
                           class="menu-tab @if(isset($request->is_active)) active-page @endif">Неактивные
                            пользователи</a>
                    </h3>
                    <h3 class="box-title box-title-second">
                        <a href="/admin/jastar">Jastar</a>
                    </h3>
                    <div class="clear-float"></div>
                </div>
                <div>
                        <div class="box-body">
                            <a href="/admin/jastar/create"><button type="button" class="btn btn-primary">Создать группу</button></a>
                            <a href="/admin/jastar/clients"><button type="button" class="btn btn-primary ">Добавить пользователя</button></a>
                            <div class="nav-tabs-custom">

                                <div class="tab-content">
                                    <div>
                                        <table id="news_datatable" class="table table-bordered table-striped table-css">
                                            <thead>

                                            <tr>
                                                <th style="width: 30px">№</th>
                                                <th>Имя группы</th>
                                                <th>Название программы</th>
                                                <th>Участники</th>
                                                <th>Дата регист.</th>
                                                </tr>
                                            </thead>

                                            <tbody>

                                            <tr>
                                                <td>
                                                </td>
                                                <td>
                                                    <form>
                                                        <input value="{{$request->group_name}}" type="text"
                                                               class="form-control" name="group_name" placeholder="Поиск">
                                                    </form>
                                                </td>
                                                <td>
                                                </td>
                                                <td></td>
                                                <td></td>
                                            </tr>

                                            @foreach($getGroup as $key => $val)

                                                <tr>
                                                    <td> {{ $key + 1 }}</td>
                                                    <td class="arial-font">
                                                        <a class="main-label"
                                                           target=""><p
                                                                    class="">{{$val->group_name}}</p></a>
                                                    </td>
                                                    <td class="arial-font">
                                                        <a class="main-label"
                                                           target=""><p
                                                                    class="">@if($val->program_id == 7) Jastar @endif</p>
                                                        </a>
                                                    </td>
                                                    <td class="arial-font">
                                                        <a class="main-label" href="/admin/jastar/{{$val->id}}"
                                                           target="_blank"><p
                                                                    class="login">Список пользователи</p>
                                                        </a>
                                                    </td>
                                                    <td class="arial-font">
                                                        <div>
                                                            {{ $val->created_at }}
                                                        </div>
                                                </tr>

                                            @endforeach

                                            </tbody>

                                        </table>

                                    </div>

                                </div>

                            </div>
                         <div style="text-align: center">
                                {{ $getGroup->appends(\Illuminate\Support\Facades\Input::except('page'))->links() }}
                            </div>

                        </div>
                </div>
            </div>
        </div>


@endsection