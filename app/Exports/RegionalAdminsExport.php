<?php

namespace App\Exports;

use App\Models\RegionalAdmin;
use Maatwebsite\Excel\Concerns\FromCollection;

class RegionalAdminsExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return RegionalAdmin::all()->makeVisible(['password']);
    }

    public function headings(): array
    {
        return [
            'ID',
            'Administrator ID',
            'Region ID',
            'Name',
            'Email',
            'Password',
            'Visible Password',
        ];
    }
}
