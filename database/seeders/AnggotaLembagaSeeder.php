<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class AnggotaLembagaSeeder extends Seeder
{
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('anggota_lembagas')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        $faker = Faker::create();

        // Ambil ID parent
        $lembagaIds = DB::table('lembaga_desas')->pluck('id')->toArray();
        $wargaIds = DB::table('wargas')->pluck('id')->toArray();
        $jabatanIds = DB::table('jabatan_lembagas')->pluck('id')->toArray();

        // Cek parent tidak kosong
        if (empty($lembagaIds) || empty($wargaIds) || empty($jabatanIds)) {
            echo "Parent table kosong. Seeder dibatalkan.\n";
            return;
        }

        $data = [];
        $uniqueCombinations = [];
        $targetCount = 50;
        $maxIterations = 300;

        while (count($data) < $targetCount && $maxIterations > 0) {

            $lembaga_id = $faker->randomElement($lembagaIds);
            $warga_id = $faker->randomElement($wargaIds);

            $key = $lembaga_id . '-' . $warga_id;

            // Pastikan kombinasi unik
            if (!in_array($key, $uniqueCombinations)) {

                // Tanggal mulai 1-5 tahun lalu
                $startDate = $faker->dateTimeBetween('-5 years', '-1 years');

                // tgl_selesai (boleh null)
                $endDate = $faker->boolean(40)
                    ? null
                    : $faker->dateTimeBetween($startDate, 'now');

                $data[] = [
                    'lembaga_id' => $lembaga_id,
                    'warga_id' => $warga_id,
                    'jabatan_id' => $faker->randomElement($jabatanIds),
                    'tgl_mulai' => $startDate->format('Y-m-d'),
                    'tgl_selesai' => $endDate ? $endDate->format('Y-m-d') : null,
                    'created_at' => now(),
                    'updated_at' => now(),
                ];

                $uniqueCombinations[] = $key;
            }

            $maxIterations--;
        }

        DB::table('anggota_lembagas')->insert($data);
    }
}
