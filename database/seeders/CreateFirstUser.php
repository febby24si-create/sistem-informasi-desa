<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CreateFirstUser extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Fahrezzy',
            'email' => 'Reezyfbi@gmail.com',
            'password' => 'password123', // tidak perlu Hash::make       // tambahkan kalau kolom role ada
        ]);
        User::create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => 'admin123', // tidak perlu Hash::make       // tambahkan kalau kolom role ada
        ]);
    }
}
