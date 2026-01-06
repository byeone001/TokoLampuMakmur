<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Admin
        User::create([
            'name' => 'Administrator',
            'username' => 'admin123',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('123'),
            'role' => 'admin',
            'gender' => 'Laki-laki',
        ]);

        // Kasir
        User::create([
            'name' => 'Kasir 1',
            'username' => 'kasir1',
            'email' => null,
            'password' => Hash::make('123'),
            'role' => 'kasir',
            'gender' => 'Perempuan',
        ]);
    }
}
