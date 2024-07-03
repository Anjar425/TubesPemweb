<?php

namespace App\Exports;

use App\Models\Classes;
use Mpdf\Mpdf;

class ClassesExportPdf
{
    public function generatePdf()
    {
        $classes = Classes::all();

        $html = view('exports.classes_pdf', compact('classes'))->render();

        $mpdf = new Mpdf();
        $mpdf->WriteHTML($html);
        return $mpdf->Output('classes.pdf', 'D');
    }
}
