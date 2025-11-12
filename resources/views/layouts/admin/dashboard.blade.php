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
                            <i class="fas fa-user-plus"></i> Tambah Warga <br>
                        </a>
                        <a href="{{ route('admin.lembaga.create') }}" class="btn btn-success dashboard-btn">
                            <i class="fas fa-plus-circle"></i> Tambah Lembaga <br>
                        </a>
                        <a href="{{ route('admin.user.create') }}" class="btn btn-info dashboard-btn">
                            <i class="fas fa-user-plus"></i> Tambah User <br>
                        </a>
                        @auth
                        {{-- <a href="#" class="btn btn-danger dashboard-btn" data-bs-toggle="modal" data-bs-target="#logoutModal">
                            <i class="fas fa-sign-out-alt"></i> Logout
                        </a> --}}
                        @else
                        <a href="{{ route('login') }}" class="btn btn-primary dashboard-btn">
                            <i class="fas fa-sign-in-alt"></i> Login
                        </a>
                        @endauth
                    </div>
                </div>
            </div>
        </div>
    </div>
<!-- User Session Info - IMPROVED -->
@auth
<div class="row">
    <div class="col-12">
        <div class="card shadow mb-4 user-session-container">
            <div class="card-header py-3 user-session-header">
                <h6 class="m-0 font-weight-bold">
                    <i class="fas fa-user-clock"></i> Informasi Session
                </h6>
            </div>

            <div class="card-body p-0">
                <div class="user-session-grid">
                    <!-- Nama Pengguna -->
                    <div class="user-session-card">
                        <div class="user-session-icon name">
                            <i class="fas fa-user"></i>
                        </div>
                        <div class="user-session-value">
                            {{ Auth::user()->name }}
                        </div>
                        <div class="user-session-label">
                            Nama Pengguna
                        </div>
                    </div>

                    <!-- Email -->
                    <div class="user-session-card">
                        <div class="user-session-icon email">
                            <i class="fas fa-envelope"></i>
                        </div>
                        <div class="user-session-value">
                            {{ Auth::user()->email }}
                        </div>
                        <div class="user-session-label">
                            Email
                        </div>
                    </div>

                    <!-- Role -->
                    <div class="user-session-card">
                        <div class="user-session-icon role">
                            <i class="fas fa-user-tag"></i>
                        </div>
                        <div class="user-session-value">
                            <span class="badge user-session-badge badge-{{ Auth::user()->role == 'admin' ? 'success' : 'info' }}">
                                {{ ucfirst(Auth::user()->role) }}
                            </span>
                        </div>
                        <div class="user-session-label">
                            Role
                        </div>
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
// Enhanced 3D Dashboard Interactions
document.addEventListener('DOMContentLoaded', function() {
    // 3D Card Interactions with Mouse Move
    const cards = document.querySelectorAll('.dashboard-card');
    
    cards.forEach(card => {
        // Mouse move effect for 3D tilt
        card.addEventListener('mousemove', (e) => {
            if (window.innerWidth > 768) { // Only on desktop
                const rect = card.getBoundingClientRect();
                const x = e.clientX - rect.left;
                const y = e.clientY - rect.top;
                
                const centerX = rect.width / 2;
                const centerY = rect.height / 2;
                
                const rotateY = (x - centerX) / 20;
                const rotateX = (centerY - y) / 20;
                
                card.style.transform = `perspective(1000px) rotateX(${rotateX}deg) rotateY(${rotateY}deg) translateY(-8px)`;
                card.style.boxShadow = `0 20px 40px rgba(0, 0, 0, 0.6), 
                                       0 0 30px rgba(59, 130, 246, 0.3)`;
            }
        });
        
        // Reset on mouse leave
        card.addEventListener('mouseleave', () => {
            card.style.transform = 'perspective(1000px) rotateX(0) rotateY(0) translateY(0)';
            card.style.boxShadow = 'var(--shadow-3d)';
        });
    });

    // Enhanced Button Effects
    const buttons = document.querySelectorAll('.dashboard-btn');
    buttons.forEach(btn => {
        btn.addEventListener('mousemove', (e) => {
            const rect = btn.getBoundingClientRect();
            const x = e.clientX - rect.left;
            const y = e.clientY - rect.top;
            
            btn.style.setProperty('--mouse-x', `${x}px`);
            btn.style.setProperty('--mouse-y', `${y}px`);
        });
    });

    // Staggered Animation for Cards on Scroll
    const observerOptions = {
        threshold: 0.1,
        rootMargin: '0px 0px -50px 0px'
    };

    const observer = new IntersectionObserver((entries) => {
        entries.forEach((entry, index) => {
            if (entry.isIntersecting) {
                setTimeout(() => {
                    entry.target.style.opacity = '1';
                    entry.target.style.transform = 'perspective(1000px) rotateX(0) rotateY(0) translateY(0)';
                }, index * 150);
            }
        });
    }, observerOptions);

    // Initial state for animation
    cards.forEach((card, index) => {
        card.style.opacity = '0';
        card.style.transform = 'perspective(1000px) rotateX(10deg) rotateY(10deg) translateY(30px)';
        card.style.transition = 'all 0.6s cubic-bezier(0.175, 0.885, 0.32, 1.275)';
        observer.observe(card);
    });

    // Enhanced Badge Animations
    const badges = document.querySelectorAll('.dashboard-badge');
    badges.forEach(badge => {
        badge.addEventListener('mouseenter', function() {
            this.style.transform = 'translateY(-3px) scale(1.05)';
            this.style.boxShadow = '0 6px 15px rgba(0, 0, 0, 0.3)';
        });
        
        badge.addEventListener('mouseleave', function() {
            this.style.transform = 'translateY(0) scale(1)';
            this.style.boxShadow = '0 4px 8px rgba(0, 0, 0, 0.2)';
        });
    });

    // User Session Items Animation
    const sessionItems = document.querySelectorAll('.user-session-item');
    sessionItems.forEach(item => {
        item.addEventListener('mousemove', (e) => {
            if (window.innerWidth > 768) {
                const rect = item.getBoundingClientRect();
                const x = e.clientX - rect.left;
                const y = e.clientY - rect.top;
                
                const centerX = rect.width / 2;
                const centerY = rect.height / 2;
                
                const rotateY = (x - centerX) / 30;
                const rotateX = (centerY - y) / 30;
                
                item.style.transform = `perspective(1000px) rotateX(${rotateX}deg) rotateY(${rotateY}deg) translateY(-5px) scale(1.02)`;
            }
        });
        
        item.addEventListener('mouseleave', () => {
            item.style.transform = 'translateY(0) scale(1)';
        });
    });

    // Add floating animation to icons
    const icons = document.querySelectorAll('.dashboard-icon');
    icons.forEach(icon => {
        icon.style.animation = 'float3D 3s ease-in-out infinite';
    });

    console.log('3D Dashboard initialized successfully');
});

</script>
@endsection