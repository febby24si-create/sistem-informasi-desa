<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class JabatanLembagaSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create('id_ID');

        // Mengambil ID Lembaga yang sudah ada (lebih aman)
        $lembagaIds = DB::table('lembaga_desas')->pluck('id')->toArray();

        if (empty($lembagaIds)) {
            echo "Peringatan: Tabel 'lembaga_desas' kosong. Seeding JabatanLembagaSeeder dibatalkan.\n";
            return;
        }

        $data = [];
        $enumLevels = ['Ketua', 'Sekretaris', 'Bendahara', 'Anggota', 'Lainnya'];

        // Daftar Jabatan umum yang akan dikombinasikan dengan ID Lembaga
        $jabatanTemplates = [
            // Jabatan Level Tinggi
            ['nama' => 'Ketua Umum', 'level' => 'Ketua'],
            ['nama' => 'Sekretaris Jenderal', 'level' => 'Sekretaris'],
            ['nama' => 'Bendahara Umum', 'level' => 'Bendahara'],
            
            // Jabatan Anggota/Koordinator
            ['nama' => 'Koordinator Bidang Pendidikan', 'level' => 'Anggota'],
            ['nama' => 'Kepala Divisi Keuangan', 'level' => 'Bendahara'],
            ['nama' => 'Wakil Ketua I', 'level' => 'Ketua'],
            ['nama' => 'Humas & Publikasi', 'level' => 'Lainnya'],
        ];

        // Buat kombinasi unik untuk mengisi jabatan di setiap Lembaga
        foreach ($lembagaIds as $lembaga_id) {
            
            // Ambil 4-7 jabatan acak untuk setiap lembaga
            $selectedTemplates = $faker->randomElements($jabatanTemplates, $faker->numberBetween(4, 7), true);

            foreach ($selectedTemplates as $template) {
                
                $data[] = [
                    'lembaga_id' => $lembaga_id,
                    'nama_jabatan' => $template['nama'],
                    'level' => $template['level'],
                    'created_at' => now(),
                    'updated_at' => now(),
                ];
            }
        }
        
        DB::table('jabatan_lembagas')->insert($data);
    }
}