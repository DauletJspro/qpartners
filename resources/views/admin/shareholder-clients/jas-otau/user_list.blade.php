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
                        <a href="/admin/jasotau">JasOtau</a>
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
                                            <th style="width: 15px">Аватар</th>
                                            <th>ИИН</th>
                                            <th>Спонсор</th>
                                            <th>Пригласитель</th>
                                            <th>Email / Телефон</th>
                                            <th>Пакеты</th>
                                            <th>Дата регист.</th>
                                            <th>Город</th>
                                            <th>Дольщик</th>
                                            <th></th>
                                            <th class="no-sort"
                                                style="width: 0px; text-align: center; padding-right: 16px; padding-left: 14px;">
                                                <input onclick="selectAllCheckbox(this)" style="font-size: 15px"
                                                       type="checkbox" value="1"/>
                                            </th>
                                        </tr>
                                        </thead>

                                        <tbody>

                                        <tr>
                                            <td></td>
                                            <td>

                                            </td>
                                            <td>
                                                <form>
                                                    <input value="{{$request->iin}}" type="text" class="form-control"
                                                           name="user_name" placeholder="Поиск">
                                                </form>
                                            </td>
                                            <td>
                                                <form>
                                                    <input value="{{$request->sponsor_name}}" type="text"
                                                           class="form-control" name="sponsor_name" placeholder="Поиск">
                                                </form>
                                            </td>
                                            <td>
                                                <form>
                                                    <input value="{{$request->inviter_name}}" type="text"
                                                           class="form-control" name="sponsor_name" placeholder="Поиск">
                                                </form>
                                            </td>
                                            <td></td>
                                            <td>
                                                <form>
                                                    <input value="{{$request->packet_name}}" type="text"
                                                           class="form-control" name="packet_name" placeholder="Поиск">
                                                </form>
                                            </td>
                                            <td></td>
                                            <td>
                                                <form>
                                                    <input value="{{$request->city_name}}" type="text" class="form-control"
                                                           name="city_name" placeholder="Поиск">
                                                </form>
                                            </td>
                                            <td>
                                                <form>
                                                    <select value="{{$request->is_interest_holder}}" type="text"
                                                            class="form-control" name="is_interest_holder">
                                                        <option value="1">Да</option>
                                                        <option value="0">Нет</option>
                                                    </select>
                                                </form>
                                            </td>
                                            <td></td>
                                            <td></td>
                                        </tr>

                                        @foreach($row->row as $key => $val)

                                            <tr>
                                                <td> {{ $key + 1 }}</td>
                                                <td>
                                                    <div class="object-image client-image">
                                                        <a href="/admin/profile/{{$val->user_id}}" target="_blank">
                                                            <img src="{{$val->avatar}}">
                                                        </a>
                                                    </div>
                                                    <div class="clear-float"></div>
                                                </td>
                                                <td class="arial-font">
                                                    <a class="main-label" href="/admin/profile/{{$val->user_id}}"
                                                       target="_blank"><p
                                                                class="login">{{$val->iin}}</p>@if(Auth::user()->user_id == 1)
                                                            <p class="client-name">{{ $val->name }} {{ $val->last_name }} {{ $val->middle_name }}</p> @if($val->is_activated == 0)
                                                                <p style="color: red">Пайщик</p> @endif @endif</a>
                                                </td>
                                                <td class="arial-font">
                                                    <a class="main-label" href="/admin/profile/{{$val->recommend_id}}"
                                                       target="_blank"><p
                                                                class="login">{{$val->recommend_login}}</p>@if(Auth::user()->user_id == 1)
                                                            <p class="client-name">{{ $val->recommend_name }} {{ $val->recommend_last_name }} {{ $val->recommend_middle_name }}</p>@endif
                                                    </a>
                                                <td class="arial-font">
                                                    <a class="main-label"
                                                       href="/admin/profile/{{\App\Models\Users::getInviterName($val)->user_id}}"
                                                       target="_blank"><p
                                                                class="login">{{\App\Models\Users::getInviterName($val)->login}}</p>
                                                        @if(Auth::user()->user_id == 1)
                                                            <p class="client-name">
                                                                {{ \App\Models\Users::getInviterName($val)->name }}
                                                                {{ \App\Models\Users::getInviterName($val)->last_name }}
                                                            </p>@endif
                                                    </a>
                                                </td>
                                                <td class="arial-font">
                                                    <div>
                                                        {{ $val->email }} </br>
                                                        {{ $val->phone }}
                                                    </div>
                                                </td>
                                                <td class="arial-font" style="text-align: center">
                                                    @include('admin.client.user_packet_list_loop')
                                                </td>
                                                <td class="arial-font">
                                                    <div>
                                                        {{ $val->date }}
                                                    </div>
                                                </td>
                                                <td class="arial-font">
                                                    <div>
                                                        {{ $val->country_name_ru }}</br>
                                                        {{ $val->city_name_ru }}
                                                    </div>
                                                </td>
                                                <td class="arial-font">
                                                    <div>
                                                    <span class="badge badge"
                                                          style="background-color: {{$val->is_interest_holder ? 'green' : 'red'}};">
                                                        {{$val->is_interest_holder ? 'Да' : 'Нет'}}
                                                    </span>
                                                    </div>
                                                </td>
                                                <td style="text-align: center">
                                                    <a href="javascript:void(0)"
                                                       onclick="delItem(this,'{{ $val->user_id }}','user')">
                                                        <li class="fa fa-trash-o" style="font-size: 20px; color: red;"></li>
                                                    </a>
                                                    <a data-user-id="{{$val->user_id}}"
                                                       data-user-full_name="{{sprintf('%s', $val->email)}}"
                                                       data-share="{{$val->share}}"
                                                       data-is_holder="{{$val->is_interest_holder}}"
                                                       onclick="share(this)">
                                                        <li class="fa fa-user"
                                                            style="cursor:pointer;font-size: 20px; color: blue;">
                                                        </li>
                                                    </a>
                                                </td>
                                                <td style="text-align: center;">
                                                    <input class="select-all" style="font-size: 15px" type="checkbox"
                                                           value="{{$val->user_id}}"/>
                                                </td>
                                            </tr>

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