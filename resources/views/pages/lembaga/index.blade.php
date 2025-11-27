<!-- resources/views/lembaga/index.blade.php -->
@extends('layouts.admin.app')

@section('title', 'Lembaga Desa')
@section('page_title', 'Lembaga')
@section('content')

<div class="container-fluid py-4">
    <!-- Page Header -->
    <div class="d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center mb-5">
        <div class="mb-3 mb-md-0">
            <h1 class="dashboard-page-title mb-2">
                <i class="fas fa-building me-3"></i>Lembaga Desa
            </h1>
            <p class="text-muted mb-0">Kelola semua lembaga desa yang aktif</p>
        </div>
        <a href="{{ route('admin.lembaga.create') }}" class="btn btn-primary shadow-lg px-4 py-2">
            <i class="fas fa-plus-circle me-2"></i>Tambah Lembaga
        </a>
    </div>

    <!-- Search & Filter Section -->
    <div class="card dashboard-card mb-5">
        <div class="card-body">
            <form method="GET" action="{{ route('admin.lembaga.index') }}" id="searchForm">
                @csrf
                <div class="row g-3 align-items-end">
                    <!-- Search Input -->
                    <div class="col-xl-4 col-lg-4 col-md-6">
                        <label for="search" class="form-label fw-semibold small text-muted">Cari Lembaga</label>
                        <div class="input-group">
                            <span class="input-group-text bg-primary text-white">
                                <i class="fas fa-search"></i>
                            </span>
                            <input type="text"
                                   name="search"
                                   class="form-control"
                                   id="search"
                                   placeholder="Nama lembaga atau deskripsi..."
                                   value="{{ request('search') }}"
                                   aria-label="Cari lembaga">
                        </div>
                    </div>

                    <!-- Status Filter -->
                    <div class="col-xl-3 col-lg-3 col-md-6">
                        <label for="status" class="form-label fw-semibold small text-muted">Status</label>
                        <select name="status" class="form-control" id="status">
                            <option value="">Semua Status</option>
                            <option value="aktif" {{ request('status') == 'aktif' ? 'selected' : '' }}>Aktif</option>
                            <option value="nonaktif" {{ request('status') == 'nonaktif' ? 'selected' : '' }}>Nonaktif</option>
                        </select>
                    </div>

                    <!-- Sort By -->
                    <div class="col-xl-3 col-lg-3 col-md-6">
                        <label for="sort" class="form-label fw-semibold small text-muted">Urutkan</label>
                        <select name="sort" class="form-control" id="sort">
                            <option value="terbaru" {{ request('sort') == 'terbaru' ? 'selected' : '' }}>Terbaru</option>
                            <option value="terlama" {{ request('sort') == 'terlama' ? 'selected' : '' }}>Terlama</option>
                            <option value="anggota_terbanyak" {{ request('sort') == 'anggota_terbanyak' ? 'selected' : '' }}>Anggota Terbanyak</option>
                            <option value="anggota_tersedikit" {{ request('sort') == 'anggota_tersedikit' ? 'selected' : '' }}>Anggota Tersedikit</option>
                            <option value="a-z" {{ request('sort') == 'a-z' ? 'selected' : '' }}>Nama A-Z</option>
                            <option value="z-a" {{ request('sort') == 'z-a' ? 'selected' : '' }}>Nama Z-A</option>
                        </select>
                    </div>

                    <!-- Action Buttons -->
                    <div class="col-xl-2 col-lg-2 col-md-6">
                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-filter me-2"></i>Terapkan
                            </button>
                            <a href="{{ route('admin.lembaga.index') }}" class="btn btn-secondary btn-block">
                                <i class="fas fa-refresh me-2"></i>Reset
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Advanced Filters (Collapsible) -->
                <div class="mt-3">
                    <a class="btn btn-sm btn-primary" data-bs-toggle="collapse" href="#advancedFilters" role="button">
                        <i class="fas fa-sliders-h me-2"></i>Filter Lanjutan
                    </a>
                    
                    <div class="collapse mt-3" id="advancedFilters">
                        <div class="card card-body bg-light">
                            <div class="row g-3">
                                <div class="col-md-4">
                                    <label class="form-label fw-semibold small text-muted">Jumlah Anggota</label>
                                    <div class="input-group">
                                        <input type="number" name="min_anggota" class="form-control" placeholder="Min" 
                                               value="{{ request('min_anggota') }}">
                                        <span class="input-group-text">-</span>
                                        <input type="number" name="max_anggota" class="form-control" placeholder="Max"
                                               value="{{ request('max_anggota') }}">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label fw-semibold small text-muted">Tanggal Dibuat</label>
                                    <input type="date" name="created_at" class="form-control" 
                                           value="{{ request('created_at') }}">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- Results Info -->
    @if(request()->hasAny(['search', 'status', 'sort', 'min_anggota', 'max_anggota', 'created_at']))
    <div class="alert alert-info alert-dismissible fade show mb-4" role="alert">
        <div class="d-flex align-items-center">
            <i class="fas fa-info-circle me-3"></i>
            <div>
                <strong>Filter Aktif:</strong> 
                Menampilkan {{ $lembagas->count() }} dari {{ $lembagas->total() }} lembaga
                @if(request('search'))
                • Pencarian: "{{ request('search') }}"
                @endif
                @if(request('status'))
                • Status: {{ ucfirst(request('status')) }}
                @endif
                @if(request('sort'))
                • Diurutkan: {{ [
                    'terbaru' => 'Terbaru',
                    'terlama' => 'Terlama', 
                    'anggota_terbanyak' => 'Anggota Terbanyak',
                    'anggota_tersedikit' => 'Anggota Tersedikit',
                    'a-z' => 'Nama A-Z',
                    'z-a' => 'Nama Z-A'
                ][request('sort')] ?? request('sort') }}
                @endif
            </div>
        </div>
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
    @endif

    <!-- Lembaga Cards Grid -->
    <div class="row g-4">
        @foreach($lembagas as $lembaga)
        <div class="col-xl-4 col-lg-6 col-md-6">
            <div class="card dashboard-card shadow h-100 lembaga-card">
                <!-- Lembaga Logo/Image -->
                <div class="position-relative overflow-hidden">
                    @if($lembaga->logo)
                        <img src="{{ asset('storage/' . $lembaga->logo) }}" 
                             class="lembaga-img" 
                             alt="{{ $lembaga->nama_lembaga }}"
                             onerror="this.src='{{ asset('assets/img/default-lembaga.jpg') }}'">
                    @else
                        <img src="{{ asset('assets/img/default-lembaga.jpg') }}" 
                             class="lembaga-img" 
                             alt="Default Lembaga Image">
                    @endif
                    <div class="position-absolute top-0 end-0 m-3">
                        <span class="badge badge-primary d-flex align-items-center">
                            <i class="fas fa-users me-2"></i> 
                            <span>{{ $lembaga->anggotas_count }} Anggota</span>
                        </span>
                    </div>
                    <div class="position-absolute top-0 start-0 m-3">
                        <span class="badge {{ $lembaga->status == 'aktif' ? 'badge-success' : 'badge-secondary' }}">
                            {{ ucfirst($lembaga->status) }}
                        </span>
                    </div>
                </div>
                
                <!-- Card Content -->
                <div class="card-body">
                    <h5 class="card-title text-gray-800 mb-3">{{ $lembaga->nama_lembaga }}</h5>
                    <p class="card-text text-muted mb-4">{{ Str::limit($lembaga->deskripsi, 120) }}</p>
                    
                    <!-- Lembaga Stats -->
                    <div class="lembaga-stats mb-4">
                        <span class="badge badge-info d-flex align-items-center me-2">
                            <i class="fas fa-tag me-2"></i>
                            <span>{{ $lembaga->jabatans_count }} Jabatan</span>
                        </span>
                        @if($lembaga->kontak)
                        <span class="text-muted small d-flex align-items-center">
                            <i class="fas fa-phone me-2"></i>
                            <span>{{ $lembaga->kontak }}</span>
                        </span>
                        @endif
                    </div>
                    
                    <!-- Action Buttons -->
                    <div class="lembaga-actions">
                        <a href="{{ route('admin.lembaga.show', $lembaga->id) }}" 
                           class="btn btn-sm btn-info" 
                           title="Detail Lembaga"
                           data-bs-toggle="tooltip">
                            <i class="fas fa-eye"></i>
                        </a>
                        <a href="{{ route('admin.lembaga.anggota.index', $lembaga->id) }}" 
                           class="btn btn-sm btn-success" 
                           title="Kelola Anggota"
                           data-bs-toggle="tooltip">
                            <i class="fas fa-users"></i>
                        </a>
                        <a href="{{ route('admin.lembaga.edit', $lembaga->id) }}" 
                           class="btn btn-sm btn-warning" 
                           title="Edit Lembaga"
                           data-bs-toggle="tooltip">
                            <i class="fas fa-edit"></i>
                        </a>
                        <form action="{{ route('admin.lembaga.destroy', $lembaga->id) }}" 
                              method="POST" 
                              class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" 
                                    class="btn btn-sm btn-danger" 
                                    onclick="return confirm('Apakah Anda yakin ingin menghapus lembaga {{ $lembaga->nama_lembaga }}?')"
                                    title="Hapus Lembaga"
                                    data-bs-toggle="tooltip">
                                <i class="fas fa-trash"></i>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>

    <!-- Empty State -->
    @if($lembagas->isEmpty())
    <div class="card dashboard-card shadow-lg mt-4">
        <div class="card-body empty-state text-center py-5">
            <i class="fas fa-building dashboard-icon fa-4x mb-4"></i>
            <h4 class="text-gray-800 mb-3">Belum Ada Lembaga Desa</h4>
            <p class="text-muted mb-4">Mulai dengan menambahkan lembaga desa pertama Anda untuk mengelola organisasi desa</p>
            <a href="{{ route('admin.lembaga.create') }}" class="btn btn-primary px-4 py-2">
                <i class="fas fa-plus-circle me-2"></i>Tambah Lembaga Pertama
            </a>
        </div>
    </div>
    @endif

    <!-- Pagination - Positioned bottom right -->
    @if($lembagas->hasPages())
    <div class="d-flex justify-content-between align-items-center mt-5">
        <div class="text-muted small">
            Menampilkan {{ $lembagas->firstItem() ?? 0 }} - {{ $lembagas->lastItem() ?? 0 }} dari {{ $lembagas->total() }} lembaga
        </div>
        <div class="ms-auto">
            {{ $lembagas->links('pagination::bootstrap-5') }}
        </div>
    </div>
    @endif
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Initialize Bootstrap tooltips
    const tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
    const tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
        return new bootstrap.Tooltip(tooltipTriggerEl);
    });

    // Enhanced hover effects for cards
    const cards = document.querySelectorAll('.lembaga-card');
    cards.forEach((card, index) => {
        card.style.animationDelay = `${(index % 6) * 0.1}s`;
    });

    // Auto-submit form when select changes (optional)
    const statusSelect = document.getElementById('status');
    const sortSelect = document.getElementById('sort');
    
    if (statusSelect) {
        statusSelect.addEventListener('change', function() {
            document.getElementById('searchForm').submit();
        });
    }
    
    if (sortSelect) {
        sortSelect.addEventListener('change', function() {
            document.getElementById('searchForm').submit();
        });
    }

    // Debounce search input
    const searchInput = document.getElementById('search');
    let searchTimeout;
    
    if (searchInput) {
        searchInput.addEventListener('input', function() {
            clearTimeout(searchTimeout);
            searchTimeout = setTimeout(() => {
                document.getElementById('searchForm').submit();
            }, 500);
        });
    }

    // Show loading state on form submit
    const searchForm = document.getElementById('searchForm');
    if (searchForm) {
        searchForm.addEventListener('submit', function() {
            const submitBtn = this.querySelector('button[type="submit"]');
            if (submitBtn) {
                submitBtn.disabled = true;
                submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin me-2"></i>Memproses...';
            }
        });
    }
});
</script>

<style>
/* Custom styles for lembaga cards */
.lembaga-img {
    width: 100%;
    height: 200px;
    object-fit: cover;
    border-radius: 12px 12px 0 0;
    transition: transform var(--transition-speed) ease;
}

.lembaga-card:hover .lembaga-img {
    transform: scale(1.05);
}

.lembaga-stats {
    display: flex;
    justify-content: space-between;
    align-items: center;
    flex-wrap: wrap;
    gap: 0.5rem;
}

.lembaga-actions {
    display: flex;
    gap: 0.25rem;
    justify-content: center;
}

.lembaga-actions .btn {
    padding: 0.375rem 0.5rem;
    border-radius: 8px;
}

.empty-state {
    padding: 3rem 1.5rem;
}

.empty-state .dashboard-icon {
    color: var(--text-muted);
}

/* Animation for cards */
@keyframes fadeInUp {
    from {
        opacity: 0;
        transform: translateY(20px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

.lembaga-card {
    animation: fadeInUp 0.5s ease forwards;
}

.lembaga-card:nth-child(1) { animation-delay: 0.1s; }
.lembaga-card:nth-child(2) { animation-delay: 0.2s; }
.lembaga-card:nth-child(3) { animation-delay: 0.3s; }
.lembaga-card:nth-child(4) { animation-delay: 0.4s; }
.lembaga-card:nth-child(5) { animation-delay: 0.5s; }
.lembaga-card:nth-child(6) { animation-delay: 0.6s; }

/* Form improvements */
.form-label.small {
    font-size: 0.8rem;
    margin-bottom: 0.25rem;
}

.bg-light {
    background-color: rgba(248, 250, 252, 0.8) !important;
    backdrop-filter: blur(10px);
}

/* Pagination positioning */
.d-flex.justify-content-between.align-items-center {
    border-top: 1px solid #e2e8f0;
    padding-top: 1.5rem;
}

/* Responsive adjustments */
@media (max-width: 768px) {
    .lembaga-stats {
        flex-direction: column;
        align-items: flex-start;
        gap: 0.5rem;
    }
    
    .lembaga-actions {
        flex-wrap: wrap;
        justify-content: center;
    }
    
    .lembaga-actions .btn {
        flex: 1;
        min-width: 40px;
        margin: 0.125rem;
    }
    
    .empty-state {
        padding: 2rem 1rem;
    }
    
    .d-flex.justify-content-between.align-items-center {
        flex-direction: column;
        gap: 1rem;
        text-align: center;
    }
    
    .d-grid.gap-2 {
        grid-template-columns: 1fr 1fr;
    }
}

@media (max-width: 576px) {
    .card-body {
        padding: 1rem;
    }
    
    .lembaga-actions .btn {
        padding: 0.25rem 0.375rem;
    }
    
    .d-grid.gap-2 {
        grid-template-columns: 1fr;
    }
}

/* Alert styling */
.alert {
    border-radius: 12px;
    border: none;
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08);
}

.alert-info {
    background: linear-gradient(135deg, rgba(59, 130, 246, 0.1), rgba(37, 99, 235, 0.05));
    border-left: 4px solid var(--primary);
}

/* Collapse transition */
.collapse {
    transition: all 0.3s ease;
}
</style>
@endsection