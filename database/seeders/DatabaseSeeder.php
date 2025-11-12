<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Jalankan semua seeder aplikasi.
     */
    public function run(): void
    {
        $this->call([
            RwSeeder::class,          // harus lebih dulu
            RtSeeder::class,          // baru ini
            WargaDummy::class,
            LembagaDesaSeeder::class,
            JabatanLembagaSeeder::class,
            AnggotaLembagaSeeder::class,
            CreateFirstUser::class,
        ]);
    }
}
