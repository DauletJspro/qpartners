<?php

namespace App\Http\Controllers\Admin;

use App\Models\Blog;
use App\Models\Packet;
use App\Models\UserPacket;
use App\Models\Users;
use App\Models\UserStatus;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use View;
use DB;
use Auth;

class ShopController extends Controller
{
    public function __construct()
    {
        $this->middleware('profile');
    }

    public function index(Request $request)
    {
        $request->packet = Packet::where('is_show', 1)
            ->where('is_old', 0)
            ->orderBy('sort_num', 'asc')
            ->select('*',
                DB::raw('(select count(user_packet.packet_id)
                                                                                   from user_packet 
                                                                                   where user_packet.deleted_at is null and packet_id = packet.packet_id and user_id = ' . Auth::user()->user_id . ' limit 1) as has_packet'),
                DB::raw('(select is_active
                                                                                   from user_packet 
                                                                                   where user_packet.deleted_at is null and packet_id = packet.packet_id and user_id = ' . Auth::user()->user_id . ' limit 1) as is_active'))
            ->paginate(30);

        $request->packet_old = Packet::where('is_show', 1)
            ->where('is_old', 1)
            ->orderBy('sort_num', 'asc')
            ->select('*',
                DB::raw('(select count(user_packet.packet_id)
                                                                                                                   from user_packet
                                                                                                                   where user_packet.deleted_at is null and packet_id = packet.packet_id and user_id = ' . Auth::user()->user_id . ' limit 1) as has_packet'),
                DB::raw('(select is_active
                                                                                                                   from user_packet
                                                                                                                   where user_packet.deleted_at is null and packet_id = packet.packet_id and user_id = ' . Auth::user()->user_id . ' limit 1) as is_active'))
            ->paginate(30);

        $request['packet_old_price_24'] = UserPacket::leftJoin('packet', 'packet.packet_id', '=', 'user_packet.packet_id')
            ->where('user_packet.user_id', Auth::user()->user_id)
            ->where('user_packet.packet_id', '>=', 23)
            ->where('user_packet.packet_id', '<', 24)
            ->where('user_packet.is_active', 1)
            ->sum('user_packet.packet_price');

        $request['packet_old_price_25'] = UserPacket::leftJoin('packet', 'packet.packet_id', '=', 'user_packet.packet_id')
            ->where('user_packet.user_id', Auth::user()->user_id)
            ->where('user_packet.packet_id', '>=', 23)
            ->where('user_packet.packet_id', '<', 25)
            ->where('user_packet.is_active', 1)
            ->sum('user_packet.packet_price');

        $request['packet_old_price_26'] = UserPacket::leftJoin('packet', 'packet.packet_id', '=', 'user_packet.packet_id')
            ->where('user_packet.user_id', Auth::user()->user_id)
            ->where('user_packet.packet_id', '>=', 23)
            ->where('user_packet.packet_id', '<', 26)
            ->where('user_packet.is_active', 1)
            ->sum('user_packet.packet_price');

        $request['packet_old_price_27'] = UserPacket::leftJoin('packet', 'packet.packet_id', '=', 'user_packet.packet_id')
            ->where('user_packet.user_id', Auth::user()->user_id)
            ->where('user_packet.packet_id', '>=', 23)
            ->where('user_packet.packet_id', '<', 27)
            ->where('user_packet.is_active', 1)
            ->sum('user_packet.packet_price');

        $request['packet_old_price_27'] = UserPacket::leftJoin('packet', 'packet.packet_id', '=', 'user_packet.packet_id')
            ->where('user_packet.user_id', Auth::user()->user_id)
            ->where('user_packet.packet_id', '>=', 23)
            ->where('user_packet.packet_id', '<', 27)
            ->where('user_packet.is_active', 1)
            ->sum('user_packet.packet_price');

        $request['packet_old_price_30'] = UserPacket::leftJoin('packet', 'packet.packet_id', '=', 'user_packet.packet_id')
            ->where('user_packet.user_id', Auth::user()->user_id)
            ->whereIn('user_packet.packet_id', [Packet::CLASSIC, Packet::PREMIUM, Packet::ELITE, Packet::VIP2])
            ->where('user_packet.is_active', 1)
            ->sum('user_packet.packet_price');

        $request['packet_old_price_5'] = UserPacket::leftJoin('packet', 'packet.packet_id', '=', 'user_packet.packet_id')
            ->where('user_packet.user_id', Auth::user()->user_id)
            ->where('user_packet.packet_id', '>', 2)
            ->where('user_packet.packet_id', '<', 5)
            ->where('user_packet.is_active', 1)
            ->sum('user_packet.packet_price');

        $max_packet_user_number[0] = UserPacket::where('user_id', Auth::user()->user_id)
            ->where('is_active', 1)
            ->where('is_portfolio', 0)
            ->orderBy('packet_id', 'desc')
            ->first();

        $max_packet_user_number[1] = UserPacket::where('user_id', Auth::user()->user_id)
            ->where('is_active', 1)
            ->where('is_portfolio', 1)
            ->orderBy('packet_id', 'desc')
            ->first();


        return view('admin.shop.shop', [
            'row' => $request,
            'max_packet_user_number' => $max_packet_user_number
        ]);
    }
}
