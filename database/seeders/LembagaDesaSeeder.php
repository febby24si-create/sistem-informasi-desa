<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
// Faker tetap di-import untuk kolom kontak
use Faker\Factory as Faker;

class LembagaDesaSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create('id_ID');

        // Daftar Lembaga dengan deskripsi resmi dalam Bahasa Indonesia
        $lembagaData = [
            [
                'nama' => 'BPD (Badan Permusyawaratan Desa)',
                'deskripsi' => 'Lembaga yang menjalankan fungsi pengawasan pemerintahan desa, menampung, dan menyalurkan aspirasi masyarakat desa. BPD memiliki peran legislatif di tingkat desa.',
            ],
            [
                'nama' => 'LPM (Lembaga Pemberdayaan Masyarakat)',
                'deskripsi' => 'Mitra Pemerintah Desa dalam memberdayakan masyarakat, berpartisipasi dalam perencanaan, pelaksanaan, dan pengembangan hasil pembangunan secara partisipatif.',
            ],
            [
                'nama' => 'PKK (Pemberdayaan Kesejahteraan Keluarga)',
                'deskripsi' => 'Gerakan nasional yang bertujuan meningkatkan kesejahteraan keluarga melalui 10 program pokok PKK yang meliputi sandang, pangan, kesehatan, dan pendidikan.',
            ],
            [
                'nama' => 'Karang Taruna',
                'deskripsi' => 'Organisasi kepemudaan sebagai wadah pengembangan potensi generasi muda, bergerak di bidang sosial, kebudayaan, dan pembangunan di tingkat desa.',
            ],
            [
                'nama' => 'BUMDes (Badan Usaha Milik Desa)',
                'deskripsi' => 'Lembaga usaha desa yang dikelola oleh Pemerintah Desa dan masyarakat untuk mengelola aset dan potensi desa guna memperkuat perekonomian desa.',
            ],
            [
                'nama' => 'Posyandu (Pos Pelayanan Terpadu)',
                'deskripsi' => 'Wadah pemberdayaan masyarakat yang memberikan pelayanan kesehatan dasar, gizi, dan KIA (Kesehatan Ibu dan Anak) di tingkat komunitas.',
            ],
        ];

        foreach ($lembagaData as $data) {

            DB::table('lembaga_desas')->insert([
                'nama_lembaga' => $data['nama'],
                'deskripsi' => $data['deskripsi'],

                // Kontak tetap menggunakan Faker
                'kontak' => $faker->randomElement([$faker->phoneNumber, null]),

                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
