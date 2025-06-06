<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // Create Admin
        User::create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('admin'),
            'role' => 'admin'
        ]);

        // Create User
        User::create([
            'name' => 'Eli',
            'email' => 'eli@gmail.com',
            'password' => Hash::make('123456'),
            'role' => 'user'
        ]);
    }
}
