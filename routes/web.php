<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\WargaController;
use App\Http\Controllers\LembagaDesaController;
use App\Http\Controllers\AnggotaLembagaController;
use App\Http\Controllers\JabatanLembagaController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

// Public Routes (bisa diakses tanpa login)
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Root route - redirect ke login
Route::get('/', function () {
    return redirect('/login');
});

// Protected Routes (harus login)
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');

    // Warga Routes
    Route::prefix('warga')->group(function () {
        Route::get('/', [WargaController::class, 'index'])->name('admin.warga.index');
        Route::get('/create', [WargaController::class, 'create'])->name('admin.warga.create');
        Route::post('/', [WargaController::class, 'store'])->name('admin.warga.store');
        Route::get('/{warga}', [WargaController::class, 'show'])->name('admin.warga.show');
        Route::get('/{warga}/edit', [WargaController::class, 'edit'])->name('admin.warga.edit');
        Route::put('/{warga}', [WargaController::class, 'update'])->name('admin.warga.update');
        Route::delete('/{warga}', [WargaController::class, 'destroy'])->name('admin.warga.destroy');
    });

    // Lembaga Desa Routes
    Route::prefix('lembaga')->group(function () {
        Route::get('/', [LembagaDesaController::class, 'index'])->name('admin.lembaga.index');
        Route::get('/create', [LembagaDesaController::class, 'create'])->name('admin.lembaga.create');
        Route::post('/', [LembagaDesaController::class, 'store'])->name('admin.lembaga.store');
        Route::get('/{lembaga}', [LembagaDesaController::class, 'show'])->name('admin.lembaga.show');
        Route::get('/{lembaga}/edit', [LembagaDesaController::class, 'edit'])->name('admin.lembaga.edit');
        Route::put('/{lembaga}', [LembagaDesaController::class, 'update'])->name('admin.lembaga.update');
        Route::delete('/{lembaga}', [LembagaDesaController::class, 'destroy'])->name('admin.lembaga.destroy');

        // Anggota Lembaga Routes
        Route::prefix('{lembaga_id}/anggota')->group(function () {
            Route::get('/', [AnggotaLembagaController::class, 'index'])->name('admin.lembaga.anggota.index');
            Route::get('/create', [AnggotaLembagaController::class, 'create'])->name('admin.lembaga.anggota.create');
            Route::post('/', [AnggotaLembagaController::class, 'store'])->name('admin.lembaga.anggota.store');
            Route::get('/{id}/edit', [AnggotaLembagaController::class, 'edit'])->name('admin.lembaga.anggota.edit');
            Route::put('/{id}', [AnggotaLembagaController::class, 'update'])->name('admin.lembaga.anggota.update');
            Route::delete('/{id}', [AnggotaLembagaController::class, 'destroy'])->name('admin.lembaga.anggota.destroy');
        });

        // Jabatan Lembaga Routes
        Route::prefix('{lembaga_id}/jabatan')->group(function () {
            Route::get('/', [JabatanLembagaController::class, 'index'])->name('admin.lembaga.jabatan.index');
            Route::get('/create', [JabatanLembagaController::class, 'create'])->name('admin.lembaga.jabatan.create');
            Route::post('/', [JabatanLembagaController::class, 'store'])->name('admin.lembaga.jabatan.store');
            Route::get('/{id}/edit', [JabatanLembagaController::class, 'edit'])->name('admin.lembaga.jabatan.edit');
            Route::put('/{id}', [JabatanLembagaController::class, 'update'])->name('admin.lembaga.jabatan.update');
            Route::delete('/{id}', [JabatanLembagaController::class, 'destroy'])->name('admin.lembaga.jabatan.destroy');
        });
    });

    // User Management Routes
    Route::prefix('user')->group(function () {
        Route::get('/', [UserController::class, 'index'])->name('admin.user.index');
        Route::get('/create', [UserController::class, 'create'])->name('admin.user.create');
        Route::post('/', [UserController::class, 'store'])->name('admin.user.store');
        Route::get('/{user}', [UserController::class, 'show'])->name('admin.user.show');
        Route::get('/{user}/edit', [UserController::class, 'edit'])->name('admin.user.edit');
        Route::put('/{user}', [UserController::class, 'update'])->name('admin.user.update');
        Route::delete('/{user}', [UserController::class, 'destroy'])->name('admin.user.destroy');
    });
});

// Hapus atau comment line berikut:
// Route::redirect('/', '/dashboard');