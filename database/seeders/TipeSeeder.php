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
        DB::table('tipes')->insert([
            "nama" => "Kain"
        ]);
        DB::table('tipes')->insert([
            "nama" => "Aksesoris"
        ]);
        DB::table('tipes')->insert([
            "nama" => "Kayu"
        ]);
        DB::table('tipes')->insert([
            "nama" => "Anyaman"
        ]);
        DB::table('tipes')->insert([
            "nama" => "AlatMusik"
        ]);
    }
}
