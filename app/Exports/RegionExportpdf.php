<?php

namespace App\Exports;

use App\Models\Region;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Mpdf\Mpdf;

class RegionExportPdf implements FromView
{
    public function view(): View
    {
        $regions = Region::all();

        return view('exports.region_pdf', [
            'regions' => $regions,
        ]);
    }

    public function exportPdf()
    {
        $mpdf = new Mpdf();
        $mpdf->WriteHTML($this->view());
        $mpdf->Output('regions.pdf', 'D');
    }
}
