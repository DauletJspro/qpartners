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
            var id = $(this).attr("did");
            var choose_tag = document.getElementById("trasher"+id);
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
                        @foreach($gapCardItems as $item)
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
                                       id="trasher".{{$item->id}}
                                       class="a-trash"
                                       did="{{ $item->id }}"
                                       token="{{ csrf_token() }}"
                                       data-url="{{ route('gap_item.destroy', $item->id) }}"
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
                </div>
            </div>
            {{$gapCardItems->links()}}
        </div>
    </div>
@endsection