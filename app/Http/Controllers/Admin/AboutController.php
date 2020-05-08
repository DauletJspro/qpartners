<?php

namespace App\Http\Controllers\Admin;

use App\Models\About;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use View;
use DB;

class AboutController extends Controller
{
    public function __construct()
    {
        $this->middleware('adminWebsite');
    }

    public function index(Request $request)
    {
        $row = About::where(function($query) use ($request){
            $query->where('about_name_kz','like','%' .$request->search .'%')
                ->orWhere('about_name_ru','like','%' .$request->search .'%')
                ->orWhere('about_name_en','like','%' .$request->search .'%');
        })
            ->orderBy('about_id','desc')
            ->select('about.*',
                DB::raw('DATE_FORMAT(about.created_at,"%d.%m.%Y %H:%i") as date'));

        if(isset($request->active))
            $row->where('is_show',$request->active);
        else $row->where('is_show','1');

        $row->where('about.parent_id',$request->parent_id);
        
        $row = $row->paginate(20);

        return  view('admin.about.about',[
            'row' => $row,
            'request' => $request
        ]);
    }

    public function create()
    {
        $row = new About();
        $row->about_image = '/media/default.jpg';
        $row->about_date = date("d.m.Y H:i");
        return  view('admin.about.about-edit', [
            'title' => 'Добавить страницу',
            'row' => $row
        ]);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'about_name_ru' => 'required',
        ]);

        if ($validator->fails()) {
            $messages = $validator->errors();
            $error = $messages->all();
            return  view('admin.about.about-edit', [
                'title' => 'Добавить страницу',
                'row' => (object) $request->all(),
                'error' => $error[0]
            ]);
        }

        $about = new About();
        $about->about_name_ru = $request->about_name_ru;
        $about->about_name_kz = $request->about_name_kz;
        $about->about_name_en = $request->about_name_en;
        $about->about_text_ru = $request->about_text_ru;
        $about->about_text_kz = $request->about_text_kz;
        $about->about_text_en = $request->about_text_en;
        $about->about_desc_ru = $request->about_desc_ru;
        $about->about_desc_kz = $request->about_desc_kz;
        $about->about_desc_en = $request->about_desc_en;
        $about->about_image = $request->about_image;
        $about->about_redirect = $request->about_redirect;

        $url = '';
        if($request->parent_id == '') $request->parent_id = null;
        else {
            $level = About::where('about_id',$request->parent_id)->first();
            $level = $level->parent_level + 1;
            $about->parent_level = $level;
            $url = '?parent_id=' .$request->parent_id;
        }
        $about->parent_id = $request->parent_id;
        $about->save();
        
        return redirect('/admin/about'.$url);
    }

    public function edit($id)
    {
        $row = About::select('about.*',
                DB::raw('DATE_FORMAT(about.about_date,"%d.%m.%Y %H:%i") as about_date'))
            ->where('about.about_id',$id)
            ->first();
     
        return  view('admin.about.about-edit', [
            'title' => 'Изменить страницу',
            'row' => $row
        ]);
    }

    public function show(Request $request,$id){

    }

    public function update(Request $request,$id)
    {
        $validator = Validator::make($request->all(), [
            'about_name_ru' => 'required',
        ]);

        if ($validator->fails()) {
            $messages = $validator->errors();
            $error = $messages->all();
            return  view('admin.about.about-edit', [
                'title' => 'Изменить страницу',
                'row' => (object) $request->all(),
                'error' => $error[0]
            ]);
        }

        $about = About::find($id);
        $about->about_name_ru = $request->about_name_ru;
        $about->about_name_kz = $request->about_name_kz;
        $about->about_name_en = $request->about_name_en;
        $about->about_text_ru = $request->about_text_ru;
        $about->about_text_kz = $request->about_text_kz;
        $about->about_text_en = $request->about_text_en;
        $about->about_desc_ru = $request->about_desc_ru;
        $about->about_desc_kz = $request->about_desc_kz;
        $about->about_desc_en = $request->about_desc_en;
        $about->about_image = $request->about_image;
        $about->about_redirect = $request->about_redirect;
        $about->save();
        
        if($request->parent_id == '') $url = '';
        else $url = '?parent_id=' .$request->parent_id;
        
        return redirect('/admin/about'.$url);
    }

    public function destroy($id)
    {
        $about = About::find($id);
        $about->delete();
    }

    public function changeIsShow(Request $request){
        $about = About::find($request->id);
        $about->is_show = $request->is_show;
        $about->save();
    }
}
