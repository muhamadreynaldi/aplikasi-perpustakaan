<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    public function run()
    {
        // Mengisi data untuk Anggota
        User::create([
            'name' => 'Anggota User',
            'email' => 'anggota@example.com',
            'password' => bcrypt('password'), // Pastikan untuk menggunakan bcrypt untuk enkripsi password
            'role' => 'anggota',
        ]);

        // Mengisi data untuk Pustakawan
        User::create([
            'name' => 'Pustakawan User',
            'email' => 'pustakawan@example.com',
            'password' => bcrypt('password'), // Pastikan untuk menggunakan bcrypt untuk enkripsi password
            'role' => 'pustakawan',
        ]);
        
    }
}
