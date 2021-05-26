@extends('admin.layout.layout')

@section('content')

    <div class="row">
        <div class="col-xs-12">
            <div class="box">


                <div class="box-body">
                    <div class="box-header">
                        <h1 class="box-title main-title">
                            {{$title}}
                        </h1>
                    </div>
                    <div class="nav-tabs-custom">

                        <div class="tab-content">
                            <div>
                                <form class="submit_form">
                                    <table id="news_datatable" class="table table-bordered table-striped table-css">
                                        <thead>
                                        <tr>
                                            <th style="width: 30px">№</th>
                                            <th>Пользователь</th>
                                            <th>Отправитель</th>
                                            <th style="width: 150px">Тип операция</th>
                                            <th style="width: 100px">Операция</th>
                                            <th>Количество</th>
                                            <th>Комментарий</th>
                                            <th>Дата</th>
                                        </tr>
                                        </thead>

                                        <tbody>

                                        <tr style="background-color: #ebebeb">
                                            <td></td>
                                            <td><input value="{{$request->recipient_name}}" type="text"
                                                       class="form-control" name="recipient_name" placeholder="Поиск">
                                            </td>
                                            <td><input value="{{$request->user_name}}" type="text" class="form-control"
                                                       name="user_name" placeholder="Поиск"></td>
                                            <td><input value="{{$request->operation_type}}" type="text"
                                                       class="form-control" name="operation_type" placeholder="Поиск">
                                            </td>
                                            <td><input value="{{$request->operation}}" type="text" class="form-control"
                                                       name="operation" placeholder="Поиск"></td>
                                            <td colspan="3" style="text-align: center">
                                                от <input style="width: 35%; display: inline-block"
                                                          value="{{$request->date_from}}" type="text"
                                                          class="form-control datetimepicker-input date-submit"
                                                          name="date_from" placeholder="Дата">
                                                - до <input style="width: 35%; display: inline-block"
                                                            value="{{$request->date_to}}" type="text"
                                                            class="form-control datetimepicker-input date-submit"
                                                            name="date_to" placeholder="Дата">
                                                <input type="submit" value="ОК" style="padding: 5px 7px">
                                            </td>
                                        </tr>
                                        @foreach($operations as $key => $val)

                                            <tr @if($val->operation_type_id == 10) style="background-color: #91ff91 !important;"
                                                @elseif($val->operation_type_id == 33) style="background-color: yellow !important;"
                                                @elseif($val->operation_type_id == 39) style="background-color: greenyellow !important;"
                                                @elseif($val->operation_type_id == 41) style="background-color: greenyellow !important;" @endif>
                                                <td> {{ $key + 1 }}</td>
                                                <td class="arial-font">
                                                    <a class="main-label"
                                                       @if(Auth::user()->role_id == 1) href="/admin/profile/{{$val->recipient_id}}"
                                                       target="_blank" @endif><p
                                                                class="login"></p>
                                                        <p class="client-name">{{ $val->recipients->name }} {{ $val->recipients->last_name }} {{ $val->recipients->middle_name }}</p>
                                                    </a>
                                                </td>
                                                <td class="arial-font">
                                                    <a class="main-label"
                                                       @if(Auth::user()->role_id == 1) href="/admin/profile/{{$val->author->user_id}}"
                                                       target="_blank" @endif><p class="login">{{$val->author->login}}</p>
                                                        <p class="client-name">{{ $val->author->name }} {{ $val->author->last_name }} {{ $val->author->middle_name }}</p>
                                                    </a>
                                                </td>
                                                <td class="arial-font">
                                                    {{ $val->operation_type_name_ru }}
                                                </td>
                                                <td class="arial-font">
                                                    {{ $val->operation->operation_name_ru }}
                                                </td>
                                                <td class="arial-font">
                                                    {{ round($val->money,2) }} $
                                                    ({{round($val->money * \App\Models\Currency::where('currency_name','тенге')->first()->money,2)}}
                                                    тг)
                                                </td>
                                                <td class="arial-font">
                                                    {{ $val->operation_comment }}
                                                </td>
                                                <td class="arial-font">
                                                    {{ $val->date }}
                                                </td>
                                            </tr>

                                        @endforeach

                                        {{-- <tr>
                                            <td colspan="5" style="text-align: right"><b>Общая сумма:</b> </td>
                                            <td colspan="1"><b>{{round($row_sum,2)}} $ ({{round($row_sum * \App\Models\Currency::where('currency_name','тенге')->first()->money,2)}}тг)</b></td>
                                            <td colspan="2"></td>
                                        </tr> --}}
                                        </tbody>

                                    </table>
                                </form>
                            </div>

                        </div>
                    </div>


                    <div style="text-align: center">
                            {{$operations->links()}}
                    </div>

                </div>
            </div>
        </div>
    </div>

@endsection