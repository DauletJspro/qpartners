@foreach($products as $item)
    <li>
        <div class="mt-product1 large"
             style="border: 1px solid lightgrey; padding: 0 2px 20px 2px">
            <div class="box">
                <div class="b1">
                    <div class="b2">
                        <div style="
                                background-image: url({{asset($item->product_image)}});
                                background-repeat: no-repeat;
                                background-size: contain;
                                background-position: center;
                                width: 275px;
                                height: 290px;
                                "></div>
                    </div>
                </div>
            </div>
            <div class="txt">
                <strong class="title"><a href="">{{$item->product_name_ru}}</a></strong>
                <p style=" width: 30ch;   overflow: hidden;white-space: nowrap;text-overflow: ellipsis;">
                    {{$item->product_desc_ru}}
                </p>
                <span class=" price
                                                "> <span>{{$item->product_price}}</span> тг.</span>
            </div>
        </div>
    </li>
@endforeach