<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Rw;
use App\Models\Rt;

class RwRtSeeder extends Seeder
{
    public function run()
    {
        // Hapus data existing
        Rt::query()->delete();
        Rw::query()->delete();

        // Buat data RW
        $rws = [];
        for ($i = 1; $i <= 5; $i++) {
            $rws[$i] = Rw::create([
                'nomor_rw' => str_pad($i, 2, '0', STR_PAD_LEFT),
                'ketua_rw_warga_id' => null,
            ]);
        }

        // Buat data RT untuk setiap RW
        foreach ($rws as $rw) {
            for ($j = 1; $j <= 3; $j++) {
                Rt::create([
                    'rw_id' => $rw->id,
                    'nomor_rt' => str_pad($j, 3, '0', STR_PAD_LEFT),
                    'ketua_rt_warga_id' => null,
                ]);
            }
        }

        $this->command->info('Data RW dan RT berhasil dibuat!');
        $this->command->info('Total RW: ' . Rw::count());
        $this->command->info('Total RT: ' . Rt::count());
    }
}
