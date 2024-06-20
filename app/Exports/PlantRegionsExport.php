<?php

namespace App\Exports;

use App\Models\PlantRegion;
use Maatwebsite\Excel\Concerns\FromCollection;

class PlantRegionsExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return PlantRegion::all();
    }
}
