<?php

    use App\Models\UserPacket;
    $packet_list = \App\Models\UserPacket::leftJoin('packet','packet.packet_id','=','user_packet.packet_id')
	->where('user_id',$gapUser->user_id)
	->where('is_active',1)
	->orderBy('packet.packet_id','asc')
	->get()
?>

@foreach($packet_list as $key => $item)
        <span class="label user-packet-span">{{$item->packet_name_ru}} | </span>
@endforeach