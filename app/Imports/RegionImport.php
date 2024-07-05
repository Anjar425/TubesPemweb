<?php

namespace App\Imports;

use App\Models\Region;
use App\Models\Coordinate;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class RegionImport implements ToModel, WithHeadingRow
{
    public function model(array $row)
    {
        $region = Region::updateOrCreate(
            ['id' => $row['id']], // Pastikan 'id' sesuai dengan kolom ID di file Excel
            [
                'administrator_id' => $row['administrator_id'],
                'name' => $row['name'],
                'location' => $row['location'],
                'area' => $row['area'],
                'status' => $row['status'],
                'created_at' => $row['created_at'],
                'updated_at' => $row['updated_at'],
            ]
        );

        Coordinate::updateOrCreate(
            ['region_id' => $region->id, 'latitude' => $row['latitude'], 'longitude' => $row['longitude']],
            [
                'region_id' => $region->id,
                'latitude' => $row['latitude'],
                'longitude' => $row['longitude'],
            ]
        );

        return $region;
    }
}
