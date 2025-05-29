<?php

namespace Database\Seeders;

use App\Models\Tipe;
use Illuminate\Database\Seeder;

class TipeSeeder extends Seeder
{
    public function run(): void
    {
        $tipes = [
            ['nama_tipe' => 'Anyaman'],
            ['nama_tipe' => 'Kayu'],
            ['nama_tipe' => 'Kain'],
            ['nama_tipe' => 'Logam'],
            ['nama_tipe' => 'Keramik'],
            ['nama_tipe' => 'Aksesoris']
        ];

        foreach ($tipes as $tipe) {
            Tipe::create($tipe);
        }
    }
}
