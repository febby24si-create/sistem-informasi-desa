<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class LembagaDesaSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create('id_ID');

        $lembagaData = [
            [
                'nama_lembaga' => 'Badan Permusyawaratan Desa (BPD)',
                'deskripsi' => 'Lembaga yang melaksanakan fungsi pemerintahan di bidang legislatif dan pengawasan dalam penyelenggaraan pemerintahan desa.',
                'kontak' => '081234567890',
                'logo' => null,
            ],
            [
                'nama_lembaga' => 'Pemberdayaan Kesejahteraan Keluarga (PKK)',
                'deskripsi' => 'Lembaga kemasyarakatan yang memberdayakan perempuan untuk turut berpartisipasi dalam pembangunan desa.',
                'kontak' => '081234567891',
                'logo' => null,
            ],
            [
                'nama_lembaga' => 'Karang Taruna',
                'deskripsi' => 'Organisasi kepemudaan di tingkat desa yang bergerak di bidang sosial, ekonomi, dan budaya.',
                'kontak' => '081234567892',
                'logo' => null,
            ],
            [
                'nama_lembaga' => 'Lembaga Pemberdayaan Masyarakat (LPM)',
                'deskripsi' => 'Lembaga yang menampung dan mewujudkan aspirasi masyarakat dalam perencanaan pembangunan desa.',
                'kontak' => '081234567893',
                'logo' => null,
            ],
            [
                'nama_lembaga' => 'Kelompok Tani',
                'deskripsi' => 'Kelompok masyarakat yang bergerak di bidang pertanian untuk meningkatkan produktivitas dan kesejahteraan petani.',
                'kontak' => '081234567894',
                'logo' => null,
            ],
        ];

        $data = [];
        foreach ($lembagaData as $lembaga) {
            $data[] = array_merge($lembaga, [
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        DB::table('lembaga_desas')->insert($data);
    }
}
