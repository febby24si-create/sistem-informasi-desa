@extends('layouts.admin')

@section('title', 'Tambah Anggota Lembaga')

@section('content')
<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800">
        <i class="fas fa-user-plus"></i> Tambah Anggota {{ $lembaga->nama_lembaga }}
    </h1>

    <div class="card shadow mb-4">
        <div class="card-body">
            @include('pages.partials.alert')

            <form action="{{ route('admin.lembaga.anggota.store', $lembaga->id) }}" method="POST">
                @csrf
                
                <div class="form-group">
                    <label for="warga_id">Pilih Warga <span class="text-danger">*</span></label>
                    <select class="form-control @error('warga_id') is-invalid @enderror" 
                            id="warga_id" name="warga_id" required>
                        <option value="">Pilih Warga</option>
                        @foreach($wargas as $warga)
                            <option value="{{ $warga->id }}" 
                                {{ old('warga_id') == $warga->id ? 'selected' : '' }}>
                                {{ $warga->nama }} (NIK: {{ $warga->nik }})
                            </option>
                        @endforeach
                    </select>
                    @error('warga_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

<div class="form-group">
    <label for="jabatan_id">Jabatan <span class="text-danger">*</span></label>
    
    @if($jabatans->isEmpty())
        <div class="alert alert-warning">
            <i class="fas fa-exclamation-triangle"></i>
            <strong>Belum ada jabatan!</strong> 
            Silakan buat jabatan terlebih dahulu di 
            <a href="{{ route('admin.lembaga.jabatan.index', $lembaga->id) }}" class="alert-link">
                Kelola Jabatan
            </a>
        </div>
        <select class="form-control" disabled>
            <option>-- Tidak ada jabatan tersedia --</option>
        </select>
    @else
        <select class="form-control @error('jabatan_id') is-invalid @enderror" 
                id="jabatan_id" name="jabatan_id" required>
            <option value="">Pilih Jabatan</option>
            @foreach($jabatans as $jabatan)
                <option value="{{ $jabatan->id }}" 
                    {{ old('jabatan_id') == $jabatan->id ? 'selected' : '' }}>
                    {{ $jabatan->nama_jabatan }} - {{ $jabatan->level }}
                </option>
            @endforeach
        </select>
        @error('jabatan_id')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    @endif
</div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="tgl_mulai">Tanggal Mulai <span class="text-danger">*</span></label>
                            <input type="date" class="form-control @error('tgl_mulai') is-invalid @enderror" 
                                   id="tgl_mulai" name="tgl_mulai" 
                                   value="{{ old('tgl_mulai') }}" required>
                            @error('tgl_mulai')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="tgl_selesai">Tanggal Selesai</label>
                            <input type="date" class="form-control @error('tgl_selesai') is-invalid @enderror" 
                                   id="tgl_selesai" name="tgl_selesai" 
                                   value="{{ old('tgl_selesai') }}">
                            @error('tgl_selesai')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            <small class="form-text text-muted">Kosongkan jika masih aktif</small>
                        </div>
                    </div>
                </div>

                <div class="form-group mt-4">
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save"></i> Simpan Anggota
                    </button>
                    <a href="{{ route('admin.lembaga.anggota.index', $lembaga->id) }}" class="btn btn-secondary">
                        <i class="fas fa-arrow-left"></i> Kembali
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
// Set tanggal maksimum untuk input date
document.getElementById('tgl_mulai').max = new Date().toISOString().split('T')[0];
document.getElementById('tgl_selesai').max = new Date().toISOString().split('T')[0];

// Validasi tanggal selesai harus setelah tanggal mulai
document.getElementById('tgl_mulai').addEventListener('change', function() {
    document.getElementById('tgl_selesai').min = this.value;
});

document.getElementById('tgl_selesai').addEventListener('change', function() {
    const tglMulai = document.getElementById('tgl_mulai').value;
    if (this.value && this.value <= tglMulai) {
        alert('Tanggal selesai harus setelah tanggal mulai');
        this.value = '';
    }
});
</script>
@endsection