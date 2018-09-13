<div class="box-body">
    <table id="packet_datatable" class="table table-bordered table-striped">
        <thead>
        <tr style="border: 1px">
            <th style="width: 30px">№</th>
            <th></th>
            <th>Название</th>
            <th>Цена</th>
            <th>Количество</th>
            <th>Удалить</th>
        </tr>
        </thead>

        <tbody>

        <?php $sum = 0; ?>

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
                    {{ $val['product_price']}}тг
                </td>
                <td>
                    <input class="basket_product_id" type="hidden" value="{{ $val->product_id }}"/>
                    <input onchange="setBasketUnit(this,'{{ $val->product_id }}')" placeholder="Количество" style="padding: 3px 10px" class="basket_product_unit" type="number" value="{{ $val->unit }}"/>
                </td>
                <td style="text-align: center">
                    <a href="javascript:void(0)" onclick="delProductFromBasket(this,'{{ $val->product_id }}')">
                        <li class="fa fa-trash-o" style="font-size: 20px; color: red;"></li>
                    </a>
                </td>
            </tr>

            <?php $sum += $val->product_price; ?>

        @endforeach

        <tr>
            <td colspan="5" style="text-align: right"><b>Общая сумма:</b> </td>
            <td colspan="1"><b id="sum">{{$sum}}</b></td>
        </tr>

        </tbody>

    </table>



</div>