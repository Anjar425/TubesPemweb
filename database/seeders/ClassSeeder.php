<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Classes;

class ClassSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'name' => 'Dicotyledonae',
                'regional_admins_id' => 1, 
            ],
            [
                'name' => 'Monocotyledonae',
                'regional_admins_id' => 1, 
            ],
            [
                'name' => 'Dicotyledonae',
                'regional_admins_id' => 2, 
            ],
            [
                'name' => 'Monocotyledonae',
                'regional_admins_id' => 2, 
            ]
            
            
        ];

        
        foreach ($data as $item) {
            Classes::create($item);
        }
    }
}
