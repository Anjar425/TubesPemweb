<?php

namespace App\Imports;

use App\Models\Plant;
use Maatwebsite\Excel\Concerns\ToModel;

class PlantsImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Plant([
            'id' => $row[0],
            'regional_admins_id' => $row[1],
            'name' => $row[2],
            'leaf_width' => $row[3],
            'class_id' => $row[4],
            'image' => $row[5],
            'type' => $row[6],
            'height' => $row[7],
            'diameter' => $row[8],
            'leaf_color' => $row[9],
            'watering_frequency' => $row[10],
            'light_intensity' => $row[11],
        ]);
    }
}
