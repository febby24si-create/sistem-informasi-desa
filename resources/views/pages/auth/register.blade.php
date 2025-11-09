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
    <link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700" rel="stylesheet">

    <!-- SB Admin 2 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/startbootstrap-sb-admin-2@4.1.4/css/sb-admin-2.min.css" rel="stylesheet">

    <style>
        body {
            background: linear-gradient(135deg, #1cc88a, #36b9cc);
        }
        .register-card {
            border-radius: 15px;
            overflow: hidden;
        }
        .register-left {
            background: url('https://images.unsplash.com/photo-1596457226670-7b2a9efefb2b?auto=format&fit=crop&w=900&q=80') no-repeat center center;
            background-size: cover;
            position: relative;
            color: #fff;
            text-align: center;
            padding: 60px 30px;
        }
        .register-left::before {
            content: "";
            position: absolute;
            top: 0; left: 0;
            width: 100%; height: 100%;
            background: rgba(0, 90, 60, 0.6);
        }
        .register-left-content {
            position: relative;
            z-index: 2;
        }
        .register-left img {
            width: 120px;
            margin-bottom: 20px;
            filter: drop-shadow(0 0 4px rgba(255,255,255,0.8));
        }
        .register-left h3 {
            font-weight: 700;
            color: #fff;
        }
        .register-left p {
            color: #f1f1f1;
            font-size: 14px;
        }
        .register-right {
            padding: 50px;
            background: #fff;
        }
        .btn-primary {
            background-color: #1cc88a;
            border: none;
        }
        .btn-primary:hover {
            background-color: #17a673;
        }
    </style>
</head>

<body>
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-xl-8 col-lg-10 col-md-10">
                <div class="card shadow-lg register-card">
                    <div class="row g-0">
                        <!-- Bagian kiri (gambar & identitas) -->
                        <div class="col-lg-5 d-flex align-items-center register-left">
                            <div class="register-left-content w-100">
                                <img src="https://cdn-icons-png.flaticon.com/512/2956/2956817.png" alt="Logo Desa">
                                <h3><i class="fas fa-home"></i> SIPEDES</h3>
                                <p><b>Sistem Informasi Pemerintahan Desa</b></p>
                                <hr class="border-light">
                                <p class="small">
                                    Modul ini dikembangkan oleh tim rekan-rekan untuk mendukung digitalisasi administrasi desa dan pelayanan masyarakat yang lebih efisien.
                                </p>
                            </div>
<<<<<<< HEAD
                            
                            @include('pages.partials.alert')
=======
                        </div>
>>>>>>> 8c3c1d42a26caacfcc4638c5d88e7c1d654465bc

                        <!-- Bagian kanan (form registrasi) -->
                        <div class="col-lg-7 register-right">
                            <div class="text-center mb-4">
                                <h4 class="text-gray-900"><i class="fas fa-user-plus"></i> Registrasi Akun</h4>
                                <p class="text-muted small">Lengkapi data di bawah untuk membuat akun baru</p>
                            </div>

                            @include('layouts.partials.alert')

                            <form method="POST" action="{{ route('register') }}">
                                @csrf

                                <div class="mb-3">
                                    <input type="text" class="form-control form-control-user @error('name') is-invalid @enderror"
                                           name="name" value="{{ old('name') }}"
                                           placeholder="Nama Lengkap" required autofocus>
                                    @error('name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <input type="email" class="form-control form-control-user @error('email') is-invalid @enderror"
                                           name="email" value="{{ old('email') }}"
                                           placeholder="Alamat Email" required>
                                    @error('email')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="password" class="form-control form-control-user @error('password') is-invalid @enderror"
                                               name="password" placeholder="Password" required>
                                        @error('password')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="password" class="form-control form-control-user"
                                               name="password_confirmation" placeholder="Ulangi Password" required>
                                    </div>
                                </div>

                                <div class="mt-3">
                                    <label class="form-label fw-semibold">Pilih Role</label>
                                    <div class="row">
                                        <div class="col-sm-6 mb-2">
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="role" id="roleAdmin" value="admin" {{ old('role') == 'admin' ? 'checked' : '' }}>
                                                <label class="form-check-label" for="roleAdmin">
                                                    <i class="fas fa-crown text-success"></i> Administrator
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="role" id="roleOperator" value="operator" {{ old('role') == 'operator' ? 'checked' : '' }} checked>
                                                <label class="form-check-label" for="roleOperator">
                                                    <i class="fas fa-user text-info"></i> Operator
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    @error('role')
                                        <div class="text-danger small">{{ $message }}</div>
                                    @enderror
                                    {{-- <small class="form-text text-muted">
                                        <strong>Administrator:</strong> Akses penuh sistem<br>
                                        <strong>Operator:</strong> Akses input data terbatas
                                    </small> --}}
                                </div>

                                <button type="submit" class="btn btn-primary btn-user btn-block w-100 mt-4">
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
    // Indikator kekuatan password
    const passwordInput = document.querySelector('input[name="password"]');
    if (passwordInput) {
        passwordInput.addEventListener('input', function(e) {
            const password = e.target.value;
            let badge = document.getElementById('password-strength');
            if (!badge) {
                badge = document.createElement('small');
                badge.id = 'password-strength';
                badge.className = 'form-text mt-1';
                e.target.parentNode.appendChild(badge);
            }

            const strength = checkPasswordStrength(password);
            badge.innerHTML = `Kekuatan password: <span class="badge bg-${strength.color}">${strength.text}</span>`;
        });
    }

    function checkPasswordStrength(password) {
        let strength = 0;
        if (password.length >= 6) strength++;
        if (password.match(/[a-z]+/)) strength++;
        if (password.match(/[A-Z]+/)) strength++;
        if (password.match(/[0-9]+/)) strength++;
        if (password.match(/[!@#$%^&*()_+\-=\[\]{};':"\\|,.<>\/?]+/)) strength++;

        if (strength <= 2) return { text: 'Lemah', color: 'danger' };
        if (strength <= 4) return { text: 'Sedang', color: 'warning' };
        return { text: 'Kuat', color: 'success' };
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
    </script>
</body>
</html>
