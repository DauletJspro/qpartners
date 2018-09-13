<?php

namespace App\Http\Controllers\Admin;

use App\Models\Blog;
use App\Models\Packet;
use App\Models\Product;
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
        $request->products = Product::where('is_show',1)
                                            ->orderBy('sort_num','asc')
                                            ->select('*')
                                            ->paginate(2);

        return  view('admin.online-shop.product',[
            'row' => $request
        ]);
    }
}
