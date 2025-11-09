<<<<<<< HEAD
=======
<!-- Topbar -->
>>>>>>> 8c3c1d42a26caacfcc4638c5d88e7c1d654465bc
<nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
        <i class="fa fa-bars"></i>
    </button>

    <!-- Page Heading -->
<<<<<<< HEAD
    <h1 class="h3 mb-0 text-gray-800">@yield('page_title', 'SIPEDES')</h1>
=======
    <h1 class="h3 mb-0 text-gray-800">@yield('page_title', 'Dashboard SIPEDES')</h1>
>>>>>>> 8c3c1d42a26caacfcc4638c5d88e7c1d654465bc

    <!-- Topbar Navbar -->
    <ul class="navbar-nav ml-auto">
        <!-- Nav Item - User Information -->
<<<<<<< HEAD
        @auth
        <li class="nav-item dropdown no-arrow">
<a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
   data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

                <span class="mr-2 d-none d-lg-inline text-gray-600 small">
                    <i class="fas fa-user-circle"></i> {{ Auth::user()->name }}
                </span>
                <span class="badge badge-{{ Auth::user()->role == 'admin' ? 'success' : 'info' }}">
                    {{ Auth::user()->role == 'admin' ? 'Admin' : 'Operator' }}
=======
        <li class="nav-item dropdown no-arrow">
            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small">
                    <i class="fas fa-user-circle"></i> Administrator
                </span>
                <span class="badge badge-success">
                    Admin
>>>>>>> 8c3c1d42a26caacfcc4638c5d88e7c1d654465bc
                </span>
            </a>
            <!-- Dropdown - User Information -->
            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
<<<<<<< HEAD
                <a class="dropdown-item" href="{{ route('admin.user.show', Auth::id()) }}">
=======
                <a class="dropdown-item" href="#">
>>>>>>> 8c3c1d42a26caacfcc4638c5d88e7c1d654465bc
                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                    Profil Saya
                </a>
                <div class="dropdown-divider"></div>
<<<<<<< HEAD
<a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#logoutModal">

=======
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
>>>>>>> 8c3c1d42a26caacfcc4638c5d88e7c1d654465bc
                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                    Logout
                </a>
            </div>
        </li>
<<<<<<< HEAD
        @else
        <li class="nav-item">
            <a class="nav-link" href="{{ route('login') }}">
                <i class="fas fa-sign-in-alt"></i> Login
            </a>
        </li>
        @endauth
    </ul>
</nav>
=======
    </ul>
</nav>
>>>>>>> 8c3c1d42a26caacfcc4638c5d88e7c1d654465bc
