@extends('admin.layout.layout')

@section('content')

    <div class="row">
        <div class="col-md-5">

            <!-- Profile Image -->
            <div class="box box-primary">
                <div class="box-body box-profile">
                    <a class="fancybox" href="{{$row->avatar}}">
                        <img class="profile-user-img img-responsive img-circle" src="{{$row->avatar}}">
                    </a>
                    <h3 class="profile-username text-center">{{$row->name}} {{$row->last_name}} {{$row->middle_name}}</h3>
                    <p class="text-muted text-center"></p>

                    <ul class="list-group list-group-unbordered">
                        <li class="list-group-item">
                            @if(Auth::user()->role_id != 1)
                            <b>Активация</b> <a class="pull-right">@if(!\App\Models\Users::hasCountPackets($row->user_id)) <span style="color: red">Не пройдено</span>@else <span style="color: #009551">Пройдено</span> @endif</a>
                            @else
                                <b>Активация</b> <a class="pull-right"><span style="color: #009551">Пройдено</span></a>
                            @endif

                        </li>
                        <li class="list-group-item">
                            <b>Верификация</b> <a class="pull-right" href="/admin/document"```>@if($row->is_valid_document == 0) <span style="color: red">Не пройдено</span>@else <span style="color: #009551">Пройдено</span> @endif</a>
                        </li>

                        @if(Auth::user()->role_id == 1)
                            <li class="list-group-item" style="text-align: center">
                                @if($row->user_id != Auth::user()->user_id)

                                    <a target="_blank" style="font-weight: bold; text-decoration: underline" href="/admin/document/{{$row->user_id}}">Список документов</a>

                                @else

                                    <a target="_blank" style="font-weight: bold; text-decoration: underline" href="/admin/document/{{$row->user_id}}">Список документов</a>

                                @endif

                            </li>
                        @endif

                        @if($row->is_activated == 0 && Auth::user()->role_id == 1)

                            <li class="list-group-item" style="text-align: center">
                                <form action="/admin/profile/activate" method="POST">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <input type="hidden" value="{{$row->user_id}}" name="user_id"/>
                                    <div >
                                        <button type="submit" class="btn btn-primary">Активировать</button>
                                    </div>
                                </form>
                            </li>
                        @endif

                        <li class="list-group-item">
                            <b>Ваш номер</b> <a class="pull-right">{{$row->user_id}}</a>
                        </li>
                        <li class="list-group-item">
                            <b>Дата регистрации</b> <a class="pull-right">{{$row->date}}</a>
                        </li>
                        <li class="list-group-item">
                            <b>Спонсор</b> <a class="pull-right" @if(Auth::user()->role_id == 1) href="/admin/profile/{{$row->recommend_user_id}}" target="_blank" @endif>{{$row->recommend_name}} {{$row->recommend_last_name}}</a>
                        </li>
                        <li class="list-group-item">
                            <b>Пригласитель</b> <a class="pull-right" @if(Auth::user()->role_id == 1)
                            href="/admin/profile/{{\App\Models\Users::getInviterName($row)->user_id}}"
                                              target="_blank" @endif>
                                {{\App\Models\Users::getInviterName($row)->name}}
                                {{\App\Models\Users::getInviterName($row)->last_name}}
                            </a>
                        </li>
                        <li class="list-group-item">
                            <b>Статус</b> <a class="pull-right">{{$row->user_status_name}}</a>
                        </li>
                        <li class="list-group-item">
                            <b>Логин</b> <a class="pull-right">{{$row->login}}</a>
                        </li>
                        <li class="list-group-item">
                            <b>Instagram</b> <a target="_blank" class="pull-right" href="http://instagram.com/{{$row->instagram}}">{{$row->instagram}}</a>
                        </li>
                        <li class="list-group-item">
                            <b>Электронная почта</b> <a class="pull-right">{{$row->email}}</a>
                        </li>
                        <li class="list-group-item">
                            <b>Телефон</b> <a class="pull-right">{{$row->phone}}</a>
                        </li>
                        <li class="list-group-item">
                            <b>ИИН</b> <a class="pull-right">{{$row->iin}}</a>
                        </li>
                        <li class="list-group-item">
                            <b>Номер карточки</b> <a class="pull-right">{{$row->card_number}}</a>
                        </li>
                        <li class="list-group-item">
                            <b>Название банка</b> <a class="pull-right">{{$row->bank_name}}</a>
                        </li>
                        <li class="list-group-item">
                            <b>IBAN</b> <a class="pull-right">{{$row->iban}}</a>
                        </li>
                        <li class="list-group-item">
                            <b>Страна</b> <a class="pull-right">{{$row->country_name_ru}}</a>
                        </li>
                        <li class="list-group-item">
                            <b>Город</b> <a class="pull-right">{{$row->city_name_ru}}</a>
                        </li>
                        <li class="list-group-item">
                            <b>Адрес</b> <a class="pull-right">{{$row->address}}</a>
                        </li>
                        {{--<li class="list-group-item">
                            <b>Страна (Факт)</b> <a class="pull-right">{{$row->fact_country_name_ru}}</a>
                        </li>
                        <li class="list-group-item">
                            <b>Город (Факт)</b> <a class="pull-right">{{$row->fact_city_name_ru}}</a>
                        </li>
                        <li class="list-group-item">
                            <b>Адрес (Факт)</b> <a class="pull-right">{{$row->fact_address}}</a>
                        </li>--}}
                        <li class="list-group-item">
                            <b>Удостоверение личности</b> <a class="pull-right">{{$row->document_number}}</a>
                        </li>
                        <li class="list-group-item">
                            <b>Пол</b> <a class="pull-right">@if($row->is_male == 1) Мужской @else Женский @endif</a>
                        </li>
                        
                    </ul>

                    @if(isset($is_own))
                        <a href="/admin/profile/edit" class="btn btn-primary btn-block"><b>Редактировать данные</b></a>
                    @endif

                </div><!-- /.box-body -->
            </div><!-- /.box -->

        </div><!-- /.col -->


        <div class="col-md-7">
            <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">

                    <li @if(!isset($_GET['tab'])) class="active" @endif><a style="font-size: 13px"  href="#packet_list" data-toggle="tab">Пакеты</a></li>

                    @if(Auth::user()->user_id != $row->user_id)
                        <li @if(isset($_GET['tab']) && $_GET['tab'] == 'password') class="active" @endif><a style="font-size: 13px"  href="#password" data-toggle="tab">Изменить пароль</a></li>
                    @endif


                    @if(Auth::user()->role_id == 1)
                        <li @if(isset($_GET['tab']) && $_GET['tab'] == 'money') class="active" @endif>
                            <a style="font-size: 13px"  href="#money" data-toggle="tab">Изменить баланс</a>
                        </li>
                        <li @if(isset($_GET['tab']) && $_GET['tab'] == 'status') class="active" @endif>
                            <a style="font-size: 13px"  href="#status" data-toggle="tab">Изменить статус</a>
                        </li>
                        <li @if(isset($_GET['tab']) && $_GET['tab'] == 'pv') class="active" @endif>
                            <a style="font-size: 13px"  href="#pv" data-toggle="tab">ЛО</a>
                        </li>

                        <li @if(isset($_GET['tab']) && $_GET['tab'] == 'gv') class="active" @endif>
                            <a style="font-size: 13px"  href="#gv" data-toggle="tab">ГО</a>
                        </li>
                        <li @if(isset($_GET['tab']) && $_GET['tab'] == 'lsv') class="active" @endif>
                            <a style="font-size: 13px"  href="#lsv" data-toggle="tab">Л-SV</a>
                        </li>
                        <li @if(isset($_GET['tab']) && $_GET['tab'] == 'gsv') class="active" @endif>
                            <a style="font-size: 13px"  href="#gsv" data-toggle="tab">Г-SV</a>
                        </li>
                    @endif
                </ul>
                <div class="tab-content" style="min-height: 400px">


                    <div class="@if(!isset($_GET['tab'])) active @endif tab-pane" id="packet_list">
                        @include('admin.profile.user_packet_list_loop')
                    </div>

                    @if(Auth::user()->role_id == 1)
                        <div class="@if(isset($_GET['tab']) && $_GET['tab'] == 'password') active @endif tab-pane" id="password">
                            @include('admin.profile.password-edit')
                        </div>

                        <div class="@if(isset($_GET['tab']) && $_GET['tab'] == 'money') active @endif tab-pane" id="money">
                            @include('admin.profile.money-edit')
                        </div>

                        <div class="@if(isset($_GET['tab']) && $_GET['tab'] == 'status') active @endif tab-pane" id="status">
                            @include('admin.profile.status-edit')
                        </div>
                        <div class="@if(isset($_GET['tab']) && $_GET['tab'] == 'pv') active @endif tab-pane" id="pv">
                            @include('admin.profile.pv-edit')
                        </div>
                        <div class="@if(isset($_GET['tab']) && $_GET['tab'] == 'gv') active @endif tab-pane" id="gv">
                            @include('admin.profile.gv-edit')
                        </div>
                        <div class="@if(isset($_GET['tab']) && $_GET['tab'] == 'lsv') active @endif tab-pane" id="lsv">
                            @include('admin.profile.l-sv-edit')
                        </div>
                        <div class="@if(isset($_GET['tab']) && $_GET['tab'] == 'gsv') active @endif tab-pane" id="gsv">
                            @include('admin.profile.g-sv-edit')
                        </div>
                    @endif

                </div>
            </div>
        </div>


    </div>

@endsection