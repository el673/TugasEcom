<?php

namespace Database\Seeders;

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
        DB::table('barangs')->insert([
            "nama_produk" => "Gelang Manik Dayak",
            "jumlah_produk" => 50,
            "harga_produk" => 150000,
            "id_tipe" => 2
        ]);
        DB::table('barangs')->insert([
            "nama_produk" => "Tas Anyaman Rotan",
            "jumlah_produk" => 15,
            "harga_produk" => 150000,
            "id_tipe" => 4
        ]);
        DB::table('barangs')->insert([
            "nama_produk" => "Sasando",
            "jumlah_produk" => 10,
            "harga_produk" => 2000000,
            "id_tipe" => 3
        ]);
        DB::table('barangs')->insert([
            "nama_produk" => "Ulos Batak",
            "jumlah_produk" => 25,
            "harga_produk" => 600000,
            "id_tipe" => 1
        ]);
    }
}
