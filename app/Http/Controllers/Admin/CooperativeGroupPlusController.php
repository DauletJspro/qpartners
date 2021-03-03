<?php

namespace App\Http\Controllers\Admin;

use App\Models\CooperativeGroupPlus;
use App\Models\CooperativeProgramm;
use App\Models\Users;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CooperativeGroupPlusController extends Controller
{
    public function index(Request $request)
    {
        $getGroup = CooperativeGroupPlus::orderBy('created_at', 'desc');
        if ($request->group_name){
            $getGroup = CooperativeGroupPlus::where('group_name', 'like', '%' . $request->group_name . '%');

        }
        $getGroup = $getGroup->paginate(15);
        return view('admin.shareholder-clients.tulpar-plus.cooperative-group',
            compact('getGroup'));
    }

    public function create()
    {

        $item = new CooperativeGroupPlus();
        $listOfProgram = CooperativeProgramm::where('program_code', '=', 2)->pluck('program_name', 'id')->toArray();

        return view('admin.shareholder-clients.tulpar-plus.create' , compact('item', 'listOfProgram'));
    }


    public function store(Request $request)
    {
        $date = $request->input();
        $item = (new CooperativeGroupPlus())->create($date);
        if ($item){
            return redirect()->route('pluses.index')
                ->with(['success' => 'Успешно сохраненно']);
        }
        else{
            return back()->withErrors(['msg' => 'Error'])
                ->withInput();
        }


    }

    public function getIdOfGroup(Request $request, $id){
        $users = Users::where('group_plus_id', '=', $id);
        if (isset($request->iin)){
            $users = Users::where('group_program_id', '=', $id)->where('iin', 'like', '%'. $request->iin. '%');
        }

        $users = $users->get();
        return view('admin.shareholder-clients.tulpar-plus.auto_client', compact('users'));
    }
}
