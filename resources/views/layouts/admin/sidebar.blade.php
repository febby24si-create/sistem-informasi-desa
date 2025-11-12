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

<!-- Enhanced Sidebar Animation Script -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    console.log('🚀 Initializing Enhanced 3D Sidebar...');

    const sidebar = document.getElementById('accordionSidebar');
    const navItems = document.querySelectorAll('.nav-item');
    const sidebarToggle = document.getElementById('sidebarToggle');
    const headings = document.querySelectorAll('.sidebar-heading');
    const dividers = document.querySelectorAll('.sidebar-divider');

    // Create sidebar content wrapper for better scroll management
    if (!document.querySelector('.sidebar-content')) {
        const contentWrapper = document.createElement('div');
        contentWrapper.className = 'sidebar-content';
        
        // Get all elements except the toggler
        const children = Array.from(sidebar.children);
        const togglerContainer = sidebar.querySelector('#sidebarToggle')?.closest('.text-center');
        
        children.forEach(child => {
            if (child !== togglerContainer) {
                contentWrapper.appendChild(child);
            }
        });
        
        // Append content wrapper and then toggler
        sidebar.appendChild(contentWrapper);
        if (togglerContainer) {
            sidebar.appendChild(togglerContainer);
        }
    }

    // Staggered animation for all sidebar elements
    const sidebarElements = [...navItems, ...headings, ...dividers];
    
    sidebarElements.forEach((element, index) => {
        // Set initial state for animation
        element.style.opacity = '0';
        element.style.transform = 'perspective(1000px) rotateX(10deg) translateY(20px)';
        element.style.transition = `all 0.6s cubic-bezier(0.175, 0.885, 0.32, 1.275) ${index * 0.1}s`;
        
        // Animate in when element comes into view
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.style.opacity = '1';
                    entry.target.style.transform = 'perspective(1000px) rotateX(0) translateY(0)';
                }
            });
        }, { threshold: 0.1 });

        observer.observe(element);
    });

    // Enhanced 3D Hover effects for nav items
    navItems.forEach((item, index) => {
        item.style.setProperty('--item-index', index);
        
        // Mouse move 3D effect
        item.addEventListener('mousemove', (e) => {
            if (window.innerWidth > 768) {
                const rect = item.getBoundingClientRect();
                const x = e.clientX - rect.left;
                const y = e.clientY - rect.top;
                
                const centerX = rect.width / 2;
                const centerY = rect.height / 2;
                
                const rotateY = (x - centerX) / 20;
                const rotateX = (centerY - y) / 20;
                
                item.style.transform = `perspective(500px) rotateX(${rotateX}deg) rotateY(${rotateY}deg) translateX(8px)`;
                item.style.zIndex = '10';
            }
        });
        
        item.addEventListener('mouseleave', () => {
            if (!item.classList.contains('active')) {
                item.style.transform = 'perspective(500px) rotateX(0) rotateY(0) translateX(0)';
            } else {
                item.style.transform = 'perspective(500px) rotateX(0) rotateY(5deg) translateX(8px)';
            }
            item.style.zIndex = '';
        });

        // Enhanced click feedback
        item.addEventListener('click', function() {
            // Add temporary active feedback
            this.style.transform = 'perspective(500px) rotateX(5deg) rotateY(5deg) translateX(8px) scale(0.98)';
            setTimeout(() => {
                if (this.classList.contains('active')) {
                    this.style.transform = 'perspective(500px) rotateX(0) rotateY(5deg) translateX(8px)';
                }
            }, 300);
        });
    });

    // Enhanced sidebar toggler with 3D effects
    if (sidebarToggle) {
        // Mouse move effect for toggler
        sidebarToggle.addEventListener('mousemove', (e) => {
            const rect = sidebarToggle.getBoundingClientRect();
            const x = e.clientX - rect.left;
            const y = e.clientY - rect.top;
            
            const centerX = rect.width / 2;
            const centerY = rect.height / 2;
            
            const rotateY = (x - centerX) / 10;
            const rotateX = (centerY - y) / 10;
            
            sidebarToggle.style.transform = `perspective(500px) rotateX(${rotateX}deg) rotateY(${rotateY}deg) scale(1.1)`;
        });
        
        sidebarToggle.addEventListener('mouseleave', () => {
            sidebarToggle.style.transform = 'perspective(500px) rotateX(0) rotateY(0) scale(1)';
        });

        // Click handler
        sidebarToggle.addEventListener('click', function() {
            document.body.classList.toggle('sidebar-toggled');
            sidebar.classList.toggle('toggled');
            
            // Add 3D effect when toggling
            if (sidebar.classList.contains('toggled')) {
                sidebar.style.transform = 'perspective(1000px) rotateY(-8deg)';
                this.style.transform = 'perspective(500px) rotateY(180deg) scale(1.1)';
            } else {
                sidebar.style.transform = 'perspective(1000px) rotateY(0)';
                this.style.transform = 'perspective(500px) rotateY(0) scale(1)';
            }
            
            // Reset transform after animation
            setTimeout(() => {
                this.style.transform = '';
            }, 500);
        });
    }

    // Heading hover effects
    headings.forEach(heading => {
        heading.addEventListener('mouseenter', function() {
            if (window.innerWidth > 768) {
                this.style.transform = 'perspective(500px) translateX(5px) rotateY(5deg)';
                this.style.color = '#cbd5e1 !important';
            }
        });
        
        heading.addEventListener('mouseleave', function() {
            if (window.innerWidth > 768) {
                this.style.transform = 'perspective(500px) translateX(0) rotateY(0)';
                this.style.color = '#94a3b8 !important';
            }
        });
    });

    // Handle window resize
    function handleResize() {
        if (window.innerWidth <= 768) {
            sidebar.classList.add('mobile-mode');
            // Reset transforms for mobile
            navItems.forEach(item => {
                item.style.transform = '';
            });
        } else {
            sidebar.classList.remove('mobile-mode');
        }
    }

    // Initial check and listener
    handleResize();
    window.addEventListener('resize', handleResize);

    // Add performance optimization
    sidebar.style.willChange = 'transform';
    navItems.forEach(item => {
        item.style.willChange = 'transform';
    });

    console.log('✅ Enhanced 3D Sidebar initialized successfully');
    console.log(`📊 Found ${navItems.length} nav items, ${headings.length} headings, ${dividers.length} dividers`);
});

// Additional utility function for smooth scrolling (if needed)
function smoothScrollTo(targetId) {
    const target = document.querySelector(targetId);
    if (target) {
        target.scrollIntoView({
            behavior: 'smooth',
            block: 'start'
        });
    }
}
</script>