<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('admin.dashboard') }}">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-home"></i>
        </div>
        <div class="sidebar-brand-text mx-3">SIPEDES</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('admin.dashboard') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span>
        </a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">Data Master</div>

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
            <i class="fas fa-fw fa-building"></i>
            <span>Lembaga Desa</span>
        </a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>
</ul>