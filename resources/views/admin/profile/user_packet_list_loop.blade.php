@php

    $userPacket = \App\Models\UserPacket::where('user_id', '=', $row->user_id)
->where('is_active', true)
->get();



@endphp
@if(isset($userPacket))
@foreach($userPacket as $key => $item)

    <div class="col-lg-4 col-xs-6">
        <!-- small box -->
        <div class="small-box" style="background-color: #{{$item->packet->packet_css_color}}">
            <div class="inner">
                <h3 style="font-family: cursive; font-size: 24px">{{$item->packet->packet_name_ru}}</h3>
                <h4 style="font-size: 22px">{{$item->packet->packet_price *(500/600)}} PV</h4>
            </div>
            <div class="icon">
                <i class="ion ion-bag" style="font-size: 17px"></i>
            </div>

                @if($item->is_active == 1)
                    <a class="small-box-footer" style="font-size: 18px">Приобретенный</a>
                @elseif($item->is_active == 0)
                    <a class="small-box-footer" style="font-size: 18px">Отправил запрос</a>
                @endif

        </div>
    </div>

@endforeach
    @endif