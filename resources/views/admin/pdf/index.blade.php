@extends('admin.layout.layout')

@section('content')
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-body">
                    <div class="box-header">
                        <h1 class="box-title main-title">
                            Договоры
                        </h1>
                    </div>
                <div class="nav-tabs-custom">

                    <div class="tab-content">
                        <div>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Название программы</th>
            <th scope="col">Договор</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <th scope="row">1</th>
            <td>Баспана</td>
            <td><a class="btn btn-primary" href="/admin/pdf/baspana" role="button">Посмотреть договор</a></td>
        </tr>
        <tr>
            <th scope="row">2</th>
            <td>Баспана +</td>
            <td><a class="btn btn-primary" href="/admin/pdf/baspana-plus" role="button">Посмотреть договор</a></td>
        </tr>
        <tr>
            <th scope="row">3</th>
            <td>Тұлпар</td>
            <td><a class="btn btn-primary" href="/admin/pdf/tulpar" role="button">Посмотреть договор</a></td>
        </tr>
        <tr>
            <th scope="row">4</th>
            <td>Тұлпар +</td>
            <td><a class="btn btn-primary" href="/admin/pdf/tulpar-plus" role="button">Посмотреть договор</a></td>
        </tr>
        </tbody>
    </table>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection