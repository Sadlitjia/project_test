<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Pengguna;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Membuat user dengan role admin
        $adminUser = User::create([
            'name' => 'admin',
            'email' => 'admn@example.com',
            'password' => Hash::make('password'),
        ]);

        // Membuat pengguna dengan role admin terkait user di atas
        Pengguna::create([
            'role' => 'admin',
            'nama' => 'Admin',
            'opd_id' => 1, // Anda dapat menyesuaikan dengan opd_id jika ada
            'user_id' => $adminUser->id,
        ]);

        $this->command->info('Admin user created!');
    }
}
