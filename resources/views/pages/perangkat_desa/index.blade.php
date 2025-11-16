@extends('layouts.admin.app')

@section('title', 'Perangkat Desa')

@section('content')
<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800">
        <i class="fas fa-user-tie"></i> Perangkat Desa
    </h1>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <div class="row">
                <div class="col-md-6">
                    <h6 class="m-0 font-weight-bold text-primary">Daftar Perangkat Desa</h6>
                </div>
                <div class="col-md-6 text-right">
                    <a href="{{ route('admin.perangkat_desa.create') }}" class="btn btn-primary btn-sm">
                        <i class="fas fa-plus"></i> Tambah Perangkat
                    </a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" width="100%" cellspacing="0">
                    <thead class="thead-light">
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
                        @foreach($perangkats as $perangkat)
                        <tr>
                            <td>
                                @if($perangkat->foto)
                                    <img src="{{ Storage::url($perangkat->foto) }}" alt="Foto" width="50" class="img-thumbnail">
                                @else
                                    <img src="{{ asset('assets/img/default-user.png') }}" alt="Default" width="50" class="img-thumbnail">
                                @endif
                            </td>
                            <td>
                                <strong>{{ $perangkat->warga->nama }}</strong><br>
                                <small class="text-muted">NIK: {{ $perangkat->warga->nik }}</small>
                            </td>
                            <td>{{ $perangkat->jabatan }}</td>
                            <td>{{ $perangkat->nip ?? '-' }}</td>
                            <td>{{ $perangkat->kontak ?? '-' }}</td>
                            <td>
                                {{ $perangkat->periode_mulai->format('d/m/Y') }}
                                @if($perangkat->periode_selesai)
                                    - {{ $perangkat->periode_selesai->format('d/m/Y') }}
                                @else
                                    - Sekarang
                                @endif
                            </td>
                            <td>
                                @if($perangkat->periode_selesai && $perangkat->periode_selesai < now())
                                    <span class="badge badge-danger">Tidak Aktif</span>
                                @else
                                    <span class="badge badge-success">Aktif</span>
                                @endif
                            </td>
                            <td>
                                <div class="btn-group" role="group">
                                    <a href="{{ route('admin.perangkat_desa.show', $perangkat->id) }}" 
                                       class="btn btn-info btn-sm" title="Detail">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <a href="{{ route('admin.perangkat_desa.edit', $perangkat->id) }}" 
                                       class="btn btn-warning btn-sm" title="Edit">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form action="{{ route('admin.perangkat_desa.destroy', $perangkat->id) }}" 
                                          method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm" 
                                                onclick="return confirm('Hapus perangkat desa ini?')"
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

            @if($perangkats->isEmpty())
            <div class="text-center py-4">
                <i class="fas fa-user-tie fa-3x text-muted mb-3"></i>
                <p class="text-muted">Belum ada perangkat desa yang terdaftar.</p>
                <a href="{{ route('admin.perangkat_desa.create') }}" class="btn btn-primary">
                    <i class="fas fa-plus"></i> Tambah Perangkat Pertama
                </a>
            </div>
            @endif
        </div>
    </div>
</div>
@endsection