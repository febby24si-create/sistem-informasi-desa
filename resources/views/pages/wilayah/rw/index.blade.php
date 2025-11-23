@extends('layouts.admin.app')

@section('title', 'Data RW')

@section('content')
<div class="container-fluid dashboard-body">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 dashboard-header">
            <i class="fas fa-map-signs"></i> Data RW
        </h1>
        <a href="{{ route('admin.rw.create') }}" class="btn btn-primary dashboard-btn">
            <i class="fas fa-plus"></i> Tambah RW
        </a>
    </div>

    <!-- DataTales Example -->
    <div class="card shadow mb-4 dashboard-card">
        <div class="card-header py-3 dashboard-card-header">
            <h6 class="m-0 font-weight-bold">
                <i class="fas fa-list"></i> Daftar RW
            </h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nomor RW</th>
                            <th>Ketua RW</th>
                            <th>Kontak</th>
                            <th>Jumlah RT</th>
                            <th>Jumlah Warga</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($rws as $rw)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>
                                <strong class="text-primary">RW {{ $rw->nomor_rw }}</strong>
                            </td>
                            <td>
                                {{ $rw->nama_ketua_rw }} <!-- GUNAKAN FIELD LANGSUNG -->
                                @if(!$rw->nama_ketua_rw)
                                    <span class="badge badge-warning">Belum Ada Ketua</span>
                                @endif
                            </td>
                            <td>{{ $rw->kontak_rw ?? '-' }}</td>
                            <td>
                                <span class="badge badge-info">{{ $rw->rts_count }} RT</span>
                            </td>
                            <td>
                                <span class="badge badge-success">{{ $rw->wargas_count }} Warga</span>
                            </td>
                            <td>
                                <span class="badge badge-{{ $rw->status == 'Aktif' ? 'success' : 'danger' }}">
                                    {{ $rw->status }}
                                </span>
                            </td>
                            <td>
                                <div class="btn-group" role="group">
                                    <a href="{{ route('admin.rw.show', $rw->id) }}" 
                                       class="btn btn-info btn-sm" title="Detail">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <a href="{{ route('admin.rw.edit', $rw->id) }}" 
                                       class="btn btn-warning btn-sm" title="Edit">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    {{-- HAPUS FORM SET_KETUA KARENA TIDAK ADA ROUTENYA --}}
                                    <form action="{{ route('admin.rw.destroy', $rw->id) }}" 
                                          method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm" 
                                                onclick="return confirm('Hapus data RW?')"
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