<?php

namespace App\Exports;

use App\Models\RegionalAdmin;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class RegionAdminExport implements FromCollection, WithHeadings
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return RegionalAdmin::all()->makeVisible(['password']);
    }

    /**
     * @return array
     */
    public function headings(): array
    {
        // Sesuaikan dengan nama kolom yang ada di tabel regional_admins
        return [
            'ID',
            'Administrator ID',
            'Region ID',
            'Name',
            'Email',
            'Password',
            'Visible Password',
            'Created At',
            'Updated At',
        ];
    }
}
