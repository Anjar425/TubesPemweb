<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Plant;
use App\Models\Classes;

class PlantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $plants = [
            [
                'regional_admins_id' => 1,
                'image' => 'image/gambar_1.jpeg',
                'name' => 'Mawar',
                'class_id' => 1, // Dicotyledonae
                'type' => 'Bunga',
                'height' => 2.27,
                'diameter' => 0.44,
                'leaf_color' => 'Hijau',
                'leaf_width' => 2.35,
                'watering_frequency' => 'Sekali seminggu',
                'light_intensity' => 'Tinggi',
            ],
            [
                'regional_admins_id' => 1,
                'image' => 'image/gambar_2.jpg',
                'name' => 'Tulip',
                'class_id' => 2, // Monocotyledonae
                'type' => 'Bunga',
                'height' => 2.42,
                'diameter' => 0.45,
                'leaf_color' => 'Hijau Muda',
                'leaf_width' => 5.92,
                'watering_frequency' => 'Sekali seminggu',
                'light_intensity' => 'Rendah',
            ],
            [
                'regional_admins_id' => 1,
                'image' => 'image/gambar_3.jpg',
                'name' => 'Anggrek',
                'class_id' => 1, // Dicotyledonae
                'type' => 'Bunga',
                'height' => 1.47,
                'diameter' => 0.29,
                'leaf_color' => 'Hijau Tua',
                'leaf_width' => 1.96,
                'watering_frequency' => 'Setiap hari',
                'light_intensity' => 'Rendah',
            ],
            [
                'regional_admins_id' => 1,
                'image' => 'image/gambar_4.jpg',
                'name' => 'Melati',
                'class_id' => 1, // Dicotyledonae
                'type' => 'Bunga',
                'height' => 0.32,
                'diameter' => 0.38,
                'leaf_color' => 'Merah',
                'leaf_width' => 9.36,
                'watering_frequency' => 'Sekali seminggu',
                'light_intensity' => 'Rendah',
            ],
            [
                'regional_admins_id' => 1,
                'image' => 'image/gambar_5.jpg',
                'name' => 'Lidah Buaya',
                'class_id' => 2, // Monocotyledonae
                'type' => 'Sukulen',
                'height' => 0.24,
                'diameter' => 0.43,
                'leaf_color' => 'Kuning',
                'leaf_width' => 3.71,
                'watering_frequency' => 'Dua kali seminggu',
                'light_intensity' => 'Tinggi',
            ],
            [
                'regional_admins_id' => 1,
                'image' => 'image/gambar_6.jpg',
                'name' => 'Kaktus',
                'class_id' => 1, // Dicotyledonae
                'type' => 'Sukulen',
                'height' => 1.83,
                'diameter' => 0.19,
                'leaf_color' => 'Hijau',
                'leaf_width' => 1.75,
                'watering_frequency' => 'Sekali seminggu',
                'light_intensity' => 'Sedang',
            ],
            [
                'regional_admins_id' => 1,
                'image' => 'image/gambar_7.png',
                'name' => 'Bonsai',
                'class_id' => 1, // Dicotyledonae
                'type' => 'Bonsai',
                'height' => 0.13,
                'diameter' => 0.31,
                'leaf_color' => 'Hijau',
                'leaf_width' => 3.97,
                'watering_frequency' => 'Sekali seminggu',
                'light_intensity' => 'Tinggi',
            ],
            [
                'regional_admins_id' => 1,
                'image' => 'image/gambar_8.jpg',
                'name' => 'Kemangi',
                'class_id' => 1, // Dicotyledonae
                'type' => 'Herba',
                'height' => 1.53,
                'diameter' => 0.34,
                'leaf_color' => 'Hijau Muda',
                'leaf_width' => 1.85,
                'watering_frequency' => 'Sekali seminggu',
                'light_intensity' => 'Tinggi',
            ],
            [
                'regional_admins_id' => 1,
                'image' => 'image/gambar_9.jpg',
                'name' => 'Rosella',
                'class_id' => 1, // Dicotyledonae
                'type' => 'Herba',
                'height' => 1.39,
                'diameter' => 0.42,
                'leaf_color' => 'Hijau',
                'leaf_width' => 5.38,
                'watering_frequency' => 'Setiap hari',
                'light_intensity' => 'Tinggi',
            ],
            [
                'regional_admins_id' => 1,
                'image' => 'image/gambar_10.jpg',
                'name' => 'Lavender',
                'class_id' => 1, // Dicotyledonae
                'type' => 'Bunga',
                'height' => 0.16,
                'diameter' => 0.22,
                'leaf_color' => 'Hijau Tua',
                'leaf_width' => 3.79,
                'watering_frequency' => 'Setiap hari',
                'light_intensity' => 'Sedang',
            ],
        ];

        foreach ($plants as $plant) {
            Plant::create($plant);
        }
    }
}
