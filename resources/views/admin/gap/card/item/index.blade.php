@extends('admin.layout.layout')
@section('content')
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title box-title-first">
                        <a class="menu-tab active-page" href="/admin/gap_item">Все GAP центры</a>
                    </h3>
                    <div style="float: right;">
                        <a href="{{route('gap_item.create')}}">
                            <button class="btn btn-primary box-add-btn">Добавить GAP центр</button>
                        </a>
                    </div>
                    <div class="clear-float"></div>
                </div>
                <div class="box-body">
                    <table id="packet_datatable" class="table table-bordered table-striped">
                        <thead>
                        <tr style="border: 1px">
                            <th style="width: 30px">№</th>
                            <th>Название на казахском</th>
                            <th>Название на русском</th>
                            <th>Описание на казахском</th>
                            <th>Описание на русском</th>
                            <th>Скидки в процентах</th>
                            <th>Цена</th>
                            <th>Под категория</th>
                            <th>Дата создание</th>
                            <th>Дата редактирование</th>

                            <th style="width: 15px"></th>
                            <th style="width: 15px"></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($gapCardItem as $item)
                            <tr>
                                <td>{{ $item->id }}</td>
                                <td><p>{{$item->title_kz}}</p></td>
                                <td><p>{{$item->title_ru}}</p></td>
                                <td><p>{{$item->description_kz}}</p></td>
                                <td><p>{{$item->description_ru}}</p></td>
                                <td><p>{{$item->discount_percentage}}</p></td>
                                <td><p>{{$item->price}}</p></td>
                                <td><p>{{$item->gapCardSubCategory->title_ru}}</p></td>
                                <td>{{ $item->created_at}}</td>
                                <td>{{ $item->updated_at}}</td>
                                <td style="text-align: center">
                                    <a href="/admin/gap_item/{{ $item->id }}/edit">
                                        <li class="fa fa-pencil" style="font-size: 20px;"></li>
                                    </a>
                                </td>
                                <td style="text-align: center">
                                    <a href="javascript:void(0)"
                                       onclick="delItem(this,'{{ $item->id }}','gap_item')">
                                        <li class="fa fa-trash-o" style="font-size: 20px; color: red;"></li>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection