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
            --primary: #2c3e50;
            --primary-dark: #1a252f;
            --secondary: #3498db;
            --accent: #9b59b6;
            --dark: #2c3e50;
            --light: #f8f9fc;
            --gray: #6c757d;
            --white: #ffffff;
            --blue-dark: #2c3e50;
            --blue-light: #3498db;
            --purple: #9b59b6;
            --teal: #1abc9c;
        }

        * {
            font-family: 'Poppins', sans-serif;
        }

        body {
            background: linear-gradient(135deg, #1a2a3a, #2c3e50, #34495e);
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
            background: rgba(255, 255, 255, 0.1);
            animation: float 25s linear infinite;
            bottom: -150px;
            border-radius: 50%;
        }

        .bg-animation span:nth-child(1) {
            left: 25%;
            width: 80px;
            height: 80px;
            animation-delay: 0s;
            animation-duration: 20s;
            background: rgba(52, 152, 219, 0.2);
        }

        .bg-animation span:nth-child(2) {
            left: 10%;
            width: 20px;
            height: 20px;
            animation-delay: 2s;
            animation-duration: 12s;
            background: rgba(155, 89, 182, 0.2);
        }

        .bg-animation span:nth-child(3) {
            left: 70%;
            width: 60px;
            height: 60px;
            animation-delay: 4s;
            animation-duration: 18s;
            background: rgba(26, 188, 156, 0.2);
        }

        .bg-animation span:nth-child(4) {
            left: 40%;
            width: 60px;
            height: 60px;
            animation-delay: 0s;
            animation-duration: 18s;
            background: rgba(52, 152, 219, 0.2);
        }

        .bg-animation span:nth-child(5) {
            left: 65%;
            width: 40px;
            height: 40px;
            animation-delay: 0s;
            animation-duration: 15s;
            background: rgba(155, 89, 182, 0.2);
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
                0 15px 35px rgba(0, 0, 0, 0.3),
                0 5px 15px rgba(0, 0, 0, 0.2);
            backdrop-filter: blur(10px);
            background: rgba(255, 255, 255, 0.1);
            animation: cardEntrance 1s ease-out forwards;
            opacity: 0;
            transform: translateY(30px);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            border: 1px solid rgba(255, 255, 255, 0.15);
        }

        .login-card:hover {
            transform: translateY(-5px);
            box-shadow: 
                0 20px 40px rgba(0, 0, 0, 0.4),
                0 10px 20px rgba(0, 0, 0, 0.25);
        }

        .login-left {
            background: linear-gradient(135deg, rgba(44, 62, 80, 0.9), rgba(52, 73, 94, 0.9)), 
                        url('https://images.unsplash.com/photo-1593113630400-ea4288922497?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2070&q=80') no-repeat center center;
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
            background: linear-gradient(135deg, rgba(44, 62, 80, 0.8), rgba(52, 73, 94, 0.9));
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
            font-size: 70px;
            color: #ffffff;
            filter: drop-shadow(0 0 8px rgba(0, 0, 0, 0.6));
            margin-bottom: 12px;
            transition: all 0.5s ease;
            background: linear-gradient(135deg, #3498db, #9b59b6);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
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
            color: #3498db;
        }

        .login-right {
            padding: 35px 30px;
            background: rgba(255, 255, 255, 0.95);
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
            color: var(--blue-dark);
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
            background: linear-gradient(to right, var(--blue-dark), var(--blue-light));
            border-radius: 3px;
        }

        .login-header p {
            color: #666;
            font-size: 14px;
            margin-top: 15px;
        }

        /* Form styling improvements */
        .form-group {
            margin-bottom: 1.5rem;
            position: relative;
        }

        .form-label {
            font-weight: 500;
            color: var(--blue-dark);
            margin-bottom: 0.5rem;
            display: block;
            font-size: 14px;
        }

        .input-group {
            position: relative;
        }

        .input-icon {
            position: absolute;
            left: 12px;
            top: 50%;
            transform: translateY(-50%);
            color: var(--blue-light);
            z-index: 5;
        }

        .form-control {
            transition: all 0.3s ease;
            border: 2px solid #e0e0e0;
            border-radius: 8px;
            padding: 10px 12px 10px 40px;
            background: #ffffff;
            font-size: 14px;
            color: #333;
            height: 48px;
        }

        .form-control::placeholder {
            color: #999;
        }

        .form-control:focus {
            border-color: var(--blue-light);
            box-shadow: 0 0 0 0.2rem rgba(52, 152, 219, 0.15);
            transform: translateY(-2px);
            background: #ffffff;
            color: #333;
        }

        .form-control:hover {
            border-color: #b8b8b8;
        }

        .password-toggle {
            position: absolute;
            right: 12px;
            top: 50%;
            transform: translateY(-50%);
            background: none;
            border: none;
            color: var(--blue-light);
            cursor: pointer;
            z-index: 5;
        }

        .password-toggle:hover {
            color: var(--purple);
        }

        .btn-primary {
            background: linear-gradient(135deg, var(--blue-dark), var(--blue-light));
            border: none;
            border-radius: 8px;
            padding: 12px;
            font-weight: 600;
            font-size: 15px;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2);
            color: white;
            height: 48px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 16px rgba(0, 0, 0, 0.3);
            background: linear-gradient(135deg, var(--blue-light), var(--purple));
            color: white;
        }

        .btn-primary:active {
            transform: translateY(-1px);
        }

        .btn-primary i {
            margin-right: 8px;
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
            color: var(--blue-light);
        }

        a:hover {
            color: var(--purple);
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

        /* Cloud Animation */
        .clouds {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            overflow: hidden;
            z-index: -1;
        }

        .cloud {
            position: absolute;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 100px;
            animation: cloudMove 40s linear infinite;
            box-shadow: 0 0 20px rgba(255, 255, 255, 0.2);
        }

        .cloud:before,
        .cloud:after {
            content: '';
            position: absolute;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 50%;
        }

        .cloud:before {
            width: 60px;
            height: 60px;
            top: -30px;
            left: 20px;
        }

        .cloud:after {
            width: 80px;
            height: 80px;
            top: -40px;
            right: 20px;
        }

        .cloud1 {
            width: 120px;
            height: 40px;
            top: 20%;
            animation-duration: 50s;
            animation-delay: 0s;
        }

        .cloud2 {
            width: 160px;
            height: 50px;
            top: 30%;
            animation-duration: 60s;
            animation-delay: 10s;
        }

        .cloud3 {
            width: 100px;
            height: 30px;
            top: 15%;
            animation-duration: 45s;
            animation-delay: 5s;
        }

        @keyframes cloudMove {
            from {
                left: -200px;
            }
            to {
                left: 100%;
            }
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
                padding: 8px 12px 8px 35px;
                font-size: 14px;
                height: 44px;
            }
            
            .btn-primary {
                padding: 10px;
                font-size: 14px;
                height: 44px;
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

    <!-- Cloud Animation -->
    <div class="clouds">
        <div class="cloud cloud1"></div>
        <div class="cloud cloud2"></div>
        <div class="cloud cloud3"></div>
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
                                    <i class="fas fa-city"></i>
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
                                        <i class="fas fa-check-circle"></i>
                                        <span>Pelayanan publik berbasis digital</span>
                                    </div>
                                    <div class="feature-item">
                                        <i class="fas fa-check-circle"></i>
                                        <span>Mempermudah akses informasi warga</span>
                                    </div>
                                    <div class="feature-item">
                                        <i class="fas fa-check-circle"></i>
                                        <span>Administrasi desa yang terintegrasi</span>
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
                                <h4><i class="fas fa-user-shield"></i> Login Akun</h4>
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
                                
                                <div class="form-group">
                                    <label for="email" class="form-label">Alamat Email</label>
                                    <div class="input-group">
                                        <i class="fas fa-at input-icon"></i>
                                        <input type="email" class="form-control form-control-user" id="email"
                                               name="email" value="{{ old('email') }}"
                                               placeholder="nama@contoh.com" required autofocus>
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <label for="password" class="form-label">Kata Sandi</label>
                                    <div class="input-group">
                                        <i class="fas fa-key input-icon"></i>
                                        <input type="password" class="form-control form-control-user" id="password"
                                               name="password" placeholder="Masukkan kata sandi" required>
                                        <button type="button" class="password-toggle" id="togglePassword">
                                            <i class="fas fa-eye"></i>
                                        </button>
                                    </div>
                                </div>
                                
                                <div class="form-group form-check mb-3">
                                    <input type="checkbox" class="form-check-input" id="remember" name="remember">
                                    <label class="form-check-label small" for="remember">
                                        <i class="fas fa-history"></i> Ingat saya
                                    </label>
                                </div>
                                
                                <button type="submit" class="btn btn-primary btn-user btn-block w-100 mb-3">
                                    <i class="fas fa-sign-in-alt"></i> Masuk ke Sistem
                                </button>
                            </form>

                            <div class="text-center mt-4">
                                <small class="text-muted">
                                    <i class="fas fa-info-circle"></i> Gunakan akun yang diberikan oleh admin desa.
                                </small>
                            </div>

                            <hr class="my-4">
                            <div class="text-center">
                                <a class="small" href="{{ route('register') }}"><i class="fas fa-user-plus"></i> Belum punya akun? Daftar di sini</a>
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
        // Toggle password visibility
        document.getElementById('togglePassword').addEventListener('click', function() {
            const passwordInput = document.getElementById('password');
            const icon = this.querySelector('i');
            
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                icon.classList.remove('fa-eye');
                icon.classList.add('fa-eye-slash');
            } else {
                passwordInput.type = 'password';
                icon.classList.remove('fa-eye-slash');
                icon.classList.add('fa-eye');
            }
        });

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