<?php

namespace App\Exports;

use App\Models\Plant;
use Mpdf\Mpdf;

class PlantsExportPdf
{
    public function export()
    {
        $plants = Plant::with('plantClass')->get();

        $html = view('exports.plants_pdf', compact('plants'))->render();

        $mpdf = new Mpdf();
        $mpdf->WriteHTML($html);

        return $mpdf->Output('plants.pdf', 'D');
    }
}
