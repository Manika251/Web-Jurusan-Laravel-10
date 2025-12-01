<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Setting;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // 1. Membuat akun Admin baru
        User::create([
            'name' => 'Administrator',
            'email' => 'admin@jurusan.com',
            'password' => Hash::make('password123'),
            'role' => 'admin',
        ]);

        // 2. Buat Data Pengaturan Awal (Settings)
        Setting::insert([
            ['key' => 'jurusan_name', 'value' => 'Jurusan Sistem Informasi', 'type' => 'text'],
            ['key' => 'jurusan_phone', 'value' => '081234567890', 'type' => 'text'],
            ['key' => 'jurusan_email', 'value' => 'info@jurusan.com', 'type' => 'text'],
            ['key' => 'jurusan_address', 'value' => 'Jl. Pendidikan No. 1, Merauke', 'type' => 'textarea'],
            ['key' => 'jurusan_description', 'value' => 'Website Resmi Jurusan Sistem Informasi Universitas Musamus.', 'type' => 'textarea'],
            ['key' => 'facebook', 'value' => 'https://facebook.com', 'type' => 'text'],
            ['key' => 'instagram', 'value' => 'https://instagram.com', 'type' => 'text'],
            ['key' => 'youtube', 'value' => 'https://youtube.com', 'type' => 'text'],
        ]);
    }
}