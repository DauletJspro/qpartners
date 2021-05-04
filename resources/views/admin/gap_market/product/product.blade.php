@extends('admin.layout.layout')

<meta name="csrf-token" content="{{ csrf_token() }}">
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script type="text/javascript">
    $(document).ready(function(){
        $('.a-trash').click(function (){

            var well = $(this).parent().parent();
            var choose_tag = document.getElementById("trasher");
            if (confirm("Вы уверены что хотите удалить этот продукт?")) {
                $(choose_tag).closest('tr').remove();
                var did = $(this).attr("did");
                var token = $(this).attr("token");
                var url = $(this).data('url');
                $.ajax({
                    url : url,
                    method : "POST",
                    data : {_method : "delete", _token: token},
                    success:function(response){
                        if (response == 1) {
                            well.hide();
                            //alert("Your reply is deleted");
                        }else if(response == 2){
                            alert('Упс! Вы не можете удалить продукты других');
                        }else{
                            alert('Что-то пошло не так, пожалуйста повторите попытку!');
                        }
                    }
                })
            }
        });
    });
</script>

@section('content')

    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title box-title-first">
                        <a class="menu-tab active-page" href="/admin/category">Все категорий</a>
                        <a class="menu-tab active-page" href="/admin/sub_category">Все под категорий</a>
                        <a class="menu-tab active-page" href="/admin/product">Все товары</a>
                        <a class="menu-tab active-page" href="/admin/brand">Все бренды</a>
                    </h3>
                    <div style="float: right;">
                        <a href="{{ route('gap_market_product.create') }}">
                            <button class="btn btn-primary box-add-btn">Добавить товар</button>
                        </a>
                    </div>
                    <div class="clear-float"></div>
                </div>
                <div class="box-body">
                    <table id="packet_datatable" class="table table-bordered table-striped">
                        <thead>
                        <tr style="border: 1px">
                            <th style="width: 30px">№</th>
                            <th></th>
                            <th>Название</th>
                            <th>Цена</th>
                            <th>Новый</th>
                            <th>Популярный</th>
                            <th>Под категория</th>
                            <th>Назначения</th>
                            <th>Балл</th>
                            <th>Краткое описание</th>
                            <th style="width: 15px"></th>
                            <th style="width: 15px"></th>
                        </tr>
                        </thead>

                        <tbody>

                        @foreach($product as $key => $val)

                            <tr>
                                <td> {{ $key + 1 }}</td>
                                <td>
                                    <div class="object-image">
                                        <a class="fancybox" href="{{$val->product_image}}">
                                            <img src="{{$val->product_image}}">
                                        </a>
                                    </div>
                                    <div class="clear-float"></div>
                                </td>
                                <td>
                                    {{ $val->product_name_ru}}
                                </td>
                                <td>
                                    {{ $val->product_price}}$
                                    ({{round($val->product_price * \App\Models\Currency::where('currency_name','тенге')->first()->money,2)}}
                                    тг)
                                </td>
                                <td>
                                    <span class="badge"
                                          style="background-color: {{ $val->is_new   ? 'green' : 'red' }}">{{$val->is_new  ? 'Да' : 'Нет'}}</span>
                                </td>
                                <td>
                                    <span class="badge"
                                          style="background-color: {{ $val->is_popular ? 'green' : 'red' }}">{{$val->is_popular ? 'Да' : 'Нет'}}</span>
                                </td>
                                <td>
                                    <strong>{{ isset($val->sub_category) ? $val->sub_category->title_kz : 'Не указано' }}</strong>
                                </td>
                                <td>
                                    {{ $val->item_id ? \App\Models\Product::ITEM[$val->item_id] :
                                    'Не указано'}}
                                </td>
                                <td>
                                    {{ $val->ball }}
                                </td>
                                <td>
                                    {{ $val->product_desc_ru}}
                                </td>
                                <td style="text-align: center">
                                    <a href="{{ route('gap_market_product.edit', $val->product_id) }}">
                                        <li class="fa fa-pencil" style="font-size: 20px;"></li>
                                    </a>
                                </td>
                                <td style="text-align: center">
                                    <a href="javascript:void(0)"
                                       id="trasher"
                                       class="a-trash"
                                       did="{{ $val->product_id }}"
                                       token="{{ csrf_token() }}"
                                       data-url="{{ route('gap_market_product.destroy', $val->product_id) }}"
                                    >
                                        <li class="fa fa-trash-o"
                                            style="font-size: 20px; color: red;">

                                        </li>
                                    </a>
                                </td>
                            </tr>

                        @endforeach

                        </tbody>

                    </table>

                    <div style="text-align: center">
                        {{ $product->appends(\Illuminate\Support\Facades\Input::except('page'))->links() }}
                    </div>

                </div>
            </div>
        </div>
    </div>

@endsection

@section('js')

    <script>
        $('a.fancybox').fancybox({
            padding: 10
        });
    </script>
@endsection