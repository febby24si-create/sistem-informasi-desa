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

    <style>
        :root {
            --primary: #9b59b6;
            --secondary: #2c3e50;
            --accent: #e74c3c;
            --dark-bg: #1a1a2e;
            --dark-card: #16213e;
            --dark-text: #e6e6e6;
            --dark-border: #34495e;
            --success: #27ae60;
            --danger: #e74c3c;
            --warning: #f39c12;
            --info: #3498db;
            --gold: #f1c40f;
        }

        * {
            font-family: 'Poppins', sans-serif;
        }

        body {
            background: linear-gradient(135deg, var(--dark-bg), #0f3460);
            min-height: 100vh;
            display: flex;
            align-items: center;
            position: relative;
            overflow-x: hidden;
            padding: 15px;
        }

        /* Background dengan gambar kota Jepang */
        .japan-bg {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: 
                linear-gradient(rgba(26, 26, 46, 0.85), rgba(15, 52, 96, 0.9)),
                url('https://images.unsplash.com/photo-1545569341-9eb8b30979d9?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2070&q=80') no-repeat center center;
            background-size: cover;
            z-index: -1;
            animation: backgroundPan 30s ease-in-out infinite;
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
            background: rgba(155, 89, 182, 0.2);
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

        .login-container {
            width: 100%;
            max-width: 1000px;
            margin: 0 auto;
        }

        .login-card {
            border-radius: 16px;
            overflow: hidden;
            box-shadow: 
                0 15px 35px rgba(0, 0, 0, 0.5),
                0 5px 15px rgba(0, 0, 0, 0.3);
            backdrop-filter: blur(10px);
            background: rgba(22, 33, 62, 0.7);
            animation: cardEntrance 1s ease-out forwards;
            opacity: 0;
            transform: translateY(30px);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            border: 1px solid var(--dark-border);
        }

        .login-card:hover {
            transform: translateY(-5px);
            box-shadow: 
                0 20px 40px rgba(0, 0, 0, 0.6),
                0 10px 20px rgba(0, 0, 0, 0.4);
        }

        .login-left {
            background: 
                linear-gradient(rgba(155, 89, 182, 0.8), rgba(44, 62, 80, 0.9)),
                url('https://images.unsplash.com/photo-1526481280693-3bfa7568e0f3?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2071&q=80') no-repeat center center;
            background-size: cover;
            color: var(--dark-text);
            text-align: center;
            padding: 40px 25px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            overflow: hidden;
            position: relative;
        }

        .login-left::before {
            content: "";
            position: absolute;
            top: 0; left: 0;
            width: 100%; height: 100%;
            background: linear-gradient(135deg, rgba(155, 89, 182, 0.7), rgba(44, 62, 80, 0.9));
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

        /* Logo Rumah Gadang */
        .rumah-gadang {
            font-size: 80px;
            color: var(--gold);
            margin-bottom: 12px;
            transition: all 0.5s ease;
            filter: drop-shadow(0 0 8px rgba(0, 0, 0, 0.3));
            position: relative;
        }

        .rumah-gadang::before {
            content: "🏠";
            font-size: 80px;
        }

        .logo-container:hover .rumah-gadang {
            transform: scale(1.1);
            filter: drop-shadow(0 0 12px rgba(0, 0, 0, 0.5));
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

        .login-right {
            padding: 35px 30px;
            background: var(--dark-card);
            display: flex;
            flex-direction: column;
            justify-content: center;
            color: var(--dark-text);
        }

        .login-header {
            text-align: center;
            margin-bottom: 25px;
        }

        .login-header h4 {
            font-weight: 700;
            color: var(--dark-text);
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
            background: linear-gradient(to right, var(--primary), var(--accent));
            border-radius: 3px;
        }

        .login-header p {
            color: #b8b8b8;
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
            color: var(--dark-text);
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
            color: var(--primary);
            z-index: 5;
        }

        .form-control {
            transition: all 0.3s ease;
            border: 2px solid var(--dark-border);
            border-radius: 8px;
            padding: 10px 12px 10px 40px;
            background: rgba(30, 40, 70, 0.7);
            font-size: 14px;
            color: var(--dark-text);
            height: 48px;
        }

        .form-control::placeholder {
            color: #8a8a8a;
        }

        .form-control:focus {
            border-color: var(--primary);
            box-shadow: 0 0 0 0.2rem rgba(155, 89, 182, 0.25);
            transform: translateY(-2px);
            background: rgba(40, 50, 80, 0.7);
            color: var(--dark-text);
        }

        .form-control:hover {
            border-color: #5a6c7d;
        }

        .password-toggle {
            position: absolute;
            right: 12px;
            top: 50%;
            transform: translateY(-50%);
            background: none;
            border: none;
            color: var(--primary);
            cursor: pointer;
            z-index: 5;
        }

        .password-toggle:hover {
            color: var(--accent);
        }

        .btn-primary {
            background: linear-gradient(135deg, var(--primary), var(--accent));
            border: none;
            border-radius: 8px;
            padding: 12px;
            font-weight: 600;
            font-size: 15px;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.3);
            color: white;
            height: 48px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 16px rgba(0, 0, 0, 0.4);
            background: linear-gradient(135deg, var(--accent), var(--primary));
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
            background: rgba(255, 255, 255, 0.1);
            border: 1px solid rgba(255, 255, 255, 0.1);
            color: var(--dark-text);
            border-radius: 8px;
        }

        .alert-success {
            background: rgba(39, 174, 96, 0.2);
            border-color: rgba(39, 174, 96, 0.3);
            color: #a8e6b8;
        }

        .alert-danger {
            background: rgba(231, 76, 60, 0.2);
            border-color: rgba(231, 76, 60, 0.3);
            color: #ffb8b8;
        }

        .text-muted {
            color: #8a8a8a !important;
        }

        .small {
            color: #8a8a8a;
        }

        hr {
            border-color: var(--dark-border);
        }

        a {
            color: var(--primary);
        }

        a:hover {
            color: var(--accent);
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

        @keyframes backgroundPan {
            0% {
                background-position: 0% 0%;
            }
            50% {
                background-position: 100% 100%;
            }
            100% {
                background-position: 0% 0%;
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

        .copyright {
            text-shadow: 0 1px 3px rgba(0, 0, 0, 0.3);
            font-size: 13px;
            margin-top: 20px;
            color: #b8b8b8;
        }

        /* Sakura Animation */
        .sakura {
            position: absolute;
            top: -50px;
            width: 15px;
            height: 15px;
            background: rgba(255, 183, 197, 0.7);
            border-radius: 50% 0 50% 50%;
            transform: rotate(45deg);
            animation: sakuraFall 15s linear infinite;
            z-index: -1;
        }

        .sakura:nth-child(1) {
            left: 10%;
            animation-delay: 0s;
            animation-duration: 20s;
        }

        .sakura:nth-child(2) {
            left: 20%;
            animation-delay: 2s;
            animation-duration: 18s;
        }

        .sakura:nth-child(3) {
            left: 30%;
            animation-delay: 4s;
            animation-duration: 15s;
        }

        .sakura:nth-child(4) {
            left: 40%;
            animation-delay: 6s;
            animation-duration: 22s;
        }

        .sakura:nth-child(5) {
            left: 50%;
            animation-delay: 8s;
            animation-duration: 17s;
        }

        .sakura:nth-child(6) {
            left: 60%;
            animation-delay: 10s;
            animation-duration: 19s;
        }

        .sakura:nth-child(7) {
            left: 70%;
            animation-delay: 12s;
            animation-duration: 21s;
        }

        .sakura:nth-child(8) {
            left: 80%;
            animation-delay: 14s;
            animation-duration: 16s;
        }

        @keyframes sakuraFall {
            0% {
                top: -50px;
                transform: rotate(45deg) translateX(0);
                opacity: 1;
            }
            100% {
                top: 100vh;
                transform: rotate(45deg) translateX(100px);
                opacity: 0;
            }
        }

        /* Custom Rumah Gadang Icon */
        .custom-rumah-gadang {
            width: 80px;
            height: 80px;
            margin: 0 auto 15px;
            position: relative;
            background: linear-gradient(45deg, var(--gold), #e67e22);
            clip-path: polygon(0% 100%, 50% 0%, 100% 100%);
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.3);
        }

        .custom-rumah-gadang::before {
            content: "";
            position: absolute;
            top: 10px;
            left: 10px;
            right: 10px;
            bottom: 10px;
            background: var(--dark-card);
            clip-path: polygon(0% 100%, 50% 20%, 100% 100%);
        }

        .custom-rumah-gadang::after {
            content: "";
            position: absolute;
            bottom: -5px;
            left: 15px;
            right: 15px;
            height: 10px;
            background: #8B4513;
            border-radius: 5px;
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
            
            .rumah-gadang {
                font-size: 60px;
            }
            
            .custom-rumah-gadang {
                width: 60px;
                height: 60px;
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
    <!-- Background dengan gambar kota Jepang -->
    <div class="japan-bg"></div>

    <!-- Sakura Animation -->
    <div class="sakura-container">
        <div class="sakura"></div>
        <div class="sakura"></div>
        <div class="sakura"></div>
        <div class="sakura"></div>
        <div class="sakura"></div>
        <div class="sakura"></div>
        <div class="sakura"></div>
        <div class="sakura"></div>
    </div>

    <!-- Background Animation -->
    <div class="bg-animation">
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
                                    <!-- Logo Rumah Gadang Custom -->
                                    <div class="custom-rumah-gadang"></div>
                                    <h3>SIPEDES</h3>
                                    <p><b>Sistem Informasi Pemerintahan Desa</b></p>
                                </div>
                                
                                <div class="village-info">
                                    <p><i class="fas fa-map-marker-alt"></i> <b>Desa Koto Baru III Jorong</b></p>
                                    <p><i class="fas fa-location-dot"></i> Kecamatan Baso, Kabupaten Agam</p>
                                    <p><i class="fas fa-phone"></i> 088708230676 </p>
                                    <p><i class="fas fa-envelope"></i> desa.kotobaru@pemdes.go.id</p>
                                </div>
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

                <div class="text-center mt-3 copyright">
                    <span>© {{ date('Y') }} Pemerintah Desa Koto Baru III Jorong — SIPEDES</span>
                </div>
            </div>
        </div>
    </div>

    <!-- Script -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

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