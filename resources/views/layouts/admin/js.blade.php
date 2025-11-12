<!-- jQuery (wajib pertama) -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- Bootstrap Bundle (sudah termasuk Popper.js) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<!-- jQuery Easing -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>

<!-- SB Admin 2 JS -->
<script src="https://cdn.jsdelivr.net/npm/startbootstrap-sb-admin-2@4.1.4/js/sb-admin-2.min.js"></script>

<!-- Sidebar 3D Script -->
<script>
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
        // Enhanced Topbar Interactions
document.addEventListener('DOMContentLoaded', function() {
    console.log('🚀 Initializing Enhanced Topbar...');

    const topbar = document.querySelector('.dashboard-topbar');
    const userDropdown = document.getElementById('userDropdown');
    const sidebarToggleTop = document.getElementById('sidebarToggleTop');

    // 3D Effect untuk Topbar pada scroll
    let lastScrollY = window.scrollY;
    
    window.addEventListener('scroll', () => {
        if (window.scrollY > lastScrollY && window.scrollY > 100) {
            // Scroll down
            topbar.style.transform = 'translateY(-100%)';
            topbar.style.opacity = '0.9';
        } else {
            // Scroll up
            topbar.style.transform = 'translateY(0)';
            topbar.style.opacity = '1';
        }
        lastScrollY = window.scrollY;
    });

    // Enhanced dropdown interactions
    if (userDropdown) {
        userDropdown.addEventListener('mouseenter', function() {
            const dropdownMenu = this.nextElementSibling;
            if (dropdownMenu) {
                dropdownMenu.style.opacity = '0';
                dropdownMenu.style.transform = 'perspective(1000px) rotateX(-10deg) translateY(-10px)';
                dropdownMenu.classList.add('show');
                
                setTimeout(() => {
                    dropdownMenu.style.opacity = '1';
                    dropdownMenu.style.transform = 'perspective(1000px) rotateX(0) translateY(0)';
                }, 10);
            }
        });

        // Mouse move effect untuk dropdown trigger
        userDropdown.addEventListener('mousemove', (e) => {
            if (window.innerWidth > 768) {
                const rect = userDropdown.getBoundingClientRect();
                const x = e.clientX - rect.left;
                const y = e.clientY - rect.top;
                
                const centerX = rect.width / 2;
                const centerY = rect.height / 2;
                
                const rotateY = (x - centerX) / 30;
                const rotateX = (centerY - y) / 30;
                
                userDropdown.style.transform = `perspective(500px) rotateX(${rotateX}deg) rotateY(${rotateY}deg) translateY(-2px)`;
            }
        });
        
        userDropdown.addEventListener('mouseleave', () => {
            userDropdown.style.transform = 'perspective(500px) rotateX(0) rotateY(0) translateY(0)';
        });
    }

    // Enhanced sidebar toggle untuk mobile
    if (sidebarToggleTop) {
        sidebarToggleTop.addEventListener('click', function(e) {
            e.preventDefault();
            document.body.classList.toggle('sidebar-toggled');
            document.getElementById('accordionSidebar').classList.toggle('toggled');
            
            // Add rotation effect
            this.style.transform = 'rotate(90deg)';
            setTimeout(() => {
                this.style.transform = '';
            }, 300);
        });

        // Hover effect untuk mobile toggle
        sidebarToggleTop.addEventListener('mouseenter', function() {
            if (window.innerWidth <= 768) {
                this.style.transform = 'scale(1.2) rotate(45deg)';
            }
        });
        
        sidebarToggleTop.addEventListener('mouseleave', function() {
            if (window.innerWidth <= 768 && !document.body.classList.contains('sidebar-toggled')) {
                this.style.transform = '';
            }
        });
    }

    // Dropdown items animation
    const dropdownItems = document.querySelectorAll('.dashboard-dropdown-item');
    dropdownItems.forEach((item, index) => {
        item.style.transitionDelay = `${index * 0.05}s`;
        
        item.addEventListener('mouseenter', function() {
            this.style.transform = 'translateX(8px) perspective(500px) rotateY(8deg)';
        });
        
        item.addEventListener('mouseleave', function() {
            this.style.transform = 'translateX(0) perspective(500px) rotateY(0)';
        });
    });

    console.log('✅ Enhanced Topbar initialized successfully');
});

// Handle dropdown close dengan animation
document.addEventListener('click', function(e) {
    const openDropdowns = document.querySelectorAll('.dashboard-dropdown.show');
    openDropdowns.forEach(dropdown => {
        if (!dropdown.previousElementSibling.contains(e.target)) {
            dropdown.style.opacity = '0';
            dropdown.style.transform = 'perspective(1000px) rotateX(-10deg) translateY(-10px)';
            
            setTimeout(() => {
                dropdown.classList.remove('show');
                dropdown.style.opacity = '';
                dropdown.style.transform = '';
            }, 200);
        }
    });
});
// Modern Topbar Interactions
document.addEventListener('DOMContentLoaded', function() {
    console.log('🚀 Initializing Modern Topbar...');

    const topbar = document.querySelector('.dashboard-topbar');
    const userDropdown = document.getElementById('userDropdown');
    const notificationBell = document.querySelector('.dashboard-notification-bell');

    // 3D Parallax Effect pada Topbar
    topbar.addEventListener('mousemove', (e) => {
        if (window.innerWidth > 768) {
            const rect = topbar.getBoundingClientRect();
            const x = e.clientX - rect.left;
            const y = e.clientY - rect.top;
            
            const centerX = rect.width / 2;
            const centerY = rect.height / 2;
            
            const rotateY = (x - centerX) / 50;
            const rotateX = (centerY - y) / 50;
            
            topbar.style.transform = `perspective(1000px) rotateX(${rotateX}deg) rotateY(${rotateY}deg)`;
        }
    });
    
    topbar.addEventListener('mouseleave', () => {
        topbar.style.transform = 'perspective(1000px) rotateX(0) rotateY(0)';
    });

    // Enhanced User Dropdown
    if (userDropdown) {
        userDropdown.addEventListener('mouseenter', function() {
            const dropdownMenu = this.nextElementSibling;
            if (dropdownMenu) {
                dropdownMenu.style.opacity = '0';
                dropdownMenu.style.transform = 'perspective(1000px) rotateX(-15deg) translateY(20px) scale(0.95)';
                dropdownMenu.classList.add('show');
                
                setTimeout(() => {
                    dropdownMenu.style.opacity = '1';
                    dropdownMenu.style.transform = 'perspective(1000px) rotateX(0) translateY(0) scale(1)';
                }, 10);
            }
        });

        // Mouse move effect untuk user dropdown
        userDropdown.addEventListener('mousemove', (e) => {
            if (window.innerWidth > 768) {
                const rect = userDropdown.getBoundingClientRect();
                const x = e.clientX - rect.left;
                const y = e.clientY - rect.top;
                
                const centerX = rect.width / 2;
                const centerY = rect.height / 2;
                
                const rotateY = (x - centerX) / 25;
                const rotateX = (centerY - y) / 25;
                
                userDropdown.style.transform = `perspective(500px) rotateX(${rotateX}deg) rotateY(${rotateY}deg) translateY(-3px)`;
            }
        });
        
        userDropdown.addEventListener('mouseleave', () => {
            if (!userDropdown.classList.contains('show')) {
                userDropdown.style.transform = 'perspective(500px) rotateX(0) rotateY(0) translateY(0)';
            }
        });
    }

    // Notification Bell Interactions
    if (notificationBell) {
        notificationBell.addEventListener('mouseenter', function() {
            const dropdownMenu = this.nextElementSibling;
            if (dropdownMenu) {
                dropdownMenu.style.opacity = '0';
                dropdownMenu.style.transform = 'perspective(1000px) rotateX(-10deg) translateY(15px)';
                dropdownMenu.classList.add('show');
                
                setTimeout(() => {
                    dropdownMenu.style.opacity = '1';
                    dropdownMenu.style.transform = 'perspective(1000px) rotateX(0) translateY(0)';
                }, 10);
            }
        });

        // Animate notification badge
        const badge = notificationBell.querySelector('.badge-counter');
        if (badge) {
            setInterval(() => {
                badge.style.transform = 'scale(1.1)';
                setTimeout(() => {
                    badge.style.transform = 'scale(1)';
                }, 300);
            }, 3000);
        }
    }

    // Dropdown items animation
    const dropdownItems = document.querySelectorAll('.dashboard-dropdown-item');
    dropdownItems.forEach((item, index) => {
        item.style.transitionDelay = `${index * 0.05}s`;
        
        item.addEventListener('mouseenter', function() {
            this.style.transform = 'translateX(8px) perspective(500px) rotateY(8deg)';
        });
        
        item.addEventListener('mouseleave', function() {
            this.style.transform = 'translateX(0) perspective(500px) rotateY(0)';
        });
    });

    console.log('✅ Modern Topbar initialized successfully');
});

// Handle dropdown close dengan smooth animation
document.addEventListener('click', function(e) {
    const openDropdowns = document.querySelectorAll('.dropdown-menu.show');
    openDropdowns.forEach(dropdown => {
        const trigger = dropdown.previousElementSibling;
        if (!dropdown.contains(e.target) && !trigger.contains(e.target)) {
            dropdown.style.opacity = '0';
            dropdown.style.transform = 'perspective(1000px) rotateX(-10deg) translateY(15px)';
            
            setTimeout(() => {
                dropdown.classList.remove('show');
                dropdown.style.opacity = '';
                dropdown.style.transform = '';
                
                // Reset trigger transform
                if (trigger.classList.contains('dashboard-user-dropdown')) {
                    trigger.style.transform = 'perspective(500px) rotateX(0) rotateY(0) translateY(0)';
                }
            }, 200);
        }
    });
});

// Scroll effect untuk topbar
let lastScrollY = window.scrollY;
window.addEventListener('scroll', () => {
    const topbar = document.querySelector('.dashboard-topbar');
    if (window.scrollY > lastScrollY && window.scrollY > 100) {
        topbar.style.transform = 'translateY(-100%)';
        topbar.style.opacity = '0.9';
    } else {
        topbar.style.transform = 'translateY(0)';
        topbar.style.opacity = '1';
    }
    lastScrollY = window.scrollY;
});
    }

   