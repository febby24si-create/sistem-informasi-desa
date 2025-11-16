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
    :root {
        --primary-color: #1a56db;
        --secondary-color: #0e4da4;
        --accent-color: #3b82f6;
        --text-dark: #1f2937;
        --text-light: #6b7280;
        --bg-light: #f9fafb;
        --border-color: #e5e7eb;
        --success-color: #10b981;
        --warning-color: #f59e0b;
        --danger-color: #ef4444;
        --shadow-light: 0 1px 3px rgba(0, 0, 0, 0.1);
        --shadow-medium: 0 4px 6px rgba(0, 0, 0, 0.1);
        --shadow-strong: 0 10px 15px rgba(0, 0, 0, 0.1);
    }

    body {
        font-family: 'Poppins', sans-serif;
        background-color: var(--bg-light);
    }

    /* Header Styles */
    .navbar-sipedes {
        background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
        box-shadow: var(--shadow-medium);
        padding: 0.75rem 1rem;
        transition: all 0.3s ease;
        border-bottom: 1px solid rgba(255, 255, 255, 0.1);
    }

    .navbar-brand {
        display: flex;
        align-items: center;
        color: white !important;
        font-weight: 600;
        font-size: 1.25rem;
        text-decoration: none;
        transition: all 0.3s ease;
    }

    .navbar-brand:hover {
        transform: translateY(-2px);
        color: rgba(255, 255, 255, 0.9) !important;
    }

    .brand-icon {
        font-size: 1.75rem;
        margin-right: 0.5rem;
        color: white;
    }

    .navbar-toggler {
        border: 1px solid rgba(255, 255, 255, 0.3);
        padding: 0.25rem 0.5rem;
    }

    .navbar-toggler:focus {
        box-shadow: 0 0 0 2px rgba(255, 255, 255, 0.5);
    }

    .navbar-toggler-icon {
        background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 30 30'%3e%3cpath stroke='rgba%28255, 255, 255, 0.8%29' stroke-linecap='round' stroke-miterlimit='10' stroke-width='2' d='M4 7h22M4 15h22M4 23h22'/%3e%3c/svg%3e");
    }

    .nav-link {
        color: rgba(255, 255, 255, 0.85) !important;
        font-weight: 500;
        padding: 0.5rem 1rem !important;
        border-radius: 0.375rem;
        transition: all 0.3s ease;
        position: relative;
        display: flex;
        align-items: center;
    }

    .nav-link:hover, .nav-link:focus {
        color: white !important;
        background-color: rgba(255, 255, 255, 0.1);
        transform: translateY(-1px);
    }

    .nav-link i {
        margin-right: 0.5rem;
        font-size: 1.1rem;
    }

    .nav-item.active .nav-link {
        color: white !important;
        background-color: rgba(255, 255, 255, 0.15);
        font-weight: 600;
    }

    .nav-item.active .nav-link::after {
        content: '';
        position: absolute;
        bottom: 0;
        left: 1rem;
        right: 1rem;
        height: 2px;
        background-color: white;
        border-radius: 2px;
    }

    .dropdown-menu {
        border: none;
        box-shadow: var(--shadow-strong);
        border-radius: 0.5rem;
        padding: 0.5rem 0;
        margin-top: 0.5rem;
        min-width: 200px;
        background-color: white;
    }

    .dropdown-item {
        padding: 0.625rem 1rem;
        color: var(--text-dark);
        display: flex;
        align-items: center;
        transition: all 0.2s ease;
    }

    .dropdown-item:hover {
        background-color: var(--bg-light);
        color: var(--primary-color);
    }

    .dropdown-item i {
        width: 1.25rem;
        margin-right: 0.75rem;
        color: var(--text-light);
    }

    .dropdown-divider {
        margin: 0.5rem 0;
        border-top: 1px solid var(--border-color);
    }

    .user-info {
        display: flex;
        align-items: center;
        padding: 0.5rem 1rem;
        color: var(--text-dark);
        border-bottom: 1px solid var(--border-color);
        margin-bottom: 0.5rem;
    }

    .user-avatar {
        width: 2.5rem;
        height: 2.5rem;
        border-radius: 50%;
        background: linear-gradient(135deg, var(--primary-color), var(--accent-color));
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-weight: 600;
        margin-right: 0.75rem;
    }

    .user-details {
        flex: 1;
    }

    .user-name {
        font-weight: 600;
        margin-bottom: 0.125rem;
        color: var(--text-dark);
    }

    .user-role {
        font-size: 0.75rem;
        color: var(--text-light);
    }

    .notification-badge {
        position: absolute;
        top: 0;
        right: 0;
        background-color: var(--danger-color);
        color: white;
        border-radius: 50%;
        width: 1.25rem;
        height: 1.25rem;
        font-size: 0.75rem;
        display: flex;
        align-items: center;
        justify-content: center;
        transform: translate(25%, -25%);
    }

    .notification-dropdown {
        min-width: 320px;
    }

    .notification-item {
        padding: 0.75rem 1rem;
        border-bottom: 1px solid var(--border-color);
        transition: all 0.2s ease;
    }

    .notification-item:hover {
        background-color: var(--bg-light);
    }

    .notification-item:last-child {
        border-bottom: none;
    }

    .notification-title {
        font-weight: 600;
        margin-bottom: 0.25rem;
        color: var(--text-dark);
    }

    .notification-time {
        font-size: 0.75rem;
        color: var(--text-light);
    }

    .notification-icon {
        width: 2.5rem;
        height: 2.5rem;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin-right: 0.75rem;
        flex-shrink: 0;
    }

    .notification-icon.info {
        background-color: rgba(59, 130, 246, 0.1);
        color: var(--accent-color);
    }

    .notification-icon.success {
        background-color: rgba(16, 185, 129, 0.1);
        color: var(--success-color);
    }

    .notification-icon.warning {
        background-color: rgba(245, 158, 11, 0.1);
        color: var(--warning-color);
    }

    .notification-icon.danger {
        background-color: rgba(239, 68, 68, 0.1);
        color: var(--danger-color);
    }

    .notification-content {
        flex: 1;
    }

    .view-all-notifications {
        text-align: center;
        padding: 0.75rem;
        color: var(--primary-color);
        font-weight: 500;
        border-top: 1px solid var(--border-color);
        transition: all 0.2s ease;
    }

    .view-all-notifications:hover {
        background-color: var(--bg-light);
    }

    /* Search Bar */
    .search-container {
        position: relative;
        max-width: 300px;
    }

    .search-input {
        border: none;
        border-radius: 2rem;
        padding: 0.5rem 1rem 0.5rem 2.5rem;
        background-color: rgba(255, 255, 255, 0.15);
        color: white;
        transition: all 0.3s ease;
        width: 100%;
    }

    .search-input::placeholder {
        color: rgba(255, 255, 255, 0.7);
    }

    .search-input:focus {
        background-color: rgba(255, 255, 255, 0.25);
        box-shadow: 0 0 0 2px rgba(255, 255, 255, 0.3);
        color: white;
    }

    .search-icon {
        position: absolute;
        left: 0.75rem;
        top: 50%;
        transform: translateY(-50%);
        color: rgba(255, 255, 255, 0.7);
    }

    /* Mobile Responsive */
    @media (max-width: 991.98px) {
        .navbar-collapse {
            margin-top: 1rem;
            padding: 1rem;
            background-color: rgba(255, 255, 255, 0.05);
            border-radius: 0.5rem;
            backdrop-filter: blur(10px);
        }
        
        .nav-link {
            padding: 0.75rem 1rem !important;
        }
        
        .dropdown-menu {
            margin-left: 1rem;
            margin-top: 0.25rem;
        }
        
        .search-container {
            max-width: 100%;
            margin-bottom: 1rem;
        }
    }

    /* Animation */
    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(-10px); }
        to { opacity: 1; transform: translateY(0); }
    }

    .dropdown-menu.show {
        animation: fadeIn 0.3s ease;
    }

    /* Dark Mode Support */
    @media (prefers-color-scheme: dark) {
        .dropdown-menu {
            background-color: #374151;
            color: white;
        }
        
        .dropdown-item {
            color: #e5e7eb;
        }
        
        .dropdown-item:hover {
            background-color: #4b5563;
            color: white;
        }
        
        .user-info {
            color: #e5e7eb;
            border-bottom-color: #4b5563;
        }
        
        .user-name {
            color: #e5e7eb;
        }
        
        .notification-title {
            color: #e5e7eb;
        }
        
        .notification-item:hover {
            background-color: #4b5563;
        }
        
        .view-all-notifications {
            color: #93c5fd;
            border-top-color: #4b5563;
        }
        
        .view-all-notifications:hover {
            background-color: #4b5563;
        }
    }
</style>

<!-- 💡 PENTING: CSS kustom terakhir -->
<link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">