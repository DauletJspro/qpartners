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
                    <form class="form-horizontal" method="POST" action="{{ route('gap.card.order.create') }}" enctype="multipart/form-data">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input type="hidden" name="gap_card_id" value="{{ $gap_card->id }}">
                        <input type="hidden" name="first_name" value="{{ Auth::user()->name }}">
                        <input type="hidden" name="last_name" value="{{ Auth::user()->last_name }}">
                        <input type="hidden" name="user_id" value="{{ Auth::user()->user_id }}">
                        <input type="hidden" name="phone" value="{{ Auth::user()->phone }}">
                        <input type="hidden" name="email" value="{{ Auth::user()->email }}">
                        <input type="hidden" name="total_price" value="{{ $gap_card->price }}">
                        <div class="form-group">
                            <label for="title" class="col-md-4 control-label" >Адрес</label>

                            <div class="col-md-6">
                                <input id="address" type="text" class="form-control" name="address" required>
                            </div>
                        </div>

{{--                        <div class="form-group">--}}
{{--                            <label for="export_type" class="col-md-4 control-label">Варианты получения карты</label>--}}
{{--                            <div class="col-md-6">--}}
{{--                                <select id="category" type="category" class="form-control" name="export_type">--}}
{{--                                    <option >Самовывоз</option>--}}
{{--                                    <option >Доставкой</option>--}}
{{--                                </select>--}}
{{--                            </div>--}}
{{--                        </div>--}}

{{--                        <div class="form-group">--}}
{{--                            <label for="message" class="col-md-4 control-label">Комментарий к заказу</label>--}}

{{--                            <div class="col-md-6">--}}
{{--                                <textarea rows="10" id="comment" class="form-control" name="comment"></textarea>--}}
{{--                            </div>--}}
{{--                        </div>--}}

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button style="background: red;color: white;
                                        border: none;
                                        border-radius: 10px;
                                        padding: 5px 10px;" type="submit" data-toggle="modal" class="more-btn bg-red border-radius-30 px-15 ml-1 py-05 a-hover d-flex-row color-white">
                                        Подвердить заказ
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
