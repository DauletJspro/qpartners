@foreach($row->products as $key => $item)

    <div class="col-md-3 col-sm-6 col-xs-12">
        <div class="info-box">
            <div style="padding: 10px">
                <a href="{{$item->product_image}}" class="fancybox" rel="{{$key}}">
                    <img style="width: 100%; border-radius: 5px" src="{{$item->product_image}}"/>
                </a>
            </div>
            <div class="info-box-content">
                <span class="info-box-text" style="font-weight: bold; color: red">{{$item->product_name_ru}}</span>
                <span class="info-box-number">{{$item->product_price}}тг</span>
                <a href="javascript:void(0)" onclick="getReadMoreProduct(this)">Подробнее</a>
                <span class="info-box-desc" style="display: none">{{$item->product_desc_ru}}</span>
                <input onclick="addProductToBasket('{{$item->product_id}}')" style="background-color: #00BDE7; border-radius: 5px; padding: 4px 10px" type="button" value="Добавить в корзину"/>
            </div>
        </div>
    </div>

@endforeach


