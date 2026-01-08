<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Destination;

class DestinationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            'Pantai',
            'Pegunungan',
            'Budaya',
            'Alam',
            'Kota'
        ];

        for ($i = 1; $i <= 50; $i++) {
            $category = $categories[array_rand($categories)];

            Destination::create([
                'name' => "Destinasi Wisata $i",
                'location' => 'Indonesia',
                'category' => $category,
                'image' => "destinations/sample{$i}.jpg",
                'description' => "Destinasi wisata kategori {$category} dengan pemandangan indah dan fasilitas lengkap, cocok untuk liburan bersama keluarga maupun teman.",
                'price' => rand(300000, 1500000),
            ]);
        }
    }
}
