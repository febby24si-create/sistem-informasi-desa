<!-- resources/views/pages/lembaga/edit.blade.php -->
@extends('layouts.admin.app')

@section('title', 'Edit Lembaga Desa')

@section('content')
<style>
/* === CONSISTENT LIGHT THEME STYLE === */
.dashboard-body {
    background: linear-gradient(135deg, #f8fafc 0%, #e2e8f0 50%, #f8fafc 100%) !important;
    min-height: 100vh;
}

.card {
    background: linear-gradient(135deg, #ffffff, #f8fafc) !important;
    border: 1px solid #cbd5e1 !important;
    border-radius: 12px !important;
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08) !important;
    transition: all var(--transition-speed) cubic-bezier(0.175, 0.885, 0.32, 1.275) !important;
    transform-style: preserve-3d !important;
    color: var(--text-primary) !important;
    overflow: hidden;
    margin-bottom: 1rem;
}

.card:hover {
    transform: translateY(-5px) rotateX(3deg) rotateY(3deg) !important;
    box-shadow: 0 12px 30px rgba(0, 0, 0, 0.15), 
                0 0 20px rgba(59, 130, 246, 0.2) !important;
}

.card-header {
    background: linear-gradient(135deg, var(--primary-dark), var(--primary)) !important;
    color: #ffffff !important;
    border-radius: 12px 12px 0 0 !important;
    border: none !important;
    padding: 1rem 1.25rem !important;
}

.card-header h5 {
    color: #ffffff !important;
    margin: 0 !important;
    font-weight: 600 !important;
    text-shadow: 0 1px 3px rgba(0, 0, 0, 0.3) !important;
    font-size: 1rem !important;
}

.form-control {
    border: 1px solid #cbd5e1 !important;
    border-radius: 8px !important;
    padding: 0.75rem 1rem !important;
    transition: all var(--transition-speed) ease !important;
    background: #ffffff !important;
    color: var(--text-primary) !important;
}

.form-control:focus {
    border-color: var(--primary) !important;
    box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.1) !important;
    background: #ffffff !important;
    color: var(--text-primary) !important;
}

.form-label {
    font-weight: 600;
    margin-bottom: 8px;
    display: block;
    color: var(--text-primary) !important;
}

.invalid-feedback {
    color: var(--danger) !important;
    font-size: 0.875rem;
    margin-top: 4px;
    display: block;
}

/* Logo Preview Styles */
.logo-preview-area {
    border: 2px dashed #cbd5e1;
    border-radius: 12px;
    padding: 20px;
    text-align: center;
    background: #f8fafc;
    transition: all var(--transition-speed) ease;
}

.logo-preview-area:hover {
    border-color: var(--primary);
    background: #f1f5f9;
}

.logo-preview-img {
    max-height: 150px;
    max-width: 100%;
    border-radius: 8px;
    border: 2px solid #e2e8f0;
}

.stats-card {
    background: linear-gradient(135deg, #f8fafc, #ffffff);
    border: 1px solid #e2e8f0;
    border-radius: 12px;
    padding: 1.25rem;
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
    background: rgba(59, 130, 246, 0.1);
    border: 1px dashed var(--primary);
    border-radius: 8px;
    color: var(--primary);
    text-align: center;
    cursor: pointer;
    transition: all var(--transition-speed) ease;
    font-weight: 500;
}

.file-input-label:hover {
    background: rgba(59, 130, 246, 0.2);
    border-color: var(--primary-dark);
}

/* Quick Actions Grid */
.quick-actions {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
    gap: 12px;
    margin-top: 20px;
}

/* Stats Badge */
.stats-badge {
    background: linear-gradient(135deg, #f8fafc, #ffffff);
    border: 1px solid #e2e8f0;
    border-radius: 10px;
    padding: 15px;
    text-align: center;
    transition: all var(--transition-speed) ease;
}

.stats-badge:hover {
    transform: translateY(-2px);
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
}

/* Form Check */
.form-check-input {
    border: 1px solid #cbd5e1;
}

.form-check-input:checked {
    background-color: var(--primary);
    border-color: var(--primary);
}

.form-check-label {
    color: var(--text-secondary);
    font-size: 0.875rem;
}

/* Responsive */
@media (max-width: 768px) {
    .quick-actions {
        grid-template-columns: 1fr;
    }
    
    .logo-preview-area {
        padding: 15px;
    }
}
</style>

<div class="container-fluid dashboard-body py-4">
    <div class="row justify-content-center">
        <div class="col-12 col-xl-10">
            <!-- Page Header -->
            <div class="d-sm-flex align-items-center justify-content-between mb-5">
                <div>
                    <h1 class="h2 mb-1 dashboard-text-primary">
                        <i class="fas fa-edit me-2"></i>Edit Lembaga Desa
                    </h1>
                    <p class="text-muted mb-0">Perbarui informasi lembaga desa {{ $lembaga->nama_lembaga }}</p>
                </div>
                <div>
                    <a href="{{ route('admin.lembaga.index') }}" class="btn btn-secondary">
                        <i class="fas fa-arrow-left me-2"></i>Kembali
                    </a>
                </div>
            </div>

            <!-- Form Card -->
            <div class="card shadow-lg mb-4">
                <div class="card-header py-3">
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
                                <div class="form-group mb-4">
                                    <label for="nama_lembaga" class="form-label">
                                        <i class="fas fa-tag me-2"></i>Nama Lembaga
                                    </label>
                                    <input type="text" 
                                           class="form-control @error('nama_lembaga') is-invalid @enderror" 
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
                                <div class="form-group mb-4">
                                    <label for="deskripsi" class="form-label">
                                        <i class="fas fa-align-left me-2"></i>Deskripsi Lembaga
                                    </label>
                                    <textarea class="form-control @error('deskripsi') is-invalid @enderror" 
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
                                <div class="form-group mb-4">
                                    <label for="kontak" class="form-label">
                                        <i class="fas fa-phone me-2"></i>Kontak
                                    </label>
                                    <input type="text" 
                                           class="form-control @error('kontak') is-invalid @enderror" 
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
                                <div class="form-group mb-4">
                                    <label class="form-label mb-3">
                                        <i class="fas fa-image me-2"></i>Logo Lembaga
                                    </label>
                                    
                                    <div class="logo-preview-area mb-4">
                                        @if($lembaga->logo)
                                            <img src="{{ asset('storage/' . $lembaga->logo) }}" 
                                                 alt="Logo {{ $lembaga->nama_lembaga }}" 
                                                 class="logo-preview-img mb-3">
                                            <div class="form-check d-flex align-items-center justify-content-center">
                                                <input class="form-check-input me-2" type="checkbox" name="remove_logo" id="remove_logo">
                                                <label class="form-check-label" for="remove_logo">
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
                                    <div class="file-input-wrapper mb-3">
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
                                <div class="stats-card mt-4">
                                    <h6 class="mb-3 text-primary">
                                        <i class="fas fa-chart-bar me-2"></i>Statistik Lembaga
                                    </h6>
                                    <div class="row g-2 text-center">
                                        <div class="col-6">
                                            <div class="stats-badge">
                                                <i class="fas fa-users text-primary mb-2 fa-lg"></i>
                                                <div class="small text-gray-800 fw-bold">{{ $lembaga->anggotas_count }} Anggota</div>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="stats-badge">
                                                <i class="fas fa-tag text-info mb-2 fa-lg"></i>
                                                <div class="small text-gray-800 fw-bold">{{ $lembaga->jabatans_count }} Jabatan</div>
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
                                    <button type="reset" class="btn btn-secondary">
                                        <i class="fas fa-undo me-2"></i>Reset
                                    </button>
                                    <button type="submit" class="btn btn-primary">
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
                <a href="{{ route('admin.lembaga.show', $lembaga->id) }}" class="btn btn-info text-start">
                    <i class="fas fa-eye me-2"></i>Lihat Detail
                </a>
                <a href="{{ route('admin.lembaga.anggota.index', $lembaga->id) }}" class="btn btn-success text-start">
                    <i class="fas fa-users me-2"></i>Kelola Anggota
                </a>
                <a href="{{ route('admin.lembaga.jabatan.index', $lembaga->id) }}" class="btn btn-warning text-start">
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
                            <label class="form-check-label" for="remove_logo">
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
        toast.className = `alert alert-${type === 'error' ? 'danger' : type}`;
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