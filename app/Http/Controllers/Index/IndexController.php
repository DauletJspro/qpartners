<?php

namespace App\Http\Controllers\Index;

use App\Http\Helpers;
use App\Models\About;
use App\Models\Carriage;
use App\Models\City;
use App\Models\Education;
use App\Models\News;
use App\Models\Order;
use App\Models\Project;
use App\Models\Slider;
use App\Models\Partner;
use App\Models\Contact;
use App\Models\Blog;
use App\Models\User2;
use App\Models\UserInfo;
use App\Models\UserPacket;
use App\Models\Users;
use App\Models\Video;
use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\MessageBag;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Response;

class IndexController extends Controller
{
    public function __construct()
    {
    
    }

    
    public function index(Request $request)
    {
        if($request->ok == 1){
            


           /* $users = Users::where('status_id',14)->get();
            foreach($users as $item){
                $user_packet = UserPacket::where('is_active',1)->where('packet_id',15)->where('user_id',$item->user_id)->first();
                if($user_packet != null){
                    $user = Users::where('user_id',$item->user_id)->first();
                    $user->status_id = 14;
                    $user->save();
                }
            }
            dd($users);*/



            //5 статус беру

           /* $user_packet = UserPacket::leftJoin('users','users.user_id','=','user_packet.user_id')
                                    ->where('user_packet.is_active',1)
                                    ->where('user_packet.packet_id',15)
                                    ->groupBy('user_packet.user_id')
                                    ->select('user_packet.user_id','name','login')
                                    ->get();

            foreach($user_packet as $item){
                $user = Users::where('user_id',$item->user_id)->first();
                $user->status_id = 3;
                $user->save();
            }
            dd($user_packet);*/



            //жогаргы статустарды беру

           /* $users = Users::where('status_id','>=',3)->where('qualification_profit','>=',250000)->get();
            foreach ($users as $key => $item){
                $user = Users::where('user_id',$item->user_id)->first();
                $user->status_id = 9;
                $user->save();
            }

            dd($users);*/

        }

        $news = News::where('is_show',1)
                      ->orderBy('news_date','desc')
                      ->take(3)
                      ->get();

        $project = Project::where('is_show',1)
                    ->orderBy('sort_num','asc')
                    ->take(4)
                    ->get();

        $user_share = Users::where('user_share','>',0)->count();
        $user_count = Users::count();

        $standart_packet_count = UserPacket::where('is_active',1)->where('packet_id','>',2)->groupBy('user_id')->count();
    
        return  view('index_updated.index.index',
            [
                'menu' => 'index',
                'news' => $news,
                'project_list' => $project,
                'user_share' => $user_share,
                'user_count' => $user_count,
                'standart_packet_count' => $standart_packet_count
            ]
        );
    }

    public function showFile($url){
        $path = storage_path('app/image/' . $url);

        if (!File::exists($path)) {
            abort(404);
        }

        $file = File::get($path);
        $type = File::mimeType($path);

        $response = Response::make($file, 200);
        $response->header("Content-Type", $type);

        return $response;
    }

    public function redirectToRegister($user_id,$user_name)
    {
        $user = Users::find($user_id);
        if($user == null) abort(404);
        $new_url = '/register?id='.$user->user_id;
        return redirect($new_url);
    }

    public function gallery(Request $request)
    {
        $gallery = Slider::where('is_show',1)
                           ->orderBy('slider_id')
                            ->paginate(9);

        return  view('index.index.gallery',
            [
                'menu' => 'gallery',
                'gallery' => $gallery
            ]
        );
    }

    public function video(Request $request)
    {
        $video = Video::where('is_show',1)
                        ->orderBy('video_id')
                        ->paginate(9);

        return  view('index.index.video',
            [
                'menu' => 'gallery',
                'video' => $video
            ]
        );
    }
    
    public function news(Request $request)
    {
        $news = News::where('is_show',1)
                    ->orderBy('news_date','desc')
                    ->paginate(6);

        return  view('index.index.news',
            [
                'menu' => 'news',
                'news' => $news
            ]
        );
    }

    public function contact(Request $request)
    {
        return  view('index.index.contact',
            [
                'menu' => 'contact'
            ]
        );
    }

    public function getAboutById(Request $request,$url)
    {
        $id = Helpers::getIdFromUrl($url);
        $about = About::where('is_show',1)->where('about_id',$id)->first();
        if($about == null) abort(404);

        $about_list = \App\Models\About::where('is_show',1)->orderBy('about_id')->get();
        
        return  view('index.index.about',
            [
                'menu' => 'about',
                'about' => $about,
                'about_list' => $about_list
            ]
        );
    }

    public function getEducationById(Request $request,$url)
    {
        $id = Helpers::getIdFromUrl($url);
        $education = Education::where('is_show',1)->where('education_id',$id)->first();
        if($education == null) abort(404);

        $about_list = \App\Models\Education::where('is_show',1)->orderBy('education_id')->get();

        return  view('index.index.education',
            [
                'menu' => 'education',
                'education' => $education,
                'education_list' => $about_list
            ]
        );
    }

    public function getProjectById(Request $request,$url)
    {
        $id = Helpers::getIdFromUrl($url);
        $project = Project::where('is_show',1)->where('project_id',$id)->first();
        if($project == null) abort(404);

        $about_list = \App\Models\Project::where('is_show',1)->orderBy('project_id')->get();

        return  view('index.index.project',
            [
                'menu' => 'project',
                'project' => $project,
                'project_list' => $about_list
            ]
        );
    }

    public function sendMessage(Request $request){
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'user_name' => 'required',
            'message' => 'required'
        ]);


        if ($validator->fails()) {
            $messages = $validator->errors();
            $error = $messages->all();
            $result['status'] = false;
            $result['message'] = 'Укажите необходимые поля';
            return $result;
        }

        $contact = new Contact();
        $contact->user_name = $request->user_name;
        $contact->email = $request->email;
        $contact->message = $request->message;
        $contact->save();

        $message = '<h2>Обратная связь</h2>
                    <p><b>Имя: </b>'.$request->user_name.'</p>
                    <p><b>Почта: </b>'.$request->email.'</p>
                    <p><b>Текст: </b>'.$request->message.'</p>
                    ';

        $email = 'arman.abdiyev@gmail.com';

        /*Helpers::send_mime_mail('arman.abdiyev@gmail.com',
            'arman.abdiyev@gmail.com',
            $email,
            $email,
            'windows-1251',
            'UTF-8',
            'Обратная связь',
            $message,
            true);*/

        $result['status'] = true;
        $result['message'] = 'Успешно отправлено';

        return response()->json($result);
    }

    public function addRequest(Request $request){
        $validator = Validator::make($request->all(), [
            'phone' => 'required',
            'user_name' => 'required'
        ]);


        if ($validator->fails()) {
            $messages = $validator->errors();
            $error = $messages->all();
            $result['success'] = false;
            $result['message'] = 'Заполните все поля';
            return $result;
        }

        $order = new Order();
        $order->user_name = $request->user_name;
        $order->phone = $request->phone;
        $order->from_city_id = $request->from_city_id;
        $order->to_city_id = $request->to_city_id;
        $order->carriage_id = $request->carriage_id;
        $order->count_carriage = $request->count_carriage;
        $order->save();

        $message = '<h2>Онлайн заявка</h2>
                    <p><b>Имя: </b>'.$request->user_name.'</p>
                    <p><b>Почта: </b>'.$request->phone.'</p>
                    <p><b>Тип: </b>'.$request->carriage_id.'</p>
                    <p><b>Количество вагона: </b>'.$request->count_carriage.'</p>
                    ';

        $email = 'arman.abdiyev@gmail.com';

        /*Helpers::send_mime_mail('arman.abdiyev@gmail.com',
            'arman.abdiyev@gmail.com',
            $email,
            $email,
            'windows-1251',
            'UTF-8',
            'Обратная связь',
            $message,
            true);*/

        $result['success'] = true;
        $result['message'] = 'Успешно отправлено';

        return response()->json($result);
    }

    public function getCityListByCountry(Request $request){
        $city = City::orderBy('sort_num', 'asc')->orderBy('city_name_ru');

        if($request->country_id > 0) $city->where('country_id',$request->country_id);
        
        $city = $city->get();

        $row = array();
        foreach ($city as $key => $val)
        {
            $row[$key]['city_id'] = $val['city_id'];
            $row[$key]['city_name'] = $val['city_name_ru'];
        }
        
        $result['data'] = $row;
        $result['status'] = true;
        return response()->json($result);
    }
}
