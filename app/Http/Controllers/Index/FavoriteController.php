<?php

namespace App\Http\Controllers\Index;

use App\Models\Favorite;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FavoriteController extends Controller
{

    /**
     * Display a list of the items, checked by user
     * @param int user_id
     * @return \Illuminate\Http\Response
     *
     */

    public function showUserItems($user_id)
    {
        return view('');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    private function addItemToFavorites($user_id, $session_id, $item_id)
    {
        $favorite = Favorite::where(function ($query) use ($user_id, $session_id) {
            $query->where(['user_id' => $user_id])->orWhere(['session_id' => $session_id]);
        })->where(['item_id' => $item_id])->first();

        if (count($favorite) && $favorite->delete()) {
            return 2; // successfully remove item from favorite
        }


        $is_auth = $user_id ? true : false;
        $favorite = new Favorite();
        $favorite->user_id = $user_id;
        $favorite->session_id = $session_id;
        $favorite->item_id = $item_id;
        $favorite->is_authorized = $is_auth;
        $favorite->is_active = true;
        if (!$favorite->save()) {
            return 0;
        }
        return 1;
    }

    private function deleteItemFromFavorites()
    {

    }


    /**
     *  Redirect to the right method (Adapter method)
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function isAjax(Request $request)
    {

        if (!$request->ajax()) {
            return response()->json([
                'success' => false,
                'message' => 'Запрос не является ajax',
                'data' => [],
            ]);
        }

        $item_id = $request->item_id;
        $user_id = $request->user_id;
        $session_id = $request->session_id;
        $method = $request->method_name;

        switch ($method) {
            case 'add':
                $check = $this->addItemToFavorites($user_id, $session_id, $item_id);
                if ($check == 0) {
                    return response()->json([
                        'success' => 0,
                        'message' => 'Произошла ошибка',
                        'data' => []
                    ]);
                } elseif ($check == 2) {
                    return response()->json([
                        'success' => 2,
                        'message' => 'Вы успешно удалили продукт из избранных',
                        'data' => [],
                    ]);
                }
                return response()->json([
                    'success' => true,
                    'message' => 'Вы успешно добавили продукт в избранные',
                    'data' => [],
                ]);
                break;
        }
    }
}
