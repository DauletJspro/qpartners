<?php

namespace App\Http\Controllers\Admin;

use App\Models\CooperativeProgramm;
use App\Models\Jastar;
use App\Models\Users;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class JastarController extends Controller
{
    public function index(Request $request)
    {
        $getGroup = Jastar::orderBy('created_at', 'desc');
        if ($request->group_name){
            $getGroup = Jastar::where('group_name', 'like', '%' . $request->group_name . '%');

        }
        $getGroup = $getGroup->paginate(15);
        return view('admin.shareholder-clients.jastar.cooperative-group',
            compact('getGroup'));
    }

    public function create()
    {
        $listOfProgram = CooperativeProgramm::where('program_code', '=', 7)->pluck('program_name', 'id')->toArray();
        return view('admin.shareholder-clients.jastar.create' , compact( 'listOfProgram'));
    }
    public function store(Request $request)
    {
        $date = $request->input();
        $item = (new Jastar())->create($date);
        if ($item){
            return redirect()->route('jastar.index')
                ->with(['success' => 'Успешно сохраненно']);
        }
        else{
            return back()->withErrors(['msg' => 'Error'])
                ->withInput();
        }


    }

    public function getUsers(Request $request){
        $request->row = Users::leftJoin('city', 'city.city_id', '=', 'users.city_id')
            ->where('packet.packet_id','=', 40)
            ->where('users.jastar_id', '=' , 0)
            ->leftJoin('country', 'country.country_id', '=', 'city.country_id')
            ->leftJoin('user_packet', 'user_packet.user_id', '=', 'users.user_id')
            ->leftJoin('packet', 'packet.packet_id', '=', 'user_packet.packet_id')
            ->leftJoin('users as recommend', 'recommend.user_id', '=', 'users.recommend_user_id')
            ->orderBy('users.user_id', 'desc')
            ->select('users.*', 'city.*', 'country.*',
                DB::raw('DATE_FORMAT(users.created_at,"%d.%m.%Y %H:%i") as date'),
                'recommend.name as recommend_name',
                'recommend.login as recommend_login',
                'recommend.user_id as recommend_id',
                'recommend.last_name as recommend_last_name',
                'recommend.middle_name as recommend_middle_name',
                'recommend.user_id as recommend_user_id'
            )
            ->groupBy('users.user_id');

        if (isset($request->login) && $request->login != '')
            $request->row->where(function ($query) use ($request) {
                $query->where('users.name', 'like', '%' . $request->login . '%')
                    ->orWhere('users.last_name', 'like', '%' . $request->login . '%')
                    ->orWhere('users.login', 'like', '%' . $request->login . '%')
                    ->orWhere('users.email', 'like', '%' . $request->login . '%')
                    ->orWhere('users.middle_name', 'like', '%' . $request->login . '%');
            });
        if (isset($request->iin) && $request->iin != '')
            $request->row->where(function ($query) use ($request) {
                $query->where('users.iin', 'like', '%' . $request->iin . '%');
            });
        if (isset($request->is_ban))
            $request->row->where('users.is_ban', $request->is_ban);
        else $request->row->where('users.is_ban', '0');

        if (isset($request->is_active))
            $request->row->where('users.is_activated', $request->is_active);

        if ($request->is_interest_holder) {
            $request->row->where(['users.is_interest_holder' => true]);
        }
        $request->row = $request->row->paginate(10);

        return view('admin.shareholder-clients.jastar.user_list', [
            'row' => $request,
            'title' => 'Все пользователи',
            'request' => $request
        ]);
    }

    public function editUser($id){
        $user = Users::find($id);
        $listOfGroup = Jastar::all()->pluck('group_name', 'id')->toArray();
        return view('admin.shareholder-clients.jastar.add_user_to_group', compact('user', 'listOfGroup'));
    }

    public function updateUser(Request $request, $id){
        $item = Users::find($id);
        $data = $request->all();
        $result = $item->update($data);
        if ($result){
            return redirect()->route('jastar.index')->with('success', 'Пользователь успешно добавлен');
        }else{
            return back()->withErrors(['msg' => 'Error'])
                ->withInput();
        }


    }

    public function getIdOfGroup($id){
        $users = Users::where('jastar_id', '=', $id)->paginate(5);
        if (isset($request->iin)){
            $users = Users::where('jastar_id', '=', $id)
                ->where('iin', 'like', '%'. $request->iin. '%');
        }


        return view('admin.shareholder-clients.jastar.auto_client', compact('users'));
    }
}
