@extends('admin.layout.layout')
@section('content')
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title box-title-first">
                        <a class="menu-tab active-page">Запросы на баннер</a>
                    </h3>
                    <div class="clear-float"></div>
                </div>

                <div class="box-body">

                    <table id="news_datatable" class="table table-bordered table-striped table-css">
                        <thead>
                        <tr style="border: 1px">
                            <th style="width: 30px">№</th>
                            <th style="width: 100px">Аватар</th>
                            <th>Название бренда</th>
                            <th>Название компаний</th>
                            <th>Город</th>
                            <th>Телефон</th>
                            <th style="width: 120px">Дата</th>
                            <th style="width: 120px"></th>
                        </tr>
                        </thead>

                        <tbody>

                        <tr>
                            <td></td>
                            <td></td>
                            <td>
                                <form><input value="{{$request->brand_name}}" type="text" class="form-control"
                                             name="user_name" placeholder="Поиск"></form>
                            </td>
                            <td>
                                <form><input value="{{$request->sponsor_name}}" type="text" class="form-control"
                                             name="sponsor_name" placeholder="Поиск"></form>
                            </td>
                            <td>
                                <form><input value="{{$request->packet_name}}" type="text" class="form-control"
                                             name="packet_name" placeholder="Поиск"></form>
                            </td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>

                        @foreach($cardList as $key => $val)

                            <tr>
                                <td> {{ $key + 1 }}</td>
                                <td>
                                    <div class="object-image client-image">
                                        <a href="/admin/profile/{{$val->user_id}}" target="_blank">
                                            <img src="{{$val->image}}">
                                        </a>
                                    </div>
                                    <div class="clear-float"></div>
                                </td>
                                <td class="arial-font">
                                    <a class="main-label" href="/admin/profile/{{$val->user_id}}" target="_blank"><p
                                                class="brand_name">{{$val->brand_name}}</p>
                                    </a>
                                </td>
                                <td class="arial-font">
                                    <a class="main-label" href="/admin/profile/{{$val->recommend_id}}" target="_blank">
                                        <p class="company_name">{{$val->company_name}}</p>
                                    </a>
                                </td>
                                <td>
                                    <p class="city_id">{{\App\Models\GapCardItem::getCity($val->city_id)}}</p>
                                </td>
                                <td>
                                    <p class="city_id">{{$val->phone}}</p>
                                </td>
                                <td>
                                    {{ $val->created_at }}
                                </td>
                                <td style="text-align: center">
                                        <button class="btn btn-block btn-success btn-sm"
                                                onclick="acceptBanner(this,'{{ $val->id }}', 1)">
                                            Принять
                                        </button>
                                    <button class="btn btn-block btn-error btn-sm"
                                            onclick="acceptBanner(this,'{{ $val->id }}', 2)"
                                            style="background-color: rgb(255, 88, 83);">Переотправить
                                    </button>
                                </td>
                            </tr>

                        @endforeach

                        </tbody>

                    </table>

                    <div style="text-align: center">
                        {{ $cardList->appends(\Illuminate\Support\Facades\Input::except('page'))->links() }}
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection