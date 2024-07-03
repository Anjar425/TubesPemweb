<?php

namespace App\Exports;

use App\Models\PlantRegion;
use App\Models\Region;
use Mpdf\Mpdf;
use Illuminate\Support\Facades\Auth;

class PlantRegionsExportpdf
{
    public function export()
    {
        $userId = Auth::guard('regadmin')->user()->id;
        $administratorId = Auth::guard('regadmin')->user()->administrator_id;

        $regions = Region::where('administrator_id', $administratorId)->get();
        $regionIds = $regions->pluck('id');

        $plantRegions = PlantRegion::whereIn('region_id', $regionIds)->with('plant', 'region')->get();

        $pdf = new Mpdf();
        $html = view('exports.plantregions_pdf', compact('plantRegions'))->render();
        $pdf->WriteHTML($html);

        return $pdf->Output('plantregions.pdf', 'D');
    }
}
