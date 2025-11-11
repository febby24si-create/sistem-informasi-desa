@extends('layouts.admin.app')

@section('title', 'Dashboard')
@section('page_title', 'Dashboard SIPEDES')

@section('styles')
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
<link href="{{ asset('css/dashboard.css') }}" rel="stylesheet">
@endsection

@section('content')
<div class="container-fluid dashboard-body">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 dashboard-header">
            <i class="fas fa-tachometer-alt"></i> Dashboard
        </h1>
        <div>
            @auth
            <a href="#" class="btn btn-danger btn-sm dashboard-btn" data-bs-toggle="modal" data-bs-target="#logoutModal">
                <i class="fas fa-sign-out-alt"></i> Logout
            </a>
            @else
            <a href="{{ route('login') }}" class="btn btn-primary btn-sm dashboard-btn">
                <i class="fas fa-sign-in-alt"></i> Login
            </a>
            @endauth
        </div>
    </div>

    <!-- Content Row -->
    <div class="row">
        <!-- Total Warga Card -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2 dashboard-card">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-dashboard-primary text-uppercase mb-1">
                                Total Warga</div>
                            <div class="h5 mb-0 font-weight-bold dashboard-text-primary">{{ $totalWarga }}</div>
                            <div class="mt-2">
                                <span class="badge badge-primary dashboard-badge">
                                    <i class="fas fa-male"></i> Laki-laki: {{ App\Models\Warga::where('jenis_kelamin', 'Laki-laki')->count() }}
                                </span>
                                <span class="badge badge-pink dashboard-badge mt-1">
                                    <i class="fas fa-female"></i> Perempuan: {{ App\Models\Warga::where('jenis_kelamin', 'Perempuan')->count() }}
                                </span>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-users fa-2x dashboard-icon"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Lembaga Desa Card -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2 dashboard-card">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-dashboard-success text-uppercase mb-1">
                                Lembaga Desa</div>
                            <div class="h5 mb-0 font-weight-bold dashboard-text-primary">{{ $totalLembaga }}</div>
                            <div class="mt-2">
                                @php
                                    $totalAnggota = App\Models\AnggotaLembaga::count();
                                @endphp
                                <span class="badge badge-success dashboard-badge">
                                    <i class="fas fa-users"></i> Total Anggota: {{ $totalAnggota }}
                                </span>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-building fa-2x dashboard-icon"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- RW Card -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2 dashboard-card">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-dashboard-info text-uppercase mb-1">
                                RW</div>
                            <div class="h5 mb-0 font-weight-bold dashboard-text-primary">{{ $totalRw }}</div>
                            <div class="mt-2">
                                <span class="badge badge-info dashboard-badge">
                                    <i class="fas fa-map-marker-alt"></i> Wilayah Tercover
                                </span>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-map-signs fa-2x dashboard-icon"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- RT Card -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2 dashboard-card">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-dashboard-warning text-uppercase mb-1">
                                RT</div>
                            <div class="h5 mb-0 font-weight-bold dashboard-text-primary">{{ $totalRt }}</div>
                            <div class="mt-2">
                                <span class="badge badge-warning dashboard-badge">
                                    <i class="fas fa-home"></i> Unit Terkecil
                                </span>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-map-marker-alt fa-2x dashboard-icon"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Quick Actions -->
    <div class="row">
        <div class="col-lg-6 mb-4">
            <div class="card shadow mb-4 dashboard-card">
                <div class="card-header py-3 dashboard-card-header">
                    <h4 class="m-0 font-weight-bold">
                        <i class="fas fa-bolt"></i> Aksi Cepat
                    </h4>
                </div>
                <div class="card-body">
                    <div class="quick-actions-grid">
                        <a href="{{ route('admin.warga.create') }}" class="btn btn-primary dashboard-btn">
                            <i class="fas fa-user-plus"></i> Tambah Warga
                        </a>
                        <a href="{{ route('admin.lembaga.create') }}" class="btn btn-success dashboard-btn">
                            <i class="fas fa-plus-circle"></i> Tambah Lembaga
                        </a>
                        <a href="{{ route('admin.user.create') }}" class="btn btn-info dashboard-btn">
                            <i class="fas fa-user-plus"></i> Tambah User
                        </a>
                        @auth
                        <a href="#" class="btn btn-danger dashboard-btn" data-bs-toggle="modal" data-bs-target="#logoutModal">
                            <i class="fas fa-sign-out-alt"></i> Logout
                        </a>
                        @else
                        <a href="{{ route('login') }}" class="btn btn-primary dashboard-btn">
                            <i class="fas fa-sign-in-alt"></i> Login
                        </a>
                        @endauth
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-6 mb-4">
            <div class="card shadow mb-4 dashboard-card">
                <div class="card-header py-3 dashboard-card-header">
                    <h6 class="m-0 font-weight-bold">
                        <i class="fas fa-info-circle"></i> Informasi Sistem
                    </h6>
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <span class="badge badge-success dashboard-badge mr-2">Aktif</span>
                        <span class="badge badge-warning dashboard-badge mr-2">Akan Berakhir</span>
                        <span class="badge badge-danger dashboard-badge mr-2">Tidak Aktif</span>
                    </div>
                    <div class="mb-3">
                        <span class="badge badge-primary dashboard-badge mr-2">Laki-laki</span>
                        <span class="badge badge-pink dashboard-badge mr-2">Perempuan</span>
                        <span class="badge badge-secondary dashboard-badge mr-2">Anggota</span>
                    </div>
                    <div>
                        <span class="badge badge-success dashboard-badge mr-2">Ketua</span>
                        <span class="badge badge-info dashboard-badge mr-2">Sekretaris</span>
                        <span class="badge badge-warning dashboard-badge mr-2">Bendahara</span>
                    </div>
                    <hr>
                    <div class="text-center">
                        <p class="mb-1"><strong>Login sebagai:</strong></p>
                        @auth
                        <span class="badge badge-{{ Auth::user()->role == 'admin' ? 'success' : 'info' }} dashboard-badge">
                            <i class="fas fa-user"></i> 
                            {{ Auth::user()->name }} ({{ Auth::user()->role }})
                        </span>
                        @else
                        <span class="badge badge-warning dashboard-badge">
                            <i class="fas fa-user"></i> 
                            Belum Login
                        </span>
                        @endauth
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- User Session Info -->
    @auth
    <div class="row">
        <div class="col-12">
            <div class="card shadow mb-4 dashboard-card">
                <div class="card-header py-3 dashboard-card-header">
                    <h6 class="m-0 font-weight-bold">
                        <i class="fas fa-user-clock"></i> Informasi Session
                    </h6>
                </div>
                <div class="card-body">
                    <div class="row text-center">
                        <div class="col-md-4 user-session-item">
                            <div class="user-session-value">{{ Auth::user()->name }}</div>
                            <div class="user-session-label">Nama Pengguna</div>
                        </div>
                        <div class="col-md-4 user-session-item">
                            <div class="user-session-value">{{ Auth::user()->email }}</div>
                            <div class="user-session-label">Email</div>
                        </div>
                        <div class="col-md-4 user-session-item">
                            <div class="user-session-value">
                                <span class="badge badge-{{ Auth::user()->role == 'admin' ? 'success' : 'info' }} dashboard-badge">
                                    {{ Auth::user()->role }}
                                </span>
                            </div>
                            <div class="user-session-label">Role</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endauth
</div>
@endsection

@section('scripts')
<script>
// JavaScript untuk interaksi dashboard
document.addEventListener('DOMContentLoaded', function() {
    // Animasi untuk cards saat scroll
    const cards = document.querySelectorAll('.dashboard-card');
    
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.style.opacity = '1';
                entry.target.style.transform = 'translateY(0)';
            }
        });
    }, { threshold: 0.1 });

    cards.forEach(card => {
        card.style.opacity = '0';
        card.style.transform = 'translateY(20px)';
        card.style.transition = 'all 0.6s ease-out';
        observer.observe(card);
    });

    // Efek hover untuk badges
    const badges = document.querySelectorAll('.dashboard-badge');
    badges.forEach(badge => {
        badge.addEventListener('mouseenter', function() {
            this.style.transform = 'translateY(-2px)';
        });
        
        badge.addEventListener('mouseleave', function() {
            this.style.transform = 'translateY(0)';
        });
    });
});
</script>
@endsection