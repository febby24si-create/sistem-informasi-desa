@extends('layouts.admin.app')

@section('title', 'Perangkat Desa')

@section('content')
<style>
/* === GLASSMORPHISM STYLE (TEXT BLACK VERSION) === */
.glass-card {
    background: rgba(255, 255, 255, 0.4);
    border-radius: 18px;
    border: 1px solid rgba(0, 0, 0, 0.15);
    backdrop-filter: blur(18px);
    -webkit-backdrop-filter: blur(18px);
    box-shadow: 0 8px 32px rgba(0, 0, 0, 0.25);
}

.glass-header {
    background: rgba(255, 255, 255, 0.45) !important;
    color: #000 !important;
    backdrop-filter: blur(12px);
    border-bottom: 1px solid rgba(0, 0, 0, 0.15);
    border-radius: 18px 18px 0 0 !important;
}

.glass-table thead {
    background: rgba(255, 255, 255, 0.45);
    color: #000;
    backdrop-filter: blur(8px);
}

.glass-table tbody tr {
    color: #000 !important;
}

.glass-table tbody tr:hover {
    background: rgba(0, 0, 0, 0.08);
}

.btn-glass {
    background: rgba(255, 255, 255, 0.6);
    color: #000;
    backdrop-filter: blur(12px);
    border: 1px solid rgba(0, 0, 0, 0.25);
    transition: 0.2s;
}

.btn-glass:hover {
    background: rgba(0, 0, 0, 0.15);
    color: #000;
}

.badge-glass {
    background: rgba(0, 0, 0, 0.25);
    color: #fff;
    backdrop-filter: blur(6px);
    padding: 6px 14px;
    border-radius: 12px;
}

h1, h6, th, td {
    color: #000 !important;
}

body {
    background: linear-gradient(135deg, #f1f1f1, #ffffff);
}

</style>

<div class="container-fluid">

    <!-- Page Header -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3 text-white">
            <i class="fas fa-user-tie"></i> Perangkat Desa
        </h1>

        <a href="{{ route('admin.perangkat_desa.create') }}" class="btn btn-primary btn-glass shadow-sm">
            <i class="fas fa-plus"></i> Tambah Perangkat
        </a>
    </div>

    <!-- Glass Card -->
    <div class="card glass-card shadow-lg border-0">

        <div class="card-header glass-header">
            <h6 class="m-0 font-weight-bold">Daftar Perangkat Desa</h6>
        </div>

        <div class="card-body">

            <div class="table-responsive">
                <table class="table table-hover table-striped text-center glass-table align-middle">
                    <thead>
                        <tr>
                            <th>Foto</th>
                            <th>Nama</th>
                            <th>Jabatan</th>
                            <th>NIP</th>
                            <th>Kontak</th>
                            <th>Periode</th>
                            <th>Status</th>
                            <th width="15%">Aksi</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse($perangkats as $perangkat)
                        <tr>
                            <td>
                                <img 
                                    src="{{ $perangkat->foto ? Storage::url($perangkat->foto) : asset('assets/img/default-user.png') }}" 
                                    width="55" 
                                    class="rounded-square shadow-sm border border-white"
                                >
                            </td>

                            <td class="text-left">
                                <strong>{{ $perangkat->warga->nama }}</strong><br>
                                <small class="text-light opacity-75">NIK: {{ $perangkat->warga->nik }}</small>
                            </td>

                            <td>{{ $perangkat->jabatan }}</td>
                            <td>{{ $perangkat->nip ?? '-' }}</td>
                            <td>{{ $perangkat->kontak ?? '-' }}</td>

                            <td>
                                {{ $perangkat->periode_mulai->format('d/m/Y') }}
                                @if($perangkat->periode_selesai)
                                    - {{ $perangkat->periode_selesai->format('d/m/Y') }}
                                @else
                                    - <span class="text-success">Sekarang</span>
                                @endif
                            </td>

                            <td>
                                @if($perangkat->periode_selesai && $perangkat->periode_selesai < now())
                                    <span class="badge-glass bg-danger">Tidak Aktif</span>
                                @else
                                    <span class="badge-glass bg-success">Aktif</span>
                                @endif
                            </td>

                            <td>
                                <div class="btn-group">
                                    <a href="{{ route('admin.perangkat_desa.show', $perangkat->id) }}" 
                                       class="btn btn-info btn-sm btn-glass" title="Detail">
                                        <i class="fas fa-eye"></i>
                                    </a>

                                    <a href="{{ route('admin.perangkat_desa.edit', $perangkat->id) }}" 
                                       class="btn btn-warning btn-sm btn-glass" title="Edit">
                                        <i class="fas fa-edit"></i>
                                    </a>

                                    <form action="{{ route('admin.perangkat_desa.destroy', $perangkat->id) }}" 
                                          method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" 
                                                onclick="return confirm('Hapus perangkat desa ini?')"
                                                class="btn btn-danger btn-sm btn-glass" title="Hapus">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>

                        @empty
                        <tr>
                            <td colspan="8" class="py-5 text-white">
                                <i class="fas fa-user-tie fa-3x mb-3 opacity-75"></i>
                                <p class="opacity-75">Belum ada perangkat desa yang terdaftar.</p>
                                <a href="{{ route('admin.perangkat_desa.create') }}" class="btn btn-primary btn-lg btn-glass">
                                    <i class="fas fa-plus"></i> Tambah Perangkat Pertama
                                </a>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>

                </table>
            </div>

        </div>
    </div>
</div>
@endsection
