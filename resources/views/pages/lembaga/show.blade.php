<!-- resources/views/lembaga/show.blade.php -->
@extends('layouts.admin.app')

@section('title', 'Detail Lembaga Desa')
@section('page_title', 'Detail Lembaga')

@section('content')
<div class="container-fluid py-4">
    <!-- Page Header -->
    <div class="d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center mb-5">
        <div class="mb-3 mb-md-0">
            <h1 class="dashboard-page-title mb-2">
                <i class="fas fa-building me-3"></i>Detail Lembaga Desa
            </h1>
            <p class="text-muted mb-0">Informasi lengkap tentang {{ $lembaga->nama_lembaga }}</p>
        </div>
        <div class="d-flex gap-2">
            <a href="{{ route('admin.lembaga.edit', $lembaga->id) }}" class="btn btn-warning">
                <i class="fas fa-edit me-2"></i>Edit Lembaga
            </a>
            <a href="{{ route('admin.lembaga.index') }}" class="btn btn-secondary">
                <i class="fas fa-arrow-left me-2"></i>Kembali
            </a>
        </div>
    </div>

    <!-- Main Content -->
    <div class="row g-4">
        <!-- Left Column - Lembaga Info -->
        <div class="col-lg-8">
            <!-- Basic Information Card -->
            <div class="card dashboard-card mb-4">
                <div class="card-header">
                    <h6 class="m-0 font-weight-bold text-white">
                        <i class="fas fa-info-circle me-2"></i>Informasi Dasar Lembaga
                    </h6>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="table-responsive">
                                <table class="table table-borderless">
                                    <tbody>
                                        <tr>
                                            <td class="fw-bold text-gray-800" width="35%">Nama Lembaga</td>
                                            <td>
                                                <strong class="text-primary">{{ $lembaga->nama_lembaga }}</strong>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="fw-bold text-gray-800">Deskripsi</td>
                                            <td class="text-justify text-muted">{{ $lembaga->deskripsi }}</td>
                                        </tr>
                                        <tr>
                                            <td class="fw-bold text-gray-800">Kontak</td>
                                            <td>
                                                @if($lembaga->kontak)
                                                    <div class="d-flex align-items-center">
                                                        <i class="fas fa-phone text-info me-2"></i>
                                                        <span class="text-gray-800">{{ $lembaga->kontak }}</span>
                                                    </div>
                                                @else
                                                    <span class="text-muted">-</span>
                                                @endif
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="fw-bold text-gray-800">Status</td>
                                            <td>
                                                <span class="badge {{ $lembaga->status == 'aktif' ? 'badge-success' : 'badge-secondary' }}">
                                                    <i class="fas {{ $lembaga->status == 'aktif' ? 'fa-check-circle' : 'fa-times-circle' }} me-1"></i>
                                                    {{ ucfirst($lembaga->status) }}
                                                </span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="fw-bold text-gray-800">Dibuat Pada</td>
                                            <td class="text-muted">
                                                <i class="fas fa-calendar-plus me-2"></i>
                                                {{ $lembaga->created_at->format('d F Y H:i') }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="fw-bold text-gray-800">Terakhir Diupdate</td>
                                            <td class="text-muted">
                                                <i class="fas fa-calendar-check me-2"></i>
                                                {{ $lembaga->updated_at->format('d F Y H:i') }}
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="col-md-4 text-center">
                            @if($lembaga->logo)
                                <img src="{{ asset('storage/' . $lembaga->logo) }}" 
                                     alt="Logo {{ $lembaga->nama_lembaga }}" 
                                     class="img-fluid rounded shadow-sm mb-3"
                                     style="max-height: 200px; object-fit: cover;">
                            @else
                                <div class="bg-light rounded d-flex align-items-center justify-content-center mb-3" 
                                     style="height: 200px;">
                                    <i class="fas fa-building fa-4x text-muted"></i>
                                </div>
                            @endif
                            <div class="text-muted small">
                                ID: {{ $lembaga->id }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Members Card -->
            <div class="card dashboard-card">
                <div class="card-header">
                    <h6 class="m-0 font-weight-bold text-white">
                        <i class="fas fa-users me-2"></i>Daftar Anggota
                    </h6>
                </div>
                <div class="card-body">
                    @if($lembaga->anggotas->count() > 0)
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th class="border-0">Nama Anggota</th>
                                    <th class="border-0">Jabatan</th>
                                    <th class="border-0">Level</th>
                                    <th class="border-0">Periode</th>
                                    <th class="border-0 text-center">Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($lembaga->anggotas as $anggota)
                                <tr>
                                    <td>
                                        <div>
                                            <strong class="text-gray-800">{{ $anggota->warga->nama }}</strong>
                                            @if($anggota->warga->nik)
                                                <br>
                                                <small class="text-muted">NIK: {{ $anggota->warga->nik }}</small>
                                            @endif
                                        </div>
                                    </td>
                                    <td>
                                        <span class="text-gray-800">{{ $anggota->jabatan->nama_jabatan }}</span>
                                    </td>
                                    <td>
                                        @php
                                            $levelClass = 'badge-info';
                                            switch($anggota->jabatan->level) {
                                                case 'Ketua':
                                                    $levelClass = 'badge-primary';
                                                    break;
                                                case 'Sekretaris':
                                                    $levelClass = 'badge-info';
                                                    break;
                                                case 'Bendahara':
                                                    $levelClass = 'badge-warning';
                                                    break;
                                                case 'Anggota':
                                                    $levelClass = 'badge-secondary';
                                                    break;
                                            }
                                        @endphp
                                        <span class="badge {{ $levelClass }}">
                                            {{ $anggota->jabatan->level }}
                                        </span>
                                    </td>
                                    <td>
                                        <small class="text-muted">
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
                                            <span class="badge badge-danger">
                                                <i class="fas fa-times-circle me-1"></i>Tidak Aktif
                                            </span>
                                        @elseif($anggota->tgl_selesai && $anggota->tgl_selesai > now())
                                            <span class="badge badge-warning">
                                                <i class="fas fa-clock me-1"></i>Akan Berakhir
                                            </span>
                                        @else
                                            <span class="badge badge-success">
                                                <i class="fas fa-check-circle me-1"></i>Aktif
                                            </span>
                                        @endif
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    @else
                    <div class="text-center py-4">
                        <i class="fas fa-users fa-3x text-muted mb-3"></i>
                        <h5 class="text-gray-800 mb-2">Belum Ada Anggota</h5>
                        <p class="text-muted mb-3">Tambahkan anggota untuk lembaga ini</p>
                        <a href="{{ route('admin.lembaga.anggota.index', $lembaga->id) }}" class="btn btn-primary">
                            <i class="fas fa-plus me-2"></i>Tambah Anggota
                        </a>
                    </div>
                    @endif
                </div>
            </div>
        </div>

        <!-- Right Column - Stats & Actions -->
        <div class="col-lg-4">
            <!-- Statistics Card -->
            <div class="card dashboard-card mb-4">
                <div class="card-header">
                    <h6 class="m-0 font-weight-bold text-white">
                        <i class="fas fa-chart-bar me-2"></i>Statistik Lembaga
                    </h6>
                </div>
                <div class="card-body">
                    <div class="row g-3 text-center">
                        <div class="col-6">
                            <div class="border-left-primary p-3 rounded">
                                <i class="fas fa-tag fa-2x text-primary mb-2"></i>
                                <div class="h4 font-weight-bold text-gray-800 mb-1">{{ $lembaga->jabatans_count }}</div>
                                <div class="text-xs font-weight-bold text-primary text-uppercase">Total Jabatan</div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="border-left-success p-3 rounded">
                                <i class="fas fa-users fa-2x text-success mb-2"></i>
                                <div class="h4 font-weight-bold text-gray-800 mb-1">{{ $lembaga->anggotas_count }}</div>
                                <div class="text-xs font-weight-bold text-success text-uppercase">Total Anggota</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Quick Actions Card -->
            <div class="card dashboard-card mb-4">
                <div class="card-header">
                    <h6 class="m-0 font-weight-bold text-white">
                        <i class="fas fa-bolt me-2"></i>Aksi Cepat
                    </h6>
                </div>
                <div class="card-body">
                    <div class="d-grid gap-2">
                        <a href="{{ route('admin.lembaga.jabatan.index', $lembaga->id) }}" 
                           class="btn btn-info text-start">
                            <i class="fas fa-tags me-2"></i>Kelola Jabatan
                        </a>
                        <a href="{{ route('admin.lembaga.anggota.index', $lembaga->id) }}" 
                           class="btn btn-success text-start">
                            <i class="fas fa-users me-2"></i>Kelola Anggota
                        </a>
                        <a href="{{ route('admin.lembaga.edit', $lembaga->id) }}" 
                           class="btn btn-warning text-start">
                            <i class="fas fa-edit me-2"></i>Edit Lembaga
                        </a>
                    </div>
                </div>
            </div>

            <!-- Additional Info Card -->
            <div class="card dashboard-card">
                <div class="card-header">
                    <h6 class="m-0 font-weight-bold text-white">
                        <i class="fas fa-history me-2"></i>Informasi Sistem
                    </h6>
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <small class="text-muted d-block">Dibuat Pada</small>
                        <div class="text-gray-800">
                            <i class="fas fa-calendar-plus me-2"></i>
                            {{ $lembaga->created_at->format('d F Y H:i') }}
                        </div>
                    </div>
                    <div class="mb-3">
                        <small class="text-muted d-block">Terakhir Diupdate</small>
                        <div class="text-gray-800">
                            <i class="fas fa-calendar-check me-2"></i>
                            {{ $lembaga->updated_at->format('d F Y H:i') }}
                        </div>
                    </div>
                    <div>
                        <small class="text-muted d-block">ID Lembaga</small>
                        <div class="text-gray-800">
                            <i class="fas fa-fingerprint me-2"></i>
                            {{ $lembaga->id }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
/* Custom styles for detail page */
.table-borderless td {
    border: none !important;
    padding: 0.75rem 0.5rem !important;
    vertical-align: top !important;
}

.table-borderless tr:not(:last-child) {
    border-bottom: 1px solid #e2e8f0 !important;
}

.border-left-primary,
.border-left-success {
    border-left: 3px solid !important;
    background: linear-gradient(135deg, #f8fafc, #ffffff) !important;
    transition: all var(--transition-speed) ease !important;
}

.border-left-primary:hover,
.border-left-success:hover {
    transform: translateY(-2px) !important;
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1) !important;
}

.text-xs {
    font-size: 0.7rem !important;
    letter-spacing: 0.5px !important;
}

/* Responsive adjustments */
@media (max-width: 768px) {
    .d-flex.gap-2 {
        flex-direction: column !important;
        width: 100% !important;
    }
    
    .d-flex.gap-2 .btn {
        width: 100% !important;
        margin-bottom: 0.5rem !important;
    }
    
    .table-responsive {
        font-size: 0.875rem !important;
    }
    
    .card-body .row.g-3 .col-6 {
        margin-bottom: 1rem !important;
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

.card {
    animation: fadeInUp 0.5s ease forwards !important;
}

.card:nth-child(1) { animation-delay: 0.1s; }
.card:nth-child(2) { animation-delay: 0.2s; }
.card:nth-child(3) { animation-delay: 0.3s; }
.card:nth-child(4) { animation-delay: 0.4s; }

/* Table hover effects */
.table-hover tbody tr {
    transition: all var(--transition-speed) ease !important;
}

.table-hover tbody tr:hover {
    background-color: rgba(59, 130, 246, 0.05) !important;
    transform: translateX(5px) !important;
}

/* Image styling */
.img-fluid.rounded {
    border: 2px solid #e2e8f0 !important;
    transition: all var(--transition-speed) ease !important;
}

.img-fluid.rounded:hover {
    transform: scale(1.02) !important;
    box-shadow: 0 8px 25px rgba(0, 0, 0, 0.15) !important;
}

/* Stats card hover effect */
.border-left-primary:hover {
    border-left-color: var(--primary) !important;
}

.border-left-success:hover {
    border-left-color: var(--secondary) !important;
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Add hover effects to table rows
    const tableRows = document.querySelectorAll('.table-hover tbody tr');
    tableRows.forEach(row => {
        row.addEventListener('mouseenter', function() {
            this.style.transform = 'translateX(5px)';
        });
        
        row.addEventListener('mouseleave', function() {
            this.style.transform = 'translateX(0)';
        });
    });

    // Add loading animation to cards
    const cards = document.querySelectorAll('.card');
    cards.forEach((card, index) => {
        card.style.animationDelay = `${(index % 4) * 0.1}s`;
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