<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard SIPEDES</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --primary-color: #3498db;
            --secondary-color: #2c3e50;
            --success-color: #28a745;
            --danger-color: #dc3545;
            --warning-color: #ffc107;
            --info-color: #17a2b8;
            --light-color: #f8f9fa;
            --dark-color: #343a40;
        }
        
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f5f7fa;
            margin: 0;
            padding: 20px;
        }
        
        .dashboard-topbar {
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            color: white;
            padding: 0.75rem 1rem;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }
        
        .dashboard-topbar .navbar-nav .nav-link {
            color: rgba(255, 255, 255, 0.85);
            padding: 0.5rem 0.75rem;
            border-radius: 0.375rem;
            transition: all 0.3s ease;
        }
        
        .dashboard-topbar .navbar-nav .nav-link:hover {
            color: white;
            background-color: rgba(255, 255, 255, 0.1);
        }
        
        .dashboard-page-heading h1 {
            color: white;
            font-weight: 600;
            margin-bottom: 0.25rem;
        }
        
        .dashboard-breadcrumb {
            font-size: 0.875rem;
            color: rgba(255, 255, 255, 0.7);
        }
        
        .dashboard-notification-bell,
        .dashboard-messages,
        .dashboard-quick-actions {
            position: relative;
        }
        
        .badge-counter {
            position: absolute;
            top: -5px;
            right: -5px;
            font-size: 0.6rem;
            padding: 0.25rem 0.4rem;
        }
        
        .dashboard-notification-dropdown,
        .dashboard-messages-dropdown,
        .dashboard-quick-actions-dropdown {
            width: 320px;
            border: none;
            border-radius: 0.5rem;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }
        
        .dropdown-header {
            font-weight: 600;
            color: var(--secondary-color);
        }
        
        .dashboard-dropdown-item {
            padding: 0.75rem 1rem;
            transition: all 0.2s ease;
            border-radius: 0.375rem;
            margin: 0.25rem 0.5rem;
            width: auto;
        }
        
        .dashboard-dropdown-item:hover {
            background-color: #f8f9fa;
        }
        
        .dropdown-item-content {
            display: flex;
            align-items: center;
        }
        
        .dropdown-item-icon {
            width: 2.5rem;
            height: 2.5rem;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            margin-right: 0.75rem;
            flex-shrink: 0;
        }
        
        .dropdown-item-avatar {
            width: 2.5rem;
            height: 2.5rem;
            border-radius: 50%;
            overflow: hidden;
            margin-right: 0.75rem;
            flex-shrink: 0;
        }
        
        .dropdown-item-avatar img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
        
        .dropdown-item-text .text-sm {
            font-weight: 500;
            margin-bottom: 0.125rem;
        }
        
        .dropdown-item-text .text-xs {
            font-size: 0.75rem;
        }
        
        .dashboard-user-dropdown {
            display: flex;
            align-items: center;
            padding: 0.375rem 0.75rem;
            border-radius: 0.5rem;
            transition: all 0.3s ease;
        }
        
        .dashboard-user-dropdown:hover {
            background-color: rgba(255, 255, 255, 0.1);
        }
        
        .dashboard-user-avatar {
            font-size: 1.75rem;
            margin-right: 0.5rem;
            color: rgba(255, 255, 255, 0.9);
        }
        
        .dashboard-user-name {
            font-weight: 500;
            margin-right: 0.5rem;
        }
        
        .dashboard-user-role {
            font-size: 0.7rem;
            padding: 0.2rem 0.5rem;
        }
        
        .dropdown-arrow {
            font-size: 0.75rem;
            margin-left: 0.5rem;
            transition: transform 0.3s ease;
        }
        
        .dashboard-user-dropdown[aria-expanded="true"] .dropdown-arrow {
            transform: rotate(180deg);
        }
        
        .dashboard-user-menu {
            width: 280px;
            border: none;
            border-radius: 0.5rem;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }
        
        .dashboard-user-header {
            padding: 1.25rem 1rem;
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            color: white;
            border-radius: 0.5rem 0.5rem 0 0;
            text-align: center;
        }
        
        .dashboard-user-avatar-lg {
            font-size: 3.5rem;
            margin-bottom: 0.75rem;
        }
        
        .user-name {
            font-weight: 600;
            font-size: 1.1rem;
            margin-bottom: 0.25rem;
        }
        
        .user-email {
            font-size: 0.875rem;
            opacity: 0.9;
            margin-bottom: 0.75rem;
        }
        
        .user-status {
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 0.8rem;
        }
        
        .status-indicator {
            width: 8px;
            height: 8px;
            border-radius: 50%;
            margin-right: 0.5rem;
        }
        
        .dashboard-login-btn {
            background-color: rgba(255, 255, 255, 0.15);
            border-radius: 0.375rem;
            padding: 0.5rem 1rem;
            transition: all 0.3s ease;
        }
        
        .dashboard-login-btn:hover {
            background-color: rgba(255, 255, 255, 0.25);
            color: white;
        }
        
        .dashboard-sidebar-toggle {
            color: white;
            font-size: 1.25rem;
            transition: all 0.3s ease;
        }
        
        .dashboard-sidebar-toggle:hover {
            background-color: rgba(255, 255, 255, 0.1);
        }
        
        .theme-toggle-container {
            display: flex;
            align-items: center;
            justify-content: space-between;
        }
        
        .theme-toggle-buttons {
            display: flex;
            gap: 5px;
        }
        
        .btn-theme-toggle {
            width: 30px;
            height: 30px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            background: none;
            border: 1px solid #dee2e6;
            color: #6c757d;
            transition: all 0.2s;
        }
        
        .btn-theme-toggle.active {
            background-color: #3498db;
            border-color: #3498db;
            color: white;
        }
        
        .btn-theme-toggle:hover {
            background-color: #e9ecef;
        }
        
        .btn-theme-toggle.active:hover {
            background-color: #2980b9;
        }
        
        @media (max-width: 768px) {
            .dashboard-user-info {
                display: none !important;
            }
            
            .dashboard-user-dropdown {
                padding: 0.5rem;
            }
            
            .dashboard-notification-dropdown,
            .dashboard-messages-dropdown,
            .dashboard-quick-actions-dropdown {
                width: 280px;
            }
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand navbar-light dashboard-topbar static-top shadow">
        <!-- Sidebar Toggle (Mobile) -->
        <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3 dashboard-sidebar-toggle">
            <i class="fas fa-bars"></i>
        </button>

        <!-- Page Heading -->
        <div class="dashboard-page-heading">
            <h1 class="h3 mb-0 dashboard-page-title">
                <i class="fas fa-home me-2"></i>SIPEDES
            </h1>
            <div class="dashboard-breadcrumb">
                <span>Dashboard</span>
                <i class="fas fa-chevron-right mx-2"></i>
                <span>Beranda</span>
            </div>
        </div>

        <!-- Topbar Navbar -->
        <ul class="navbar-nav ms-auto dashboard-navbar-nav">
            <!-- Quick Actions Dropdown -->
            <li class="nav-item dropdown no-arrow mx-2">
                <a class="nav-link dropdown-toggle dashboard-quick-actions" href="#" role="button"
                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-bolt"></i>
                    <span class="d-none d-lg-inline">Aksi Cepat</span>
                </a>
                <div class="dropdown-menu dropdown-menu-end shadow dashboard-quick-actions-dropdown">
                    <h6 class="dropdown-header dashboard-dropdown-header">
                        <i class="fas fa-rocket me-2"></i>Aksi Cepat
                    </h6>
                    <a class="dropdown-item dashboard-dropdown-item" href="#">
                        <div class="dropdown-item-content">
                            <div class="dropdown-item-icon bg-primary">
                                <i class="fas fa-user-plus"></i>
                            </div>
                            <div class="dropdown-item-text">
                                <div class="text-sm">Tambah Warga</div>
                                <div class="text-xs text-muted">Input data warga baru</div>
                            </div>
                        </div>
                    </a>
                    <a class="dropdown-item dashboard-dropdown-item" href="#">
                        <div class="dropdown-item-content">
                            <div class="dropdown-item-icon bg-success">
                                <i class="fas fa-building"></i>
                            </div>
                            <div class="dropdown-item-text">
                                <div class="text-sm">Tambah Lembaga</div>
                                <div class="text-xs text-muted">Buat lembaga desa baru</div>
                            </div>
                        </div>
                    </a>
                    <a class="dropdown-item dashboard-dropdown-item" href="#">
                        <div class="dropdown-item-content">
                            <div class="dropdown-item-icon bg-info">
                                <i class="fas fa-user-plus"></i>
                            </div>
                            <div class="dropdown-item-text">
                                <div class="text-sm">Tambah User</div>
                                <div class="text-xs text-muted">Buat akun pengguna baru</div>
                            </div>
                        </div>
                    </a>
                    <a class="dropdown-item dashboard-dropdown-item" href="#">
                        <div class="dropdown-item-content">
                            <div class="dropdown-item-icon bg-warning">
                                <i class="fas fa-file-export"></i>
                            </div>
                            <div class="dropdown-item-text">
                                <div class="text-sm">Ekspor Data</div>
                                <div class="text-xs text-muted">Download laporan sistem</div>
                            </div>
                        </div>
                    </a>
                    <div class="dropdown-divider dashboard-dropdown-divider"></div>
                    <a class="dropdown-item dashboard-dropdown-item text-center" href="#">
                        <i class="fas fa-plus-circle me-2"></i>Lihat Semua Aksi
                    </a>
                </div>
            </li>

            <!-- Notification Bell -->
            <li class="nav-item dropdown no-arrow mx-2">
                <a class="nav-link dropdown-toggle dashboard-notification-bell" href="#" role="button"
                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-bell"></i>
                    <span class="badge bg-danger badge-counter">5</span>
                </a>
                <div class="dropdown-menu dropdown-menu-end shadow dashboard-notification-dropdown">
                    <h6 class="dropdown-header dashboard-dropdown-header">
                        <i class="fas fa-bell me-2"></i>Notifikasi
                        <span class="badge bg-primary rounded-pill ms-2">5 baru</span>
                    </h6>
                    <a class="dropdown-item dashboard-dropdown-item" href="#">
                        <div class="dropdown-item-content">
                            <div class="dropdown-item-icon bg-primary">
                                <i class="fas fa-user-plus"></i>
                            </div>
                            <div class="dropdown-item-text">
                                <div class="text-sm">User baru terdaftar</div>
                                <div class="text-xs text-muted">5 menit yang lalu</div>
                            </div>
                        </div>
                    </a>
                    <a class="dropdown-item dashboard-dropdown-item" href="#">
                        <div class="dropdown-item-content">
                            <div class="dropdown-item-icon bg-success">
                                <i class="fas fa-database"></i>
                            </div>
                            <div class="dropdown-item-text">
                                <div class="text-sm">Backup database berhasil</div>
                                <div class="text-xs text-muted">1 jam yang lalu</div>
                            </div>
                        </div>
                    </a>
                    <a class="dropdown-item dashboard-dropdown-item" href="#">
                        <div class="dropdown-item-content">
                            <div class="dropdown-item-icon bg-warning">
                                <i class="fas fa-exclamation-triangle"></i>
                            </div>
                            <div class="dropdown-item-text">
                                <div class="text-sm">Peringatan sistem</div>
                                <div class="text-xs text-muted">2 jam yang lalu</div>
                            </div>
                        </div>
                    </a>
                    <a class="dropdown-item dashboard-dropdown-item" href="#">
                        <div class="dropdown-item-content">
                            <div class="dropdown-item-icon bg-info">
                                <i class="fas fa-chart-line"></i>
                            </div>
                            <div class="dropdown-item-text">
                                <div class="text-sm">Laporan bulanan siap</div>
                                <div class="text-xs text-muted">Hari ini</div>
                            </div>
                        </div>
                    </a>
                    <div class="dropdown-divider dashboard-dropdown-divider"></div>
                    <a class="dropdown-item dashboard-dropdown-item text-center" href="#">
                        <i class="fas fa-eye me-2"></i>Lihat Semua Notifikasi
                    </a>
                </div>
            </li>

            <!-- Messages Dropdown -->
            <li class="nav-item dropdown no-arrow mx-2">
                <a class="nav-link dropdown-toggle dashboard-messages" href="#" role="button"
                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-envelope"></i>
                    <span class="badge bg-success badge-counter">2</span>
                </a>
                <div class="dropdown-menu dropdown-menu-end shadow dashboard-messages-dropdown">
                    <h6 class="dropdown-header dashboard-dropdown-header">
                        <i class="fas fa-envelope me-2"></i>Pesan
                        <span class="badge bg-success rounded-pill ms-2">2 baru</span>
                    </h6>
                    <a class="dropdown-item dashboard-dropdown-item" href="#">
                        <div class="dropdown-item-content">
                            <div class="dropdown-item-avatar">
                                <img class="rounded-circle" src="https://ui-avatars.com/api/?name=Warga+Desa&background=0D8ABC&color=fff" alt="Avatar">
                            </div>
                            <div class="dropdown-item-text">
                                <div class="text-sm">Warga Desa</div>
                                <div class="text-xs text-muted">Permohonan surat pengantar...</div>
                                <div class="text-xs text-muted">10 menit yang lalu</div>
                            </div>
                        </div>
                    </a>
                    <a class="dropdown-item dashboard-dropdown-item" href="#">
                        <div class="dropdown-item-content">
                            <div class="dropdown-item-avatar">
                                <img class="rounded-circle" src="https://ui-avatars.com/api/?name=Admin+Kelurahan&background=28a745&color=fff" alt="Avatar">
                            </div>
                            <div class="dropdown-item-text">
                                <div class="text-sm">Admin Kelurahan</div>
                                <div class="text-xs text-muted">Koordinasi kegiatan desa...</div>
                                <div class="text-xs text-muted">1 jam yang lalu</div>
                            </div>
                        </div>
                    </a>
                    <div class="dropdown-divider dashboard-dropdown-divider"></div>
                    <a class="dropdown-item dashboard-dropdown-item text-center" href="#">
                        <i class="fas fa-comments me-2"></i>Lihat Semua Pesan
                    </a>
                </div>
            </li>

            <!-- User Information -->
            <li class="nav-item dropdown no-arrow dashboard-user-dropdown-container">
                <a class="nav-link dropdown-toggle dashboard-user-dropdown" href="#" id="userDropdown" role="button"
                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <div class="dashboard-user-avatar">
                        <i class="fas fa-user-circle"></i>
                    </div>
                    <div class="dashboard-user-info d-none d-lg-inline">
                        <span class="dashboard-user-name">Admin SIPEDES</span>
                        <span class="dashboard-user-role badge bg-success">Administrator</span>
                    </div>
                    <i class="fas fa-chevron-down dropdown-arrow"></i>
                </a>
                <!-- Dropdown - User Information -->
                <div class="dropdown-menu dropdown-menu-end shadow dashboard-user-menu" aria-labelledby="userDropdown">
                    <!-- User Header -->
                    <div class="dropdown-header dashboard-user-header">
                        <div class="dashboard-user-avatar-lg">
                            <i class="fas fa-user-circle"></i>
                        </div>
                        <div class="dashboard-user-details">
                            <div class="user-name">Admin SIPEDES</div>
                            <div class="user-email">admin@sipedes.id</div>
                            <div class="user-status">
                                <span class="status-indicator bg-success"></span>
                                <span class="status-text">Online</span>
                            </div>
                        </div>
                    </div>
                    
                    <div class="dropdown-divider dashboard-dropdown-divider"></div>
                    
                    <!-- Menu Items -->
                    <a class="dropdown-item dashboard-dropdown-item" href="#">
                        <i class="fas fa-user fa-sm fa-fw me-2"></i>
                        <span>Profil Saya</span>
                    </a>
                    <a class="dropdown-item dashboard-dropdown-item" href="#">
                        <i class="fas fa-cog fa-sm fa-fw me-2"></i>
                        <span>Pengaturan Akun</span>
                    </a>
                    <a class="dropdown-item dashboard-dropdown-item" href="#">
                        <i class="fas fa-history fa-sm fa-fw me-2"></i>
                        <span>Riwayat Aktivitas</span>
                    </a>
                    
                    <div class="dropdown-divider dashboard-dropdown-divider"></div>
                    
                    <a class="dropdown-item dashboard-dropdown-item" href="#">
                        <i class="fas fa-question-circle fa-sm fa-fw me-2"></i>
                        <span>Pusat Bantuan</span>
                    </a>
                    <a class="dropdown-item dashboard-dropdown-item" href="#">
                        <i class="fas fa-comments fa-sm fa-fw me-2"></i>
                        <span>Umpan Balik</span>
                    </a>
                    <a class="dropdown-item dashboard-dropdown-item" href="#">
                        <i class="fas fa-info-circle fa-sm fa-fw me-2"></i>
                        <span>Tentang SIPEDES</span>
                    </a>
                    
                    <div class="dropdown-divider dashboard-dropdown-divider"></div>
                    
                    <!-- Theme Toggle -->
                    <div class="dropdown-item dashboard-dropdown-item theme-toggle-container">
                        <i class="fas fa-palette fa-sm fa-fw me-2"></i>
                        <span class="me-3">Tema</span>
                        <div class="theme-toggle-buttons">
                            <button class="btn-theme-toggle active" data-theme="light">
                                <i class="fas fa-sun"></i>
                            </button>
                            <button class="btn-theme-toggle" data-theme="dark">
                                <i class="fas fa-moon"></i>
                            </button>
                            <button class="btn-theme-toggle" data-theme="auto">
                                <i class="fas fa-adjust"></i>
                            </button>
                        </div>
                    </div>
                    
                    <div class="dropdown-divider dashboard-dropdown-divider"></div>
                    
                    <a class="dropdown-item dashboard-dropdown-item" href="#">
                        <i class="fas fa-sign-out-alt fa-sm fa-fw me-2"></i>
                        <span>Logout</span>
                    </a>
                </div>
            </li>
        </ul>
    </nav>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Menambahkan interaksi sederhana untuk dropdown
        document.addEventListener('DOMContentLoaded', function() {
            // Animasi untuk dropdown user
            const userDropdown = document.getElementById('userDropdown');
            if (userDropdown) {
                userDropdown.addEventListener('show.bs.dropdown', function () {
                    this.querySelector('.dropdown-arrow').style.transform = 'rotate(180deg)';
                });
                
                userDropdown.addEventListener('hide.bs.dropdown', function () {
                    this.querySelector('.dropdown-arrow').style.transform = 'rotate(0deg)';
                });
            }
            
            // Sidebar toggle untuk mobile
            const sidebarToggle = document.getElementById('sidebarToggleTop');
            if (sidebarToggle) {
                sidebarToggle.addEventListener('click', function() {
                    alert('Sidebar akan ditampilkan/disembunyikan di sini');
                });
            }
            
            // Theme toggle functionality
            const themeButtons = document.querySelectorAll('.btn-theme-toggle');
            
            themeButtons.forEach(button => {
                button.addEventListener('click', function() {
                    // Remove active class from all buttons
                    themeButtons.forEach(btn => btn.classList.remove('active'));
                    
                    // Add active class to clicked button
                    this.classList.add('active');
                    
                    // Get the theme from data attribute
                    const theme = this.getAttribute('data-theme');
                    
                    // Apply theme (this is just a placeholder - implement actual theme switching as needed)
                    console.log('Theme changed to:', theme);
                    
                    // You would typically save this preference to localStorage and apply CSS classes
                    // For now, we'll just show an alert
                    alert(`Tema diubah ke: ${theme === 'light' ? 'Terang' : theme === 'dark' ? 'Gelap' : 'Otomatis'}`);
                });
            });
            
            // Enhanced dropdown interactions
            const dropdownToggles = document.querySelectorAll('.dropdown-toggle');
            
            dropdownToggles.forEach(toggle => {
                toggle.addEventListener('click', function() {
                    // Close other dropdowns when one is opened
                    dropdownToggles.forEach(otherToggle => {
                        if (otherToggle !== this) {
                            const dropdown = bootstrap.Dropdown.getInstance(otherToggle);
                            if (dropdown) {
                                dropdown.hide();
                            }
                        }
                    });
                });
            });
        });
    </script>
</body>
</html>