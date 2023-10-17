<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DesignCategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('design_categories')->insert([
            [
                'nama' => 't-shirt',
                'gambar' => 'tshirtDesign.png'
            ],
            [
                'nama' => 'long sleeves',
                'gambar' => 'longSleeve.png'
            ],
            [
                'nama' => 'hoodie',
                'gambar' => 'hoodie.png'
            ],
            [
                'nama' => 'sweater',
                'gambar' => 'sweater.png'
            ],
            [
                'nama' => 'crewneck',
                'gambar' => 'crewneck.png'
            ],
            [
                'nama' => 'jacket',
                'gambar' => 'jacket.png'
            ],
            [
                'nama' => 'varsity',
                'gambar' => 'varsity.png'
            ],
            
        ]);
    }
}
