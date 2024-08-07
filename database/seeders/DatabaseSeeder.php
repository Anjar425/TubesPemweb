<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();
        $this->call([
            AdministratorSeeder::class
        ]);
        $this->call([
            RegionSeeder::class
        ]);
        $this->call([
            AdminRegionSeeder::class
        ]);
        $this->call([
            ClassSeeder::class
        ]);
        $this->call([
            PlantSeeder::class
        ]);
        $this->call([
            PlantRegionSeeder::class
        ]);
    }
}
