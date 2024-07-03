<?php

namespace App\Exports;

use App\Models\Plant;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;


class PlantsExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Plant::all();
    }

    public function headings(): array
    {
        return [
            'ID',
            'Regional Admin ID',
            'Name',
            'Leaf Width',
            'Class ID',
            'Image',
            'Type',
            'Height',
            'Diameter',
            'Leaf Color',
            'Watering Frequency',
            'Light Intensity',
            'Created At',
            'Update At'
        ];
    }
}
