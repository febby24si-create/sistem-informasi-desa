<!-- Bootstrap Core CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

<!-- Custom Fonts -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet" type="text/css">
<link href="https://fonts.googleapis.com/css?family=Poppins:400,500,600,700&display=swap" rel="stylesheet">

<!-- SB Admin 2 CSS -->
<link href="https://cdn.jsdelivr.net/npm/startbootstrap-sb-admin-2@4.1.4/css/sb-admin-2.min.css" rel="stylesheet">

<!-- WhatsApp -->
<link href="{{ asset('assets/css/whatsaap.css') }}" rel="stylesheet">

<!-- Sidebar CSS -->
<link href="{{ asset('assets/css/sidebar.css') }}" rel="stylesheet">

<!-- Header CSS -->
<style>
/* ===== ENHANCED HEADER - DARK THEME ===== */
:root {
    --header-bg: linear-gradient(135deg, #1e293b 0%, #0f172a 100%);
    --header-border: rgba(59, 130, 246, 0.2);
    --primary: #3b82f6;
    --primary-hover: #60a5fa;
    --accent: #8b5cf6;
    --success: #10b981;
    --warning: #f59e0b;
    --danger: #ef4444;
    --cyan: #22d3ee;
    --text-primary: #f8fafc;
    --text-secondary: #cbd5e1;
    --text-muted: #94a3b8;
    --dark-card: #1e293b;
    --dark-hover: #334155;
    --dark-border: rgba(255, 255, 255, 0.1);
    --glass-bg: rgba(30, 41, 59, 0.95);
    --gradient-blue: linear-gradient(135deg, #3b82f6 0%, #1d4ed8 100%);
    --gradient-purple: linear-gradient(135deg, #8b5cf6 0%, #6d28d9 100%);
    --gradient-cyan: linear-gradient(135deg, #06b6d4 0%, #0891b2 100%);
    --shadow-glow: 0 0 20px rgba(59, 130, 246, 0.15);
}

body {
    font-family: 'Inter', 'Poppins', sans-serif;
    background-color: #0f172a;
}

/* ===== NAVBAR MAIN ===== */
.navbar-sipedes {
    background: var(--header-bg);
    box-shadow: 0 4px 20px rgba(0, 0, 0, 0.3), var(--shadow-glow);
    padding: 0.6rem 1.5rem;
    border-bottom: 1px solid var(--header-border);
    position: sticky;
    top: 0;
    z-index: 1040;
    backdrop-filter: blur(10px);
}

/* ===== BRAND ===== */
.navbar-brand {
    display: flex;
    align-items: center;
    color: var(--text-primary) !important;
    font-weight: 700;
    font-size: 1.3rem;
    text-decoration: none;
    transition: all 0.3s ease;
    gap: 0.5rem;
}

.navbar-brand:hover {
    color: var(--primary-hover) !important;
    transform: translateY(-1px);
}

.brand-icon {
    font-size: 1.6rem;
    color: var(--primary);
    filter: drop-shadow(0 0 8px rgba(59, 130, 246, 0.4));
    transition: all 0.3s ease;
}

.navbar-brand:hover .brand-icon {
    color: var(--cyan);
    transform: rotate(10deg) scale(1.1);
}

/* ===== TOGGLER ===== */
.navbar-toggler {
    border: 1px solid var(--dark-border);
    padding: 0.4rem 0.6rem;
    border-radius: 8px;
    background: rgba(255, 255, 255, 0.05);
    transition: all 0.3s ease;
}

.navbar-toggler:hover {
    background: rgba(59, 130, 246, 0.15);
    border-color: var(--primary);
}

.navbar-toggler:focus {
    box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.3);
}

.navbar-toggler-icon {
    background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 30 30'%3e%3cpath stroke='rgba%28148, 163, 184, 1%29' stroke-linecap='round' stroke-miterlimit='10' stroke-width='2' d='M4 7h22M4 15h22M4 23h22'/%3e%3c/svg%3e");
}

/* ===== NAV LINKS ===== */
.nav-link {
    color: var(--text-secondary) !important;
    font-weight: 500;
    padding: 0.6rem 1rem !important;
    border-radius: 10px;
    transition: all 0.3s ease;
    position: relative;
    display: flex;
    align-items: center;
    font-size: 0.9rem;
    margin: 0 0.15rem;
}

.nav-link:hover {
    color: var(--text-primary) !important;
    background: rgba(59, 130, 246, 0.1);
}

.nav-link i {
    margin-right: 0.5rem;
    font-size: 1rem;
    color: var(--text-muted);
    transition: all 0.3s ease;
}

.nav-link:hover i {
    color: var(--primary);
}

.nav-item.active .nav-link {
    color: var(--text-primary) !important;
    background: rgba(59, 130, 246, 0.15);
    font-weight: 600;
}

.nav-item.active .nav-link i {
    color: var(--primary);
}

.nav-item.active .nav-link::after {
    content: '';
    position: absolute;
    bottom: 0;
    left: 50%;
    transform: translateX(-50%);
    width: 30px;
    height: 3px;
    background: var(--gradient-blue);
    border-radius: 3px;
}

/* ===== DROPDOWN MENU ===== */
.dropdown-menu {
    background: var(--glass-bg);
    backdrop-filter: blur(20px);
    border: 1px solid var(--dark-border);
    box-shadow: 0 15px 40px rgba(0, 0, 0, 0.4);
    border-radius: 12px;
    padding: 0.5rem;
    margin-top: 0.75rem;
    min-width: 220px;
    animation: dropdownFade 0.25s ease;
}

@keyframes dropdownFade {
    from {
        opacity: 0;
        transform: translateY(-10px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

.dropdown-item {
    padding: 0.7rem 1rem;
    color: var(--text-secondary);
    display: flex;
    align-items: center;
    transition: all 0.2s ease;
    border-radius: 8px;
    margin: 0.15rem 0;
    font-size: 0.9rem;
}

.dropdown-item:hover {
    background: rgba(59, 130, 246, 0.15);
    color: var(--text-primary);
    transform: translateX(5px);
}

.dropdown-item i {
    width: 1.25rem;
    margin-right: 0.75rem;
    color: var(--text-muted);
    font-size: 0.95rem;
    transition: color 0.2s ease;
}

.dropdown-item:hover i {
    color: var(--primary);
}

.dropdown-divider {
    margin: 0.5rem 0;
    border-top: 1px solid var(--dark-border);
}

/* ===== USER INFO IN DROPDOWN ===== */
.user-info {
    display: flex;
    align-items: center;
    padding: 1rem;
    border-bottom: 1px solid var(--dark-border);
    margin-bottom: 0.5rem;
    background: rgba(59, 130, 246, 0.05);
    border-radius: 10px 10px 0 0;
    margin: -0.5rem -0.5rem 0.5rem -0.5rem;
}

.user-avatar {
    width: 45px;
    height: 45px;
    border-radius: 12px;
    background: var(--gradient-blue);
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    font-weight: 700;
    font-size: 1.1rem;
    margin-right: 0.75rem;
    box-shadow: 0 4px 12px rgba(59, 130, 246, 0.3);
}

.user-details {
    flex: 1;
}

.user-name {
    font-weight: 600;
    margin-bottom: 0.15rem;
    color: var(--text-primary);
    font-size: 0.95rem;
}

.user-role {
    font-size: 0.75rem;
    color: var(--text-muted);
    display: flex;
    align-items: center;
    gap: 0.35rem;
}

.user-role-badge {
    background: var(--gradient-purple);
    color: white;
    padding: 0.15rem 0.5rem;
    border-radius: 20px;
    font-size: 0.65rem;
    font-weight: 600;
}

/* ===== NOTIFICATION BADGE ===== */
.notification-badge {
    position: absolute;
    top: 2px;
    right: 2px;
    background: linear-gradient(135deg, #ef4444, #dc2626);
    color: white;
    border-radius: 50%;
    width: 18px;
    height: 18px;
    font-size: 0.65rem;
    font-weight: 700;
    display: flex;
    align-items: center;
    justify-content: center;
    box-shadow: 0 2px 8px rgba(239, 68, 68, 0.4);
    animation: pulse 2s infinite;
}

@keyframes pulse {
    0%, 100% { transform: scale(1); }
    50% { transform: scale(1.1); }
}

/* ===== NOTIFICATION DROPDOWN ===== */
.notification-dropdown {
    min-width: 350px;
    max-height: 400px;
    overflow-y: auto;
}

.notification-header {
    padding: 1rem;
    border-bottom: 1px solid var(--dark-border);
    display: flex;
    justify-content: space-between;
    align-items: center;
    background: rgba(59, 130, 246, 0.05);
    border-radius: 11px 11px 0 0;
    margin: -0.5rem -0.5rem 0 -0.5rem;
}

.notification-header h6 {
    margin: 0;
    font-weight: 600;
    color: var(--text-primary);
    font-size: 0.95rem;
}

.notification-header .badge {
    background: var(--gradient-blue);
    font-size: 0.7rem;
    padding: 0.3rem 0.6rem;
    border-radius: 20px;
}

.notification-item {
    padding: 0.85rem 1rem;
    border-bottom: 1px solid var(--dark-border);
    transition: all 0.2s ease;
    display: flex;
    align-items: flex-start;
    gap: 0.75rem;
    cursor: pointer;
}

.notification-item:hover {
    background: rgba(59, 130, 246, 0.08);
}

.notification-item:last-child {
    border-bottom: none;
}

.notification-item.unread {
    background: rgba(59, 130, 246, 0.05);
    border-left: 3px solid var(--primary);
}

.notification-icon {
    width: 40px;
    height: 40px;
    border-radius: 10px;
    display: flex;
    align-items: center;
    justify-content: center;
    flex-shrink: 0;
    font-size: 1rem;
}

.notification-icon.info {
    background: rgba(59, 130, 246, 0.15);
    color: var(--primary);
}

.notification-icon.success {
    background: rgba(16, 185, 129, 0.15);
    color: var(--success);
}

.notification-icon.warning {
    background: rgba(245, 158, 11, 0.15);
    color: var(--warning);
}

.notification-icon.danger {
    background: rgba(239, 68, 68, 0.15);
    color: var(--danger);
}

.notification-content {
    flex: 1;
    min-width: 0;
}

.notification-title {
    font-weight: 600;
    margin-bottom: 0.2rem;
    color: var(--text-primary);
    font-size: 0.85rem;
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
}

.notification-text {
    font-size: 0.8rem;
    color: var(--text-muted);
    margin-bottom: 0.25rem;
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
    overflow: hidden;
}

.notification-time {
    font-size: 0.7rem;
    color: var(--text-muted);
    display: flex;
    align-items: center;
    gap: 0.25rem;
}

.notification-time i {
    font-size: 0.65rem;
}

.view-all-notifications {
    text-align: center;
    padding: 0.85rem;
    color: var(--primary);
    font-weight: 600;
    font-size: 0.85rem;
    border-top: 1px solid var(--dark-border);
    transition: all 0.2s ease;
    display: block;
    text-decoration: none;
    margin: 0 -0.5rem -0.5rem -0.5rem;
    border-radius: 0 0 11px 11px;
}

.view-all-notifications:hover {
    background: rgba(59, 130, 246, 0.1);
    color: var(--primary-hover);
}

/* ===== SEARCH BAR ===== */
.search-container {
    position: relative;
    max-width: 280px;
}

.search-input {
    border: 1px solid var(--dark-border);
    border-radius: 10px;
    padding: 0.55rem 1rem 0.55rem 2.5rem;
    background: rgba(255, 255, 255, 0.05);
    color: var(--text-primary);
    transition: all 0.3s ease;
    width: 100%;
    font-size: 0.9rem;
}

.search-input::placeholder {
    color: var(--text-muted);
}

.search-input:focus {
    background: rgba(59, 130, 246, 0.1);
    border-color: var(--primary);
    box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.15);
    outline: none;
}

.search-icon {
    position: absolute;
    left: 0.85rem;
    top: 50%;
    transform: translateY(-50%);
    color: var(--text-muted);
    font-size: 0.9rem;
    transition: color 0.3s ease;
}

.search-input:focus + .search-icon,
.search-container:focus-within .search-icon {
    color: var(--primary);
}

/* ===== ACTION BUTTONS ===== */
.nav-action-btn {
    width: 40px;
    height: 40px;
    border-radius: 10px;
    display: flex;
    align-items: center;
    justify-content: center;
    background: rgba(255, 255, 255, 0.05);
    color: var(--text-secondary);
    border: 1px solid var(--dark-border);
    transition: all 0.3s ease;
    position: relative;
    cursor: pointer;
}

.nav-action-btn:hover {
    background: rgba(59, 130, 246, 0.15);
    color: var(--primary);
    border-color: rgba(59, 130, 246, 0.3);
    transform: translateY(-2px);
}

/* ===== LOGOUT BUTTON ===== */
.logout-item {
    background: rgba(239, 68, 68, 0.1) !important;
    color: #f87171 !important;
    margin-top: 0.25rem;
}

.logout-item:hover {
    background: rgba(239, 68, 68, 0.2) !important;
    color: #fca5a5 !important;
}

.logout-item i {
    color: #f87171 !important;
}

/* ===== MOBILE RESPONSIVE ===== */
@media (max-width: 991.98px) {
    .navbar-sipedes {
        padding: 0.5rem 1rem;
    }
    
    .navbar-collapse {
        margin-top: 1rem;
        padding: 1rem;
        background: var(--dark-card);
        border-radius: 12px;
        border: 1px solid var(--dark-border);
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.3);
    }
    
    .nav-link {
        padding: 0.75rem 1rem !important;
        margin: 0.15rem 0;
    }
    
    .nav-item.active .nav-link::after {
        display: none;
    }
    
    .nav-item.active .nav-link {
        border-left: 3px solid var(--primary);
    }
    
    .dropdown-menu {
        margin-left: 0;
        margin-top: 0.5rem;
        background: rgba(15, 23, 42, 0.98);
    }
    
    .search-container {
        max-width: 100%;
        margin-bottom: 0.75rem;
    }
    
    .notification-dropdown {
        min-width: 100%;
        max-width: 100%;
    }
}

@media (max-width: 576px) {
    .navbar-brand {
        font-size: 1.1rem;
    }
    
    .brand-icon {
        font-size: 1.4rem;
    }
    
    .user-avatar {
        width: 38px;
        height: 38px;
        font-size: 1rem;
    }
    
    .notification-dropdown {
        min-width: 280px;
    }
}

/* ===== SCROLLBAR FOR DROPDOWN ===== */
.notification-dropdown::-webkit-scrollbar {
    width: 5px;
}

.notification-dropdown::-webkit-scrollbar-track {
    background: var(--dark-card);
    border-radius: 3px;
}

.notification-dropdown::-webkit-scrollbar-thumb {
    background: var(--primary);
    border-radius: 3px;
}

/* ===== ONLINE STATUS INDICATOR ===== */
.online-indicator {
    width: 10px;
    height: 10px;
    background: var(--success);
    border-radius: 50%;
    position: absolute;
    bottom: 2px;
    right: 2px;
    border: 2px solid var(--dark-card);
    box-shadow: 0 0 8px rgba(16, 185, 129, 0.5);
}

/* ===== QUICK ACTION BUTTONS GROUP ===== */
.nav-actions {
    display: flex;
    align-items: center;
    gap: 0.5rem;
}

/* Theme Toggle (Optional) */
.theme-toggle {
    background: rgba(255, 255, 255, 0.05);
    border: 1px solid var(--dark-border);
    border-radius: 10px;
    padding: 0.4rem 0.8rem;
    color: var(--text-secondary);
    cursor: pointer;
    transition: all 0.3s ease;
    display: flex;
    align-items: center;
    gap: 0.5rem;
    font-size: 0.85rem;
}

.theme-toggle:hover {
    background: rgba(59, 130, 246, 0.15);
    color: var(--primary);
    border-color: rgba(59, 130, 246, 0.3);
}
</style>

<!-- 💡 PENTING: CSS kustom terakhir -->
<link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">