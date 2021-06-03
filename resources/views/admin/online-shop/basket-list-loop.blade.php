<div class="box-body">
    <table id="packet_datatable" class="table table-bordered table-striped">
        <thead>
        <tr style="border: 1px">
            <th style="width: 30px">№</th>
            <th></th>
            <th>Название</th>
            <th>Количество</th>
            <th>Цена</th>
            <th>Балл</th>
            <th>Удалить</th>
        </tr>
        </thead>
        <tbody>
        @foreach($row->basket as $key => $val)
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
                    {{ $val['product_name_ru']}}
                </td>
                <td>
                    <input class="basket_product_id" type="hidden" value="{{ $val->product_id }}"/>
                    <input onchange="setBasketUnit(this,'{{ $val->product_id }}')" placeholder="Количество"
                           style="padding: 3px 10px" class="basket_product_unit" type="number"
                           value="{{ $val->unit }}"/>
                </td>
                <td>
                    @if(Auth::user()->role_id == 2 && Auth::user()->is_activated == 1)
                        {{$val->price_shareholder}} $({{$val->price_shareholder * \App\Models\Currency::where('currency_id',1)->first()->money}})
                    @elseif(Auth::user()->role_id == 2 && Auth::user()->is_activated == 0)
                        {{$val->price_partner}} $({{$val->price_partner * \App\Models\Currency::where('currency_id',1)->first()->money}})
                    @else
                        {{$val->price_client}} $({{$val->price_client * \App\Models\Currency::where('currency_id',1)->first()->money}})
                    @endif
                </td>
                <td>
                    @if(Auth::user()->role_id == 2 && Auth::user()->is_activated == 1)
                        {{$val->ball_shareholder}}
                    @elseif(Auth::user()->role_id == 2 && Auth::user()->is_activated == 0)
                        {{$val->ball_partner}}
                    @else
                        {{$val->ball_client}}
                    @endif
                </td>
                <td style="text-align: center">
                    <a href="javascript:void(0)" onclick="delProductFromBasket(this,'{{ $val->product_id }}')">
                        <li class="fa fa-trash-o" style="font-size: 20px; color: red;"></li>
                    </a>
                </td>
            </tr>
        @endforeach
        <tr>
            <td colspan="4" style="text-align: right"><b>Общая сумма:</b></td>
            <td colspan="1">
                <b id="sum">
                    {{ $total_sum }} $
                    ({{round($total_sum * \App\Models\Currency::pvToKzt(),0)}}тг)
                </b>
            </td>
            <td colspan="1">
                <b id="ballSum">
                    + {{ $total_ball }}
                </b>
            </td>
            <td></td>
        <tr>
            <td colspan="7" style="text-align: right">
                <a href="javascript:void(0)" onclick="showBasketModal()" class="btn btn-primary btn-block"
                   style="background-color: rgb(253, 58, 53) !important; width: 200px"><b>Подтвердить заказ</b></a>
            </td>
        </tr>
        </tbody>
    </table>


</div>