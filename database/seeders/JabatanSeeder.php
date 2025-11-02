<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\LembagaDesa;
use App\Models\JabatanLembaga;

class JabatanSeeder extends Seeder
{
    public function run()
    {
        $lembagas = LembagaDesa::all();

        foreach ($lembagas as $lembaga) {
            // Cek apakah lembaga ini sudah punya jabatan
            $existingJabatan = JabatanLembaga::where('lembaga_id', $lembaga->id)->exists();

            if (!$existingJabatan) {
                $this->command->info("Membuat jabatan untuk: {$lembaga->nama_lembaga}");

                $defaultJabatans = $this->getDefaultJabatans($lembaga->nama_lembaga);

                foreach ($defaultJabatans as $jabatan) {
                    JabatanLembaga::create([
                        'lembaga_id' => $lembaga->id,
                        'nama_jabatan' => $jabatan['nama_jabatan'],
                        'level' => $jabatan['level'],
                    ]);
                }
            } else {
                $this->command->info("{$lembaga->nama_lembaga} sudah memiliki jabatan");
            }
        }

        $this->command->info('Seeder jabatan selesai!');
    }

    private function getDefaultJabatans($namaLembaga)
    {
        // Sesuaikan jabatan default berdasarkan jenis lembaga
        if (str_contains($namaLembaga, 'PKK')) {
            return [
                ['nama_jabatan' => 'Ketua PKK', 'level' => 'Ketua'],
                ['nama_jabatan' => 'Wakil Ketua PKK', 'level' => 'Ketua'],
                ['nama_jabatan' => 'Sekretaris PKK', 'level' => 'Sekretaris'],
                ['nama_jabatan' => 'Bendahara PKK', 'level' => 'Bendahara'],
                ['nama_jabatan' => 'Anggota PKK', 'level' => 'Anggota'],
            ];
        } elseif (str_contains($namaLembaga, 'BPD')) {
            return [
                ['nama_jabatan' => 'Ketua BPD', 'level' => 'Ketua'],
                ['nama_jabatan' => 'Wakil Ketua BPD', 'level' => 'Ketua'],
                ['nama_jabatan' => 'Sekretaris BPD', 'level' => 'Sekretaris'],
                ['nama_jabatan' => 'Bendahara BPD', 'level' => 'Bendahara'],
                ['nama_jabatan' => 'Anggota BPD', 'level' => 'Anggota'],
            ];
        } elseif (str_contains($namaLembaga, 'Karang Taruna')) {
            return [
                ['nama_jabatan' => 'Ketua Karang Taruna', 'level' => 'Ketua'],
                ['nama_jabatan' => 'Wakil Ketua', 'level' => 'Ketua'],
                ['nama_jabatan' => 'Sekretaris Umum', 'level' => 'Sekretaris'],
                ['nama_jabatan' => 'Bendahara Umum', 'level' => 'Bendahara'],
                ['nama_jabatan' => 'Anggota Aktif', 'level' => 'Anggota'],
            ];
        } else {
            // Default untuk lembaga lainnya
            return [
                ['nama_jabatan' => 'Ketua', 'level' => 'Ketua'],
                ['nama_jabatan' => 'Sekretaris', 'level' => 'Sekretaris'],
                ['nama_jabatan' => 'Bendahara', 'level' => 'Bendahara'],
                ['nama_jabatan' => 'Anggota', 'level' => 'Anggota'],
            ];
        }
    }
}
