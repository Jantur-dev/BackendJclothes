<?php

namespace Database\Seeders;

use App\Models\Barang;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class BarangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Barang::insert([
            [
                'nama_barang' => 'Satoru',
                'gambar' => 'satoru.png',
                'harga' => 50000,
                'stok' => 5,
                'keterangan' => 'design gojo satoru'
            ],
            [
                'nama_barang' => 'Gojo Design',
                'gambar' => 'hoodieGojo.png',
                'harga' => 150000,
                'stok' => 2,
                'keterangan' => 'design gojo satoru'
            ],
            [
                'nama_barang' => 'Varsity Custom',
                'gambar' => 'varsity.png',
                'harga' => 450000,
                'stok' => 1,
                'keterangan' => 'design varsity custom'
            ],
            [
                'nama_barang' => 'Moon T-Shirt',
                'gambar' => 'MOON1.png',
                'harga' => 55000,
                'stok' => 3,
                'keterangan' => 'design moon'
            ],
            [
                'nama_barang' => 'Ghost Ride Hoodie',
                'gambar' => 'ghostrideHoodie.png',
                'harga' => 150000,
                'stok' => 2,
                'keterangan' => 'design Ghost Ride'
            ],

        ]);
    }
}
