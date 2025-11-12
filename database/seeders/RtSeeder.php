<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RtSeeder extends Seeder
{
    public function run(): void
    {
        $jumlah_rt = 10;
        $jumlah_rw = 5;

        foreach (range(1, $jumlah_rt) as $i) {
            $rw_id = ($i % $jumlah_rw) + 1;
            $nomor = str_pad($i, 3, '0', STR_PAD_LEFT);

            DB::table('rts')->updateOrInsert(
                ['nomor_rt' => 'RT ' . $nomor],
                [
                    'rw_id' => $rw_id,
                    'ketua_rt_warga_id' => null,
                    'updated_at' => now(),
                    'created_at' => now(),
                ]
            );
        }
    }
}
