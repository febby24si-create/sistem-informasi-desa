// Enhanced 3D Sidebar Interactions
document.addEventListener('DOMContentLoaded', function() {
    console.log('🚀 Initializing 3D Sidebar...');

    const sidebar = document.getElementById('accordionSidebar');
    const navItems = document.querySelectorAll('.nav-item');
    const sidebarToggle = document.getElementById('sidebarToggle');

    // Create sidebar content wrapper for better organization
    if (!document.querySelector('.sidebar-content')) {
        const contentWrapper = document.createElement('div');
        contentWrapper.className = 'sidebar-content';
        
        // Get all sidebar children except the toggler
        const children = Array.from(sidebar.children);
        const togglerContainer = document.querySelector('.text-center.d-none.d-md-inline');
        
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

    // 3D Hover effects for nav items
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
            }
        });
        
        item.addEventListener('mouseleave', () => {
            if (!item.classList.contains('active')) {
                item.style.transform = 'perspective(500px) rotateX(0) rotateY(0) translateX(0)';
            } else {
                item.style.transform = 'perspective(500px) rotateX(0) rotateY(5deg) translateX(8px)';
            }
        });
    });

    // Enhanced sidebar toggler
    if (sidebarToggle) {
        // Mouse move effect for toggler
        sidebarToggle.addEventListener('mousemove', (e) => {
            if (window.innerWidth > 768) {
                const rect = sidebarToggle.getBoundingClientRect();
                const x = e.clientX - rect.left;
                const y = e.clientY - rect.top;
                
                const centerX = rect.width / 2;
                const centerY = rect.height / 2;
                
                const rotateY = (x - centerX) / 15;
                const rotateX = (centerY - y) / 15;
                
                sidebarToggle.style.transform = `perspective(500px) rotateX(${rotateX}deg) rotateY(${rotateY}deg) scale(1.1)`;
            }
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
                if (!sidebar.classList.contains('toggled')) {
                    this.style.transform = '';
                }
            }, 500);
        });
    }

    // Staggered animation for sidebar items
    const observerOptions = {
        threshold: 0.1,
        rootMargin: '0px 0px -20px 0px'
    };

    const observer = new IntersectionObserver((entries) => {
        entries.forEach((entry) => {
            if (entry.isIntersecting) {
                setTimeout(() => {
                    entry.target.style.opacity = '1';
                    entry.target.style.transform = 'perspective(1000px) rotateX(0) rotateY(0) translateY(0)';
                }, entry.target.style.getPropertyValue('--item-index') * 100);
            }
        });
    }, observerOptions);

    // Initial animation state
    navItems.forEach((item) => {
        item.style.opacity = '0';
        item.style.transform = 'perspective(1000px) rotateX(10deg) rotateY(10deg) translateY(20px)';
        item.style.transition = 'all 0.6s cubic-bezier(0.175, 0.885, 0.32, 1.275)';
        observer.observe(item);
    });

    console.log('✅ 3D Sidebar initialized successfully');
    console.log(`📊 Found ${navItems.length} navigation items`);
});

// Handle sidebar on resize
window.addEventListener('resize', function() {
    const sidebar = document.getElementById('accordionSidebar');
    if (window.innerWidth <= 768) {
        sidebar.classList.add('mobile-mode');
        // Reset transforms for mobile
        const navItems = document.querySelectorAll('.nav-item');
        navItems.forEach(item => {
            if (!item.classList.contains('active')) {
                item.style.transform = '';
            }
        });
    } else {
        sidebar.classList.remove('mobile-mode');
    }
});