<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class ProdukSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('produks')->insert([
            [
                'nama' => 'Apple MacBook Air M2',
                'harga' => 'Rp 18.999.000',
                'gambar' => 'http://127.0.0.1:8000/storage/produk/produk1.png',
                'status' => 'y',
            ],
            [
                'nama' => 'Dell XPS 13 9315',
                'harga' => 'Rp 12.899.000',
                'gambar' => 'http://127.0.0.1:8000/storage/produk/produk2.png',
                'status' => 'y',
            ],
            [
                'nama' => 'HP Dragonfly Pro Chromebook',
                'harga' => 'Rp 16.000.000',
                'gambar' => 'http://127.0.0.1:8000/storage/produk/produk3.png',
                'status' => 'y',
            ],
            [
                'nama' => 'Apple MacBook Pro M2 2023',
                'harga' => 'Rp 44.499.000',
                'gambar' => 'http://127.0.0.1:8000/storage/produk/produk4.png',
                'status' => 'y',
            ],
            [
                'nama' => 'Acer Aspire 5 A514',
                'harga' => 'Rp 8.999.000',
                'gambar' => 'http://127.0.0.1:8000/storage/produk/produk5.png',
                'status' => 'y',
            ],
            [
                'nama' => 'Lenovo Yoga 9i',
                'harga' => 'Rp 29.999.000',
                'gambar' => 'http://127.0.0.1:8000/storage/produk/produk6.png',
                'status' => 'y',
            ],
            [
                'nama' => 'Dell Alienware m18',
                'harga' => 'Rp 39.999.000',
                'gambar' => 'http://127.0.0.1:8000/storage/produk/produk7.png',
                'status' => 'y',
            ],
            [
                'nama' => 'Dell Gaming G15 5520',
                'harga' => 'Rp 24.999.000',
                'gambar' => 'http://127.0.0.1:8000/storage/produk/produk8.png',
                'status' => 'y',
            ],
            [
                'nama' => 'Asus ROG Strix G15 Advantage Edition',
                'harga' => 'Rp 32.999.000',
                'gambar' => 'http://127.0.0.1:8000/storage/produk/produk9.png',
                'status' => 'y',
            ],
            [
                'nama' => 'Asus ROG Strix G15',
                'harga' => 'Rp 28.999.000',
                'gambar' => 'http://127.0.0.1:8000/storage/produk/produk10.png',
                'status' => 'y',
            ],
        ]);
    }
}
