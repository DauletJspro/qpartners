<?php

namespace App\Http\Controllers\Index;

use App\Models\Faq;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FaqController extends Controller
{
    public function show()
    {
        $faqs = Faq::where(['is_active' => true])->get();
        return view('design_index.faq.show', ['faqs' => $faqs]);
    }
}
