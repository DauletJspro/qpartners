<?php

namespace App\Http\Controllers\Admin;

use App\Models\Blog;
use App\Models\Packet;
use App\Models\UserPacket;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use View;
use DB;
use Auth;

class OnlineController extends Controller
{
    public function __construct()
    {
        $this->middleware('profile');
    }

    public function index(Request $request)
    {
        $request->packet = Packet::where('is_show',1)
                                            ->where('is_auto',0)
                                            ->orderBy('sort_num','asc')
                                            ->select('*',
                                                DB::raw('(select count(user_packet.packet_id)
                                                                                   from user_packet 
                                                                                   where user_packet.deleted_at is null and packet_id = packet.packet_id and user_id = '.Auth::user()->user_id.' limit 1) as has_packet'),
                                                DB::raw('(select is_active
                                                                                   from user_packet 
                                                                                   where user_packet.deleted_at is null and packet_id = packet.packet_id and user_id = '.Auth::user()->user_id.' limit 1) as is_active'))
                                            ->paginate(10);

        return  view('admin.online-shop.product',[
            'row' => $request
        ]);
    }
}
