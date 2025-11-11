<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class AnggotaLembagaSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();

        // Mengambil ID yang sudah ada dari tabel parent (AMAN)
        $lembagaIds = DB::table('lembaga_desas')->pluck('id')->toArray();
        $wargaIds = DB::table('wargas')->pluck('id')->toArray();
        $jabatanIds = DB::table('jabatan_lembagas')->pluck('id')->toArray();

        // Pengecekan Ketersediaan Data
        if (empty($lembagaIds) || empty($wargaIds) || empty($jabatanIds)) {
            echo "Peringatan: Tabel parent (lembaga_desas, wargas, atau jabatan_lembagas) kosong. Seeding AnggotaLembagaSeeder dibatalkan.\n";
            return;
        }

        $data = [];
        $uniqueCombinations = [];
        $targetCount = 50; // Target 50 entri anggota
        $maxIterations = 200;

        // Membuat entri unik hingga mencapai target count
        while (count($data) < $targetCount && $maxIterations > 0) {

            $lembaga_id = $faker->randomElement($lembagaIds);
            $warga_id = $faker->randomElement($wargaIds);

            $combination = $lembaga_id . '-' . $warga_id;

            // Memastikan unique(['lembaga_id', 'warga_id'])
            if (!in_array($combination, $uniqueCombinations)) {

                $tgl_mulai = $faker->dateTimeBetween('-5 years', '-1 years')->format('Y-m-d');
                $tgl_selesai = $faker->randomElement([null, $faker->dateTimeBetween($tgl_mulai, 'now')->format('Y-m-d')]);

                $data[] = [
                    'lembaga_id' => $lembaga_id,
                    'warga_id' => $warga_id,
                    'jabatan_id' => $faker->randomElement($jabatanIds),
                    'tgl_mulai' => $tgl_mulai,
                    'tgl_selesai' => $tgl_selesai,
                    'created_at' => now(),
                    'updated_at' => now(),
                ];
                $uniqueCombinations[] = $combination;
            }
            $maxIterations--;
        }

        DB::table('anggota_lembagas')->insert($data);
    }
}
