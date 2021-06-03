@foreach($row->products as $key => $item)

    <div class="col-md-3 col-sm-6 col-xs-12">
        <div class="info-box">
            <div style="padding: 10px">
                <a href="{{$item->product_image}}" class="fancybox" rel="{{$key}}">
                    <img style="width: 100%; border-radius: 5px" src="{{$item->product_image}}"/>
                </a>
            </div>
            <div class="info-box-content" style="margin-left: 0px; text-align: center; padding-bottom: 14px">
                <span class="info-box-text" style="font-weight: bold; color: red">{{$item->product_name_ru}}</span>
                @if(Auth::user()->role_id == 2 && Auth::user()->is_activated == 0)
                    <span class="info-box-number">{{$item->price_partner}}$ ({{$item->price_partner * \App\Models\Currency::where('currency_id',1)->first()->money}}тг)</span>
                @elseif(Auth::user()->role_id == 2 && Auth::user()->is_activated == 1)
                    <span class="info-box-number">{{$item->price_shareholder}}$ ({{$item->price_shareholder * \App\Models\Currency::where('currency_id',1)->first()->money}}тг)</span>
                @else
                    <span class="info-box-number">{{$item->price_client}}$ ({{$item->price_client * \App\Models\Currency::where('currency_id',1)->first()->money}}тг)</span>
                @endif
                    <a style="text-decoration: underline" href="javascript:void(0)" onclick="getReadMoreProduct(this)">Подробнее</a>
                <span class="info-box-desc" style="display: none">{{$item->product_desc_ru}}</span>
                <div class="text-center" style="margin-top: 5px">
                    <input onclick="addProductToBasket('{{$item->product_id}}')"
                           style="border:none; background-color: #00BDE7; border-radius: 5px; padding: 4px 10px"
                           type="button" value="Добавить в корзину"/>
                </div>
            </div>
        </div>
    </div>

@endforeach


