<!-- resources/views/lembaga/create.blade.php -->
@extends('layouts.admin.app')

@section('title', 'Tambah Lembaga Desa')

@section('content')
<div class="container-fluid">
    <!-- Header dengan breadcrumb -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <div>
            <h1 class="h3 mb-0 text-gray-800">
                <i class="fas fa-plus-circle text-primary"></i> Tambah Lembaga Desa
            </h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb bg-transparent p-0 mb-0">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}" class="text-decoration-none text-gray-600">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('admin.lembaga.index') }}" class="text-decoration-none text-gray-600">Lembaga Desa</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Tambah</li>
                </ol>
            </nav>
        </div>
        <a href="{{ route('admin.lembaga.index') }}" class="d-none d-sm-inline-block btn btn-sm btn-outline-secondary shadow-sm">
            <i class="fas fa-arrow-left fa-sm"></i> Kembali ke Daftar Lembaga
        </a>
    </div>

    <!-- Card Form -->
    <div class="card shadow mb-4">
        <div class="card-header py-3 bg-white">
            <h6 class="m-0 font-weight-bold text-primary">
                <i class="fas fa-info-circle mr-1"></i> Form Data Lembaga Desa
            </h6>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.lembaga.store') }}" method="POST" id="formLembaga">
                @csrf
                
                <!-- Nama Lembaga -->
                <div class="form-group row">
                    <label for="nama_lembaga" class="col-md-3 col-form-label text-md-right font-weight-bold">
                        Nama Lembaga <span class="text-danger">*</span>
                    </label>
                    <div class="col-md-9">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-building"></i></span>
                            </div>
                            <input type="text" class="form-control @error('nama_lembaga') is-invalid @enderror" 
                                   id="nama_lembaga" name="nama_lembaga" value="{{ old('nama_lembaga') }}" 
                                   placeholder="Masukkan nama lembaga desa" required>
                            @error('nama_lembaga')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <small class="form-text text-muted">Contoh: Badan Permusyawaratan Desa, Lembaga Pemberdayaan Masyarakat, dll.</small>
                    </div>
                </div>

                <!-- Deskripsi -->
                <div class="form-group row">
                    <label for="deskripsi" class="col-md-3 col-form-label text-md-right font-weight-bold">
                        Deskripsi <span class="text-danger">*</span>
                    </label>
                    <div class="col-md-9">
                        <textarea class="form-control @error('deskripsi') is-invalid @enderror" 
                                  id="deskripsi" name="deskripsi" rows="5" 
                                  placeholder="Jelaskan tentang lembaga desa, tugas, dan fungsinya" required>{{ old('deskripsi') }}</textarea>
                        <div class="d-flex justify-content-between mt-1">
                            <small class="form-text text-muted">Minimal 50 karakter</small>
                            <small id="deskripsi-counter" class="form-text text-muted">0 karakter</small>
                        </div>
                        @error('deskripsi')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <!-- Kontak -->
                <div class="form-group row">
                    <label for="kontak" class="col-md-3 col-form-label text-md-right font-weight-bold">
                        Kontak
                    </label>
                    <div class="col-md-9">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-phone"></i></span>
                            </div>
                            <input type="text" class="form-control @error('kontak') is-invalid @enderror" 
                                   id="kontak" name="kontak" value="{{ old('kontak') }}" 
                                   placeholder="Nomor telepon, email, atau kontak lainnya">
                            @error('kontak')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <small class="form-text text-muted">Bisa berupa nomor telepon, email, atau media komunikasi lainnya.</small>
                    </div>
                </div>

                <!-- Tombol Aksi -->
                <div class="form-group row mb-0">
                    <div class="col-md-9 offset-md-3">
                        <div class="d-flex justify-content-end">
                            <a href="{{ route('admin.lembaga.index') }}" class="btn btn-outline-secondary mr-2">
                                <i class="fas fa-times"></i> Batal
                            </a>
                            <button type="submit" class="btn btn-primary" id="btnSubmit">
                                <i class="fas fa-save"></i> Simpan Lembaga
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- Informasi Tambahan -->
    <div class="card border-left-info shadow mb-4">
        <div class="card-body py-3">
            <div class="row align-items-center">
                <div class="col-auto">
                    <i class="fas fa-info-circle fa-2x text-info"></i>
                </div>
                <div class="col ml-3">
                    <div class="text-xs font-weight-bold text-info text-uppercase">Tips</div>
                    <div class="mb-0 text-gray-800">
                        Pastikan data yang dimasukkan sudah sesuai dan lengkap. Nama lembaga harus unik dan tidak boleh sama dengan lembaga yang sudah ada.
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Karakter counter untuk deskripsi
        const deskripsiTextarea = document.getElementById('deskripsi');
        const deskripsiCounter = document.getElementById('deskripsi-counter');
        
        if (deskripsiTextarea && deskripsiCounter) {
            deskripsiTextarea.addEventListener('input', function() {
                const count = this.value.length;
                deskripsiCounter.textContent = count + ' karakter';
                
                // Validasi minimal karakter
                if (count < 50) {
                    deskripsiCounter.classList.remove('text-success');
                    deskripsiCounter.classList.add('text-danger');
                } else {
                    deskripsiCounter.classList.remove('text-danger');
                    deskripsiCounter.classList.add('text-success');
                }
            });
            
            // Trigger input event untuk inisialisasi
            deskripsiTextarea.dispatchEvent(new Event('input'));
        }
        
        // Validasi form sebelum submit
        const form = document.getElementById('formLembaga');
        const btnSubmit = document.getElementById('btnSubmit');
        
        if (form) {
            form.addEventListener('submit', function(e) {
                // Validasi minimal karakter deskripsi
                const deskripsi = document.getElementById('deskripsi').value;
                if (deskripsi.length < 50) {
                    e.preventDefault();
                    alert('Deskripsi harus minimal 50 karakter!');
                    document.getElementById('deskripsi').focus();
                    return false;
                }
                
                // Ubah tombol submit menjadi loading
                if (btnSubmit) {
                    btnSubmit.disabled = true;
                    btnSubmit.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Menyimpan...';
                }
                
                return true;
            });
        }
    });
</script>
@endpush

@push('styles')
<style>
    .form-control:focus {
        border-color: #4e73df;
        box-shadow: 0 0 0 0.2rem rgba(78, 115, 223, 0.25);
    }
    
    .input-group-text {
        background-color: #f8f9fc;
        border: 1px solid #d1d3e2;
    }
    
    .breadcrumb {
        background-color: transparent;
        padding: 0;
    }
    
    .breadcrumb-item a {
        color: #6e707e;
    }
    
    .breadcrumb-item.active {
        color: #4e73df;
    }
</style>
@endpush