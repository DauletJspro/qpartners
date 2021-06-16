@foreach($products as $item)
    <li>
        <div class="mt-product1 large"
             style="border: 1px solid lightgrey; padding-bottom: 20px">
            <div class="box">
                <div class="b1">
                    <div class="b2">
                        <div style="

                                                        background-repeat: no-repeat;
                                                        background-size: contain;
                                                        background-position: center;
                                                        width: 275px;
                                                        height: 290px;
                                                        ">
                            <img src="{{$item->product_image}}"/>
                        </div>
                    </div>
                </div>
            </div>
            <div class="txt">
                <strong class="title"><a href="{{ route('product.detail', $item->product_id) }}" style="color: black">{{$item->product_name_ru}}</a></strong>
                <p style=" width: 30ch;   overflow: hidden;white-space: nowrap;text-overflow: ellipsis;">
                    {{$item->product_desc_ru}}
                </p>
                <span class="price"><span>Цена:</span> <span style="font-weight: normal">&nbsp;
                        @if(Auth::user()->role_id == 2 && Auth::user()->is_activated == 0)
                            ${{$item->price_partner}} &nbsp; ({{$item->price_partner * (\App\Models\Currency::where(['currency_id' => 1])->first())->money}} &#8376;)
                        @elseif(Auth::user()->role_id == 2 && Auth::user()->is_activated == 1)
                            ${{$item->price_shareholder}} &nbsp; ({{$item->price_shareholder * (\App\Models\Currency::where(['currency_id' => 1])->first())->money}} &#8376;)
                        @else
                            ${{$item->price_client}} &nbsp; ({{$item->price_client * (\App\Models\Currency::where(['currency_id' => 1])->first())->money}} &#8376;)
                        @endif
                    </span>
                </span>
            </div>
        </div>
    </li>
@endforeach