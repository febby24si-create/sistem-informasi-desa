
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

