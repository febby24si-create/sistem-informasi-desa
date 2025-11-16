<!-- resources/views/lembaga/anggota_index.blade.php -->
@extends('layouts.admin.app')

@section('title', 'Anggota Lembaga')
@section('page_title', 'LEMBAGA SIPEDES')

@section('content')
<div class="container-fluid">

    <!-- Header -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3 text-gray-800">
            <i class="fas fa-users"></i> Anggota {{ $lembaga->nama_lembaga }}
        </h1>
        <div>
            <a href="{{ route('admin.lembaga.anggota.create', $lembaga->id) }}"
                class="btn btn-primary btn-sm shadow-sm">
                <i class="fas fa-plus"></i> Tambah Anggota
            </a>
            <a href="{{ route('admin.lembaga.index') }}" class="btn btn-secondary btn-sm shadow-sm">
                <i class="fas fa-arrow-left"></i> Kembali
            </a>
        </div>
    </div>

    <!-- Statistik -->
    <div class="row">
        <div class="col-md-4 mb-4">
            <div class="card shadow-sm border-left-primary">
                <div class="card-body d-flex justify-content-between align-items-center">
                    <div>
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                            Total Anggota
                        </div>
                        <h4 class="font-weight-bold text-gray-800">
                            {{ $anggotas->count() }}
                        </h4>
                    </div>
                    <i class="fas fa-users fa-2x text-gray-300"></i>
                </div>
            </div>
        </div>

        <div class="col-md-4 mb-4">
            <div class="card shadow-sm border-left-success">
                <div class="card-body d-flex justify-content-between align-items-center">
                    <div>
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                            Ketua
                        </div>
                        <h4 class="font-weight-bold text-gray-800">
                            {{ $anggotas->where('jabatan.level', 'Ketua')->count() }}
                        </h4>
                    </div>
                    <i class="fas fa-crown fa-2x text-gray-300"></i>
                </div>
            </div>
        </div>

        <div class="col-md-4 mb-4">
            <div class="card shadow-sm border-left-info">
                <div class="card-body d-flex justify-content-between align-items-center">
                    <div>
                        <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                            Anggota Aktif
                        </div>
                        <h4 class="font-weight-bold text-gray-800">
                            {{ $anggotas->where('tgl_selesai', null)->count() }}
                        </h4>
                    </div>
                    <i class="fas fa-check-circle fa-2x text-gray-300"></i>
                </div>
            </div>
        </div>
    </div>

    <!-- Tabel Anggota -->
    <div class="card shadow">
        <div class="card-header py-3 d-flex justify-content-between align-items-center">
            <h6 class="m-0 font-weight-bold text-primary">
                Daftar Anggota - {{ $lembaga->nama_lembaga }}
            </h6>
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover table-striped" width="100%">
                    <thead class="thead-dark">
                        <tr>
                            <th>Nama Anggota</th>
                            <th>Jabatan</th>
                            <th>Level</th>
                            <th>Periode</th>
                            <th>Status</th>
                            <th width="90px">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($anggotas as $anggota)
                        <tr>
                            <td>
                                <strong class="text-dark">{{ $anggota->warga->nama }}</strong><br>
                                <small class="text-muted">NIK: {{ $anggota->warga->nik }}</small>
                            </td>

                            <td class="text-primary">
                                {{ $anggota->jabatan->nama_jabatan }}
                            </td>

                            <td>
                                @switch($anggota->jabatan->level)
                                    @case('Ketua')
                                        <span class="badge badge-success shadow-sm">
                                            <i class="fas fa-crown"></i> Ketua
                                        </span>
                                        @break

                                    @case('Sekretaris')
                                        <span class="badge badge-info shadow-sm">
                                            <i class="fas fa-pen"></i> Sekretaris
                                        </span>
                                        @break

                                    @case('Bendahara')
                                        <span class="badge badge-warning shadow-sm text-dark">
                                            <i class="fas fa-money-bill"></i> Bendahara
                                        </span>
                                        @break

                                    @case('Anggota')
                                        <span class="badge badge-secondary shadow-sm">
                                            <i class="fas fa-user"></i> Anggota
                                        </span>
                                        @break

                                    @default
                                        <span class="badge badge-dark">
                                            <i class="fas fa-star"></i> {{ $anggota->jabatan->level }}
                                        </span>
                                @endswitch
                            </td>

                            <td>
                                <span class="badge badge-light p-2 border">
                                    {{ $anggota->tgl_mulai->format('d/m/Y') }}
                                </span>

                                @if($anggota->tgl_selesai)
                                    <br>
                                    <span class="badge badge-light mt-1 p-2 border">
                                        s/d {{ $anggota->tgl_selesai->format('d/m/Y') }}
                                    </span>
                                @endif
                            </td>

                            <td>
                                @if($anggota->tgl_selesai && $anggota->tgl_selesai < now())
                                    <span class="badge badge-danger shadow-sm">
                                        <i class="fas fa-times-circle"></i> Tidak Aktif
                                    </span>
                                @elseif($anggota->tgl_selesai && $anggota->tgl_selesai > now())
                                    <span class="badge badge-warning shadow-sm">
                                        <i class="fas fa-clock"></i> Akan Berakhir
                                    </span>
                                @else
                                    <span class="badge badge-success shadow-sm">
                                        <i class="fas fa-check-circle"></i> Aktif
                                    </span>
                                @endif
                            </td>

                            <td>
                                <div class="btn-group">
                                    <a href="{{ route('admin.lembaga.anggota.edit', [$lembaga->id, $anggota->id]) }}"
                                        class="btn btn-warning btn-sm shadow-sm" title="Edit">
                                        <i class="fas fa-edit"></i>
                                    </a>

                                    <form action="{{ route('admin.lembaga.anggota.destroy', [$lembaga->id, $anggota->id]) }}"
                                        method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')

                                        <button type="submit"
                                                onclick="return confirm('Hapus anggota ini?')"
                                                class="btn btn-danger btn-sm shadow-sm"
                                                title="Hapus">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            @if($anggotas->isEmpty())
                <div class="text-center py-5">
                    <i class="fas fa-users fa-3x text-muted mb-3"></i>
                    <p class="text-muted">Belum ada anggota untuk lembaga ini.</p>
                    <a href="{{ route('admin.lembaga.anggota.create', $lembaga->id) }}"
                        class="btn btn-primary btn-lg shadow-sm">
                        <i class="fas fa-plus"></i> Tambah Anggota Pertama
                    </a>
                </div>
            @endif
        </div>
    </div>
</div>
@endsection
