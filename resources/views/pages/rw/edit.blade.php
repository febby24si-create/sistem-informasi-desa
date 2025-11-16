@extends('layouts.admin.app')

@section('title', 'Edit RW')

@section('content')
<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800">
        <i class="fas fa-edit"></i> Edit RW
    </h1>

    <div class="card shadow mb-4">
        <div class="card-body">
            @include('pages.partials.alert')

            <form action="{{ route('admin.rw.update', $rw->id) }}" method="POST">
                @csrf
                @method('PUT')
                
                <div class="form-group">
                    <label for="nomor_rw">Nomor RW <span class="text-danger">*</span></label>
                    <input type="text" class="form-control @error('nomor_rw') is-invalid @enderror" 
                           id="nomor_rw" name="nomor_rw" value="{{ old('nomor_rw', $rw->nomor_rw) }}" 
                           placeholder="Contoh: 001, 002" required>
                    @error('nomor_rw')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="ketua_rw_warga_id">Ketua RW</label>
                    <select class="form-control @error('ketua_rw_warga_id') is-invalid @enderror" 
                            id="ketua_rw_warga_id" name="ketua_rw_warga_id">
                        <option value="">Pilih Ketua RW</option>
                        @foreach($wargas as $warga)
                            <option value="{{ $warga->id }}" 
                                {{ old('ketua_rw_warga_id', $rw->ketua_rw_warga_id) == $warga->id ? 'selected' : '' }}>
                                {{ $warga->nama }} (NIK: {{ $warga->nik }})
                            </option>
                        @endforeach
                    </select>
                    @error('ketua_rw_warga_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Informasi Data Saat Ini -->
                <div class="alert alert-info mt-4">
                    <h6><i class="fas fa-info-circle"></i> Informasi Data Saat Ini</h6>
                    <div class="row">
                        <div class="col-md-6">
                            <small><strong>Nomor RW:</strong> {{ $rw->nomor_rw }}</small><br>
                            <small><strong>Ketua:</strong> 
                                @if($rw->ketua)
                                    {{ $rw->ketua->nama }}
                                @else
                                    <span class="badge badge-warning">Belum Ada</span>
                                @endif
                            </small>
                        </div>
                        <div class="col-md-6">
                            <small><strong>Jumlah RT:</strong> {{ $rw->rts_count ?? 0 }}</small><br>
                            <small><strong>Jumlah Warga:</strong> {{ $rw->wargas_count ?? 0 }}</small>
                        </div>
                    </div>
                </div>

                <div class="form-group mt-4">
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save"></i> Simpan Perubahan
                    </button>
                    <a href="{{ route('admin.rw.index') }}" class="btn btn-secondary">
                        <i class="fas fa-arrow-left"></i> Kembali
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection