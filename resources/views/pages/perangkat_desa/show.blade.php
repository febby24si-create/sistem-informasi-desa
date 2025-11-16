@extends('layouts.admin.app')

@section('title', 'Detail Perangkat Desa')

@section('content')
<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800">
        <i class="fas fa-user-tie"></i> Detail Perangkat Desa
    </h1>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Lengkap Perangkat Desa</h6>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-4 text-center">
                    @if($perangkatDesa->foto)
                        <img src="{{ Storage::url($perangkatDesa->foto) }}" alt="Foto" class="img-fluid rounded mb-3" style="max-height: 300px;">
                    @else
                        <img src="{{ asset('assets/img/default-user.png') }}" alt="Default" class="img-fluid rounded mb-3" style="max-height: 300px;">
                    @endif
                </div>
                <div class="col-md-8">
                    <table class="table table-bordered">
                        <tr>
                            <th width="30%">Nama</th>
                            <td>{{ $perangkatDesa->warga->nama }}</td>
                        </tr>
                        <tr>
                            <th>NIK</th>
                            <td>{{ $perangkatDesa->warga->nik }}</td>
                        </tr>
                        <tr>
                            <th>Jabatan</th>
                            <td>{{ $perangkatDesa->jabatan }}</td>
                        </tr>
                        <tr>
                            <th>NIP</th>
                            <td>{{ $perangkatDesa->nip ?? '-' }}</td>
                        </tr>
                        <tr>
                            <th>Kontak</th>
                            <td>{{ $perangkatDesa->kontak ?? '-' }}</td>
                        </tr>
                        <tr>
                            <th>Periode</th>
                            <td>
                                {{ $perangkatDesa->periode_mulai->format('d/m/Y') }}
                                @if($perangkatDesa->periode_selesai)
                                    - {{ $perangkatDesa->periode_selesai->format('d/m/Y') }}
                                @else
                                    - Sekarang
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>Status</th>
                            <td>
                                @if($perangkatDesa->periode_selesai && $perangkatDesa->periode_selesai < now())
                                    <span class="badge badge-danger">Tidak Aktif</span>
                                @else
                                    <span class="badge badge-success">Aktif</span>
                                @endif
                            </td>
                        </tr>
                    </table>
                </div>
            </div>

            <div class="row mt-4">
                <div class="col-12">
                    <h5 class="font-weight-bold">Informasi Warga</h5>
                    <div class="row">
                        <div class="col-md-6">
                            <table class="table table-bordered">
                                <tr>
                                    <th width="40%">Tanggal Lahir</th>
                                    <td>{{ $perangkatDesa->warga->tgl_lahir->format('d/m/Y') }} ({{ $perangkatDesa->warga->tgl_lahir->age }} tahun)</td>
                                </tr>
                                <tr>
                                    <th>Jenis Kelamin</th>
                                    <td>
                                        @if($perangkatDesa->warga->jenis_kelamin == 'Laki-laki')
                                            <span class="badge badge-primary">Laki-laki</span>
                                        @else
                                            <span class="badge badge-pink">Perempuan</span>
                                        @endif
                                    </td>
                                </tr>
                            </table>
                        </div>
                        <div class="col-md-6">
                            <table class="table table-bordered">
                                <tr>
                                    <th width="40%">Alamat</th>
                                    <td>{{ $perangkatDesa->warga->alamat }}</td>
                                </tr>
                                <tr>
                                    <th>RT/RW</th>
                                    <td>
                                        @if($perangkatDesa->warga->rt && $perangkatDesa->warga->rw)
                                            RT {{ $perangkatDesa->warga->rt->nomor_rt }} / RW {{ $perangkatDesa->warga->rw->nomor_rw }}
                                        @else
                                            <span class="badge badge-warning">Belum Ditentukan</span>
                                        @endif
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row mt-4">
                <div class="col-12 text-right">
                    <a href="{{ route('admin.perangkat_desa.edit', $perangkatDesa->id) }}" class="btn btn-warning">
                        <i class="fas fa-edit"></i> Edit
                    </a>
                    <a href="{{ route('admin.perangkat_desa.index') }}" class="btn btn-secondary">
                        <i class="fas fa-arrow-left"></i> Kembali
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection