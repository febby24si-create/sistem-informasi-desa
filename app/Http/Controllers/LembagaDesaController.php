<?php
// app/Http/Controllers/LembagaDesaController.php
namespace App\Http\Controllers;

use App\Models\LembagaDesa;
use Illuminate\Http\Request;
use App\Models\JabatanLembaga;
use Illuminate\Support\Facades\Storage;

class LembagaDesaController extends Controller
{
    public function index()
    {
        $lembagas = LembagaDesa::withCount(['anggotas', 'jabatans'])->with('anggotas', 'jabatans')->paginate(8);
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
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $data = $request->all();

        if ($request->hasFile('logo')) {
            $data['logo'] = $request->file('logo')->store('lembaga_desa', 'public');
        }

        LembagaDesa::create($data);

        return redirect()->route('admin.lembaga.index')
            ->with('success', 'Lembaga desa berhasil ditambahkan.');
    }

    public function show(LembagaDesa $lembaga)
    {
        $lembaga->load(['jabatans', 'anggotas.warga', 'anggotas.jabatan']);
        return view('pages.lembaga.show', compact('lembaga'));
    }

    // Tambahkan method edit yang ini di LembagaDesaController
    public function edit(LembagaDesa $lembaga)
    {
        $lembaga->loadCount(['anggotas', 'jabatans']);
        return view('pages.lembaga.edit', compact('lembaga'));
    }

    public function update(Request $request, LembagaDesa $lembaga)
    {
        $request->validate([
            'nama_lembaga' => 'required|max:100',
            'deskripsi' => 'required',
            'kontak' => 'nullable|max:20',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $data = $request->except('remove_logo');

        // Handle logo removal
        if ($request->has('remove_logo') && $lembaga->logo) {
            Storage::disk('public')->delete($lembaga->logo);
            $data['logo'] = null;
        }
        // Handle new logo upload
        if ($request->hasFile('logo')) {
            if ($lembaga->logo) {
                Storage::disk('public')->delete($lembaga->logo);
            }
            $data['logo'] = $request->file('logo')->store('lembaga_desa', 'public');
        }

        $lembaga->update($data);

        return redirect()->route('admin.lembaga.index')
            ->with('success', 'Lembaga desa berhasil diperbarui.');
    }
    public function destroy(LembagaDesa $lembaga)
    {
        if ($lembaga->logo) {
            Storage::disk('public')->delete($lembaga->logo);
        }

        $lembaga->delete();

        return redirect()->route('admin.lembaga.index')
            ->with('success', 'Lembaga desa berhasil dihapus.');
    }
}
