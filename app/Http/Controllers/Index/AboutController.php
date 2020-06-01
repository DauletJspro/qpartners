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
