<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RtController;
use App\Http\Controllers\RwController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WargaController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LembagaDesaController;
use App\Http\Controllers\PerangkatDesaController;
use App\Http\Controllers\AnggotaLembagaController;
use App\Http\Controllers\JabatanLembagaController;

// Public Routes (bisa diakses tanpa login)
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// redirect ke login
Route::get('/', function () {
    return redirect('/login');
});

// Protected Routes (harus login)
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');

    // PERANGKAT DESA - BARU
    Route::prefix('perangkat-desa')->group(function () {
        Route::get('/', [PerangkatDesaController::class, 'index'])->name('admin.perangkat_desa.index');
        Route::get('/create', [PerangkatDesaController::class, 'create'])->name('admin.perangkat_desa.create');
        Route::post('/', [PerangkatDesaController::class, 'store'])->name('admin.perangkat_desa.store');
        Route::get('/{perangkatDesa}', [PerangkatDesaController::class, 'show'])->name('admin.perangkat_desa.show');
        Route::get('/{perangkatDesa}/edit', [PerangkatDesaController::class, 'edit'])->name('admin.perangkat_desa.edit');
        Route::put('/{perangkatDesa}', [PerangkatDesaController::class, 'update'])->name('admin.perangkat_desa.update');
        Route::delete('/{perangkatDesa}', [PerangkatDesaController::class, 'destroy'])->name('admin.perangkat_desa.destroy');
    });
    // RW - BARU
    Route::prefix('rw')->group(function () {
        Route::get('/', [RwController::class, 'index'])->name('admin.rw.index');
        Route::get('/create', [RwController::class, 'create'])->name('admin.rw.create');
        Route::post('/', [RwController::class, 'store'])->name('admin.rw.store');
        Route::get('/{rw}/edit', [RwController::class, 'edit'])->name('admin.rw.edit');
        Route::put('/{rw}', [RwController::class, 'update'])->name('admin.rw.update');
        Route::delete('/{rw}', [RwController::class, 'destroy'])->name('admin.rw.destroy');
        Route::post('/{rw}/set-ketua', [RwController::class, 'setKetua'])->name('admin.rw.set_ketua');
    });
    // RT - BARU
    Route::prefix('rt')->group(function () {
        Route::get('/', [RtController::class, 'index'])->name('admin.rt.index');
        Route::get('/create', [RtController::class, 'create'])->name('admin.rt.create');
        Route::post('/', [RtController::class, 'store'])->name('admin.rt.store');
        Route::get('/{rt}/edit', [RtController::class, 'edit'])->name('admin.rt.edit');
        Route::put('/{rt}', [RtController::class, 'update'])->name('admin.rt.update');
        Route::delete('/{rt}', [RtController::class, 'destroy'])->name('admin.rt.destroy');
        Route::post('/{rt}/set-ketua', [RtController::class, 'setKetua'])->name('admin.rt.set_ketua');
    });


    // Warga 
    Route::prefix('warga')->group(function () {
        Route::get('/', [WargaController::class, 'index'])->name('admin.warga.index');
        Route::get('/create', [WargaController::class, 'create'])->name('admin.warga.create');
        Route::post('/', [WargaController::class, 'store'])->name('admin.warga.store');
        Route::get('/{warga}', [WargaController::class, 'show'])->name('admin.warga.show');
        Route::get('/{warga}/edit', [WargaController::class, 'edit'])->name('admin.warga.edit');
        Route::put('/{warga}', [WargaController::class, 'update'])->name('admin.warga.update');
        Route::delete('/{warga}', [WargaController::class, 'destroy'])->name('admin.warga.destroy');
    });

    // Lembaga Desa 
    Route::prefix('lembaga')->group(function () {
        Route::get('/', [LembagaDesaController::class, 'index'])->name('admin.lembaga.index');
        Route::get('/create', [LembagaDesaController::class, 'create'])->name('admin.lembaga.create');
        Route::post('/', [LembagaDesaController::class, 'store'])->name('admin.lembaga.store');
        Route::get('/{lembaga}', [LembagaDesaController::class, 'show'])->name('admin.lembaga.show');
        Route::get('/{lembaga}/edit', [LembagaDesaController::class, 'edit'])->name('admin.lembaga.edit');
        Route::put('/{lembaga}', [LembagaDesaController::class, 'update'])->name('admin.lembaga.update');
        Route::delete('/{lembaga}', [LembagaDesaController::class, 'destroy'])->name('admin.lembaga.destroy');
        Route::get('/lembaga/{lembaga}/edit', [LembagaDesaController::class, 'edit'])->name('admin.lembaga.edit');
        Route::put('/lembaga/{lembaga}', [LembagaDesaController::class, 'update'])->name('admin.lembaga.update');

        // Anggota Lembaga 
        Route::prefix('{lembaga_id}/anggota')->group(function () {
            Route::get('/', [AnggotaLembagaController::class, 'index'])->name('admin.lembaga.anggota.index');
            Route::get('/create', [AnggotaLembagaController::class, 'create'])->name('admin.lembaga.anggota.create');
            Route::post('/', [AnggotaLembagaController::class, 'store'])->name('admin.lembaga.anggota.store');
            Route::get('/{id}/edit', [AnggotaLembagaController::class, 'edit'])->name('admin.lembaga.anggota.edit');
            Route::put('/{id}', [AnggotaLembagaController::class, 'update'])->name('admin.lembaga.anggota.update');
            Route::delete('/{id}', [AnggotaLembagaController::class, 'destroy'])->name('admin.lembaga.anggota.destroy');
        });

        // Jabatan Lembaga 
        Route::prefix('{lembaga_id}/jabatan')->group(function () {
            Route::get('/', [JabatanLembagaController::class, 'index'])->name('admin.lembaga.jabatan.index');
            Route::get('/create', [JabatanLembagaController::class, 'create'])->name('admin.lembaga.jabatan.create');
            Route::post('/', [JabatanLembagaController::class, 'store'])->name('admin.lembaga.jabatan.store');
            Route::get('/{id}/edit', [JabatanLembagaController::class, 'edit'])->name('admin.lembaga.jabatan.edit');
            Route::put('/{id}', [JabatanLembagaController::class, 'update'])->name('admin.lembaga.jabatan.update');
            Route::delete('/{id}', [JabatanLembagaController::class, 'destroy'])->name('admin.lembaga.jabatan.destroy');
        });
    });

    // User 
    Route::prefix('user')->group(function () {
        Route::get('/', [UserController::class, 'index'])->name('admin.user.index');
        Route::get('/create', [UserController::class, 'create'])->name('admin.user.create');
        Route::post('/', [UserController::class, 'store'])->name('admin.user.store');
        Route::get('/{user}', [UserController::class, 'show'])->name('admin.user.show');
        Route::get('/{user}/edit', [UserController::class, 'edit'])->name('admin.user.edit');
        Route::put('/{user}', [UserController::class, 'update'])->name('admin.user.update');
        Route::delete('/{user}', [UserController::class, 'destroy'])->name('admin.user.destroy');
    });
    // Routes Wilayah
    Route::prefix('wilayah')->name('admin.')->group(function () {
        // RW Routes
        Route::resource('rw', 'RwController')->except(['show']);
        Route::get('rw/{id}', 'RwController@show')->name('rw.show');

        // RT Routes  
        Route::resource('rt', 'RtController')->except(['show']);
        Route::get('rt/{id}', 'RtController@show')->name('rt.show');

        // AJAX Routes
        Route::get('rt/get-by-rw/{rwId}', 'RtController@getByRw')->name('rt.get-by-rw');
    });
});

// Hapus atau comment line berikut:
// Route::redirect('/', '/dashboard');