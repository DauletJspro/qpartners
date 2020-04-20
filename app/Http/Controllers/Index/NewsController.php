<?php

namespace App\Http\Controllers\Index;

use App\Http\Helpers;
use App\Models\News;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;


class NewsController extends Controller
{
    public function getNewsList()
    {
        $row = News::where('is_show',1)->orderBy('news_date','desc')->paginate(4);

        return  view('index.news.news',
            [
                'menu' => 'news',
                'row' => $row,
                'title' => 'Новости',
                'meta_description' => 'Новости. Trade logistic KZ'
            ]
        );
    }

    public function getNewsById($url)
    {
        $id = Helpers::getIdFromUrl($url);

        $row = News::where('is_show',1)->where('news_id',$id)->first();

        if($row == null)
            return response()->view('errors.404', [], 404);
        
        return  view('index.index.news-detail',
            [
                'menu' => 'news',
                'news' => $row,
                'title' => $row->news_name_ru,
                'meta_description' => $row->news_name_ru .'. QazaqTurizm'
            ]
        );
    }
}
