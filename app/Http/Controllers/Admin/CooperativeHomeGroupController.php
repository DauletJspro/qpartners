<?php

namespace App\Http\Controllers\Admin;

use App\Models\CooperativeHomeGroup;
use App\Models\CooperativeProgramm;
use App\Models\UserPacket;
use App\Models\Users;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\CooperativeGroup;
use Illuminate\Support\Facades\DB;

class CooperativeHomeGroupController extends Controller
{
    public function index(Request $request)
    {
        $getGroup = CooperativeHomeGroup::orderBy('created_at', 'desc');
        if ($request->group_name){
            $getGroup = CooperativeHomeGroup::where('group_name', 'like', '%' . $request->group_name . '%');

        }
        $getGroup = $getGroup->paginate(15);
        return view('admin.shareholder-clients.home.cooperative-group',
            compact('getGroup'));
    }


        public function create()
    {

        $item = new CooperativeHomeGroup();
        $listOfProgram = CooperativeProgramm::where('program_code', '=', 3)->pluck('program_name', 'id')->toArray();

        return view('admin.shareholder-clients.home.create' , compact('item', 'listOfProgram'));
    }


    public function store(Request $request)
    {
        $date = $request->input();
        $item = (new CooperativeHomeGroup())->create($date);
        if ($item){
            return redirect()->route('home.index')
                ->with(['success' => 'Успешно сохраненно']);
        }
        else{
            return back()->withErrors(['msg' => 'Error'])
                ->withInput();
        }


    }

    public function getIdOfGroup($id){
        $users = Users::where('home_group_id', '=', $id)->paginate(5);
        if (isset($request->iin)){
            $users = Users::where('group_id', '=', $id)
                ->where('iin', 'like', '%'. $request->iin. '%');
        }


        return view('admin.shareholder-clients.home.auto_client', compact('users'));
    }
}
