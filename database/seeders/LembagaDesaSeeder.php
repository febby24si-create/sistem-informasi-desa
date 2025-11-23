<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\LembagaDesa;
use Faker\Factory as Faker;

class LembagaDesaSeeder extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create('id_ID');

        $lembagaList = [
            'Lembaga Pemberdayaan Masyarakat',
            'Badan Permusyawaratan Desa',
            'Kelompok Tani',
            'Kelompok Nelayan',
            'Pemberdayaan Kesejahteraan Keluarga',
            'Karang Taruna',
            'Lembaga Adat',
            'Kelompok Pengajian',
            'Koperasi Desa',
            'Satuan Pamong Praja',
            'Kelompok Sadar Wisata',
            'Forum Komunikasi Pemuda',
            'Lembaga Keuangan Mikro',
            'Kelompok Perempuan',
            'Komite Sekolah',
            'Paguyuban Petani',
            'Kelompok Peternak',
            'Lembaga Konsultasi Kewirausahaan',
            'Forum RT/RW',
            'Komunitas Peduli Lingkungan'
        ];

        for ($i = 0; $i < 50; $i++) {
            LembagaDesa::create([
                'nama_lembaga' => $lembagaList[array_rand($lembagaList)] . ' ' . $faker->city(),
                'deskripsi' => $faker->paragraph(3),
                'kontak' => $faker->phoneNumber(),
                'logo' => $faker->optional(0.3)->imageUrl(100, 100, 'business', true)
            ]);
        }
    }
}
