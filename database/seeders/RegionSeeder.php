<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Region;
use App\Models\Coordinate;

class RegionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Example data for regions
        $regions = [
            [
                'name' => 'Ungaran',
                'administrator_id' => 1, // Assume an administrator ID
                'location' => 'Kabupaten Semarang',
                'area' => '150.25',
                'status' => 'Aktif',
                'coordinates' => [
                    ['latitude' => -7.1390, 'longitude' => 110.4081],
                    ['latitude' => -7.1350, 'longitude' => 110.4170],
                    ['latitude' => -7.1270, 'longitude' => 110.4120],
                    ['latitude' => -7.1320, 'longitude' => 110.4010],
                ],
            ],
            [
                'name' => 'Mertoyudan',
                'administrator_id' => 1, // Assume an administrator ID
                'location' => 'Kabupaten Magelang',
                'area' => '200.5',
                'status' => 'Dalam Perawatan',
                'coordinates' => [
                    ['latitude' => -7.5015, 'longitude' => 110.2246],
                    ['latitude' => -7.4980, 'longitude' => 110.2255],
                    ['latitude' => -7.4995, 'longitude' => 110.2220],
                    ['latitude' => -7.5030, 'longitude' => 110.2235],
                ],
            ],
            // Add more regions as needed
        ];

        // Insert regions and their coordinates
        foreach ($regions as $regionData) {
            $region = Region::create([
                'name' => $regionData['name'],
                'administrator_id' => $regionData['administrator_id'],
                'location' => $regionData['location'],
                'area' => $regionData['area'],
                'status' => $regionData['status'],
            ]);

            foreach ($regionData['coordinates'] as $coordinate) {
                Coordinate::create([
                    'region_id' => $region->id,
                    'latitude' => $coordinate['latitude'],
                    'longitude' => $coordinate['longitude'],
                ]);
            }
        }
    }
}
