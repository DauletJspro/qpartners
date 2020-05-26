<?php

namespace App\Http\Controllers\Index;

use App\Http\Helpers;
use App\Models\News;
use App\Models\NewsCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;


class NewsController extends Controller
{
    public function getNewsList()
    {
        $row = News::where('is_show', 1)->orderBy('news_date', 'desc')->paginate(4);


        return view('design_index.news.news-list',
            [
                'menu' => 'news',
                'row' => $row,
                'title' => 'Новости',
                'meta_description' => 'Новости. Trade logistic KZ'
            ]
        );
    }

    public function getNewsById($id)
    {
        $row = News::where('is_show', 1)->where('news_id', $id)->first();
        $categories = NewsCategory::where(['is_active' => true])->get();
        $news = News::where('is_show', 1)
            ->orderBy('news_date', 'desc')
            ->paginate(6);


        if ($row == null)
            return response()->view('errors.404', [], 404);

        $images = $row->images;
        $author = $row->user;

        return view('design_index.news.news-detail',
            [
                'menu' => 'news',
                'popular_news' => $news,
                'news' => $row,
                'author' => $author,
                'images' => $images,
                'title' => $row->news_name_ru,
                'categories' => $categories,
                'meta_description' => $row->news_name_ru . '. QazaqTurizm'
            ]
        );
    }
}
