<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Create admin user
        DB::table('users')->insert([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('admin'),
            'role' => 'admin',
        ]);

        // Create regular user
        DB::table('users')->insert([
            'name' => 'Eli',
            'email' => 'eli@gmail.com',
            'password' => Hash::make('123456'),
            'role' => 'user',
        ]);

        // Call TipeSeeder
        $this->call(TipeSeeder::class);

        // Create sample barangs
        $barangs = [
            [
                'nama_produk' => 'Gelang Manik Dayak',
                'jumlah_produk' => 80,
                'harga_produk' => 150000,
                'id_tipe' => 2,
                'stok' => 50,
                'asal_daerah' => 'Kalimantan'
            ],
            [
                'nama_produk' => 'Tas Anyaman Rotan',
                'jumlah_produk' => 15,
                'harga_produk' => 150000,
                'id_tipe' => 1,
                'stok' => 10,
                'asal_daerah' => 'Bali'
            ]
        ];

        foreach ($barangs as $barang) {
            DB::table('barangs')->insert([
                'nama_produk' => $barang['nama_produk'],
                'jumlah_produk' => $barang['jumlah_produk'],
                'harga_produk' => $barang['harga_produk'],
                'id_tipe' => $barang['id_tipe'],
                'stok' => $barang['stok'],
                'asal_daerah' => $barang['asal_daerah'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
