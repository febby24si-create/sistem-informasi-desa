<!-- resources/views/lembaga/show.blade.php -->
@extends('layouts.admin.app')

@section('title', 'Detail Lembaga Desa')

@section('content')
<style>
/* === DARK GLASSMORPHISM STYLE === */
.detail-container {
    background: linear-gradient(135deg, #1a1a2e 0%, #16213e 50%, #0f3460 100%);
    min-height: 100vh;
    padding: 20px 0;
}

.glass-card {
    background: rgba(30, 30, 40, 0.7);
    border-radius: 16px;
    border: 1px solid rgba(255, 255, 255, 0.1);
    backdrop-filter: blur(20px);
    -webkit-backdrop-filter: blur(20px);
    box-shadow: 0 8px 32px rgba(0, 0, 0, 0.4);
    transition: all 0.3s ease;
}

.glass-card:hover {
    box-shadow: 0 12px 40px rgba(0, 0, 0, 0.6);
}

.glass-header {
    background: rgba(40, 40, 50, 0.8) !important;
    color: #ffffff !important;
    backdrop-filter: blur(15px);
    border-bottom: 1px solid rgba(255, 255, 255, 0.1);
    border-radius: 16px 16px 0 0 !important;
    padding: 20px;
}

.glass-table {
    background: transparent;
    color: #000000;
    border: none;
}

.glass-table th {
    background: rgba(255, 255, 255, 0.1);
    color: #000000;
    border: 1px solid rgba(255, 255, 255, 0.1);
    padding: 15px;
    font-weight: 600;
    backdrop-filter: blur(10px);
}

.glass-table td {
    background: rgba(255, 255, 255, 0.05);
    color: rgba(0, 0, 0, 0.9);
    border: 1px solid rgba(255, 255, 255, 0.1);
    padding: 15px;
    vertical-align: middle;
}

.glass-table tbody tr:hover td {
    background: rgba(255, 255, 255, 0.1);
    transform: translateX(5px);
    transition: all 0.3s ease;
}

.btn-glass {
    background: rgba(255, 255, 255, 0.1);
    color: #000000;
    backdrop-filter: blur(12px);
    border: 1px solid rgba(255, 255, 255, 0.2);
    border-radius: 10px;
    transition: all 0.3s ease;
    padding: 10px 20px;
}

.btn-glass:hover {
    background: rgba(255, 255, 255, 0.2);
    color: #000000;
    transform: translateY(-2px);
    box-shadow: 0 6px 20px rgba(0, 0, 0, 0.3);
}

.btn-primary.btn-glass {
    background: rgba(59, 130, 246, 0.3);
    border-color: rgba(59, 130, 246, 0.5);
}

.btn-primary.btn-glass:hover {
    background: rgba(59, 130, 246, 0.5);
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

.btn-secondary.btn-glass {
    background: rgba(107, 114, 128, 0.3);
    border-color: rgba(107, 114, 128, 0.5);
}

.btn-secondary.btn-glass:hover {
    background: rgba(107, 114, 128, 0.5);
}

.badge-glass {
    background: rgba(255, 255, 255, 0.15);
    color: #ffffff;
    backdrop-filter: blur(8px);
    border: 1px solid rgba(255, 255, 255, 0.1);
    border-radius: 8px;
    padding: 6px 12px;
    font-size: 0.8rem;
    font-weight: 500;
}

.page-title {
    color: #ffffff !important;
    font-weight: 700;
    font-size: 2.2rem;
    text-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);
}

.section-title {
    color: #ffffff;
    font-weight: 600;
    font-size: 1.4rem;
    margin-bottom: 20px;
    padding-bottom: 10px;
    border-bottom: 2px solid rgba(255, 255, 255, 0.1);
}

.stats-card {
    background: rgba(255, 255, 255, 0.08);
    border-radius: 12px;
    padding: 20px;
    border: 1px solid rgba(255, 255, 255, 0.1);
    backdrop-filter: blur(10px);
    text-align: center;
    transition: all 0.3s ease;
}

.stats-card:hover {
    transform: translateY(-5px);
    background: rgba(255, 255, 255, 0.12);
}

.stats-number {
    font-size: 2rem;
    font-weight: 700;
    color: #000000;
    margin: 10px 0;
}

.stats-label {
    color: rgba(0, 0, 0, 0.7);
    font-size: 0.9rem;
}

.lembaga-logo {
    width: 100%;
    max-height: 200px;
    object-fit: cover;
    border-radius: 12px;
    border: 2px solid rgba(255, 255, 255, 0.1);
}

.info-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
    gap: 20px;
    margin-bottom: 30px;
}

.status-badge {
    padding: 8px 16px;
    border-radius: 20px;
    font-weight: 600;
    font-size: 0.85rem;
}

.status-active {
    background: linear-gradient(135deg, #10b981, #059669);
    color: white;
}

.status-inactive {
    background: linear-gradient(135deg, #ef4444, #dc2626);
    color: white;
}

.status-pending {
    background: linear-gradient(135deg, #f59e0b, #d97706);
    color: white;
}

.level-badge {
    display: inline-flex;
    align-items: center;
    gap: 6px;
    padding: 6px 12px;
    border-radius: 8px;
    font-size: 0.8rem;
    font-weight: 500;
}

.level-ketua {
    background: linear-gradient(135deg, #10b981, #059669);
}

.level-sekretaris {
    background: linear-gradient(135deg, #06b6d4, #0891b2);
}

.level-bendahara {
    background: linear-gradient(135deg, #f59e0b, #d97706);
}

.level-anggota {
    background: linear-gradient(135deg, #6b7280, #4b5563);
}

.level-default {
    background: linear-gradient(135deg, #8b5cf6, #7c3aed);
}

/* Responsive Design */
@media (max-width: 768px) {
    .info-grid {
        grid-template-columns: 1fr;
    }
    
    .glass-table {
        font-size: 0.9rem;
    }
    
    .glass-table th,
    .glass-table td {
        padding: 10px 8px;
    }
    
    .page-title {
        font-size: 1.8rem;
    }
}

@media (max-width: 576px) {
    .btn-group-responsive {
        flex-direction: column;
        gap: 10px;
    }
    
    .btn-group-responsive .btn {
        width: 100%;
        text-align: center;
    }
}

/* Animation */
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

.fade-in {
    animation: fadeInUp 0.6s ease forwards;
}

.fade-in-delay-1 { animation-delay: 0.1s; }
.fade-in-delay-2 { animation-delay: 0.2s; }
.fade-in-delay-3 { animation-delay: 0.3s; }
</style>

<div class="container-fluid detail-container">
    <!-- Page Header -->
    <div class="row mb-5 fade-in">
        <div class="col-12">
            <div class="d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center">
                <div class="mb-3 mb-md-0">
                    <h1 class="page-title mb-2">
                        <i class="fas fa-building me-3"></i>Detail Lembaga Desa
                    </h1>
                    <p class="text-muted mb-0">Informasi lengkap tentang {{ $lembaga->nama_lembaga }}</p>
                </div>
                <div class="d-flex gap-2 btn-group-responsive">
                    <a href="{{ route('admin.lembaga.edit', $lembaga->id) }}" class="btn btn-warning btn-glass">
                        <i class="fas fa-edit me-2"></i>Edit Lembaga
                    </a>
                    <a href="{{ route('admin.lembaga.index') }}" class="btn btn-secondary btn-glass">
                        <i class="fas fa-arrow-left me-2"></i>Kembali
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Content -->
    <div class="row g-4">
        <!-- Left Column - Lembaga Info -->
        <div class="col-lg-8">
            <!-- Basic Information Card -->
            <div class="card glass-card mb-4 fade-in fade-in-delay-1">
                <div class="card-header glass-header">
                    <h5 class="mb-0">
                        <i class="fas fa-info-circle me-2"></i>Informasi Dasar Lembaga
                    </h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-8">
                            <table class="table glass-table">
                                <tr>
                                    <th width="35%">Nama Lembaga</th>
                                    <td>
                                        <strong class="text-black">{{ $lembaga->nama_lembaga }}</strong>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Deskripsi</th>
                                    <td class="text-justify">{{ $lembaga->deskripsi }}</td>
                                </tr>
                                <tr>
                                    <th>Kontak</th>
                                    <td>
                                        @if($lembaga->kontak)
                                            <i class="fas fa-phone text-primary me-2"></i>
                                            {{ $lembaga->kontak }}
                                        @else
                                            <span class="text-muted">-</span>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <th>Status</th>
                                    <td>
                                        <span class="status-badge status-active">
                                            <i class="fas fa-check-circle me-1"></i>Aktif
                                        </span>
                                    </td>
                                </tr>
                            </table>
                        </div>
                        <div class="col-md-4 text-center">
                            @if($lembaga->logo)
                                <img src="{{ asset('storage/' . $lembaga->logo) }}" 
                                     alt="Logo {{ $lembaga->nama_lembaga }}" 
                                     class="lembaga-logo mb-3">
                            @else
                                <div class="lembaga-logo d-flex align-items-center justify-content-center bg-dark rounded">
                                    <i class="fas fa-building fa-3x text-muted"></i>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>

            <!-- Structure Card -->
            <div class="card glass-card mb-4 fade-in fade-in-delay-2">
                <div class="card-header glass-header">
                    <h5 class="mb-0">
                        <i class="fas fa-sitemap me-2"></i>Struktur Jabatan
                    </h5>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table glass-table">
                            <thead>
                                <tr>
                                    <th>Nama Jabatan</th>
                                    <th>Level</th>
                                    <th class="text-center">Jumlah Anggota</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($lembaga->jabatans as $jabatan)
                                <tr>
                                    <td>
                                        <strong>{{ $jabatan->nama_jabatan }}</strong>
                                    </td>
                                    <td>
                                        @php
                                            $levelClass = 'level-default';
                                            $levelIcon = 'fas fa-star';
                                            switch($jabatan->level) {
                                                case 'Ketua':
                                                    $levelClass = 'level-ketua';
                                                    $levelIcon = 'fas fa-crown';
                                                    break;
                                                case 'Sekretaris':
                                                    $levelClass = 'level-sekretaris';
                                                    $levelIcon = 'fas fa-pen';
                                                    break;
                                                case 'Bendahara':
                                                    $levelClass = 'level-bendahara';
                                                    $levelIcon = 'fas fa-money-bill';
                                                    break;
                                                case 'Anggota':
                                                    $levelClass = 'level-anggota';
                                                    $levelIcon = 'fas fa-user';
                                                    break;
                                            }
                                        @endphp
                                        <span class="level-badge {{ $levelClass }}">
                                            <i class="{{ $levelIcon }}"></i>
                                            {{ $jabatan->level }}
                                        </span>
                                    </td>
                                    <td class="text-center">
                                        <span class="badge-glass">
                                            <i class="fas fa-users me-1"></i>
                                            {{ $jabatan->anggotas_count }}
                                        </span>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- Members Card -->
            <div class="card glass-card fade-in fade-in-delay-3">
                <div class="card-header glass-header">
                    <h5 class="mb-0">
                        <i class="fas fa-users me-2"></i>Daftar Anggota
                    </h5>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table glass-table">
                            <thead>
                                <tr>
                                    <th>Nama Anggota</th>
                                    <th>Jabatan</th>
                                    <th>Level</th>
                                    <th>Periode</th>
                                    <th class="text-center">Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($lembaga->anggotas as $anggota)
                                <tr>
                                    <td>
                                        <strong>{{ $anggota->warga->nama }}</strong>
                                        @if($anggota->warga->nik)
                                            <br>
                                            <small class="text-muted">NIK: {{ $anggota->warga->nik }}</small>
                                        @endif
                                    </td>
                                    <td>{{ $anggota->jabatan->nama_jabatan }}</td>
                                    <td>
                                        @php
                                            $levelClass = 'level-default';
                                            $levelIcon = 'fas fa-star';
                                            switch($anggota->jabatan->level) {
                                                case 'Ketua':
                                                    $levelClass = 'level-ketua';
                                                    $levelIcon = 'fas fa-crown';
                                                    break;
                                                case 'Sekretaris':
                                                    $levelClass = 'level-sekretaris';
                                                    $levelIcon = 'fas fa-pen';
                                                    break;
                                                case 'Bendahara':
                                                    $levelClass = 'level-bendahara';
                                                    $levelIcon = 'fas fa-money-bill';
                                                    break;
                                                case 'Anggota':
                                                    $levelClass = 'level-anggota';
                                                    $levelIcon = 'fas fa-user';
                                                    break;
                                            }
                                        @endphp
                                        <span class="level-badge {{ $levelClass }}">
                                            <i class="{{ $levelIcon }}"></i>
                                            {{ $anggota->jabatan->level }}
                                        </span>
                                    </td>
                                    <td>
                                        <small>
                                            {{ $anggota->tgl_mulai->format('d/m/Y') }}
                                            @if($anggota->tgl_selesai)
                                                <br>s/d<br>
                                                {{ $anggota->tgl_selesai->format('d/m/Y') }}
                                            @else
                                                <br>s/d<br>
                                                <span class="text-success">Sekarang</span>
                                            @endif
                                        </small>
                                    </td>
                                    <td class="text-center">
                                        @if($anggota->tgl_selesai && $anggota->tgl_selesai < now())
                                            <span class="status-badge status-inactive">
                                                <i class="fas fa-times-circle me-1"></i>Tidak Aktif
                                            </span>
                                        @elseif($anggota->tgl_selesai && $anggota->tgl_selesai > now())
                                            <span class="status-badge status-pending">
                                                <i class="fas fa-clock me-1"></i>Akan Berakhir
                                            </span>
                                        @else
                                            <span class="status-badge status-active">
                                                <i class="fas fa-check-circle me-1"></i>Aktif
                                            </span>
                                        @endif
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <!-- Right Column - Stats & Actions -->
        <div class="col-lg-4">
            <!-- Statistics Card -->
            <div class="card glass-card mb-4 fade-in fade-in-delay-1">
                <div class="card-header glass-header">
                    <h5 class="mb-0">
                        <i class="fas fa-chart-bar me-2"></i>Statistik Lembaga
                    </h5>
                </div>
                <div class="card-body">
                    <div class="row g-3 text-center">
                        <div class="col-6">
                            <div class="stats-card">
                                <i class="fas fa-tag text-primary fa-2x"></i>
                                <div class="stats-number">{{ $lembaga->jabatans_count }}</div>
                                <div class="stats-label">Total Jabatan</div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="stats-card">
                                <i class="fas fa-users text-success fa-2x"></i>
                                <div class="stats-number">{{ $lembaga->anggotas_count }}</div>
                                <div class="stats-label">Total Anggota</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Quick Actions Card -->
            <div class="card glass-card mb-4 fade-in fade-in-delay-2">
                <div class="card-header glass-header">
                    <h5 class="mb-0">
                        <i class="fas fa-bolt me-2"></i>Aksi Cepat
                    </h5>
                </div>
                <div class="card-body">
                    <div class="d-grid gap-2">
                        <a href="{{ route('admin.lembaga.jabatan.index', $lembaga->id) }}" 
                           class="btn btn-info btn-glass text-start">
                            <i class="fas fa-tags me-2"></i>Kelola Jabatan
                        </a>
                        <a href="{{ route('admin.lembaga.anggota.index', $lembaga->id) }}" 
                           class="btn btn-success btn-glass text-start">
                            <i class="fas fa-users me-2"></i>Kelola Anggota
                        </a>
                        <a href="{{ route('admin.lembaga.edit', $lembaga->id) }}" 
                           class="btn btn-warning btn-glass text-start">
                            <i class="fas fa-edit me-2"></i>Edit Lembaga
                        </a>
                    </div>
                </div>
            </div>

            <!-- Additional Info Card -->
            <div class="card glass-card fade-in fade-in-delay-3">
                <div class="card-header glass-header">
                    <h5 class="mb-0">
                        <i class="fas fa-history me-2"></i>Informasi Tambahan
                    </h5>
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <small class="text-muted">Dibuat Pada</small>
                        <div class="text-black">
                            <i class="fas fa-calendar-plus me-2"></i>
                            {{ $lembaga->created_at->format('d F Y H:i') }}
                        </div>
                    </div>
                    <div class="mb-3">
                        <small class="text-muted">Terakhir Diupdate</small>
                        <div class="text-black">
                            <i class="fas fa-calendar-check me-2"></i>
                            {{ $lembaga->updated_at->format('d F Y H:i') }}
                        </div>
                    </div>
                    <div>
                        <small class="text-muted">ID Lembaga</small>
                        <div class="text-black">
                            <i class="fas fa-fingerprint me-2"></i>
                            {{ $lembaga->id }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- JavaScript for enhanced interactions -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Add hover effects to table rows
    const tableRows = document.querySelectorAll('.glass-table tbody tr');
    tableRows.forEach(row => {
        row.addEventListener('mouseenter', function() {
            this.style.transform = 'translateX(5px)';
        });
        
        row.addEventListener('mouseleave', function() {
            this.style.transform = 'translateX(0)';
        });
    });

    // Add loading animation to cards
    const cards = document.querySelectorAll('.fade-in');
    cards.forEach((card, index) => {
        card.style.animationDelay = `${(index % 3) * 0.1}s`;
    });

    // Smooth scroll for anchor links
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            e.preventDefault();
            const target = document.querySelector(this.getAttribute('href'));
            if (target) {
                target.scrollIntoView({
                    behavior: 'smooth',
                    block: 'start'
                });
            }
        });
    });

    console.log('Lembaga detail page initialized');
});
</script>
@endsection