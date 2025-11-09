<?php
// app/Http/Controllers/LembagaDesaController.php
namespace App\Http\Controllers;

use App\Models\LembagaDesa;
use Illuminate\Http\Request;
use App\Models\JabatanLembaga;

class LembagaDesaController extends Controller
{
    public function index()
    {
        $lembagas = LembagaDesa::withCount(['anggotas', 'jabatans'])->with('anggotas', 'jabatans')->get();
        return view('pages.lembaga.index', compact('lembagas'));
    }

    public function create()
    {
        return view('pages.lembaga.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_lembaga' => 'required|max:100',
            'deskripsi' => 'required',
            'kontak' => 'nullable|max:20',
        ]);

        LembagaDesa::create($request->all());

        // BUAT JABATAN OTOMATIS saat lembaga dibuat
        // $defaultJabatans = [
        //     ['nama_jabatan' => 'Ketua', 'level' => 'Ketua'],
        //     ['nama_jabatan' => 'Sekretaris', 'level' => 'Sekretaris'],
        //     ['nama_jabatan' => 'Bendahara', 'level' => 'Bendahara'],
        //     ['nama_jabatan' => 'Anggota', 'level' => 'Anggota'],
        // ];

        // foreach ($defaultJabatans as $jabatan) {
        //     JabatanLembaga::create([
        //         'lembaga_id' => $lembaga->id,
        //         'nama_jabatan' => $jabatan['nama_jabatan'],
        //         'level' => $jabatan['level'],
        //     ]);
        // }
        return redirect()->route('admin.lembaga.index')
            ->with('success', 'Lembaga desa berhasil ditambahkan.');
    }

    public function show(LembagaDesa $lembaga)
    {
        $lembaga->load(['jabatans', 'anggotas.warga', 'anggotas.jabatan']);
        return view('pages.lembaga.show', compact('lembaga'));
    }

    public function edit(LembagaDesa $lembaga)
    {
<<<<<<< HEAD
        return view('pages.lembaga.anggota_edit', compact('lembaga'));
=======
        return view('pages.lembaga.edit', compact('lembaga'));
>>>>>>> 8c3c1d42a26caacfcc4638c5d88e7c1d654465bc
    }

    public function update(Request $request, LembagaDesa $lembaga)
    {
        $request->validate([
            'nama_lembaga' => 'required|max:100',
            'deskripsi' => 'required',
            'kontak' => 'nullable|max:20',
        ]);

        $lembaga->update($request->all());

        return redirect()->route('admin.lembaga.index')
            ->with('success', 'Lembaga desa berhasil diperbarui.');
    }

    public function destroy(LembagaDesa $lembaga)
    {
        $lembaga->delete();

        return redirect()->route('admin.lembaga.index')
            ->with('success', 'Lembaga desa berhasil dihapus.');
    }
}
