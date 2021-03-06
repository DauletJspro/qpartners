<?php

use App\Models\Packet;
use \Illuminate\Support\Facades\Auth;
use \App\Models\UserPacket;

$actualPackets = [
    Packet::JASTAR,
    Packet::QAMQOR,
    Packet::JAS_OTAU,
    Packet::QOLDAU,
    Packet::BASPANA_PLUS,
    Packet::BASPANA,
    Packet::TULPAR_PLUS,
    Packet::TULPAR];
$isGap = false;
?>

@foreach($row->packet as $key => $item)
    @if(in_array($item->packet_id, $actualPackets))

        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box packet-item-list" style="background-color: #{{$item->packet_css_color}}">
                <div class="inner">
                    <h3 style="font-family: cursive; font-size: 30px"> {{$item->packet_name_ru}}</h3>
                    <h4 style="font-size: 25px">
                        {{$item->packet_price * \App\Models\Currency::pvToKzt() }} тг
                    </h4>

                    @if($packet_type == 'share')
                        @if($item->packet_share > 0)
                            <h4 style="font-size: 22px; font-weight: 800">{{$item->packet_share}} доля</h4>
                        @else
                            <h4 style="font-size: 22px; font-weight: 800">&ensp;</h4>
                        @endif
                    @elseif($packet_type == 'item')
                        <h4 style="font-size: 22px; font-weight: 800">
                            @if($item->packet_thing)
                                {{$item->packet_thing}}
                            @else
                                <br><br>
                            @endif
                        </h4>
                    @elseif($packet_type == 'service')
                        <h4 style="font-size: 22px; font-weight: 800">{{$item->packet_lection}}</h4>
                    @endif

                    <input class="packet_type" type="hidden" value="{{$packet_type}}"/>
                </div>
                <div class="icon">
                    <i class="ion ion-bag" style="font-size: 40px"></i>
                </div>

                @if($item->has_packet > 0)
                    @if($item->is_active > 0)
                        <a class="small-box-footer shop_buy_btn" style="font-size: 18px">Вы уже приобрели</a>
                    @else
                        <a href="javascript:void(0)" onclick="cancelResponsePacket(this,'{{$item->packet_id}}')"
                           class="small-box-footer shop_buy_btn" style="font-size: 18px">Отменить запрос <i
                                    class="fa fa-arrow-circle-right"></i></a>
                    @endif
                @else
                    @if (in_array($item->packet_id, [\App\Models\Packet::GAPTechno, \App\Models\Packet::GAPHome, \App\Models\Packet::GAPAuto, \App\Models\Packet::GAP]))
                        <a href="javascript:void(0)" onclick="showBuyModal(this,'{{$item->packet_id}}')"
                           class="buy_btn_{{$item->packet_id}} small-box-footer shop_buy_btn"
                           style="font-size: 18px">Купить
                            пакет <i class="fa fa-arrow-circle-right"></i></a>
                    @else
                        <a href="javascript:void(0)" onclick="showBuyModal(this,'{{$item->packet_id}}')"
                           class="buy_btn_{{$item->packet_id}} small-box-footer shop_buy_btn" style="font-size: 18px">Купить
                            пакет <i class="fa fa-arrow-circle-right"></i></a>
                    @endif
                @endif
                <a href="javascript:void(0)" onclick="getReadMorePacket('{{$item->packet_id}}')"
                   class="small-box-footer"
                   style="font-size: 16px; text-decoration: underline; padding-top: 10px; background: rgba(0, 0, 0, 0.21) none repeat scroll 0px 0px;">Подробнее</a>
            </div>
        </div>

    @endif

@endforeach
