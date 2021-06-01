<?php

namespace App\Http\Controllers\Admin;

use App\Models\CooperativeGroup;
use App\Models\CooperativeGroupPlus;
use App\Models\CooperativeHomeGroup;
use App\Models\Packet;
use App\Models\Users;
use App\Models\UserStatus;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use View;
use DB;

class ClientController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    public function index(Request $request)
    {
        $request->row = Users::leftJoin('city', 'city.city_id', '=', 'users.city_id')
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

        if (isset($request->user_name) && $request->user_name != '')
            $request->row->where(function ($query) use ($request) {
                $query->where('users.name', 'like', '%' . $request->user_name . '%')
                    ->orWhere('users.last_name', 'like', '%' . $request->user_name . '%')
                    ->orWhere('users.login', 'like', '%' . $request->user_name . '%')
                    ->orWhere('users.email', 'like', '%' . $request->user_name . '%')
                    ->orWhere('users.middle_name', 'like', '%' . $request->user_name . '%');
            });

        if (isset($request->sponsor_name) && $request->sponsor_name != '')
            $request->row->where(function ($query) use ($request) {
                $query->where('recommend.name', 'like', '%' . $request->sponsor_name . '%')
                    ->orWhere('recommend.last_name', 'like', '%' . $request->sponsor_name . '%')
                    ->orWhere('recommend.login', 'like', '%' . $request->sponsor_name . '%')
                    ->orWhere('recommend.email', 'like', '%' . $request->sponsor_name . '%')
                    ->orWhere('recommend.middle_name', 'like', '%' . $request->sponsor_name . '%');
            });
        if (isset($request->inviter_name) && $request->inviter_name != '')
            $request->row->where(function ($query) use ($request) {
                $query->where('recommend.name', 'like', '%' . $request->inviter_name . '%')
                    ->orWhere('recommend.last_name', 'like', '%' . $request->inviter_name . '%')
                    ->orWhere('recommend.login', 'like', '%' . $request->inviter_name . '%')
                    ->orWhere('recommend.email', 'like', '%' . $request->inviter_name . '%')
                    ->orWhere('recommend.middle_name', 'like', '%' . $request->inviter_name . '%');
            });

        if (isset($request->city_name) && $request->city_name != '')
            $request->row->where(function ($query) use ($request) {
                $query->where('city.city_name_ru', 'like', '%' . $request->city_name . '%')
                    ->orWhere('country.country_name_ru', 'like', '%' . $request->city_name . '%');
            });

        if (isset($request->is_ban))
            $request->row->where('users.is_ban', $request->is_ban);
        else $request->row->where('users.is_ban', '0');

        if (isset($request->is_active))
            $request->row->where('users.is_activated', $request->is_active);

        if (isset($request->packet_name) && $request->packet_name != '') {
            $request->row->where('packet.packet_name_ru', 'like', '%' . $request->packet_name . '%')
                ->where('user_packet.is_active', 1);
        }
        if ($request->is_interest_holder) {
            $request->row->where(['users.is_interest_holder' => true]);
        }

        if($request->user_status_id){
            $request->row->where(['users.status_id' => $request->user_status_id]);
        }

        $request->row = $request->row->paginate(10);

        return view('admin.client.client', [
            'row' => $request,
            'title' => 'Все пользователи',
            'request' => $request
        ]);
    }

    public function getAllGapShareholder(Request $request)
    {
        $request->row = Users::leftJoin('city', 'city.city_id', '=', 'users.city_id')
            ->where('packet.packet_id', '=', Packet::GAP)
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

        if (isset($request->user_name) && $request->user_name != '')
            $request->row->where(function ($query) use ($request) {
                $query->where('users.name', 'like', '%' . $request->user_name . '%')
                    ->orWhere('users.iin', 'like', '%' . $request->iin . '%')
                    ->orWhere('users.last_name', 'like', '%' . $request->user_name . '%')
                    ->orWhere('users.login', 'like', '%' . $request->user_name . '%')
                    ->orWhere('users.email', 'like', '%' . $request->user_name . '%')
                    ->orWhere('users.middle_name', 'like', '%' . $request->user_name . '%');
            });

        if (isset($request->sponsor_name) && $request->sponsor_name != '')
            $request->row->where(function ($query) use ($request) {
                $query->where('recommend.name', 'like', '%' . $request->sponsor_name . '%')
                    ->orWhere('recommend.last_name', 'like', '%' . $request->sponsor_name . '%')
                    ->orWhere('recommend.login', 'like', '%' . $request->sponsor_name . '%')
                    ->orWhere('recommend.email', 'like', '%' . $request->sponsor_name . '%')
                    ->orWhere('recommend.middle_name', 'like', '%' . $request->sponsor_name . '%');
            });

        if (isset($request->city_name) && $request->city_name != '')
            $request->row->where(function ($query) use ($request) {
                $query->where('city.city_name_ru', 'like', '%' . $request->city_name . '%')
                    ->orWhere('country.country_name_ru', 'like', '%' . $request->city_name . '%');
            });

        if (isset($request->is_ban))
            $request->row->where('users.is_ban', $request->is_ban);
        else $request->row->where('users.is_ban', '0');

        if (isset($request->is_active))
            $request->row->where('users.is_activated', $request->is_active);

        if (isset($request->packet_name) && $request->packet_name != '') {
            $request->row->where('packet.packet_name_ru', 'like', '%' . $request->packet_name . '%')
                ->where('user_packet.is_active', 1);
        }
        if ($request->is_interest_holder) {
            $request->row->where(['users.is_interest_holder' => true]);
        }
        $request->row = $request->row->paginate(10);

        return view('admin.shareholder-clients.index', [
            'row' => $request,
            'title' => 'Все пользователи',
            'request' => $request
        ]);
    }

    public function getAllAutoShareholder(Request $request)
    {
        $request->row = Users::leftJoin('city', 'city.city_id', '=', 'users.city_id')
            ->where('packet.packet_id', '=', 27)
            ->where('users.group_id', '=', 0)
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
                    ->orWhere('users.iin', 'like', 'iin' . $request->login . '%')
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

        return view('admin.shareholder-clients.user_list', [
            'row' => $request,
            'title' => 'Все пользователи',
            'request' => $request
        ]);
    }

    public function getAllHomeShareholder(Request $request)
    {
        $request->row = Users::leftJoin('city', 'city.city_id', '=', 'users.city_id')
            ->where('packet.packet_id', '=', 27)
            ->where('users.home_group_id', '=', 0)
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

        return view('admin.shareholder-clients.home.user_list', [
            'row' => $request,
            'title' => 'Все пользователи',
            'request' => $request
        ]);
    }

    public function getAllPlusShareholder(Request $request)
    {
        $request->row = Users::leftJoin('city', 'city.city_id', '=', 'users.city_id')
            ->where('packet.packet_id', '=', 27)
            ->where('users.group_plus_id', '=', 0)
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
                    ->orWhere('users.iin', 'like', 'iin' . $request->login . '%')
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

        return view('admin.shareholder-clients.tulpar-plus.user_list', [
            'row' => $request,
            'title' => 'Все пользователи',
            'request' => $request
        ]);
    }

    public function editAutoUser($id)
    {
        $user = Users::find($id);
        $listOfGroup = CooperativeGroup::all()->pluck('group_name', 'id')->toArray();
        return view('admin.shareholder-clients.add_user_to_group', compact('user', 'listOfGroup'));
    }

    public function editAutoPlusUser($id)
    {
        $user = Users::find($id);
        $listOfGroup = CooperativeGroupPlus::all()->pluck('group_name', 'id')->toArray();
        return view('admin.shareholder-clients.tulpar-plus.add_user_to_group', compact('user', 'listOfGroup'));
    }

    public function editHomeUser($id)
    {
        $user = Users::find($id);
        $listOfGroup = CooperativeHomeGroup::all()->pluck('group_name', 'id')->toArray();
        return view('admin.shareholder-clients.home.add_user_to_group', compact('user', 'listOfGroup'));
    }

    public function updateAutoUser(Request $request, $id)
    {
        $item = Users::find($id);
        $data = $request->all();
        $result = $item->update($data);
        if ($result) {
            return redirect()->route('cooperative.index')->with('success', 'Пользователь успешно добавлен');
        } else {
            return back()->withErrors(['msg' => 'Error'])
                ->withInput();
        }


    }


    public function updateAutoPlusUser(Request $request, $id)
    {
        $item = Users::find($id);
        $data = $request->all();
        $result = $item->update($data);
        if ($result) {
            return redirect()->route('pluses.index')->with('success', 'Пользователь успешно добавлен');
        } else {
            return back()->withErrors(['msg' => 'Error'])
                ->withInput();
        }
    }

    public function updateHomeUser(Request $request, $id)
    {
        $item = Users::find($id);
        $data = $request->all();
        $result = $item->update($data);
        if ($result) {
            return redirect()->route('home.index')->with('success', 'Пользователь успешно добавлен');
        } else {
            return back()->withErrors(['msg' => 'Error'])
                ->withInput();
        }


    }

    public function destroy($id)
    {
        $user = Users::find($id);
        $user->delete();
    }

    public function changeIsBan(Request $request)
    {
        $review = Users::find($request->id);
        $review->is_ban = $request->is_show;
        $review->save();
    }

    public function editIntersHolderStatus(Request $request)
    {
        $user_id = $request->user_id;
        $is_holder = $request->is_holder;
        $share = $request->share;

        $user = Users::where(['user_id' => $user_id])->first();
        $user->is_interest_holder = $is_holder;
        $user->share = $share;
        if ($user->save()) {
            $request->session()->flash('success', 'Вы успешно изменили статус');
            return back();
        }
        $request->session()->flash('danger', 'Произошла ошибка');
        return back();
    }

}
