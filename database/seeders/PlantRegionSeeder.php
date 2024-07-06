<?php

namespace Database\Seeders;

use App\Models\PlantRegion;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PlantRegionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $plantRegion = [
            [
                'region_id' => 1,
                'plant_id' => 1,
                'latitude' => -7.135494575227317,
                'longitude' => 110.41273656450878,
            ],
            [
                'region_id' => 1,
                'plant_id' => 1,
                'latitude' => -7.133645116148437,
                'longitude' => 110.40598297869943,
            ],
            [
                'region_id' => 1,
                'plant_id' => 4,
                'latitude' => -7.134502584880766,
                'longitude' => 110.4078349726761,
            ]
        ];

        foreach ($plantRegion as $plantRegion) {
            PlantRegion::create($plantRegion);
        }
    }
}
