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

    <!-- Nav Item - Lembaga Desa -->
    <li class="nav-item {{ request()->routeIs('admin.lembaga.*') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('admin.lembaga.index') }}">
            <i class="fas fa-fw fa-building"></i>
            <span>Lembaga Desa</span>
        </a>
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
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>

<!-- Sidebar Animation Script -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    const sidebar = document.getElementById('accordionSidebar');
    const navItems = document.querySelectorAll('.nav-item');
    const sidebarToggle = document.getElementById('sidebarToggle');

    // Delay animasi muncul tiap item
    navItems.forEach((item, index) => {
        item.style.animationDelay = `${index * 0.1}s`;
    });

    // Hover effect animasi geser
    navItems.forEach(item => {
        item.addEventListener('mouseenter', () => {
            item.style.transform = 'translateX(8px)';
        });
        item.addEventListener('mouseleave', () => {
            if (!item.classList.contains('active')) {
                item.style.transform = 'translateX(0)';
            }
        });
    });

    // Fungsi toggler sidebar
    if (sidebarToggle) {
        sidebarToggle.addEventListener('click', () => {
            document.body.classList.toggle('sidebar-toggled');
            sidebar.classList.toggle('toggled');
        });
    }
});
</script>
