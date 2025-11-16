@extends('layouts.admin.app')

@section('title', 'Edit Perangkat Desa')

@section('content')
<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800">
        <i class="fas fa-edit"></i> Edit Perangkat Desa
    </h1>

    <div class="card shadow mb-4">
        <div class="card-body">
            @include('pages.partials.alert')

            <form action="{{ route('admin.perangkat_desa.update', $perangkatDesa->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                
                <div class="form-group">
                    <label for="warga_id">Pilih Warga <span class="text-danger">*</span></label>
                    <select class="form-control @error('warga_id') is-invalid @enderror" 
                            id="warga_id" name="warga_id" required>
                        <option value="">Pilih Warga</option>
                        @foreach($wargas as $warga)
                            <option value="{{ $warga->id }}" 
                                {{ old('warga_id', $perangkatDesa->warga_id) == $warga->id ? 'selected' : '' }}>
                                {{ $warga->nama }} (NIK: {{ $warga->nik }})
                            </option>
                        @endforeach
                    </select>
                    @error('warga_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="jabatan">Jabatan <span class="text-danger">*</span></label>
                    <input type="text" class="form-control @error('jabatan') is-invalid @enderror" 
                           id="jabatan" name="jabatan" value="{{ old('jabatan', $perangkatDesa->jabatan) }}" 
                           placeholder="Contoh: Kepala Desa, Sekretaris Desa, Bendahara" required>
                    @error('jabatan')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="nip">NIP</label>
                            <input type="text" class="form-control @error('nip') is-invalid @enderror" 
                                   id="nip" name="nip" value="{{ old('nip', $perangkatDesa->nip) }}" 
                                   placeholder="Nomor Induk Pegawai">
                            @error('nip')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="kontak">Kontak</label>
                            <input type="text" class="form-control @error('kontak') is-invalid @enderror" 
                                   id="kontak" name="kontak" value="{{ old('kontak', $perangkatDesa->kontak) }}" 
                                   placeholder="Nomor telepon">
                            @error('kontak')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="periode_mulai">Periode Mulai <span class="text-danger">*</span></label>
                            <input type="date" class="form-control @error('periode_mulai') is-invalid @enderror" 
                                   id="periode_mulai" name="periode_mulai" 
                                   value="{{ old('periode_mulai', $perangkatDesa->periode_mulai->format('Y-m-d')) }}" required>
                            @error('periode_mulai')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="periode_selesai">Periode Selesai</label>
                            <input type="date" class="form-control @error('periode_selesai') is-invalid @enderror" 
                                   id="periode_selesai" name="periode_selesai" 
                                   value="{{ old('periode_selesai', $perangkatDesa->periode_selesai ? $perangkatDesa->periode_selesai->format('Y-m-d') : '') }}">
                            @error('periode_selesai')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            <small class="form-text text-muted">Kosongkan jika masih aktif</small>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="foto">Foto</label>
                    <div class="mb-2">
                        @if($perangkatDesa->foto)
                            <img src="{{ Storage::url($perangkatDesa->foto) }}" alt="Foto saat ini" width="100" class="img-thumbnail mb-2">
                            <br>
                            <small class="text-muted">Foto saat ini</small>
                        @else
                            <img src="{{ asset('assets/img/default-user.png') }}" alt="Default" width="100" class="img-thumbnail mb-2">
                            <br>
                            <small class="text-muted">Foto default</small>
                        @endif
                    </div>
                    <input type="file" class="form-control-file @error('foto') is-invalid @enderror" 
                           id="foto" name="foto" accept="image/*">
                    @error('foto')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                    <small class="form-text text-muted">Format: JPEG, PNG, JPG, GIF (Maks. 2MB). Kosongkan jika tidak ingin mengubah foto.</small>
                </div>

                <!-- Informasi Data Saat Ini -->
                <div class="alert alert-info mt-4">
                    <h6><i class="fas fa-info-circle"></i> Informasi Data Saat Ini</h6>
                    <div class="row">
                        <div class="col-md-6">
                            <small><strong>Warga:</strong> {{ $perangkatDesa->warga->nama }}</small><br>
                            <small><strong>Jabatan:</strong> {{ $perangkatDesa->jabatan }}</small><br>
                            <small><strong>NIP:</strong> {{ $perangkatDesa->nip ?? '-' }}</small>
                        </div>
                        <div class="col-md-6">
                            <small><strong>Periode Mulai:</strong> {{ $perangkatDesa->periode_mulai->format('d/m/Y') }}</small><br>
                            <small><strong>Status:</strong> 
                                @if($perangkatDesa->periode_selesai && $perangkatDesa->periode_selesai < now())
                                    <span class="badge badge-danger">Tidak Aktif</span>
                                @else
                                    <span class="badge badge-success">Aktif</span>
                                @endif
                            </small>
                        </div>
                    </div>
                </div>

                <div class="form-group mt-4">
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save"></i> Simpan Perubahan
                    </button>
                    <a href="{{ route('admin.perangkat_desa.show', $perangkatDesa->id) }}" class="btn btn-info">
                        <i class="fas fa-eye"></i> Lihat Detail
                    </a>
                    <a href="{{ route('admin.perangkat_desa.index') }}" class="btn btn-secondary">
                        <i class="fas fa-arrow-left"></i> Kembali
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
// Set tanggal maksimum untuk input date
document.getElementById('periode_mulai').max = new Date().toISOString().split('T')[0];
document.getElementById('periode_selesai').max = new Date().toISOString().split('T')[0];

// Validasi tanggal selesai harus setelah tanggal mulai
document.getElementById('periode_mulai').addEventListener('change', function() {
    document.getElementById('periode_selesai').min = this.value;
});

document.getElementById('periode_selesai').addEventListener('change', function() {
    const periodeMulai = document.getElementById('periode_mulai').value;
    if (this.value && this.value <= periodeMulai) {
        alert('Tanggal selesai harus setelah tanggal mulai');
        this.value = '';
    }
});

// Set min date untuk periode_selesai berdasarkan nilai saat ini
document.addEventListener('DOMContentLoaded', function() {
    const periodeMulai = document.getElementById('periode_mulai').value;
    if (periodeMulai) {
        document.getElementById('periode_selesai').min = periodeMulai;
    }
});
</script>

<style>
.form-group.required label:after {
    content: " *";
    color: red;
}
</style>
@endsection