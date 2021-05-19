@foreach($products as $item)
    <li>
        <div class="mt-product1 large"
             style="border: 1px solid lightgrey; padding: 0 0 20px 0">
            <div class="box">
                <div class="b1">
                    <div class="b2">
                        <div style="
                                background-image:
                        @if(isset($item->product_image))
                                url({{asset($item->product_image)}});
                        @else
                                url({{asset('/admin/image/gap_item/' . $item->image)}});
                        @endif
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
                <strong class="title"><a href="">
                        @if(isset($item->product_name_ru))
                            {{$item->product_name_ru}}
                        @else
                            {{$item->title_ru}}
                        @endif
                    </a></strong>
                <p style=" width: 30ch;   overflow: hidden;white-space: nowrap;text-overflow: ellipsis;">
                    @if(isset($item->product_desc_ru))
                        {{$item->product_desc_ru}}
                    @else
                        {{$item->description_ru}}
                    @endif

                </p>
                <span class="price"> <span>
                        @if(isset($item->product_price))
                            {{$item->product_price}}
                        @else
                            {{$item->price}}
                        @endif
                    </span> тг.</span>
            </div>
        </div>
    </li>
@endforeach