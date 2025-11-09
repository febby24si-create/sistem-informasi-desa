<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Registrasi - SIPEDES</title>

    <!-- Bootstrap Core CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <!-- SB Admin 2 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/startbootstrap-sb-admin-2@4.1.4/css/sb-admin-2.min.css" rel="stylesheet">

    <style>
        :root {
            --primary: #1cc88a;
            --primary-dark: #17a673;
            --primary-light: #4cd9a5;
            --secondary: #4e73df;
            --accent: #36b9cc;
            --dark: #2e3a59;
            --light: #f8f9fc;
            --gray: #6c757d;
            --white: #ffffff;
            --gradient: linear-gradient(135deg, var(--primary), var(--secondary));
        }

        * {
            font-family: 'Poppins', sans-serif;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            background: linear-gradient(135deg, 
                    rgba(28, 200, 138, 0.85), 
                    rgba(78, 115, 223, 0.85)),
                    url('https://images.unsplash.com/photo-1586773860418-d37222d8fce3?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2073&q=80') center/cover no-repeat fixed;
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

        .register-container {
            width: 100%;
            max-width: 1100px;
            margin: 0 auto;
        }

        .register-card {
            border-radius: 25px;
            overflow: hidden;
            box-shadow: 
                0 25px 50px rgba(0, 0, 0, 0.25),
                0 15px 30px rgba(0, 0, 0, 0.15),
                inset 0 1px 0 rgba(255, 255, 255, 0.5);
            backdrop-filter: blur(15px);
            background: rgba(255, 255, 255, 0.95);
            animation: cardEntrance 1s ease-out forwards;
            opacity: 0;
            transform: translateY(30px);
            transition: all 0.4s ease;
            border: 1px solid rgba(255, 255, 255, 0.3);
        }

        .register-card:hover {
            transform: translateY(-10px);
            box-shadow: 
                0 35px 70px rgba(0, 0, 0, 0.3),
                0 20px 40px rgba(0, 0, 0, 0.2),
                inset 0 1px 0 rgba(255, 255, 255, 0.5);
        }

        .register-left {
            background: 
                linear-gradient(135deg, rgba(28, 200, 138, 0.9), rgba(78, 115, 223, 0.9)),
                url('https://images.unsplash.com/photo-1596457226670-7b2a9efefb2b?auto=format&fit=crop&w=900&q=80') no-repeat center center;
            background-size: cover;
            position: relative;
            color: #fff;
            text-align: center;
            padding: 60px 40px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            overflow: hidden;
        }

        .register-left::before {
            content: "";
            position: absolute;
            top: 0; left: 0;
            width: 100%; height: 100%;
            background: rgba(0, 0, 0, 0.4);
            animation: overlayFade 1.5s ease-out 0.5s forwards;
            opacity: 0;
        }

        .register-left::after {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: 
                radial-gradient(circle at 20% 80%, rgba(255, 255, 255, 0.15) 0%, transparent 50%),
                radial-gradient(circle at 80% 20%, rgba(255, 255, 255, 0.15) 0%, transparent 50%),
                radial-gradient(circle at 40% 40%, rgba(255, 255, 255, 0.1) 0%, transparent 50%);
            z-index: 1;
        }

        .register-left-content {
            position: relative;
            z-index: 2;
            animation: contentFadeIn 1s ease-out 0.8s forwards;
            opacity: 0;
        }

        .logo-container {
            margin-bottom: 30px;
            animation: logoFloat 4s ease-in-out infinite;
        }

        .logo-container i {
            font-size: 80px;
            color: white;
            filter: drop-shadow(0 0 10px rgba(255,255,255,0.7));
            margin-bottom: 20px;
            transition: all 0.5s ease;
        }

        .logo-container:hover i {
            transform: scale(1.15) rotate(8deg);
            filter: drop-shadow(0 0 15px rgba(255,255,255,0.9));
        }

        .register-left h3 {
            font-weight: 700;
            color: #fff;
            margin-bottom: 10px;
            text-shadow: 0 2px 10px rgba(0, 0, 0, 0.3);
            letter-spacing: 0.5px;
            font-size: 32px;
        }

        .register-left p {
            color: #f1f1f1;
            font-size: 16px;
            line-height: 1.6;
            margin-bottom: 5px;
        }

        .features-list {
            margin-top: 30px;
            text-align: left;
        }

        .feature-item {
            display: flex;
            align-items: center;
            margin-bottom: 15px;
            padding: 12px 15px;
            border-radius: 10px;
            transition: all 0.3s ease;
            background: rgba(255, 255, 255, 0.15);
            font-size: 15px;
            backdrop-filter: blur(5px);
        }

        .feature-item:hover {
            background: rgba(255, 255, 255, 0.25);
            transform: translateX(8px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }

        .feature-item i {
            margin-right: 12px;
            font-size: 18px;
        }

        .register-right {
            padding: 50px 45px;
            background: #fff;
            display: flex;
            flex-direction: column;
            justify-content: center;
            position: relative;
        }

        .register-right::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: 
                radial-gradient(circle at top right, rgba(28, 200, 138, 0.05) 0%, transparent 50%),
                radial-gradient(circle at bottom left, rgba(78, 115, 223, 0.05) 0%, transparent 50%);
            z-index: 0;
        }

        .register-right > * {
            position: relative;
            z-index: 1;
        }

        .register-header {
            text-align: center;
            margin-bottom: 35px;
        }

        .register-header h4 {
            font-weight: 700;
            color: var(--dark);
            margin-bottom: 8px;
            position: relative;
            display: inline-block;
            font-size: 28px;
        }

        .register-header h4::after {
            content: '';
            position: absolute;
            bottom: -12px;
            left: 50%;
            transform: translateX(-50%);
            width: 70px;
            height: 4px;
            background: var(--gradient);
            border-radius: 4px;
        }

        .register-header p {
            color: var(--gray);
            font-size: 16px;
            margin-top: 20px;
        }

        .btn-primary {
            background: var(--gradient);
            border: none;
            border-radius: 12px;
            padding: 14px;
            font-weight: 600;
            font-size: 16px;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
            box-shadow: 0 5px 20px rgba(28, 200, 138, 0.4);
            letter-spacing: 0.5px;
        }

        .btn-primary:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(28, 200, 138, 0.5);
            background: linear-gradient(135deg, var(--secondary), var(--primary));
        }

        .btn-primary:active {
            transform: translateY(-2px);
        }

        .form-control {
            transition: all 0.3s ease;
            border: 2px solid #e8f0fe;
            border-radius: 12px;
            padding: 14px 18px;
            background: rgba(255, 255, 255, 0.9);
            font-size: 15px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.05);
        }

        .form-control:focus {
            border-color: var(--primary);
            box-shadow: 0 0 0 0.2rem rgba(28, 200, 138, 0.25), 0 5px 15px rgba(0, 0, 0, 0.1);
            transform: translateY(-3px);
            background: white;
        }

        .form-control:hover {
            border-color: #d0e0ff;
            box-shadow: 0 3px 8px rgba(0, 0, 0, 0.08);
        }

        .form-check-input:checked {
            background-color: var(--primary);
            border-color: var(--primary);
        }

        .form-check-label {
            font-weight: 500;
            color: var(--dark);
        }

        .form-label {
            font-weight: 600;
            color: var(--dark);
            margin-bottom: 10px;
            display: block;
        }

        .alert {
            padding: 15px 20px;
            font-size: 15px;
            margin-bottom: 25px;
            border-radius: 12px;
            border: none;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }

        .copyright {
            text-shadow: 0 1px 3px rgba(0, 0, 0, 0.3);
            font-size: 14px;
            margin-top: 30px;
            color: white;
            font-weight: 500;
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
                transform: translateY(-12px);
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

        /* Animasi untuk tombol register */
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

        /* Progress bar untuk kekuatan password */
        .password-strength {
            height: 6px;
            border-radius: 3px;
            margin-top: 8px;
            background: #e9ecef;
            overflow: hidden;
            transition: all 0.3s ease;
        }

        .password-strength-bar {
            height: 100%;
            width: 0%;
            border-radius: 3px;
            transition: all 0.3s ease;
        }

        .strength-weak {
            background: #dc3545;
            width: 25%;
        }

        .strength-medium {
            background: #ffc107;
            width: 50%;
        }

        .strength-strong {
            background: #28a745;
            width: 75%;
        }

        .strength-very-strong {
            background: #20c997;
            width: 100%;
        }

        /* Role selection styling */
        .role-option {
            border: 2px solid #e9ecef;
            border-radius: 12px;
            padding: 15px;
            margin-bottom: 10px;
            cursor: pointer;
            transition: all 0.3s ease;
            background: white;
        }

        .role-option:hover {
            border-color: var(--primary-light);
            transform: translateY(-3px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }

        .role-option.active {
            border-color: var(--primary);
            background: rgba(28, 200, 138, 0.05);
        }

        .role-icon {
            font-size: 24px;
            margin-bottom: 10px;
        }

        /* Responsive adjustments */
        @media (max-width: 992px) {
            .register-left, .register-right {
                padding: 40px 30px;
            }
            
            .register-container {
                max-width: 900px;
            }
        }

        @media (max-width: 768px) {
            .register-left, .register-right {
                padding: 30px 20px;
            }
            
            .register-header h4 {
                font-size: 24px;
            }
            
            .register-container {
                max-width: 100%;
            }
            
            body {
                padding: 10px;
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

    <div class="register-container">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="card shadow-lg register-card">
                    <div class="row g-0">
                        <!-- Bagian kiri (gambar & identitas) -->
                        <div class="col-lg-5 d-flex align-items-center register-left">
                            <div class="register-left-content w-100">
                                <div class="logo-container">
                                    <i class="fas fa-landmark"></i>
                                    <h3>SIPEDES</h3>
                                    <p><b>Sistem Informasi Pemerintahan Desa</b></p>
                                </div>
                                
                                <div class="features-list">
                                    <div class="feature-item">
                                        <i class="fas fa-check-circle text-success"></i>
                                        <span>Digitalisasi administrasi desa</span>
                                    </div>
                                    <div class="feature-item">
                                        <i class="fas fa-check-circle text-success"></i>
                                        <span>Pelayanan masyarakat yang efisien</span>
                                    </div>
                                    <div class="feature-item">
                                        <i class="fas fa-check-circle text-success"></i>
                                        <span>Transparansi pengelolaan desa</span>
                                    </div>
                                </div>

                                <hr class="border-light my-4">

                                <p class="small text-center">
                                    Modul ini dikembangkan oleh tim rekan-rekan untuk mendukung digitalisasi administrasi desa dan pelayanan masyarakat yang lebih efisien.
                                </p>
                            </div>
                        </div>

                        <!-- Bagian kanan (form registrasi) -->
                        <div class="col-lg-7 register-right">
                            <div class="register-header text-center mb-4">
                                <h4><i class="fas fa-user-plus"></i> Registrasi Akun</h4>
                                <p class="text-muted">Lengkapi data di bawah untuk membuat akun baru</p>
                            </div>

                            <!-- Alert Section -->
                            <div class="alert-section">
                                <!-- Alert akan ditampilkan di sini -->
                            </div>

                            <form method="POST" action="{{ route('register') }}">
                                @csrf

                                <div class="mb-4">
                                    <label class="form-label" for="name">Nama Lengkap</label>
                                    <input type="text" class="form-control form-control-user @error('name') is-invalid @enderror"
                                           name="name" value="{{ old('name') }}"
                                           placeholder="Masukkan nama lengkap Anda" required autofocus>
                                    @error('name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-4">
                                    <label class="form-label" for="email">Alamat Email</label>
                                    <input type="email" class="form-control form-control-user @error('email') is-invalid @enderror"
                                           name="email" value="{{ old('email') }}"
                                           placeholder="nama@contoh.com" required>
                                    @error('email')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="row mb-4">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <label class="form-label" for="password">Password</label>
                                        <input type="password" class="form-control form-control-user @error('password') is-invalid @enderror"
                                               name="password" placeholder="Buat password" required>
                                        <div class="password-strength mt-2">
                                            <div class="password-strength-bar" id="password-strength-bar"></div>
                                        </div>
                                        @error('password')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-sm-6">
                                        <label class="form-label" for="password_confirmation">Konfirmasi Password</label>
                                        <input type="password" class="form-control form-control-user"
                                               name="password_confirmation" placeholder="Ulangi password" required>
                                    </div>
                                </div>

                                <div class="mb-4">
                                    <label class="form-label fw-semibold">Pilih Role</label>
                                    <div class="row">
                                        <div class="col-sm-6 mb-3">
                                            <div class="role-option" data-role="admin">
                                                <div class="role-icon text-warning">
                                                    <i class="fas fa-crown"></i>
                                                </div>
                                                <h6 class="fw-bold">Administrator</h6>
                                                <p class="small text-muted mb-0">Akses penuh ke semua fitur sistem</p>
                                                <input class="form-check-input d-none" type="radio" name="role" id="roleAdmin" value="admin" {{ old('role') == 'admin' ? 'checked' : '' }}>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 mb-3">
                                            <div class="role-option active" data-role="operator">
                                                <div class="role-icon text-primary">
                                                    <i class="fas fa-user"></i>
                                                </div>
                                                <h6 class="fw-bold">Operator</h6>
                                                <p class="small text-muted mb-0">Akses terbatas untuk input data</p>
                                                <input class="form-check-input d-none" type="radio" name="role" id="roleOperator" value="operator" {{ old('role') == 'operator' ? 'checked' : '' }} checked>
                                            </div>
                                        </div>
                                    </div>
                                    @error('role')
                                        <div class="text-danger small mt-1">{{ $message }}</div>
                                    @enderror
                                </div>

                                <button type="submit" class="btn btn-primary btn-user btn-block w-100 mt-3">
                                    <i class="fas fa-user-plus"></i> Daftar Akun
                                </button>
                            </form>

                            <hr>
                            <div class="text-center">
                                <a class="small" href="{{ route('login') }}">
                                    <i class="fas fa-sign-in-alt"></i> Sudah punya akun? Login!
                                </a>
                            </div>

                            <div class="text-center mt-3">
                                <small class="text-muted">
                                    <i class="fas fa-info-circle"></i>
                                    Pastikan data yang dimasukkan valid. Email akan digunakan untuk login.
                                </small>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="text-center mt-3 copyright">
                    <span>© 2025 Tim Pengembang SIPEDES — Semua Hak Dilindungi</span>
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
    // Efek ripple untuk tombol register
    document.querySelector('.btn-primary').addEventListener('click', function(e) {
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
    });

    // Role selection
    document.querySelectorAll('.role-option').forEach(option => {
        option.addEventListener('click', function() {
            document.querySelectorAll('.role-option').forEach(opt => {
                opt.classList.remove('active');
            });
            this.classList.add('active');
            const radioInput = this.querySelector('input[type="radio"]');
            radioInput.checked = true;
        });
    });

    // Indikator kekuatan password dengan progress bar
    const passwordInput = document.querySelector('input[name="password"]');
    const strengthBar = document.getElementById('password-strength-bar');
    
    if (passwordInput && strengthBar) {
        passwordInput.addEventListener('input', function(e) {
            const password = e.target.value;
            const strength = checkPasswordStrength(password);
            
            // Reset classes
            strengthBar.className = 'password-strength-bar';
            
            // Apply appropriate class based on strength
            if (password.length > 0) {
                strengthBar.classList.add(`strength-${strength.level}`);
            }
        });
    }

    function checkPasswordStrength(password) {
        let strength = 0;
        if (password.length >= 6) strength++;
        if (password.match(/[a-z]+/)) strength++;
        if (password.match(/[A-Z]+/)) strength++;
        if (password.match(/[0-9]+/)) strength++;
        if (password.match(/[!@#$%^&*()_+\-=\[\]{};':"\\|,.<>\/?]+/)) strength++;

        if (strength <= 2) return { level: 'weak', text: 'Lemah' };
        if (strength <= 3) return { level: 'medium', text: 'Sedang' };
        if (strength <= 4) return { level: 'strong', text: 'Kuat' };
        return { level: 'very-strong', text: 'Sangat Kuat' };
    }

    // Validasi konfirmasi password
    const confirmPasswordInput = document.querySelector('input[name="password_confirmation"]');
    if (confirmPasswordInput) {
        confirmPasswordInput.addEventListener('input', function(e) {
            const password = passwordInput.value;
            const confirm = e.target.value;
            e.target.classList.toggle('is-invalid', password !== confirm && confirm.length > 0);
        });
    }

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