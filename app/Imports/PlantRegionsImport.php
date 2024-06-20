<?php

namespace App\Imports;

use App\Models\PlantRegion;
use Maatwebsite\Excel\Concerns\ToModel;

class PlantRegionsImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new PlantRegion([
            'id' => $row[0],
            'region_id' => $row[1],
            'plant_id' => $row[2],
        ]);
    }
}
