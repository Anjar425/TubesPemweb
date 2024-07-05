<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\RegionalAdmin;
use Illuminate\Support\Facades\Hash;

class AdminRegionSeeder extends Seeder
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
                'name' => 'Regional Admin 1',
                'email' => 'adminregion1@gmail.com',
                'password' => Hash::make('adminregion1'),
                'visible_password' => 'adminregion1',
                'administrator_id' => 1, 
                'region_id' => 1, 
            ],
            [
                'name' => 'Regional Admin 2',
                'email' => 'adminregion2@gmail.com',
                'password' => Hash::make('adminregion2'),
                'visible_password' => 'adminregion2',
                'administrator_id' => 1, 
                'region_id' => 2, 
            ],
            
        ];

        
        foreach ($data as $item) {
            RegionalAdmin::create($item);
        }
    }
}
