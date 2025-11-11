<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RtSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Asumsi: Kita membuat 10 RT dan 5 RW (ID 1 sampai 5 sudah diisi di RwSeeder)
        $jumlah_rt = 10;
        $jumlah_rw = 5;

        foreach (range(1, $jumlah_rt) as $i) {

            // Logika untuk mendistribusikan 10 RT ke 5 RW (misalnya, setiap RW mendapat 2 RT)
            // RT 1, 6 -> RW 1
            // RT 2, 7 -> RW 2
            // ...
            $rw_id = ($i % $jumlah_rw) + 1;

            // Konversi angka ke format 001, 002, dst.
            $nomor = str_pad($i, 3, '0', STR_PAD_LEFT);

            DB::table('rts')->insert([
                // ID tidak perlu diisi jika menggunakan auto-increment, tetapi di sini kita atur agar konsisten
                'id' => $i,

                // rw_id: Harus ada di tabel 'rws'
                'rw_id' => $rw_id,

                // nomor_rt: Sesuai dengan nama kolom di migrasi
                'nomor_rt' => 'RT ' . $nomor,

                // ketua_rt_warga_id: Kita biarkan NULL dulu karena merujuk ke tabel 'wargas'
                'ketua_rt_warga_id' => null,

                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
