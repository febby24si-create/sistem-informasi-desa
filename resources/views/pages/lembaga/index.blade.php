<!-- resources/views/lembaga/index.blade.php -->
@extends('layouts.admin.app')

@section('title', 'Lembaga Desa')
@section('page_title', 'Lembaga')
@section('content')
<style>
/* === DARK GLASSMORPHISM STYLE === */
.glass-card {
    background: rgba(30, 30, 40, 0.7);
    border-radius: 40px;
    border: 1px solid rgba(255, 255, 255, 0.1);
    backdrop-filter: blur(20px);
    -webkit-backdrop-filter: blur(20px);
    box-shadow: 0 8px 32px rgba(0, 0, 0, 0.4);
    transition: all 0.3s ease;
}

.glass-card:hover {
    transform: translateY(-8px);
    box-shadow: 0 16px 48px rgba(0, 0, 0, 0.6);
}

.glass-header {
    background: rgba(40, 40, 50, 0.8) !important;
    color: #000000 !important;
    backdrop-filter: blur(15px);
    border-bottom: 1px solid rgba(255, 255, 255, 0.1);
    border-radius: 40px 40px 0 0 !important;
}

.btn-glass {
    background: rgba(255, 255, 255, 0.1);
    color: #ffffff;
    backdrop-filter: blur(12px);
    border: 1px solid rgba(255, 255, 255, 0.2);
    border-radius: 10px;
    transition: all 0.3s ease;
    padding: 8px 16px;
}

.btn-glass:hover {
    background: rgba(255, 255, 255, 0.2);
    color: #ffffff;
    transform: translateY(-2px);
    box-shadow: 0 6px 20px rgba(0, 0, 0, 0.3);
}

.badge-glass {
    background: rgba(255, 255, 255, 0.15);
    color: #ffffff;
    backdrop-filter: blur(8px);
    border: 1px solid rgba(255, 255, 255, 0.1);
    border-radius: 10px;
    padding: 6px 12px;
    font-size: 0.8rem;
    font-weight: 500;
}

.lembaga-img {
    width: 100%;
    height: 200px;
    object-fit: cover;
    border-radius: 16px 16px 0 0;
    border-bottom: 1px solid rgba(255, 255, 255, 0.1);
    transition: transform 0.3s ease;
}

.glass-card:hover .lembaga-img {
    transform: scale(1.05);
}

.lembaga-card-body {
    padding: 20px;
}

.lembaga-title {
    font-weight: 700;
    color: #000000;
    margin-bottom: 12px;
    font-size: 1.3rem;
    line-height: 1.4;
}

.lembaga-description {
    color: rgba(0, 0, 0, 0.8);
    font-size: 0.9rem;
    margin-bottom: 16px;
    line-height: 1.5;
}

.lembaga-stats {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 16px;
    flex-wrap: wrap;
    gap: 8px;
}

.lembaga-actions {
    display: flex;
    justify-content: space-between;
    gap: 6px;
}

body {
    background: linear-gradient(135deg, #1a1a2e 0%, #16213e 50%, #0f3460 100%);
    min-height: 100vh;
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
}

.page-title {
    color: #ffffff !important;
    font-weight: 700;
    font-size: 2rem;
    text-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);
}

.empty-state {
    text-align: center;
    padding: 60px 30px;
}

.empty-state i {
    font-size: 4rem;
    margin-bottom: 20px;
    color: rgba(255, 255, 255, 0.5);
}

.empty-state h4 {
    color: #ffffff !important;
    margin-bottom: 12px;
    font-weight: 600;
}

.empty-state p {
    color: rgba(255, 255, 255, 0.7) !important;
    margin-bottom: 25px;
    font-size: 1.1rem;
}

.text-muted {
    color: rgba(255, 255, 255, 0.6) !important;
}

/* === IMPROVED SEARCH & FILTER STYLE === */

.search-container {
    margin-top: 5px;
    border-radius: 18px !important;
}

/* Input lebih besar, elegan */
.search-input {
    height: 55px !important;
    font-size: 1.05rem !important;
    padding-left: 20px !important;
}

.search-input:focus {
    background: rgba(255, 255, 255, 0.25) !important;
    border-color: #3b82f6 !important;
    box-shadow: 0 0 0 4px rgba(59, 130, 246, 0.35) !important;
    color: #000 !important;
}

.search-input::placeholder {
    color: rgba(255, 255, 255, 0.7) !important;
}

/* Tombol lebih proporsional */
.btn-search {
    height: 55px !important;
    border-radius: 14px !important;
}

.btn-search:hover {
    background: rgba(59, 130, 246, 0.55);
    border-color: rgba(59, 130, 246, 0.8);
}

/* Button colors with glass effect */
.btn-primary.btn-glass {
    background: rgba(59, 130, 246, 0.3);
    border-color: rgba(59, 130, 246, 0.5);
}

.btn-primary.btn-glass:hover {
    background: rgba(59, 130, 246, 0.5);
    border-color: rgba(59, 130, 246, 0.7);
}

.btn-info.btn-glass {
    background: rgba(6, 182, 212, 0.3);
    border-color: rgba(6, 182, 212, 0.5);
}

.btn-info.btn-glass:hover {
    background: rgba(6, 182, 212, 0.5);
}

.btn-success.btn-glass {
    background: rgba(16, 185, 129, 0.3);
    border-color: rgba(16, 185, 129, 0.5);
}

.btn-success.btn-glass:hover {
    background: rgba(16, 185, 129, 0.5);
}

.btn-warning.btn-glass {
    background: rgba(245, 158, 11, 0.3);
    border-color: rgba(245, 158, 11, 0.5);
}

.btn-warning.btn-glass:hover {
    background: rgba(245, 158, 11, 0.5);
}

.btn-danger.btn-glass {
    background: rgba(239, 68, 68, 0.3);
    border-color: rgba(239, 68, 68, 0.5);
}

.btn-danger.btn-glass:hover {
    background: rgba(239, 68, 68, 0.5);
}

/* Responsive adjustments */
@media (max-width: 768px) {
    .lembaga-stats {
        flex-direction: column;
        align-items: flex-start;
        gap: 6px;
    }
    
    .lembaga-actions {
        flex-wrap: wrap;
        justify-content: center;
        gap: 4px;
    }
    
    .lembaga-actions .btn {
        flex: 1;
        min-width: 60px;
        margin: 2px;
    }
    
    .page-title {
        font-size: 1.6rem;
    }
    
    .empty-state {
        padding: 40px 20px;
    }
}

@media (max-width: 576px) {
    .lembaga-card-body {
        padding: 16px;
    }
    
    .lembaga-title {
        font-size: 1.1rem;
    }
    
    .lembaga-description {
        font-size: 0.85rem;
    }
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
</style>

<div class="container-fluid py-4">
    <!-- Page Header -->
    <div class="d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center mb-5">
        <div class="mb-3 mb-md-0">
            <h1 class="page-title mb-2">
                <i class="fas fa-building me-3"></i>Lembaga Desa
            </h1>
            <p class="text-muted mb-0">Kelola semua lembaga desa yang aktif</p>
        </div>
        <a href="{{ route('admin.lembaga.create') }}" class="btn btn-primary btn-glass shadow-lg px-4 py-2">
            <i class="fas fa-plus-circle me-2"></i>Tambah Lembaga
        </a>
    </div>
    <!-- Search & Filter -->
<div class="search-container mb-5">
    <form method="GET" action="{{ route('admin.lembaga.index') }}">
        <div class="row g-4 align-items-center">

            <!-- Search Input -->
            <div class="col-xl-6 col-lg-6 col-md-6">
                <input type="text"
                       name="search"
                       class="form-control search-input"
                       placeholder="Cari lembaga..."
                       value="{{ request('search') }}">
            </div>

            <!-- Filter -->
            <div class="col-xl-4 col-lg-4 col-md-4">
                <select name="filter" class="form-control search-input">
                    <option value="">Semua Lembaga</option>
                    <option value="banyak_anggota" {{ request('filter')=='banyak_anggota' ? 'selected':'' }}>
                        Anggota Terbanyak
                    </option>
                    <option value="sedikit_anggota" {{ request('filter')=='sedikit_anggota' ? 'selected':'' }}>
                        Anggota Tersedikit
                    </option>
                </select>
            </div>

            <!-- Button Cari -->
            <div class="col-xl-2 col-lg-2 col-md-2 d-grid">
                <button class="btn btn-primary btn-search">
                    <i class="fas fa-search me-2"></i> Cari
                </button>
            </div>

        </div>
    </form>
</div>


    <!-- Lembaga Cards Grid -->
    <div class="row g-4">
        @foreach($lembagas as $lembaga)
        <div class="col-xl-4 col-lg-6 col-md-6">
            <div class="card glass-card shadow h-100 lembaga-card">
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
                        <span class="badge-glass d-flex align-items-center">
                            <i class="fas fa-users me-2"></i> 
                            <span>{{ $lembaga->anggotas_count }} Anggota</span>
                        </span>
                    </div>
                </div>
                
                <!-- Card Content -->
                <div class="lembaga-card-body">
                    <h5 class="lembaga-title">{{ $lembaga->nama_lembaga }}</h5>
                    <p class="lembaga-description">{{ Str::limit($lembaga->deskripsi, 120) }}</p>
                    
                    <!-- Lembaga Stats -->
                    <div class="lembaga-stats">
                        <span class="badge-glass d-flex align-items-center">
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
                           class="btn btn-info btn-glass" 
                           title="Detail Lembaga"
                           data-bs-toggle="tooltip">
                            <i class="fas fa-eye"></i>
                        </a>
                        <a href="{{ route('admin.lembaga.anggota.index', $lembaga->id) }}" 
                           class="btn btn-success btn-glass" 
                           title="Kelola Anggota"
                           data-bs-toggle="tooltip">
                            <i class="fas fa-users"></i>
                        </a>
                        <a href="{{ route('admin.lembaga.edit', $lembaga->id) }}" 
                           class="btn btn-warning btn-glass" 
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
                                    class="btn btn-danger btn-glass" 
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
    <div class="card glass-card shadow-lg mt-4">
        <div class="card-body empty-state">
            <i class="fas fa-building"></i>
            <h4>Belum Ada Lembaga Desa</h4>
            <p>Mulai dengan menambahkan lembaga desa pertama Anda untuk mengelola organisasi desa</p>
            <a href="{{ route('admin.lembaga.create') }}" class="btn btn-primary btn-glass px-4 py-2">
                <i class="fas fa-plus-circle me-2"></i>Tambah Lembaga Pertama
            </a>
        </div>
    </div>
    @endif

    <!-- Pagination (if needed) -->
@if($lembagas->hasPages())
    <div class="d-flex justify-content-center mt-5">
        <div class="glass-card p-3 shadow-sm rounded">
            {!! $lembagas->links('pagination::bootstrap-5') !!}
        </div>
    </div>
@endif

</div>

<!-- JavaScript for enhanced interactions -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Initialize Bootstrap tooltips
    const tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
    const tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
        return new bootstrap.Tooltip(tooltipTriggerEl);
    });

    // Add loading animation to cards
    const cards = document.querySelectorAll('.lembaga-card');
    cards.forEach((card, index) => {
        card.style.animationDelay = `${(index % 5) * 0.1}s`;
    });

    // Enhanced hover effects
    cards.forEach(card => {
        card.addEventListener('mouseenter', function() {
            this.style.transform = 'translateY(-8px) scale(1.02)';
        });
        
        card.addEventListener('mouseleave', function() {
            this.style.transform = 'translateY(0) scale(1)';
        });
    });

    // Search form enhancement
    const searchForm = document.querySelector('form');
    const searchInput = document.querySelector('input[name="search"]');
    
    if (searchInput) {
        searchInput.addEventListener('focus', function() {
            this.parentElement.classList.add('focused');
        });
        
        searchInput.addEventListener('blur', function() {
            this.parentElement.classList.remove('focused');
        });
    }
});

// Add custom styles for pagination
const style = document.createElement('style');
style.textContent = `
    .pagination .page-link {
        background: rgba(255, 255, 255, 0.1);
        border: 1px solid rgba(255, 255, 255, 0.2);
        color: #ffffff;
        backdrop-filter: blur(10px);
    }
    
    .pagination .page-link:hover {
        background: rgba(255, 255, 255, 0.2);
        color: #ffffff;
    }
    
    .pagination .page-item.active .page-link {
        background: rgba(59, 130, 246, 0.5);
        border-color: rgba(59, 130, 246, 0.7);
    }
    
    .input-group.focused {
        transform: scale(1.02);
        transition: transform 0.3s ease;
    }
`;
document.head.appendChild(style);
</script>
@endsection