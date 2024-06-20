<?php

namespace App\Imports;

use App\Models\RegionalAdmin;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Illuminate\Support\Facades\Hash;

class RegionAdminImport implements ToModel, WithHeadingRow
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new RegionalAdmin([
            'administrator_id' => $row['administrator_id'],
            'region_id' => $row['region_id'],
            'name' => $row['name'],
            'email' => $row['email'],
            'password' => Hash::make($row['password']),
            'visible_password' => $row['visible_password'],
        ]);
    }
}
