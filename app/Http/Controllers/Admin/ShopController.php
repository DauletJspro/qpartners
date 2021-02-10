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
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use View;
use DB;

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
            ->whereIn('packet_id', [Packet::CLASSIC, Packet::PREMIUM, Packet::VIP2, Packet::GAPTechno, Packet::GAPAuto, Packet::GAPHome, Packet::GAP])
            ->orderBy('packet_id', 'asc')
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



        return view('admin.shop.shop', [
            'row' => $request,
        ]);
    }
}
