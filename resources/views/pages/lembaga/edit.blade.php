<!-- resources/views/pages/lembaga/edit.blade.php -->
@extends('layouts.admin.app')

@section('title', 'Edit Lembaga Desa')

@section('content')
<div class="container-fluid dashboard-body">
    <div class="row">
        <div class="col-12">
            <!-- Page Heading -->
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 dashboard-header text-white">
                    <i class="fas fa-edit"></i> Edit Lembaga Desa
                </h1>
                <div>
                    <a href="{{ route('admin.lembaga.index') }}" class="btn btn-secondary dashboard-btn">
                        <i class="fas fa-arrow-left"></i> Kembali
                    </a>
                </div>
            </div>

            <!-- Form Card -->
            <div class="card shadow mb-4 dashboard-card">
                <div class="card-header py-3 dashboard-card-header">
                    <h6 class="m-0 font-weight-bold text-white">
                        <i class="fas fa-building"></i> Form Edit Lembaga Desa
                    </h6>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.lembaga.update', $lembaga->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        
                        <div class="row">
                            <div class="col-md-8">
                                <!-- Nama Lembaga -->
                                <div class="form-group mb-4">
                                    <label for="nama_lembaga" class="form-label text-white">
                                        <i class="fas fa-tag me-2"></i>Nama Lembaga
                                    </label>
                                    <input type="text" 
                                           class="form-control dashboard-input custom-input @error('nama_lembaga') is-invalid @enderror" 
                                           id="nama_lembaga" 
                                           name="nama_lembaga" 
                                           value="{{ old('nama_lembaga', $lembaga->nama_lembaga) }}" 
                                           placeholder="Masukkan nama lembaga desa"
                                           required>
                                    @error('nama_lembaga')
                                        <div class="invalid-feedback d-block">
                                            <i class="fas fa-exclamation-circle"></i> {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <!-- Deskripsi -->
                                <div class="form-group mb-4">
                                    <label for="deskripsi" class="form-label text-white">
                                        <i class="fas fa-align-left me-2"></i>Deskripsi Lembaga
                                    </label>
                                    <textarea class="form-control dashboard-input custom-input @error('deskripsi') is-invalid @enderror" 
                                              id="deskripsi" 
                                              name="deskripsi" 
                                              rows="5" 
                                              placeholder="Deskripsikan tentang lembaga desa ini"
                                              required>{{ old('deskripsi', $lembaga->deskripsi) }}</textarea>
                                    @error('deskripsi')
                                        <div class="invalid-feedback d-block">
                                            <i class="fas fa-exclamation-circle"></i> {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <!-- Kontak -->
                                <div class="form-group mb-4">
                                    <label for="kontak" class="form-label text-white">
                                        <i class="fas fa-phone me-2"></i>Kontak
                                    </label>
                                    <input type="text" 
                                           class="form-control dashboard-input custom-input @error('kontak') is-invalid @enderror" 
                                           id="kontak" 
                                           name="kontak" 
                                           value="{{ old('kontak', $lembaga->kontak) }}" 
                                           placeholder="Nomor telepon atau kontak lainnya">
                                    @error('kontak')
                                        <div class="invalid-feedback d-block">
                                            <i class="fas fa-exclamation-circle"></i> {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-4">
                                <!-- Logo Preview -->
                                <div class="form-group mb-4">
                                    <label class="form-label text-white">
                                        <i class="fas fa-image me-2"></i>Logo Lembaga
                                    </label>
                                    <div class="logo-preview mb-3 text-center">
                                        @if($lembaga->logo)
                                            <img src="{{ asset('storage/' . $lembaga->logo) }}" 
                                                 alt="Logo {{ $lembaga->nama_lembaga }}" 
                                                 class="img-thumbnail mb-2" 
                                                 style="max-height: 150px; background: var(--bg-card);">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="remove_logo" id="remove_logo">
                                                <label class="form-check-label text-white small" for="remove_logo">
                                                    Hapus logo saat ini
                                                </label>
                                            </div>
                                        @else
                                            <div class="text-white py-4" style="background: var(--bg-card); border-radius: 8px;">
                                                <i class="fas fa-building fa-3x mb-2"></i>
                                                <p class="small">Belum ada logo</p>
                                            </div>
                                        @endif
                                    </div>
                                    
                                    <!-- File Upload -->
                                    <input type="file" 
                                           class="form-control dashboard-input custom-input @error('logo') is-invalid @enderror" 
                                           id="logo" 
                                           name="logo"
                                           accept="image/*">
                                    <small class="form-text text-white">
                                        Format: JPEG, PNG, JPG, GIF | Maksimal: 2MB
                                    </small>
                                    @error('logo')
                                        <div class="invalid-feedback d-block">
                                            <i class="fas fa-exclamation-circle"></i> {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <!-- Info Stats -->
                                <div class="card border-0 mb-4" style="background: var(--bg-card);">
                                    <div class="card-body">
                                        <h6 class="card-title text-white mb-3">
                                            <i class="fas fa-chart-bar me-2"></i>Statistik Lembaga
                                        </h6>
                                        <div class="row text-center">
                                            <div class="col-6 mb-3">
                                                <div class="dashboard-badge badge-primary p-2 w-100">
                                                    <i class="fas fa-users text-white"></i>
                                                    <div class="small text-white">{{ $lembaga->anggotas_count }} Anggota</div>
                                                </div>
                                            </div>
                                            <div class="col-6 mb-3">
                                                <div class="dashboard-badge badge-info p-2 w-100">
                                                    <i class="fas fa-tag text-white"></i>
                                                    <div class="small text-white">{{ $lembaga->jabatans_count }} Jabatan</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Action Buttons -->
                        <div class="row mt-4">
                            <div class="col-12">
                                <div class="d-flex gap-2 justify-content-end">
                                    <button type="reset" class="btn btn-secondary dashboard-btn">
                                        <i class="fas fa-undo me-2"></i>Reset
                                    </button>
                                    <button type="submit" class="btn btn-primary dashboard-btn">
                                        <i class="fas fa-save me-2"></i>Update Lembaga
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Quick Actions -->
            <div class="row mt-4">
                <div class="col-md-4 mb-3">
                    <a href="{{ route('admin.lembaga.show', $lembaga->id) }}" class="btn btn-info dashboard-btn w-100">
                        <i class="fas fa-eye me-2"></i>Lihat Detail
                    </a>
                </div>
                <div class="col-md-4 mb-3">
                    <a href="{{ route('admin.lembaga.anggota.index', $lembaga->id) }}" class="btn btn-success dashboard-btn w-100">
                        <i class="fas fa-users me-2"></i>Kelola Anggota
                    </a>
                </div>
                <div class="col-md-4 mb-3">
                    <a href="{{ route('admin.lembaga.jabatan.index', $lembaga->id) }}" class="btn btn-warning dashboard-btn w-100">
                        <i class="fas fa-tags me-2"></i>Kelola Jabatan
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('styles')
<style>
/* Reset dan force semua elemen input */
.dashboard-input,
.dashboard-input:focus,
.dashboard-input:hover,
.dashboard-input:active {
    background: #2d3748 !important;
    border: 1px solid #4a5568 !important;
    color: #ffffff !important;
    border-radius: 8px !important;
    transition: all 0.3s ease;
}

/* Force warna teks untuk semua state */
input.dashboard-input,
textarea.dashboard-input,
input.dashboard-input:focus,
textarea.dashboard-input:focus,
input.dashboard-input:hover,
textarea.dashboard-input:hover {
    color: #ffffff !important;
    background: #2d3748 !important;
}

/* Placeholder dengan kontras yang baik */
.dashboard-input::placeholder {
    color: #a0aec0 !important;
    opacity: 1 !important;
}

/* Untuk file input */
input[type="file"].dashboard-input {
    color: #ffffff !important;
    background: #2d3748 !important;
}

/* Custom class tambahan untuk memastikan warna teks */
.custom-input {
    color: #ffffff !important;
    background: #2d3748 !important;
}

/* Style untuk semua input di dalam form */
.card-body input:not([type="checkbox"]):not([type="radio"]),
.card-body textarea {
    color: #ffffff !important;
    background: #2d3748 !important;
    border: 1px solid #4a5568 !important;
}

.card-body input:focus,
.card-body textarea:focus {
    color: #ffffff !important;
    background: #2d3748 !important;
    border-color: #4299e1 !important;
    box-shadow: 0 0 0 2px rgba(66, 153, 225, 0.25) !important;
}

/* Label dan teks lainnya */
.form-label {
    font-weight: 600;
    margin-bottom: 0.5rem;
    color: #ffffff !important;
}

.logo-preview img {
    border: 2px solid #4a5568;
    border-radius: 8px;
    transition: all 0.3s ease;
}

.logo-preview img:hover {
    border-color: #4299e1;
    transform: scale(1.05);
}

.invalid-feedback {
    color: #fc8181;
    font-size: 0.875rem;
    margin-top: 0.25rem;
}

.form-check-input:checked {
    background-color: #4299e1;
    border-color: #4299e1;
}

.form-check-label {
    color: #ffffff !important;
}

/* Additional styles untuk semua teks */
.text-white {
    color: #ffffff !important;
}

.card-body {
    color: #ffffff;
}

.small {
    color: #ffffff !important;
}

.form-text {
    color: #a0aec0 !important;
}

.dashboard-header {
    color: #ffffff !important;
}

.dashboard-card-header {
    color: #ffffff !important;
}

/* Override kuat untuk semua teks input */
input, textarea, select {
    color: #ffffff !important;
}

input::placeholder, textarea::placeholder {
    color: #a0aec0 !important;
}

/* Style khusus untuk form di dark theme */
.dashboard-card {
    background: #2d3748 !important;
}

.dashboard-card-header {
    background: #4a5568 !important;
}
</style>
@endsection

@section('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Logo preview functionality
    const logoInput = document.getElementById('logo');
    const logoPreview = document.querySelector('.logo-preview');
    const removeLogoCheckbox = document.getElementById('remove_logo');

    if (logoInput) {
        logoInput.addEventListener('change', function(e) {
            const file = e.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    if (logoPreview.querySelector('img')) {
                        logoPreview.querySelector('img').src = e.target.result;
                    } else {
                        const img = document.createElement('img');
                        img.src = e.target.result;
                        img.alt = 'Preview Logo';
                        img.className = 'img-thumbnail mb-2';
                        img.style.maxHeight = '150px';
                        img.style.background = '#2d3748';
                        
                        const currentContent = logoPreview.innerHTML;
                        logoPreview.innerHTML = '';
                        logoPreview.appendChild(img);
                        
                        // Add remove checkbox if not exists
                        if (!logoPreview.querySelector('.form-check')) {
                            const formCheck = document.createElement('div');
                            formCheck.className = 'form-check';
                            formCheck.innerHTML = `
                                <input class="form-check-input" type="checkbox" name="remove_logo" id="remove_logo">
                                <label class="form-check-label text-white small" for="remove_logo">
                                    Hapus logo saat ini
                                </label>
                            `;
                            logoPreview.appendChild(formCheck);
                        }
                    }
                }
                reader.readAsDataURL(file);
            }
        });
    }

    // Form reset handler
    const resetButton = document.querySelector('button[type="reset"]');
    if (resetButton) {
        resetButton.addEventListener('click', function() {
            setTimeout(() => {
                // Reset logo preview to original
                if ('{{ $lembaga->logo }}') {
                    const originalLogo = '{{ asset('storage/' . $lembaga->logo) }}';
                    if (logoPreview.querySelector('img')) {
                        logoPreview.querySelector('img').src = originalLogo;
                    }
                }
                if (removeLogoCheckbox) {
                    removeLogoCheckbox.checked = false;
                }
            }, 100);
        });
    }

    // Enhanced form validation
    const form = document.querySelector('form');
    if (form) {
        form.addEventListener('submit', function(e) {
            const namaLembaga = document.getElementById('nama_lembaga').value.trim();
            const deskripsi = document.getElementById('deskripsi').value.trim();

            if (!namaLembaga) {
                e.preventDefault();
                showAlert('error', 'Nama lembaga harus diisi!');
                return;
            }

            if (!deskripsi) {
                e.preventDefault();
                showAlert('error', 'Deskripsi lembaga harus diisi!');
                return;
            }
        });
    }

    function showAlert(type, message) {
        // You can implement a toast notification here
        alert(message); // Simple alert for now
    }

    // Force input text color setelah load
    setTimeout(() => {
        const inputs = document.querySelectorAll('input, textarea');
        inputs.forEach(input => {
            input.style.color = '#ffffff';
            input.style.backgroundColor = '#2d3748';
        });
    }, 100);

    console.log('Lembaga edit form initialized');
    // Force input text color in dark theme
document.addEventListener('DOMContentLoaded', function() {
    // Set semua input dan textarea ke warna putih
    const inputs = document.querySelectorAll('input, textarea, select');
    inputs.forEach(input => {
        input.style.color = '#ffffff';
        input.style.backgroundColor = 'var(--dark-card)';
    });
    
    // Observer untuk input yang ditambahkan secara dinamis
    const observer = new MutationObserver(function(mutations) {
        mutations.forEach(function(mutation) {
            mutation.addedNodes.forEach(function(node) {
                if (node.nodeType === 1) { // Element node
                    const newInputs = node.querySelectorAll ? node.querySelectorAll('input, textarea, select') : [];
                    newInputs.forEach(input => {
                        input.style.color = '#ffffff';
                        input.style.backgroundColor = 'var(--dark-card)';
                    });
                }
            });
        });
    });
    
    observer.observe(document.body, {
        childList: true,
        subtree: true
    });
});
});
</script>
@endsection