<?php

namespace App\Http\Controllers\Admin;

use App\Models\CooperativeProgramm;
use App\Models\UserPacket;
use App\Models\Users;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\CooperativeGroup;
use Illuminate\Support\Facades\DB;

class CooperativeGroupController extends Controller
{
    public function index(Request $request)
    {
        $getGroup = CooperativeGroup::orderBy('created_at', 'desc');
        if ($request->group_name){
            $getGroup = CooperativeGroup::where('group_name', 'like', '%' . $request->group_name . '%');

        }
        $getGroup = $getGroup->paginate(15);
        return view('admin.shareholder-clients.cooperative-group',
            compact('getGroup'));
    }

    public function create()
    {

        $item = new CooperativeGroup();
        $listOfProgram = CooperativeProgramm::where('program_code', '=', 1)->pluck('program_name', 'id')->toArray();

        return view('admin.shareholder-clients.create' , compact('item', 'listOfProgram'));
    }


    public function store(Request $request)
    {
        $date = $request->input();
        $item = (new CooperativeGroup())->create($date);
        if ($item){
            return redirect()->route('cooperative.index')
                ->with(['success' => 'Успешно сохраненно']);
        }
        else{
            return back()->withErrors(['msg' => 'Error'])
                ->withInput();
        }


    }

    public function getIdOfGroup(Request $request, $id){
        $users = Users::where('group_id', '=', $id);
        if (isset($request->iin)){
            $users = Users::where('group_id', '=', $id)->where('iin', 'like', '%'. $request->iin. '%');
        }

        $users = $users->get();
        return view('admin.shareholder-clients.auto_client', compact('users'));
    }
}
