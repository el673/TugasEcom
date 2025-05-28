<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class TipeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $types = [
            'Aksesoris',
            'Tas',
            'Alat Musik',
            'Pakaian Adat',
            'Kerajinan Tangan'
        ];

        foreach ($types as $type) {
            DB::table('tipes')->insert([
                'nama' => $type,
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }
    }
}
