<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\DokterController;
use App\Http\Controllers\PasienController;
use App\Http\Controllers\ObatController;
use App\Http\Controllers\PoliController;
use App\Http\Controllers\HomeController;

// Welcome and Database Check Routes
Route::get('/', function () {
    return view('welcome');
});

Route::get('/check-db', function () {
    return DB::connection()->getDatabaseName();
});

// Admin Routes

Route::get('/login', [AdminController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AdminController::class, 'login']);
Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
Route::post('/logout', [AdminController::class, 'logout'])->name('logout');
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
    Route::get('/pasien/create', [PasienController::class, 'create'])->name('pasien.create');
    Route::get('/pasien/{pasien}/edit', [PasienController::class, 'edit'])->name('admin.pasien.edit');
    Route::put('/pasien/{id}', [PasienController::class, 'update'])->name('pasien.update');
    Route::delete('/pasien/{pasien}', [PasienController::class, 'destroy'])->name('pasien.destroy');
    Route::post('/pasien', [PasienController::class, 'store'])->name('pasien.store');

});

Route::get('/jadwal-dokter', function () {
    $jadwal = [
        ['dokter' => 'dr. Andi Wijaya', 'spesialis' => 'Kandungan', 'hari' => 'Senin', 'jam' => '08:00 - 14:00'],
        ['dokter' => 'dr. Siti Rahmah', 'spesialis' => 'Anak', 'hari' => 'Selasa', 'jam' => '10:00 - 16:00'],
    ];
    return view('jadwal.dokter', compact('jadwal'));
})->name('jadwal.dokter');


Route::get('/jadwal', function () {
    return view('jadwal.index');
});



// Dokter Routes
Route::get('dokter/dashboard', [DokterController::class, 'dashboard'])->name('dokter.dashboard');
Route::get('dokter/login', [DokterController::class, 'showLoginForm'])->name('dokter.login');
Route::post('dokter/login', [DokterController::class, 'login'])->name('dokter.login.post');
Route::get('dokter/create', [DokterController::class, 'create'])->name('dokter.create');
Route::post('dokter', [DokterController::class, 'store'])->name('dokter.store');
Route::get('dokter/{dokter}/edit', [DokterController::class, 'edit'])->name('dokter.edit');
Route::put('dokter/{dokter}', [DokterController::class, 'update'])->name('dokter.update');
Route::delete('dokter/{dokter}', [DokterController::class, 'destroy'])->name('dokter.destroy');
Route::get('dokter/{dokter}', [DokterController::class, 'show'])->name('dokter.show');
Route::get('/dokter', [DokterController::class, 'index'])->name('dokter.index');

// Pasien Routes
Route::get('pasien/register', [PasienController::class, 'showRegistrationForm'])->name('pasien.register');
Route::post('pasien/register', [PasienController::class, 'register'])->name('pasien.register.submit');
Route::get('pasien/login', [PasienController::class, 'showLoginForm'])->name('pasien.login');
Route::post('pasien/login', [PasienController::class, 'login']);
Route::get('pasien/logout', [PasienController::class, 'logout'])->name('pasien.logout');
Route::get('/pasien', [PasienController::class, 'index'])->name('pasien.index');
Route::get('pasien/{id}', [PasienController::class, 'show'])->name('pasien.detail');
Route::get('/pasien/create', [PasienController::class, 'create'])->name('pasien.create');
 Route::get('/pasien/{pasien}/edit', [PasienController::class, 'edit'])->name('pasien.edit');
 Route::put('/pasien/{id}', [PasienController::class, 'update'])->name('admin.pasien.update');
 Route::delete('/pasien/{pasien}', [PasienController::class, 'destroy'])->name('pasien.destroy');
 Route::get('/pasien/{pasien}', [PasienController::class, 'destroy'])->name('pasien.destroy');
 Route::post('/pasien', [PasienController::class, 'store'])->name('pasien.store');





Route::middleware('pasien.auth')->group(function () {
    Route::get('pasien/dashboard', [PasienController::class, 'dashboard'])->name('pasien.dashboard');
    Route::post('pasien/logout', [PasienController::class, 'logout'])->name('pasien.logout');
    
});

// Obat Routes
Route::resource('obat', ObatController::class);

// Poli Routes
Route::resource('poli', PoliController::class);

// Admin Middleware Group
Route::middleware(['admin'])->group(function () {
    // Additional admin routes can be added here
});

// Dokter Middleware Group
Route::middleware('dokter.auth')->group(function () {
    // Additional dokter routes can be added here
});

// Pasien Middleware Group
Route::middleware('pasien.auth')->group(function () {
    // Additional pasien routes can be added here
});
