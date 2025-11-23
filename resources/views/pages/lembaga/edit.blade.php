<!-- resources/views/pages/lembaga/edit.blade.php -->
@extends('layouts.admin.app')

@section('title', 'Edit Lembaga Desa')

@section('content')
<style>
/* === DARK GLASSMORPHISM STYLE === */
.dashboard-body {
    background: linear-gradient(135deg, #1a1a2e, #16213e, #0f3460);
    min-height: 100vh;
}

.glass-card {
    background: rgba(30, 30, 40, 0.7);
    border-radius: 16px;
    border: 1px solid rgba(255, 255, 255, 0.1);
    backdrop-filter: blur(20px);
    -webkit-backdrop-filter: blur(20px);
    box-shadow: 0 8px 32px rgba(0, 0, 0, 0.3);
}

.glass-card-header {
    background: rgba(40, 40, 50, 0.8) !important;
    color: #fff !important;
    border-bottom: 1px solid rgba(255, 255, 255, 0.1);
    border-radius: 16px 16px 0 0 !important;
    backdrop-filter: blur(15px);
}

.glass-input {
    background: rgba(255, 255, 255, 0.1) !important;
    border: 1px solid rgba(255, 255, 255, 0.2) !important;
    color: #ffffff !important;
    border-radius: 10px !important;
    backdrop-filter: blur(10px);
    transition: all 0.3s ease;
}

.glass-input:focus {
    background: rgba(255, 255, 255, 0.15) !important;
    border-color: rgba(59, 130, 246, 0.6) !important;
    box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.2) !important;
    color: #ffffff !important;
}

.glass-input::placeholder {
    color: rgba(255, 255, 255, 0.5) !important;
}

.glass-btn {
    background: rgba(255, 255, 255, 0.1);
    border: 1px solid rgba(255, 255, 255, 0.2);
    color: #fff;
    backdrop-filter: blur(10px);
    border-radius: 10px;
    transition: all 0.3s ease;
    padding: 10px 20px;
}

.glass-btn:hover {
    background: rgba(255, 255, 255, 0.2);
    color: #fff;
    transform: translateY(-2px);
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
}

.btn-primary.glass-btn {
    background: rgba(59, 130, 246, 0.3);
    border-color: rgba(59, 130, 246, 0.5);
}

.btn-primary.glass-btn:hover {
    background: rgba(59, 130, 246, 0.5);
}

.btn-secondary.glass-btn {
    background: rgba(107, 114, 128, 0.3);
    border-color: rgba(107, 114, 128, 0.5);
}

.btn-secondary.glass-btn:hover {
    background: rgba(107, 114, 128, 0.5);
}

.btn-info.glass-btn {
    background: rgba(6, 182, 212, 0.3);
    border-color: rgba(6, 182, 212, 0.5);
}

.btn-info.glass-btn:hover {
    background: rgba(6, 182, 212, 0.5);
}

.btn-success.glass-btn {
    background: rgba(16, 185, 129, 0.3);
    border-color: rgba(16, 185, 129, 0.5);
}

.btn-success.glass-btn:hover {
    background: rgba(16, 185, 129, 0.5);
}

.btn-warning.glass-btn {
    background: rgba(245, 158, 11, 0.3);
    border-color: rgba(245, 158, 11, 0.5);
}

.btn-warning.glass-btn:hover {
    background: rgba(245, 158, 11, 0.5);
}

.glass-badge {
    background: rgba(255, 255, 255, 0.15);
    color: #fff;
    backdrop-filter: blur(8px);
    border: 1px solid rgba(255, 255, 255, 0.1);
    border-radius: 12px;
    padding: 12px;
}

.text-white {
    color: #fff !important;
}

.text-muted {
    color: rgba(255, 255, 255, 0.7) !important;
}

/* Logo Preview Styles */
.logo-preview-area {
    border: 2px dashed rgba(255, 255, 255, 0.2);
    border-radius: 12px;
    padding: 20px;
    text-align: center;
    background: rgba(255, 255, 255, 0.05);
    transition: all 0.3s ease;
}

.logo-preview-area:hover {
    border-color: rgba(59, 130, 246, 0.5);
    background: rgba(255, 255, 255, 0.08);
}

.logo-preview-img {
    max-height: 150px;
    max-width: 100%;
    border-radius: 8px;
    border: 2px solid rgba(255, 255, 255, 0.1);
}

.stats-card {
    background: rgba(255, 255, 255, 0.08);
    border-radius: 12px;
    border: 1px solid rgba(255, 255, 255, 0.1);
    backdrop-filter: blur(10px);
}

/* Form Styles */
.form-label {
    font-weight: 600;
    margin-bottom: 8px;
    display: block;
}

.invalid-feedback {
    color: #f87171;
    font-size: 0.875rem;
    margin-top: 4px;
    display: block;
}

.form-check-input {
    background: rgba(255, 255, 255, 0.1);
    border: 1px solid rgba(255, 255, 255, 0.3);
}

.form-check-input:checked {
    background-color: #3b82f6;
    border-color: #3b82f6;
}

.form-check-label {
    color: rgba(255, 255, 255, 0.9);
    font-size: 0.875rem;
}

/* File Input Custom */
.file-input-wrapper {
    position: relative;
    overflow: hidden;
    display: inline-block;
    width: 100%;
}

.file-input-wrapper input[type=file] {
    position: absolute;
    left: 0;
    top: 0;
    opacity: 0;
    width: 100%;
    height: 100%;
    cursor: pointer;
}

.file-input-label {
    display: block;
    padding: 12px 16px;
    background: rgba(59, 130, 246, 0.2);
    border: 1px dashed rgba(59, 130, 246, 0.5);
    border-radius: 8px;
    color: #3b82f6;
    text-align: center;
    cursor: pointer;
    transition: all 0.3s ease;
}

.file-input-label:hover {
    background: rgba(59, 130, 246, 0.3);
    border-color: rgba(59, 130, 246, 0.7);
}

/* Quick Actions Grid */
.quick-actions {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
    gap: 12px;
    margin-top: 20px;
}

/* Responsive */
@media (max-width: 768px) {
    .quick-actions {
        grid-template-columns: 1fr;
    }
    
    .glass-btn {
        padding: 8px 16px;
        font-size: 0.9rem;
    }
}
</style>

<div class="container-fluid dashboard-body py-4">
    <div class="row justify-content-center">
        <div class="col-12 col-xl-10">
            <!-- Page Header -->
            <div class="d-sm-flex align-items-center justify-content-between mb-5">
                <div>
                    <h1 class="h2 mb-1 text-white">
                        <i class="fas fa-edit me-2"></i>Edit Lembaga Desa
                    </h1>
                    <p class="text-muted mb-0">Perbarui informasi lembaga desa {{ $lembaga->nama_lembaga }}</p>
                </div>
                <div>
                    <a href="{{ route('admin.lembaga.index') }}" class="btn btn-secondary glass-btn">
                        <i class="fas fa-arrow-left me-2"></i>Kembali
                    </a>
                </div>
            </div>

            <!-- Form Card -->
            <div class="card glass-card shadow-lg mb-4">
                <div class="card-header glass-card-header py-3">
                    <h5 class="mb-0">
                        <i class="fas fa-building me-2"></i>Form Edit Lembaga Desa
                    </h5>
                </div>
                <div class="card-body p-4">
                    <form action="{{ route('admin.lembaga.update', $lembaga->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        
                        <div class="row g-4">
                            <div class="col-lg-8">
                                <!-- Nama Lembaga -->
                                <div class="form-group">
                                    <label for="nama_lembaga" class="form-label text-white">
                                        <i class="fas fa-tag me-2"></i>Nama Lembaga
                                    </label>
                                    <input type="text" 
                                           class="form-control glass-input @error('nama_lembaga') is-invalid @enderror" 
                                           id="nama_lembaga" 
                                           name="nama_lembaga" 
                                           value="{{ old('nama_lembaga', $lembaga->nama_lembaga) }}" 
                                           placeholder="Masukkan nama lembaga desa"
                                           required>
                                    @error('nama_lembaga')
                                        <div class="invalid-feedback">
                                            <i class="fas fa-exclamation-circle me-1"></i> {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <!-- Deskripsi -->
                                <div class="form-group">
                                    <label for="deskripsi" class="form-label text-white">
                                        <i class="fas fa-align-left me-2"></i>Deskripsi Lembaga
                                    </label>
                                    <textarea class="form-control glass-input @error('deskripsi') is-invalid @enderror" 
                                              id="deskripsi" 
                                              name="deskripsi" 
                                              rows="5" 
                                              placeholder="Deskripsikan tentang lembaga desa ini"
                                              required>{{ old('deskripsi', $lembaga->deskripsi) }}</textarea>
                                    @error('deskripsi')
                                        <div class="invalid-feedback">
                                            <i class="fas fa-exclamation-circle me-1"></i> {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <!-- Kontak -->
                                <div class="form-group">
                                    <label for="kontak" class="form-label text-white">
                                        <i class="fas fa-phone me-2"></i>Kontak
                                    </label>
                                    <input type="text" 
                                           class="form-control glass-input @error('kontak') is-invalid @enderror" 
                                           id="kontak" 
                                           name="kontak" 
                                           value="{{ old('kontak', $lembaga->kontak) }}" 
                                           placeholder="Nomor telepon atau kontak lainnya">
                                    @error('kontak')
                                        <div class="invalid-feedback">
                                            <i class="fas fa-exclamation-circle me-1"></i> {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-lg-4">
                                <!-- Logo Section -->
                                <div class="form-group">
                                    <label class="form-label text-white mb-3">
                                        <i class="fas fa-image me-2"></i>Logo Lembaga
                                    </label>
                                    
                                    <div class="logo-preview-area mb-4">
                                        @if($lembaga->logo)
                                            <img src="{{ asset('storage/' . $lembaga->logo) }}" 
                                                 alt="Logo {{ $lembaga->nama_lembaga }}" 
                                                 class="logo-preview-img mb-3">
                                            <div class="form-check d-flex align-items-center justify-content-center">
                                                <input class="form-check-input me-2" type="checkbox" name="remove_logo" id="remove_logo">
                                                <label class="form-check-label text-white small" for="remove_logo">
                                                    Hapus logo saat ini
                                                </label>
                                            </div>
                                        @else
                                            <div class="py-4">
                                                <i class="fas fa-building fa-3x text-muted mb-3"></i>
                                                <p class="text-muted small mb-0">Belum ada logo</p>
                                            </div>
                                        @endif
                                    </div>
                                    
                                    <!-- File Upload -->
                                    <div class="file-input-wrapper">
                                        <label class="file-input-label">
                                            <i class="fas fa-upload me-2"></i>
                                            <span class="file-input-text">Pilih File Logo</span>
                                        </label>
                                        <input type="file" 
                                               class="form-control @error('logo') is-invalid @enderror" 
                                               id="logo" 
                                               name="logo"
                                               accept="image/*">
                                    </div>
                                    <small class="form-text text-muted mt-2 d-block">
                                        <i class="fas fa-info-circle me-1"></i>
                                        Format: JPEG, PNG, JPG, GIF | Maksimal: 2MB
                                    </small>
                                    @error('logo')
                                        <div class="invalid-feedback d-block">
                                            <i class="fas fa-exclamation-circle me-1"></i> {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <!-- Info Stats -->
                                <div class="stats-card p-3 mt-4">
                                    <h6 class="text-white mb-3">
                                        <i class="fas fa-chart-bar me-2"></i>Statistik Lembaga
                                    </h6>
                                    <div class="row g-2 text-center">
                                        <div class="col-6">
                                            <div class="glass-badge">
                                                <i class="fas fa-users text-primary mb-1"></i>
                                                <div class="small text-white">{{ $lembaga->anggotas_count }} Anggota</div>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="glass-badge">
                                                <i class="fas fa-tag text-info mb-1"></i>
                                                <div class="small text-white">{{ $lembaga->jabatans_count }} Jabatan</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Action Buttons -->
                        <div class="row mt-5">
                            <div class="col-12">
                                <div class="d-flex gap-3 justify-content-end">
                                    <button type="reset" class="btn btn-secondary glass-btn">
                                        <i class="fas fa-undo me-2"></i>Reset
                                    </button>
                                    <button type="submit" class="btn btn-primary glass-btn">
                                        <i class="fas fa-save me-2"></i>Update Lembaga
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Quick Actions -->
            <div class="quick-actions">
                <a href="{{ route('admin.lembaga.show', $lembaga->id) }}" class="btn btn-info glass-btn text-start">
                    <i class="fas fa-eye me-2"></i>Lihat Detail
                </a>
                <a href="{{ route('admin.lembaga.anggota.index', $lembaga->id) }}" class="btn btn-success glass-btn text-start">
                    <i class="fas fa-users me-2"></i>Kelola Anggota
                </a>
                <a href="{{ route('admin.lembaga.jabatan.index', $lembaga->id) }}" class="btn btn-warning glass-btn text-start">
                    <i class="fas fa-tags me-2"></i>Kelola Jabatan
                </a>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Logo preview functionality
    const logoInput = document.getElementById('logo');
    const fileInputText = document.querySelector('.file-input-text');
    const logoPreviewArea = document.querySelector('.logo-preview-area');

    if (logoInput) {
        logoInput.addEventListener('change', function(e) {
            const file = e.target.files[0];
            if (file) {
                // Update file input text
                if (fileInputText) {
                    fileInputText.textContent = file.name;
                }

                // Preview image
                const reader = new FileReader();
                reader.onload = function(e) {
                    let img = logoPreviewArea.querySelector('img');
                    if (!img) {
                        img = document.createElement('img');
                        img.className = 'logo-preview-img mb-3';
                        logoPreviewArea.innerHTML = '';
                        logoPreviewArea.appendChild(img);
                        
                        // Add remove checkbox
                        const formCheck = document.createElement('div');
                        formCheck.className = 'form-check d-flex align-items-center justify-content-center';
                        formCheck.innerHTML = `
                            <input class="form-check-input me-2" type="checkbox" name="remove_logo" id="remove_logo">
                            <label class="form-check-label text-white small" for="remove_logo">
                                Hapus logo saat ini
                            </label>
                        `;
                        logoPreviewArea.appendChild(formCheck);
                    }
                    img.src = e.target.result;
                    img.alt = 'Preview Logo';
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
                // Reset file input text
                if (fileInputText) {
                    fileInputText.textContent = 'Pilih File Logo';
                }
                
                // Reset logo preview to original
                if ('{{ $lembaga->logo }}') {
                    const originalLogo = '{{ asset('storage/' . $lembaga->logo) }}';
                    const img = logoPreviewArea.querySelector('img');
                    if (img) {
                        img.src = originalLogo;
                    }
                } else {
                    // Reset to default state
                    logoPreviewArea.innerHTML = `
                        <div class="py-4">
                            <i class="fas fa-building fa-3x text-muted mb-3"></i>
                            <p class="text-muted small mb-0">Belum ada logo</p>
                        </div>
                    `;
                }
                
                // Uncheck remove logo checkbox
                const removeLogoCheckbox = document.getElementById('remove_logo');
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

            let isValid = true;
            let errorMessage = '';

            if (!namaLembaga) {
                isValid = false;
                errorMessage = 'Nama lembaga harus diisi!';
            } else if (!deskripsi) {
                isValid = false;
                errorMessage = 'Deskripsi lembaga harus diisi!';
            }

            if (!isValid) {
                e.preventDefault();
                showToast(errorMessage, 'error');
            }
        });
    }

    // Toast notification function
    function showToast(message, type = 'info') {
        // Create toast element
        const toast = document.createElement('div');
        toast.className = `alert alert-${type === 'error' ? 'danger' : type} glass-card`;
        toast.style.cssText = `
            position: fixed;
            top: 20px;
            right: 20px;
            z-index: 9999;
            min-width: 300px;
            animation: slideInRight 0.3s ease;
        `;
        toast.innerHTML = `
            <div class="d-flex align-items-center">
                <i class="fas fa-${type === 'error' ? 'exclamation-triangle' : 'info-circle'} me-2"></i>
                <span>${message}</span>
            </div>
        `;
        
        document.body.appendChild(toast);
        
        // Remove toast after 5 seconds
        setTimeout(() => {
            toast.style.animation = 'slideOutRight 0.3s ease';
            setTimeout(() => {
                if (toast.parentNode) {
                    toast.parentNode.removeChild(toast);
                }
            }, 300);
        }, 5000);
    }

    // Add CSS animations
    const style = document.createElement('style');
    style.textContent = `
        @keyframes slideInRight {
            from { transform: translateX(100%); opacity: 0; }
            to { transform: translateX(0); opacity: 1; }
        }
        @keyframes slideOutRight {
            from { transform: translateX(0); opacity: 1; }
            to { transform: translateX(100%); opacity: 0; }
        }
    `;
    document.head.appendChild(style);
});
</script>
@endsection