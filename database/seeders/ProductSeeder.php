<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('products')->insert([
            'nama_produk'=> 'kain tenun ikat flores',
            'tipe_produk'=> 'kain',
            'jumlah_produk' => '20',
            'harga_produk'=> "500000"
        ]);
        DB::table('products')->insert([
            'nama_produk' => 'kain songket palembang',
            'tipe_produk' => 'kain',
            'jumlah_produk' => '15',
            'harga_produk' => '750000'
        ]);
        DB::table('products')->insert([
            'nama_produk' => 'kain batik pekalongan',
            'tipe_produk' => 'kain',
            'jumlah_produk' => '30',
            'harga_produk' => '350000'
        ]);     
    }
}