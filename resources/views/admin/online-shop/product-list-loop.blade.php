@foreach($row->products as $key => $item)

    <div class="col-md-3 col-sm-6 col-xs-12">
        <div class="info-box">
            <div style="padding: 10px">
                <a href="{{$item->product_image}}" class="fancybox" rel="{{$key}}">
                    <img style="width: 100%; border-radius: 5px" src="{{$item->product_image}}"/>
                </a>
            </div>
            <div class="info-box-content">
                <span class="info-box-text">{{$item->product_name_ru}}</span>
                <span class="info-box-desc">{{$item->product_desc_ru}}</span>
                <span class="info-box-number">{{$item->product_price}}</span>
            </div><!-- /.info-box-content -->
        </div><!-- /.info-box -->
    </div>

@endforeach


