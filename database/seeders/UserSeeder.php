<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run()
    {
        $users = [
            [
                'name' => 'Admin',
                'email' => 'admin@gmail.com',
                'password' => Hash::make('password123'),
                'role' => 'admin',
            ],
            [
                'name' => 'Rezy',
                'email' => 'rezy@gmail.com',
                'password' => Hash::make('password123'),
                'role' => 'admin',
            ],
            [
                'name' => 'Stefanny',
                'email' => 'fanny@gmail.com',
                'password' => Hash::make('password123'),
                'role' => 'admin',
            ]
        ];

        foreach ($users as $user) {
            User::updateOrCreate(
                ['email' => $user['email']],   // cek duplikat berdasarkan email
                $user                           // jika sudah ada → update, jika belum → create
            );
        }
    }
}
