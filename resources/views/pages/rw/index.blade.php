@extends('layouts.admin.app')

@section('title', 'Data RW')

@section('content')
<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800">
        <i class="fas fa-map-signs"></i> Data RW
    </h1>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <div class="row">
                <div class="col-md-6">
                    <h6 class="m-0 font-weight-bold text-primary">Daftar RW</h6>
                </div>
                <div class="col-md-6 text-right">
                    <a href="{{ route('admin.rw.create') }}" class="btn btn-primary btn-sm">
                        <i class="fas fa-plus"></i> Tambah RW
                    </a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" width="100%" cellspacing="0">
                    <thead class="thead-light">
                        <tr>
                            <th>Nomor RW</th>
                            <th>Ketua RW</th>
                            <th>Jumlah RT</th>
                            <th>Jumlah Warga</th>
                            <th width="20%">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($rws as $rw)
                        <tr>
                            <td>
                                <strong class="text-primary">RW {{ $rw->nomor_rw }}</strong>
                            </td>
                            <td>
                                @if($rw->ketua)
                                    {{ $rw->ketua->nama }}
                                    <br>
                                    <small class="text-muted">NIK: {{ $rw->ketua->nik }}</small>
                                @else
                                    <span class="badge badge-warning">Belum Ada Ketua</span>
                                @endif
                            </td>
                            <td>
                                <span class="badge badge-info">{{ $rw->rts_count ?? 0 }} RT</span>
                            </td>
                            <td>
                                <span class="badge badge-success">{{ $rw->wargas_count ?? 0 }} Warga</span>
                            </td>
                            <td>
                                <div class="btn-group" role="group">
                                    <a href="{{ route('admin.rw.edit', $rw->id) }}" 
                                       class="btn btn-warning btn-sm" title="Edit">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form action="{{ route('admin.rw.set_ketua', $rw->id) }}" 
                                          method="POST" class="d-inline">
                                        @csrf
                                        <button type="submit" class="btn btn-info btn-sm" 
                                                onclick="return confirm('Tetapkan ketua RW?')"
                                                title="Set Ketua">
                                            <i class="fas fa-user-tie"></i>
                                        </button>
                                    </form>
                                    <form action="{{ route('admin.rw.destroy', $rw->id) }}" 
                                          method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm" 
                                                onclick="return confirm('Hapus RW ini?')"
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

            @if($rws->isEmpty())
            <div class="text-center py-4">
                <i class="fas fa-map-signs fa-3x text-muted mb-3"></i>
                <p class="text-muted">Belum ada data RW.</p>
                <a href="{{ route('admin.rw.create') }}" class="btn btn-primary">
                    <i class="fas fa-plus"></i> Tambah RW Pertama
                </a>
            </div>
            @endif
        </div>
    </div>
</div>
@endsection