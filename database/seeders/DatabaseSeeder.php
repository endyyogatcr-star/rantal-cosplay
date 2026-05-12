<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User; // Tambahkan ini
use Illuminate\Support\Facades\Hash; // Tambahkan ini

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        // Tambahkan kode ini buat bikin user admin
        User::create([
            'name' => 'Admin Cosplay',
            'email' => 'admin@cosplay.com',
            'password' => Hash::make('password123'), // Ini passwordnya nanti
            'role' => 'admin', // Cek apakah tabel usermu pakai kolom role
        ]);

        $this->call([
            CategorySeeder::class,
            CostumeSeeder::class,
        ]);
    }
}