<?php

namespace App\Http\Controllers\Index;

use App\Http\Helpers;
use App\Models\News;
use App\Models\About;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;


class AboutController extends Controller
{
    public function getAboutById($url)
    {
        $id = Helpers::getIdFromUrl($url);

        $row = About::where('is_show', 1)->where('about_id', $id)->first();

        if ($row == null)
            return response()->view('errors.404', [], 404);

        return view('index.index.about',
            [
                'menu' => 'about',
                'row' => $row,
                'title' => $row->about_name_ru,
                'meta_description' => $row->about_name_ru . '. Trade logistic KZ'
            ]
        );
    }

    public function showCompanyAdministration()
    {
        return view('design_index.about_us.company_administration');
    }

    public function showCompanyGuide()
    {
        return view('design_index.about_us.company_guide');
    }

    public function showCompanyLeaders()
    {
        return view('design_index.about_us.company_leaders');
    }

}
