<?php

namespace App\Imports;

use App\Models\Plant;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class PlantsImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Plant([
            'id'                   => $row['id'],
            'regional_admins_id'   => $row['regional_admin_id'],
            'name'                 => $row['name'],
            'leaf_width'           => $row['leaf_width'],
            'class_id'             => $row['class_id'],
            'image'                => $row['image'],
            'type'                 => $row['type'],
            'height'               => $row['height'],
            'diameter'             => $row['diameter'],
            'leaf_color'           => $row['leaf_color'],
            'watering_frequency'   => $row['watering_frequency'],
            'light_intensity'      => $row['light_intensity'],
        ]);
    }
}
