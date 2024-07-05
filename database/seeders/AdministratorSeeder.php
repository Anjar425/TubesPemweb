<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\Administrator;

class AdministratorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('administrators')->insert([
            'name' => 'Administrator',
            'email' => 'admin123@gmail.com',
            'password' => Hash::make('admin12345'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
