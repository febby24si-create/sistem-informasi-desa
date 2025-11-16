<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class JabatanLembagaSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();

        // Mengambil ID lembaga yang sudah dibuat
        $lembagaIds = DB::table('lembaga_desas')->pluck('id')->toArray();

        if (empty($lembagaIds)) {
            echo "Peringatan: Tabel lembaga_desas kosong. Seeding JabatanLembagaSeeder dibatalkan.\n";
            return;
        }

        $data = [];

        foreach ($lembagaIds as $lembagaId) {
            // Jabatan default untuk setiap lembaga
            $defaultJabatans = [
                ['nama_jabatan' => 'Ketua', 'level' => 'Ketua'],
                ['nama_jabatan' => 'Wakil Ketua', 'level' => 'Ketua'],
                ['nama_jabatan' => 'Sekretaris', 'level' => 'Sekretaris'],
                ['nama_jabatan' => 'Bendahara', 'level' => 'Bendahara'],
                ['nama_jabatan' => 'Anggota', 'level' => 'Anggota'],
                ['nama_jabatan' => 'Koordinator', 'level' => 'Lainnya'],
            ];

            foreach ($defaultJabatans as $jabatan) {
                $data[] = [
                    'lembaga_id' => $lembagaId,
                    'nama_jabatan' => $jabatan['nama_jabatan'],
                    'level' => $jabatan['level'],
                    'created_at' => now(),
                    'updated_at' => now(),
                ];
            }
        }

        DB::table('jabatan_lembagas')->insert($data);
    }
}
