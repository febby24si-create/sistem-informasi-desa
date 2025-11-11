<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class WargaDummy extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // Pastikan Anda mengimpor Faker: use Faker\Factory as Faker;
        // Pastikan Anda mengimpor DB: use Illuminate\Support\Facades\DB;

        $faker = \Faker\Factory::create('id_ID');

        // Asumsi: RT ID 1-10, RW ID 1-5 (Sesuaikan jika berbeda)
        $rt_ids = range(1, 10);
        $rw_ids = range(1, 5);

        foreach (range(1, 100) as $index) {

            $gender = $faker->randomElement(['Laki-laki', 'Perempuan']);
            $firstName = ($gender == 'Laki-laki') ? $faker->firstNameMale : $faker->firstNameFemale;

            // PERBAIKAN: Mengubah nama tabel dari 'penduduk' menjadi 'wargas'
            DB::table('wargas')->insert([

                'nik' => '32' . $faker->unique()->numberBetween(10000000000000, 99999999999999),
                'nama' => $firstName . ' ' . $faker->lastName,
                'tgl_lahir' => $faker->date('Y-m-d', '2005-12-31'),
                'jenis_kelamin' => $gender,
                'alamat' => $faker->address,

                // Kolom rw_id dan rt_id di migration Anda nullable, jadi ini aman
                'rw_id' => $faker->randomElement($rw_ids),
                'rt_id' => $faker->randomElement($rt_ids),

                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
