<?php

namespace App\Http\Controllers\Index;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PassiveProgramController extends Controller
{
    public function getSocial()
    {
        return view('design_index.index.social-program');
    }
    public function getPartner(){
        return view('design_index.index.partner-program');
    }

    public function getBaspanaPlus(){
        return view('design_index.index.baspana-plus');
    }

    public function getActiveHome(){
        return view('design_index.index.activ-home');
    }
    public function getBaspana(){
        return view('design_index.index.baspana');
    }

    public function getActiveCar(){
        return view('design_index.index.activ-car');
    }

    public function getTulpar(){
        return view('design_index.index.tulpar');
    }

    public function getTulparPlus(){
        return view('design_index.index.tulpar-plus');
    }

    public function getForm(){
        return view('design_index.index.form');
    }
}
