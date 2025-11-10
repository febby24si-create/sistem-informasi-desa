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
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <!-- SB Admin 2 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/startbootstrap-sb-admin-2@4.1.4/css/sb-admin-2.min.css" rel="stylesheet">

    <style>
        :root {
            --primary: #000000;
            --primary-dark: #17a673;
            --secondary: #4e73df;
            --accent: #36b9cc;
            --dark: #2e3a59;
            --light: #f8f9fc;
            --gray: #6c757d;
            --white: #ffffff;
        }

        * {
            font-family: 'Poppins', sans-serif;
        }

        body {
            background:url('https://images.unsplash.com/photo-1586773860418-d37222d8fce3?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2073&q=80') center/cover no-repeat fixed;
            animation: backgroundShift 20s ease-in-out infinite;
            min-height: 100vh;
            display: flex;
            align-items: center;
            position: relative;
            overflow-x: hidden;
            padding: 15px;
        }

        /* Background Animation Elements */
        .bg-animation {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            overflow: hidden;
            z-index: -1;
        }

        .bg-animation span {
            position: absolute;
            display: block;
            width: 20px;
            height: 20px;
            background: rgba(182, 175, 175, 0.1);
            animation: float 15s linear infinite;
            bottom: -150px;
            border-radius: 50%;
        }

        .bg-animation span:nth-child(1) {
            left: 25%;
            width: 80px;
            height: 80px;
            animation-delay: 0s;
            animation-duration: 20s;
        }

        .bg-animation span:nth-child(2) {
            left: 10%;
            width: 20px;
            height: 20px;
            animation-delay: 2s;
            animation-duration: 12s;
        }

        .bg-animation span:nth-child(3) {
            left: 70%;
            width: 60px;
            height: 60px;
            animation-delay: 4s;
            animation-duration: 18s;
        }

        .bg-animation span:nth-child(4) {
            left: 40%;
            width: 60px;
            height: 60px;
            animation-delay: 0s;
            animation-duration: 18s;
        }

        .bg-animation span:nth-child(5) {
            left: 65%;
            width: 40px;
            height: 40px;
            animation-delay: 0s;
            animation-duration: 15s;
        }

        .login-container {
            width: 100%;
            max-width: 900px;
            margin: 0 auto;
        }

        .login-card {
            border-radius: 18px;
            overflow: hidden;
            box-shadow: 
                0 12px 28px rgba(0, 0, 0, 0.2),
                0 4px 12px rgba(0, 0, 0, 0.1);
            backdrop-filter: blur(10px);
            background: rgba(255, 255, 255, 0.15);
            animation: cardEntrance 1s ease-out forwards;
            opacity: 0;
            transform: translateY(30px);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            border: 1px solid rgba(255, 255, 255, 0.2);
        }

        .login-card:hover {
            transform: translateY(-5px);
            box-shadow: 
                0 16px 32px rgba(0, 0, 0, 0.25),
                0 8px 16px rgba(0, 0, 0, 0.15);
        }

        .login-left {
            background:url('https://images.unsplash.com/photo-1596457226670-7b2a9efefb2b?auto=format&fit=crop&w=900&q=80') no-repeat center center;
            background-size: cover;
            position: relative;
            color: #ffffff;
            text-align: center;
            padding: 40px 25px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            overflow: hidden;
        }

        .login-left::before {
            content: "";
            position: absolute;
            top: 0; left: 0;
            width: 100%; height: 100%;
            background: rgba(0, 90, 60, 0.7);
            animation: overlayFade 1.5s ease-out 0.5s forwards;
            opacity: 0;
        }

        .login-left::after {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: 
                radial-gradient(circle at 20% 80%, rgba(255, 255, 255, 0.1) 0%, transparent 50%),
                radial-gradient(circle at 80% 20%, rgba(255, 255, 255, 0.1) 0%, transparent 50%);
            z-index: 1;
        }

        .login-left-content {
            position: relative;
            z-index: 2;
            animation: contentFadeIn 1s ease-out 0.8s forwards;
            opacity: 0;
        }

        .logo-container {
            margin-bottom: 20px;
            animation: logoFloat 4s ease-in-out infinite;
        }

        .logo-container i {
            font-size: 60px;
            color: #ffffff;
            filter: drop-shadow(0 0 8px rgba(0, 0, 0, 0.6));
            margin-bottom: 12px;
            transition: all 0.5s ease;
        }

        .logo-container:hover i {
            transform: scale(1.1) rotate(5deg);
            filter: drop-shadow(0 0 12px rgba(0, 0, 0, 0.8));
        }

        .login-left h3 {
            font-weight: 700;
            color: #ffffff;
            margin-bottom: 8px;
            text-shadow: 0 2px 10px rgba(0, 0, 0, 0.3);
            letter-spacing: 0.5px;
            font-size: 24px;
        }

        .login-left p {
            color: #ffffff;
            font-size: 13px;
            line-height: 1.5;
            margin-bottom: 5px;
        }

        .village-info {
            margin: 15px 0;
        }

        .village-info p {
            margin-bottom: 6px;
            font-size: 12px;
        }

        .features-list {
            margin-top: 20px;
            text-align: left;
        }

        .feature-item {
            display: flex;
            align-items: center;
            margin-bottom: 10px;
            padding: 6px 10px;
            border-radius: 6px;
            transition: all 0.3s ease;
            background: #ffffff1a;
            font-size: 12px;
            color: #ffffff;
        }

        .feature-item:hover {
            background: rgba(255, 255, 255, 0.2);
            transform: translateX(5px);
        }

        .feature-item i {
            margin-right: 8px;
            font-size: 14px;
        }

        .login-right {
            padding: 35px 30px;
            background: rgba(255, 255, 255, 0.9);
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .login-header {
            text-align: center;
            margin-bottom: 25px;
        }

        .login-header h4 {
            font-weight: 700;
            color: #333;
            margin-bottom: 6px;
            position: relative;
            display: inline-block;
            font-size: 22px;
        }

        .login-header h4::after {
            content: '';
            position: absolute;
            bottom: -8px;
            left: 50%;
            transform: translateX(-50%);
            width: 40px;
            height: 3px;
            background: linear-gradient(to right, #333, #ddd);
            border-radius: 3px;
        }

        .login-header p {
            color: #666;
            font-size: 14px;
            margin-top: 15px;
        }

        .btn-primary {
            background: linear-gradient(135deg, #4e73df, #224abe);
            border: none;
            border-radius: 8px;
            padding: 10px;
            font-weight: 600;
            font-size: 15px;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2);
            color: white;
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 16px rgba(0, 0, 0, 0.3);
            background: linear-gradient(135deg, #3a5fc8, #1c3d94);
            color: white;
        }

        .btn-primary:active {
            transform: translateY(-1px);
        }

        .form-control {
            transition: all 0.3s ease;
            border: 2px solid #e0e0e0;
            border-radius: 8px;
            padding: 10px 12px;
            background: #ffffff;
            font-size: 14px;
            color: #333;
        }

        .form-control::placeholder {
            color: #999;
        }

        .form-control:focus {
            border-color: #4e73df;
            box-shadow: 0 0 0 0.2rem rgba(78, 115, 223, 0.25);
            transform: translateY(-2px);
            background: #ffffff;
            color: #333;
        }

        .form-control:hover {
            border-color: #b8b8b8;
        }

        .alert {
            padding: 10px 15px;
            font-size: 14px;
            margin-bottom: 15px;
            background: rgba(255, 255, 255, 0.9);
            border: 1px solid rgba(0, 0, 0, 0.1);
            color: #333;
            border-radius: 8px;
        }

        .alert-success {
            background: rgba(40, 167, 69, 0.2);
            border-color: rgba(40, 167, 69, 0.3);
            color: #155724;
        }

        .alert-danger {
            background: rgba(220, 53, 69, 0.2);
            border-color: rgba(220, 53, 69, 0.3);
            color: #721c24;
        }

        .text-muted {
            color: #6c757d !important;
        }

        .small {
            color: #6c757d;
        }

        hr {
            border-color: rgba(0, 0, 0, 0.1);
        }

        a {
            color: #4e73df;
        }

        a:hover {
            color: #224abe;
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
                transform: translateY(-8px);
            }
            100% {
                transform: translateY(0);
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

        @keyframes float {
            0% {
                transform: translateY(0) rotate(0deg);
                opacity: 1;
            }
            100% {
                transform: translateY(-1000px) rotate(720deg);
                opacity: 0;
            }
        }

        /* Animasi untuk alert */
        .alert {
            animation: alertPop 0.5s ease-out;
            border-radius: 8px;
            border: none;
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
        .copyright {
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

        /* Additional styling */
        .divider {
            display: flex;
            align-items: center;
            text-align: center;
            margin: 15px 0;
        }
        
        .divider::before,
        .divider::after {
            content: '';
            flex: 1;
            border-bottom: 1px solid rgba(0, 0, 0, 0.1);
        }
        
        .divider span {
            padding: 0 10px;
            color: #6c757d;
            font-size: 13px;
        }

        .copyright {
            text-shadow: 0 1px 3px rgba(0, 0, 0, 0.3);
            font-size: 13px;
            margin-top: 20px;
            color: white;
        }

        /* Responsive adjustments */
        @media (max-width: 992px) {
            .login-left, .login-right {
                padding: 30px 20px;
            }
            
            .login-container {
                max-width: 700px;
            }
        }

        @media (max-width: 768px) {
            .login-left, .login-right {
                padding: 25px 15px;
            }
            
            .login-header h4 {
                font-size: 20px;
            }
            
            .login-container {
                max-width: 100%;
            }
            
            body {
                padding: 10px;
            }
            
            .login-card {
                margin: 10px 0;
            }
            
            .login-left {
                min-height: 300px;
            }
        }

        @media (max-width: 576px) {
            .login-left, .login-right {
                padding: 20px 15px;
            }
            
            .logo-container i {
                font-size: 50px;
            }
            
            .login-left h3 {
                font-size: 20px;
            }
            
            .login-header h4 {
                font-size: 18px;
            }
            
            .login-header p {
                font-size: 13px;
            }
            
            .form-control {
                padding: 8px 12px;
                font-size: 14px;
            }
            
            .btn-primary {
                padding: 8px;
                font-size: 14px;
            }
        }
    </style>
</head>

<body>
    <!-- Background Animation -->
    <div class="bg-animation">
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
    </div>

    <div class="login-container">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="card shadow-lg login-card">
                    <div class="row g-0">
                        <!-- Bagian Kiri dengan Informasi Desa -->
                        <div class="col-lg-5 d-flex align-items-center login-left">
                            <div class="login-left-content w-100">
                                <div class="logo-container mb-3">
                                    <i class="fas fa-landmark"></i>
                                    <h3>SIPEDES</h3>
                                    <p><b>Sistem Informasi Pemerintahan Desa</b></p>
                                </div>
                                
                                <div class="village-info">
                                    <p><i class="fas fa-map-marker-alt"></i> <b>Desa Koto Baru III Jorong</b></p>
                                    <p><i class="fas fa-location-dot"></i> Kecamatan Baso, Kabupaten Agam</p>
                                    <p><i class="fas fa-phone"></i> 088708230676 </p>
                                    <p><i class="fas fa-envelope"></i> desa.kotobaru@pemdes.go.id</p>
                                </div>

                                <hr class="border-light my-3">

                                <div class="features-list">
                                    <div class="feature-item">
                                        <i class="fas fa-check-circle text-success"></i>
                                        <span>Pelayanan publik berbasis digital</span>
                                    </div>
                                    <div class="feature-item">
                                        <i class="fas fa-check-circle text-success"></i>
                                        <span>Mempermudah akses informasi warga</span>
                                    </div>
                                </div>

                                <hr class="border-light my-3">

                                <p class="small text-center mt-2">
                                    SIPEDES (Sistem Informasi Pemerintahan Desa) adalah platform digital yang membantu pemerintah desa
                                    dalam mengelola administrasi, data warga, dan pelayanan publik secara efisien serta transparan.
                                    Mendukung terwujudnya desa modern dan terintegrasi.
                                </p>
                            </div>
                        </div>

                        <!-- Bagian Kanan (Form Login) -->
                        <div class="col-lg-7 login-right">
                            <div class="login-header text-center mb-4">
                                <h4><i class="fas fa-user-lock"></i> Login Akun</h4>
                                <p class="text-muted small">Masukkan email dan password Anda untuk melanjutkan ke sistem</p>
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

                <div class="text-center mt-3 text-white copyright">
                    <span>© {{ date('Y') }} Pemerintah Desa Koto Baru III Jorong — SIPEDES (Sistem Informasi Pemerintahan Desa)</span>
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