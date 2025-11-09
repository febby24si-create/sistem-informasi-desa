<<<<<<< HEAD
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('admin.dashboard') }}">
=======
<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
>>>>>>> 8c3c1d42a26caacfcc4638c5d88e7c1d654465bc
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-home"></i>
        </div>
        <div class="sidebar-brand-text mx-3">SIPEDES</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
<<<<<<< HEAD
    <li class="nav-item {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('admin.dashboard') }}">
=======
    <li class="nav-item active">
        <a class="nav-link" href="#">
>>>>>>> 8c3c1d42a26caacfcc4638c5d88e7c1d654465bc
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span>
        </a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">Data Master</div>

<<<<<<< HEAD
        <!-- Nav Item - User Management -->
    <li class="nav-item {{ request()->routeIs('admin.user.*') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('admin.user.index') }}">
            <i class="fas fa-fw fa-user-cog"></i>
            <span> User</span>
        </a>
    </li>
    <!-- Nav Item - Data Warga -->
    <li class="nav-item {{ request()->routeIs('admin.warga.*') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('admin.warga.index') }}">
            <i class="fas fa-fw fa-users"></i>
            <span> Warga</span>
        </a>
    </li>
    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">Sistem</div>
    <!-- Nav Item - Lembaga Desa -->
    <li class="nav-item {{ request()->routeIs('admin.lembaga.*') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('admin.lembaga.index') }}">
=======
    <!-- Nav Item - Data Warga -->
    <li class="nav-item">
        <a class="nav-link" href="#">
            <i class="fas fa-fw fa-users"></i>
            <span>Data Warga</span>
        </a>
    </li>

    <!-- Nav Item - Lembaga Desa -->
    <li class="nav-item">
        <a class="nav-link" href="#">
>>>>>>> 8c3c1d42a26caacfcc4638c5d88e7c1d654465bc
            <i class="fas fa-fw fa-building"></i>
            <span>Lembaga Desa</span>
        </a>
    </li>

    <!-- Divider -->
<<<<<<< HEAD
    <hr class="sidebar-divider d-none d-md-block">

=======
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">Sistem</div>

    <!-- Nav Item - User Management -->
    <li class="nav-item">
        <a class="nav-link" href="#">
            <i class="fas fa-fw fa-user-cog"></i>
            <span>Manajemen User</span>
        </a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Nav Item - Logout -->
    <li class="nav-item">
        <a class="nav-link" href="#" data-toggle="modal" data-target="#logoutModal">
            <i class="fas fa-fw fa-sign-out-alt"></i>
            <span>Logout</span>
        </a>
    </li>

>>>>>>> 8c3c1d42a26caacfcc4638c5d88e7c1d654465bc
    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>
<<<<<<< HEAD
</ul>
=======
</ul>
>>>>>>> 8c3c1d42a26caacfcc4638c5d88e7c1d654465bc
