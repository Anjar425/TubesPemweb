<?php

namespace App\Imports;

use App\Models\Region;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class RegionImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        
        return new Region([
           'id'     => $row['id'],
           'administrator_id'    => $row['administrator_id'], 
           'name'    => $row['name'], 
           'location'    => $row['location'], 
           'area'    => $row['area'],
           'latitude'    => $row['latitude'], 
           'longitude'    => $row['longitude'],  
           'status'    => $row['status']
        ]);
    }
    // public function model(array $row)
    // {
    //     $data = array_slice($row, 1);

    //     return new Region([
    //        'id'               => $data[0],
    //        'administrator_id' => $data[1],
    //        'name'             => $data[2],
    //        'location'         => $data[3],
    //        'area'             => $data[4],
    //        'latitude'         => $data[5],
    //        'longitude'        => $data[6],
    //        'status'           => $data[7]
    //     ]);
    // }
}
