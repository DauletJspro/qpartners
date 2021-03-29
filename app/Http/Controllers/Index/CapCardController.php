<?php

namespace App\Http\Controllers\Index;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CapCardController extends Controller
{
    public function index(){
        return view('design_index.index.card');
    }
}
