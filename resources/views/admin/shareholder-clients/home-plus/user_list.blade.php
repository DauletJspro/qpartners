@extends('admin.layout.layout')

@section('content')


    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title box-title-first">
                        <a href="/admin/client/share"
                           class="menu-tab @if((!isset($request->is_ban) && !isset($request->is_active)) ||  $request->is_ban == '0') active-page @endif">Все
                            пайщики</a>
                    </h3>
                    <h3 class="box-title box-title-first">
                        <a href=""
                           class="menu-tab @if(isset($request->is_active)) active-page @endif">Неактивные
                            пользователи</a>
                    </h3>
                    <h3 class="box-title box-title-second">
                        <a href="/admin/homes">Баспана +</a>
                    </h3>
                    <div class="clear-float"></div>
                </div>
                <div>
                    <div class="box-body">
                        <div class="nav-tabs-custom">

                            <div class="tab-content">
                                <div>
                                    <table id="news_datatable" class="table table-bordered table-striped table-css">
                                        <thead>

                                        <tr>
                                            <th style="width: 30px">№</th>
                                            <th>Имя пользователя</th>
                                            <th>ИИН пользователя</th>
                                            <th>Номер телефона</th>
                                            <th></th>
                                        </tr>
                                        </thead>

                                        <tbody>

                                        <tr>
                                            <td>
                                            </td>
                                            <td>
                                                <form>
                                                    <input value="{{$request->login}}" type="text"
                                                           class="form-control" name="login" placeholder="Поиск">
                                                </form>
                                            </td>
                                            <td>
                                                <form>
                                                    <input value="{{$request->iin}}" type="text"
                                                           class="form-control" name="iin" placeholder="Поиск">
                                                </form>
                                            </td>
                                            <td></td>
                                            <td></td>
                                        </tr>

                                        @foreach( $request->row as $key => $val)

                                                <form action="{{route('clients.plus.edit', $val->user_id)}}" method="POST">
                                                    <input type="hidden" name="_method" value="GET">
                                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                    <tr>
                                                        <td> {{ $key + 1 }}</td>
                                                        <td class="arial-font">
                                                            <a class="main-label"  target=><p  class="login">{{$val->login}}</p></a>
                                                            <p class="client-name">{{ $val->name }} {{ $val->last_name }} {{ $val->middle_name }}</p>

                                                        </td>
                                                        <td>
                                                            {{$val->iin}}
                                                        </td>
                                                        <td class="arial-font">
                                                            <a class="main-label"
                                                               target=""><p
                                                                        class="login">{{$val->phone}}</p></a>
                                                        </td>
                                                        <td>
                                                            <button type="submit" class="btn btn-primary">Добавить в группу
                                                            </button>
                                                        </td>
                                                    </tr>
                                                </form>

                                        @endforeach

                                        </tbody>

                                    </table>

                                </div>

                            </div>

                        </div>
                        <div style="text-align: center">
                            {{ $row->row->appends(\Illuminate\Support\Facades\Input::except('page'))->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>


@endsection