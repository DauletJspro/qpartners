<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\View;
use App\Http\Controllers\Controller;
use Mpdf;

class PdfController extends Controller
{

    public function generate()
    {
        $mpdf = new \Mpdf\Mpdf([
            'margin left'   => 10,
            'margin_right'  => 10,
            'margin_top'    => 15,
            'margin_bottom' => 20,
            'margin_header' => 10,
            'margin_footer' => 10
        ]);
        $html = View::make('admin.pdf.pdf')->render();
        $mpdf->WriteHTML($html);
        $mpdf->Output();

    }
}
