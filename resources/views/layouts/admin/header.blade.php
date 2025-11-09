<nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
        <i class="fa fa-bars"></i>
    </button>

    <!-- Page Heading -->
    <h1 class="h3 mb-0 text-gray-800">@yield('page_title', 'SIPEDES')</h1>

    <!-- Topbar Navbar -->
    <ul class="navbar-nav ml-auto">
        <!-- Nav Item - User Information -->
        @auth
        <li class="nav-item dropdown no-arrow">
            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small">
                    <i class="fas fa-user-circle"></i> {{ Auth::user()->name }}
                </span>
                <span class="badge badge-{{ Auth::user()->role == 'admin' ? 'success' : 'info' }}">
                    {{ Auth::user()->role == 'admin' ? 'Admin' : 'Operator' }}
                </span>
            </a>
            <!-- Dropdown - User Information -->
            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="{{ route('admin.user.show', Auth::id()) }}">
                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                    Profil Saya
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                    Logout
                </a>
            </div>
        </li>
        @else
        <li class="nav-item">
            <a class="nav-link" href="{{ route('login') }}">
                <i class="fas fa-sign-in-alt"></i> Login
            </a>
        </li>
        @endauth
    </ul>
</nav>