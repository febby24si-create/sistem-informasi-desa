<?php

namespace App\Http\Controllers;

use App\Models\PerangkatDesa;
use App\Models\Warga;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PerangkatDesaController extends Controller
{
    public function index()
    {
        $perangkats = PerangkatDesa::with('warga')->get();
        return view('pages.perangkat_desa.index', compact('perangkats'));
    }

    public function create()
    {
        $wargas = Warga::all();
        return view('pages.perangkat_desa.create', compact('wargas'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'warga_id' => 'required|exists:wargas,id',
            'jabatan' => 'required|string|max:100',
            'nip' => 'nullable|string|max:20',
            'kontak' => 'nullable|string|max:20',
            'periode_mulai' => 'required|date',
            'periode_selesai' => 'nullable|date|after:periode_mulai',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $data = $request->all();

        if ($request->hasFile('foto')) {
            $data['foto'] = $request->file('foto')->store('perangkat_desa', 'public');
        }

        PerangkatDesa::create($data);

        return redirect()->route('admin.perangkat_desa.index')
            ->with('success', 'Perangkat desa berhasil ditambahkan.');
    }

    public function show(PerangkatDesa $perangkatDesa)
    {
        return view('pages.perangkat_desa.show', compact('perangkatDesa'));
    }

    public function edit(PerangkatDesa $perangkatDesa)
    {
        $wargas = Warga::all();
        return view('pages.perangkat_desa.edit', compact('perangkatDesa', 'wargas'));
    }

    public function update(Request $request, PerangkatDesa $perangkatDesa)
    {
        $request->validate([
            'warga_id' => 'required|exists:wargas,id',
            'jabatan' => 'required|string|max:100',
            'nip' => 'nullable|string|max:20',
            'kontak' => 'nullable|string|max:20',
            'periode_mulai' => 'required|date',
            'periode_selesai' => 'nullable|date|after:periode_mulai',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $data = $request->all();

        if ($request->hasFile('foto')) {
            if ($perangkatDesa->foto) {
                Storage::disk('public')->delete($perangkatDesa->foto);
            }
            $data['foto'] = $request->file('foto')->store('perangkat_desa', 'public');
        }

        $perangkatDesa->update($data);

        return redirect()->route('admin.perangkat_desa.index')
            ->with('success', 'Perangkat desa berhasil diperbarui.');
    }

    public function destroy(PerangkatDesa $perangkatDesa)
    {
        if ($perangkatDesa->foto) {
            Storage::disk('public')->delete($perangkatDesa->foto);
        }

        $perangkatDesa->delete();

        return redirect()->route('admin.perangkat_desa.index')
            ->with('success', 'Perangkat desa berhasil dihapus.');
    }
}