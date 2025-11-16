<ul class="navbar-nav bg-gradient-dark sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('admin.dashboard') }}">
        <div class="sidebar-brand-icon">
            <i class="fas fa-city"></i>
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
    <div class="sidebar-heading">
        <i class="fas fa-cogs me-2"></i> Sistem
    </div>

    <!-- Nav Item - Perangkat Desa - BARU -->
    <li class="nav-item {{ request()->routeIs('admin.perangkat_desa.*') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('admin.perangkat_desa.index') }}">
            <i class="fas fa-fw fa-user-tie"></i>
            <span>Perangkat Desa</span>
        </a>
    </li>

    <!-- Nav Item - Lembaga Desa -->
    <li class="nav-item {{ request()->routeIs('admin.lembaga.*') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('admin.lembaga.index') }}">
            <i class="fas fa-fw fa-building"></i>
            <span>Lembaga Desa</span>
        </a>
    </li>

    <!-- Nav Item - RW/RT - BARU -->
    <li class="nav-item {{ request()->routeIs('admin.rw.*') || request()->routeIs('admin.rt.*') ? 'active' : '' }}">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseWilayah" 
           aria-expanded="true" aria-controls="collapseWilayah">
            <i class="fas fa-fw fa-map"></i>
            <span>Wilayah</span>
        </a>
        <div id="collapseWilayah" class="collapse {{ request()->routeIs('admin.rw.*') || request()->routeIs('admin.rt.*') ? 'show' : '' }}" 
             data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item {{ request()->routeIs('admin.rw.*') ? 'active' : '' }}" 
                   href="{{ route('admin.rw.index') }}">Data RW</a>
                <a class="collapse-item {{ request()->routeIs('admin.rt.*') ? 'active' : '' }}" 
                   href="{{ route('admin.rt.index') }}">Data RT</a>
            </div>
        </div>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        <i class="fas fa-database me-2"></i> Master Data
    </div>

    <!-- Nav Item - Manajemen User -->
    <li class="nav-item {{ request()->routeIs('admin.user.*') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('admin.user.index') }}">
            <i class="fas fa-fw fa-user-cog"></i>
            <span>Manajemen User</span>
        </a>
    </li>

    <!-- Nav Item - Data Warga -->
    <li class="nav-item {{ request()->routeIs('admin.warga.*') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('admin.warga.index') }}">
            <i class="fas fa-fw fa-users"></i>
            <span>Data Warga</span>
        </a>
    </li>

    <!-- Sidebar Toggler -->
    <div class="text-center d-none d-md-inline sidebar-toggle-wrapper">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>
</ul>