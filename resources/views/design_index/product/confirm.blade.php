@extends('design_index.layout.layout')

@section('meta-tags')
    <title>Qpartners Shop</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description"
          content="«Qpartners» - это уникальный медиа проект с широким набором возожностей для взаймодествия с участниками виртуального рынка"/>
    <meta name="keywords" content="Qpartners"/>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
@endsection
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-body">
                        @include('admin.tickets.includes.flash')
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <form action="{{ route('smartpay_create_order_product') }}" method="POST">
                            {{ csrf_field() }}
                            <input type="hidden" name="product_id" id="product_id">
                            <div>
                                <div class="form-group">
                                    <label for="username">ФИО</label>
                                    <input type="text" class="form-control" id="username" name="username" aria-describedby="emailHelp" placeholder="ФИО">
                                </div>
                                <div class="form-group">
                                    <label for="contact">Контакт</label>
                                    <input type="text" class="form-control" id="contact" name="contact" placeholder="+7 (777) 777 77 77">
                                </div>
                                <div class="form-group">
                                    <label for="email">E-mail</label>
                                    <input type="email" class="form-control" id="email" name="email" placeholder="noreply@example.com">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="address">Адрес</label>
                                <input type="text" class="form-control" id="address" name="address" placeholder="г.Алматы ул.Абая 187а кв 94">
                            </div>
                            <div class="form-group">
                                <label for="delivery">Доставка</label>
                                <select class="form-control" name="delivery" id="delivery">
                                    <option value="1" selected>Самовывоз</option>
                                    <option value="2">Курьером</option>
                                    <option value="3">По почте</option>
                                </select>
                            </div>
                            <button style="background: red;color: white;
                                            border: none;
                                            border-radius: 10px;
                                            padding: 5px 10px;" type="submit"  class="more-btn bg-red border-radius-30 px-15 ml-1 py-05 a-hover d-flex-row color-white">
                                Подвердить заказ
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
