<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
<<<<<<< HEAD
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>SIPEDES - @yield('title')</title>
    
    @include('layouts.admin.css')
</head>

<body id="page-top">
    <!-- Page Wrapper -->
    <div id="wrapper">
        @include('layouts.admin.sidebar')

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">
            <!-- Main Content -->
            <div id="content">
                @include('layouts.admin.header')

                <!-- Begin Page Content -->
                <div class="container-fluid">
                    @include('pages.partials.alert')
                    
                    @yield('content')
                </div>
            </div>

            @include('layouts.admin.footer')
        </div>
    </div>

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    @auth
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">
                        <i class="fas fa-sign-out-alt"></i> Konfirmasi Logout
                    </h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    Apakah Anda yakin ingin logout dari sistem?
                    <div class="mt-2 text-muted small">
                        <i class="fas fa-info-circle"></i> Anda akan diarahkan ke halaman login.
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">
                        <i class="fas fa-times"></i> Batal
                    </button>
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-sign-out-alt"></i> Logout
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @endauth

    @include('layouts.admin.js')
</body>
</html>
=======
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title') - SIPEDES</title>

    {{-- Include CSS --}}
    @include('layouts.admin.css')
</head>
<body class="hold-transition sidebar-mini layout-fixed">

<div class="wrapper">

    {{-- Header --}}
    @include('layouts.admin.header')

    {{-- Sidebar --}}
    @include('layouts.admin.sidebar')

    {{-- Main Content --}}
    <div class="content-wrapper">
        <section class="content pt-3">
            <div class="container-fluid">
                @yield('content')
            </div>
        </section>
    </div>

    {{-- Footer --}}
    @include('layouts.admin.footer')
</div>

{{-- Include JS --}}
@include('layouts.admin.js')
</body>
</html>
>>>>>>> 8c3c1d42a26caacfcc4638c5d88e7c1d654465bc
