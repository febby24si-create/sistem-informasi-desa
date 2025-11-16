<?php

namespace App\Http\Controllers;

use App\Models\Rt;
use App\Models\Rw;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RtController extends Controller
{
    public function index()
    {
        $rts = Rt::with(['rw', 'wargas'])
            ->withCount('wargas')
            ->orderBy('id_rw')
            ->orderBy('nomor_rt')
            ->get();

        return view('pages.wilayah.rt.index', compact('rts'));
    }

    public function create()
    {
        $rws = Rw::active()->orderBy('nomor_rw')->get();
        return view('pages.wilayah.rt.create', compact('rws'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_rw' => 'required|exists:rw,id_rw',
            'nomor_rt' => 'required|integer|min:1|max:999',
            'nama_ketua_rt' => 'required|string|max:100',
            'kontak_rt' => 'nullable|string|max:20',
            'alamat_rt' => 'nullable|string',
            'status' => 'required|in:Aktif,Nonaktif'
        ]);

        // Cek duplikasi nomor RT dalam RW yang sama
        $existingRt = Rt::where('id_rw', $request->id_rw)
            ->where('nomor_rt', $request->nomor_rt)
            ->first();

        if ($existingRt) {
            return redirect()->back()
                ->withInput()
                ->with('error', 'Nomor RT sudah ada di RW yang dipilih.');
        }

        try {
            DB::beginTransaction();

            Rt::create($request->all());

            DB::commit();

            return redirect()->route('admin.rt.index')
                ->with('success', 'Data RT berhasil ditambahkan.');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()
                ->withInput()
                ->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    public function show($id)
    {
        $rt = Rt::with(['rw', 'wargas'])
            ->withCount('wargas')
            ->findOrFail($id);

        return view('pages.wilayah.rt.show', compact('rt'));
    }

    public function edit($id)
    {
        $rt = Rt::findOrFail($id);
        $rws = Rw::active()->orderBy('nomor_rw')->get();

        return view('pages.wilayah.rt.edit', compact('rt', 'rws'));
    }

    public function update(Request $request, $id)
    {
        $rt = Rt::findOrFail($id);

        $request->validate([
            'id_rw' => 'required|exists:rw,id_rw',
            'nomor_rt' => 'required|integer|min:1|max:999',
            'nama_ketua_rt' => 'required|string|max:100',
            'kontak_rt' => 'nullable|string|max:20',
            'alamat_rt' => 'nullable|string',
            'status' => 'required|in:Aktif,Nonaktif'
        ]);

        // Cek duplikasi nomor RT dalam RW yang sama (kecuali data saat ini)
        $existingRt = Rt::where('id_rw', $request->id_rw)
            ->where('nomor_rt', $request->nomor_rt)
            ->where('id_rt', '!=', $id)
            ->first();

        if ($existingRt) {
            return redirect()->back()
                ->withInput()
                ->with('error', 'Nomor RT sudah ada di RW yang dipilih.');
        }

        try {
            DB::beginTransaction();

            $rt->update($request->all());

            DB::commit();

            return redirect()->route('admin.rt.index')
                ->with('success', 'Data RT berhasil diperbarui.');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()
                ->withInput()
                ->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    public function destroy($id)
    {
        $rt = Rt::findOrFail($id);

        // Cek apakah RT memiliki warga
        if ($rt->wargas()->count() > 0) {
            return redirect()->back()
                ->with('error', 'Tidak dapat menghapus RT yang masih memiliki warga.');
        }

        try {
            DB::beginTransaction();

            $rt->delete();

            DB::commit();

            return redirect()->route('admin.rt.index')
                ->with('success', 'Data RT berhasil dihapus.');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()
                ->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    // Get RT by RW (untuk AJAX)
    public function getByRw($rwId)
    {
        $rts = Rt::where('id_rw', $rwId)
            ->active()
            ->orderBy('nomor_rt')
            ->get();

        return response()->json($rts);
    }
}
