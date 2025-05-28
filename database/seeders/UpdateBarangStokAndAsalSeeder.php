<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Barang;

class UpdateBarangStokAndAsalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Update all stocks to 6
        DB::table('barangs')->update(['stok' => 6]);

        // Update specific products with their regions
        $products = [
            'Gelang Manik Dayak' => 'Kalimantan Timur',
            'Tas Anyaman Rotan' => 'Kalimantan Barat',
            'Sasando' => 'Nusa Tenggara Timur',
            'Ulos Batak' => 'Sumatera Utara'
        ];

        foreach ($products as $nama => $asal) {
            DB::table('barangs')
                ->where('nama_produk', $nama)
                ->update(['asal_daerah' => $asal]);
        }
    }
}
