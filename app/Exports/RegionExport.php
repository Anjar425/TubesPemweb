<?php

namespace App\Exports;

use App\Models\Region;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Style\Fill;
use PhpOffice\PhpSpreadsheet\Style\Border;
use PhpOffice\PhpSpreadsheet\Style\Font;

class RegionExport implements FromCollection, WithHeadings, WithStyles
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        $regions = Region::with('coordinates')->get();

        $data = [];
        foreach ($regions as $region) {
            foreach ($region->coordinates as $coordinate) {
                $data[] = [
                    'ID' => $region->id,
                    'Administrator ID' => $region->administrator_id,
                    'Name' => $region->name,
                    'Location' => $region->location,
                    'Area' => $region->area,
                    'Latitude' => $coordinate->latitude,
                    'Longitude' => $coordinate->longitude,
                    'Status' => $region->status,
                    'Created At' => $region->created_at,
                    'Updated At' => $region->updated_at,
                ];
            }
        }

        return new Collection($data);
    }

    /**
     * @return array
     */
    public function headings(): array
    {
        return [
            'ID',
            'Administrator ID',
            'Name',
            'Location',
            'Area',
            'Latitude',
            'Longitude',
            'Status',
            'Created At',
            'Updated At',
        ];
    }

    /**
     * @param Worksheet $sheet
     */
    public function styles(Worksheet $sheet)
    {
        // Style for table headers
        $sheet->getStyle('A1:J1')->applyFromArray([
            'font' => [
                'name' => 'Times New Roman',
                'bold' => true,
                'color' => ['rgb' => 'FFFFFF'],
            ],
            'alignment' => [
                'horizontal' => Alignment::HORIZONTAL_CENTER,
                'vertical' => Alignment::VERTICAL_CENTER,
            ],
            'fill' => [
                'fillType' => Fill::FILL_SOLID,
                'startColor' => ['rgb' => '006100'],
            ],
        ]);

        // Border for table headers and data
        $sheet->getStyle('A1:J' . $sheet->getHighestRow())
            ->getBorders()
            ->getAllBorders()
            ->setBorderStyle(Border::BORDER_THIN);

        // Center alignment for table headers and data
        $sheet->getStyle('A1:J' . $sheet->getHighestRow())
            ->getAlignment()
            ->setHorizontal(Alignment::HORIZONTAL_CENTER)
            ->setVertical(Alignment::VERTICAL_CENTER);

        // Font for table data
        $sheet->getStyle('A2:J' . $sheet->getHighestRow())
            ->getFont()
            ->setName('Times New Roman');

        // Autosize columns based on content
        foreach (range('A', 'J') as $col) {
            $sheet->getColumnDimension($col)->setAutoSize(true);
        }
    }
}
