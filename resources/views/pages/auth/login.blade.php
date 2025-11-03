<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Login - SIPEDES</title>

    <!-- Bootstrap Core CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet" type="text/css">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700" rel="stylesheet">

    <!-- SB Admin 2 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/startbootstrap-sb-admin-2@4.1.4/css/sb-admin-2.min.css" rel="stylesheet">

    <style>
        body {
            background-image: url({{ asset('assets/img/bg1.jpg') }});
            animation: backgroundShift 15s ease-in-out infinite;
        }
        .login-card {
            border-radius: 15px;
            overflow: hidden;
            animation: cardEntrance 1s ease-out forwards;
            opacity: 0;
            transform: translateY(30px);
        }
        .login-left {
            background: url('https://images.unsplash.com/photo-1596457226670-7b2a9efefb2b?auto=format&fit=crop&w=900&q=80') no-repeat center center;
            background-size: cover;
            position: relative;
            color: #fff;
            text-align: center;
            padding: 60px 30px;
            animation: leftSlideIn 1.2s ease-out 0.3s forwards;
            opacity: 0;
            transform: translateX(-50px);
        }
        .login-left::before {
            content: "";
            position: absolute;
            top: 0; left: 0;
            width: 100%; height: 100%;
            background: rgba(0, 90, 60, 0.6);
            animation: overlayFade 1.5s ease-out 0.5s forwards;
            opacity: 0;
        }
        .login-left-content {
            position: relative;
            z-index: 2;
            animation: contentFadeIn 1s ease-out 0.8s forwards;
            opacity: 0;
        }
        .login-left img {
            width: 120px;
            margin-bottom: 20px;
            filter: drop-shadow(0 0 4px rgba(255,255,255,0.8));
            animation: logoFloat 4s ease-in-out infinite;
        }
        .login-left h3 {
            font-weight: 700;
            color: #fff;
            animation: textGlow 3s ease-in-out infinite alternate;
        }
        .login-left p {
            color: #f1f1f1;
            font-size: 14px;
        }
        .login-right {
            padding: 50px;
            background: #fff;
            animation: rightSlideIn 1.2s ease-out 0.3s forwards;
            opacity: 0;
            transform: translateX(50px);
        }
        .btn-primary {
            background-color: #1cc88a;
            border: none;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }
        .btn-primary:hover {
            background-color: #17a673;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(28, 200, 138, 0.4);
        }
        .btn-primary:active {
            transform: translateY(0);
        }
        .form-control {
            transition: all 0.3s ease;
            border: 1px solid #e0e0e0;
        }
        .form-control:focus {
            border-color: #1cc88a;
            box-shadow: 0 0 0 0.2rem rgba(28, 200, 138, 0.25);
            transform: translateY(-2px);
        }

        /* Animasi Keyframes */
        @keyframes cardEntrance {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes leftSlideIn {
            from {
                opacity: 0;
                transform: translateX(-50px);
            }
            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        @keyframes rightSlideIn {
            from {
                opacity: 0;
                transform: translateX(50px);
            }
            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        @keyframes overlayFade {
            from {
                opacity: 0;
            }
            to {
                opacity: 1;
            }
        }

        @keyframes contentFadeIn {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes logoFloat {
            0% {
                transform: translateY(0);
            }
            50% {
                transform: translateY(-10px);
            }
            100% {
                transform: translateY(0);
            }
        }

        @keyframes textGlow {
            from {
                text-shadow: 0 0 5px rgba(255, 255, 255, 0.5);
            }
            to {
                text-shadow: 0 0 15px rgba(255, 255, 255, 0.8), 0 0 20px rgba(255, 255, 255, 0.6);
            }
        }

        @keyframes backgroundShift {
            0% {
                background-position: 0% 50%;
            }
            50% {
                background-position: 100% 50%;
            }
            100% {
                background-position: 0% 50%;
            }
        }

        /* Animasi untuk alert */
        .alert {
            animation: alertPop 0.5s ease-out;
        }

        @keyframes alertPop {
            0% {
                opacity: 0;
                transform: scale(0.8);
            }
            70% {
                transform: scale(1.05);
            }
            100% {
                opacity: 1;
                transform: scale(1);
            }
        }

        /* Animasi untuk form elements */
        .form-control-user {
            animation: formFieldEntrance 0.5s ease-out forwards;
            opacity: 0;
            transform: translateY(10px);
        }

        .form-control-user:nth-child(1) {
            animation-delay: 0.5s;
        }

        .form-control-user:nth-child(2) {
            animation-delay: 0.7s;
        }

        @keyframes formFieldEntrance {
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Animasi untuk tombol login */
        .btn-user {
            animation: buttonEntrance 0.5s ease-out 0.9s forwards;
            opacity: 0;
            transform: translateY(10px);
        }

        @keyframes buttonEntrance {
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Animasi untuk teks footer */
        .text-center.small {
            animation: footerFade 1s ease-out 1.2s forwards;
            opacity: 0;
        }

        @keyframes footerFade {
            to {
                opacity: 1;
            }
        }

        /* Efek ripple untuk tombol */
        .ripple {
            position: absolute;
            border-radius: 50%;
            background-color: rgba(255, 255, 255, 0.7);
            transform: scale(0);
            animation: ripple 0.6s linear;
            pointer-events: none;
        }

        @keyframes ripple {
            to {
                transform: scale(4);
                opacity: 0;
            }
        }
    </style>
</head>

<body>
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-xl-8 col-lg-10 col-md-10">
                <div class="card shadow-lg login-card">
                    <div class="row g-0">
                        <!-- Bagian Kiri dengan Foto Desa -->
                        <div class="col-lg-5 d-flex align-items-center login-left">
                            <div class="login-left-content w-100">
                                <img src="https://cdn-icons-png.flaticon.com/512/2956/2956817.png" alt="Logo Desa">
                                <h3><i class="fas fa-home"></i> SIPEDES</h3>
                                <p><b>Sistem Informasi Pemerintahan Desa</b></p>
                                <hr class="border-light">
                                <p class="small">
                                    Modul ini dikembangkan oleh tim rekan-rekan untuk mendukung digitalisasi administrasi desa dan pelayanan masyarakat yang lebih efisien.
                                </p>
                            </div>
                        </div>

                        <!-- Bagian Kanan -->
                        <div class="col-lg-7 login-right">
                            <div class="text-center mb-4">
                                <h4 class="text-gray-900"><i class="fas fa-user-lock"></i> Login Akun</h4>
                                <p class="text-muted small">Masukkan email dan password Anda untuk melanjutkan</p>
                            </div>

                            @if(session('success'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <i class="fas fa-check-circle"></i> {{ session('success') }}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                            @endif

                            @if($errors->any())
                                <div class="alert alert-danger">
                                    @foreach($errors->all() as $error)
                                        <i class="fas fa-exclamation-triangle"></i> {{ $error }}<br>
                                    @endforeach
                                </div>
                            @endif

                            <form method="POST" action="{{ route('login') }}">
                                @csrf
                                <div class="mb-3">
                                    <input type="email" class="form-control form-control-user"
                                           name="email" value="{{ old('email') }}"
                                           placeholder="Alamat Email" required autofocus>
                                </div>
                                <div class="mb-3">
                                    <input type="password" class="form-control form-control-user"
                                           name="password" placeholder="Kata Sandi" required>
                                </div>
                                <button type="submit" class="btn btn-primary btn-user btn-block w-100 mb-3">
                                    <i class="fas fa-sign-in-alt"></i> Masuk
                                </button>
                            </form>

                            <div class="text-center mt-3">
                                <small class="text-muted">
                                    <i class="fas fa-info-circle"></i> Gunakan akun yang diberikan oleh admin desa.
                                </small>
                            </div>

                            <hr>
                            <div class="text-center">
                                <a class="small" href="{{ route('register') }}">Belum punya akun? Daftar di sini</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="text-center mt-3 text-white small">
                    © 2025 Tim Pengembang SIPEDES — Semua Hak Dilindungi
                </div>
            </div>
        </div>
    </div>

    <!-- Script -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/startbootstrap-sb-admin-2@4.1.4/js/sb-admin-2.min.js"></script>

    <script>
        // Efek ripple untuk tombol login
        document.querySelector('.btn-primary').addEventListener('click', function(e) {
            // Hanya tambahkan efek jika tombol diklik (bukan submit form)
            if (e.target.type === 'submit') {
                const rect = this.getBoundingClientRect();
                const x = e.clientX - rect.left;
                const y = e.clientY - rect.top;

                const ripple = document.createElement('span');
                ripple.classList.add('ripple');
                ripple.style.left = x + 'px';
                ripple.style.top = y + 'px';

                this.appendChild(ripple);

                setTimeout(() => {
                    ripple.remove();
                }, 600);
            }
        });

        // Animasi untuk input fields saat focus
        document.querySelectorAll('.form-control').forEach(input => {
            input.addEventListener('focus', function() {
                this.parentElement.classList.add('focused');
            });

            input.addEventListener('blur', function() {
                if (this.value === '') {
                    this.parentElement.classList.remove('focused');
                }
            });
        });
    </script>
</body>
</html>
