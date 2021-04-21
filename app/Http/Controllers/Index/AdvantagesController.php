<?php

namespace App\Http\Controllers\index;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdvantagesController extends Controller
{
    public function index()
    {
        return view('design_index.advantages.index');
    }
}
