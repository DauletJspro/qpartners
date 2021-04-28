<?php

namespace App\Http\Controllers\Index;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProgramController extends Controller
{
    public function initial()
    {
            return view('design_index.programs.initial');
    }
    public function share()
    {
        return view('design_index.programs.share');
    }
}
