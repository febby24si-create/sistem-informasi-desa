<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RwSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // Menggunakan DB::table('rws')->insert

        // Looping untuk membuat 5 RW (misalnya)
        foreach (range(1, 5) as $i) {
            // Konversi angka ke format 001, 002, dst.
            $nomor = str_pad($i, 3, '0', STR_PAD_LEFT);

            DB::table('rws')->insert([
                'id' => $i,

                // KOLOM KOREKSI: Mengubah 'nama_rw' menjadi 'nomor_rw'
                'nomor_rw' => 'RW ' . $nomor,

                // Kolom ketua_rw_warga_id kita biarkan NULL dulu karena merujuk ke tabel 'wargas'
                'ketua_rw_warga_id' => null,

                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
