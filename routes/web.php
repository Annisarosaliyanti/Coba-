<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\PpidController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ProfileController as AdminProfileController;
use App\Http\Controllers\Admin\StrukturController;
use App\Http\Controllers\Admin\ServiceController as AdminServiceController;
use App\Http\Controllers\Admin\NewsController as AdminNewsController;
use App\Http\Controllers\Admin\PpidController as AdminPpidController;
use App\Http\Controllers\Admin\ContactController as AdminContactController;
use App\Http\Controllers\Admin\SettingController;

/*
|--------------------------------------------------------------------------
| Public Routes - Halaman Publik
|--------------------------------------------------------------------------
*/

// Beranda
Route::get('/', [HomeController::class, 'index'])->name('home');

// Profil (using Indonesian naming)
Route::prefix('profil')->name('profil.')->group(function () {
    Route::get('/sambutan', [ProfileController::class, 'sambutan'])->name('sambutan');
    Route::get('/pimpinan', [ProfileController::class, 'pimpinan'])->name('pimpinan');
    Route::get('/sejarah', [ProfileController::class, 'sejarah'])->name('sejarah');
    Route::get('/visi-misi', [ProfileController::class, 'visiMisi'])->name('visi-misi');
    Route::get('/tupoksi', [ProfileController::class, 'tupoksi'])->name('tupoksi');
    Route::get('/struktur', [ProfileController::class, 'struktur'])->name('struktur');
});

// Pelayanan (using Indonesian naming)
Route::prefix('pelayanan')->name('pelayanan.')->group(function () {
    Route::get('/{category?}', [ServiceController::class, 'index'])->name('index');
    Route::get('/detail/{service}', [ServiceController::class, 'show'])->name('show');
});

// Berita (using Indonesian naming)
Route::prefix('berita')->name('berita.')->group(function () {
    Route::get('/', [NewsController::class, 'index'])->name('index');
    Route::get('/{news:slug}', [NewsController::class, 'show'])->name('show');
});

// PPID
Route::prefix('ppid')->name('ppid.')->group(function () {
    Route::get('/', [PpidController::class, 'index'])->name('index');
    Route::get('/dasar-hukum', [PpidController::class, 'dasarHukum'])->name('dasar-hukum');
    Route::get('/tugas-wewenang', [PpidController::class, 'tugasWewenang'])->name('tugas-wewenang');
    Route::get('/informasi-publik', [PpidController::class, 'informasiPublik'])->name('informasi-publik');
    Route::get('/download/{id}', [PpidController::class, 'download'])->name('download');
});

// Kontak
Route::get('/kontak', [ContactController::class, 'index'])->name('kontak');

/*
|--------------------------------------------------------------------------
| Authentication Routes
|--------------------------------------------------------------------------
*/

Route::get('/login', [AuthenticatedSessionController::class, 'create'])->name('login');
Route::post('/login', [AuthenticatedSessionController::class, 'store']);
Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');

/*
|--------------------------------------------------------------------------
| Admin Routes - Panel Admin
|--------------------------------------------------------------------------
*/

Route::prefix('admin')->name('admin.')->middleware(['auth'])->group(function () {
    // Dashboard
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    
    // Profiles CRUD
    Route::resource('profiles', AdminProfileController::class)->except(['show']);
    
    // Struktur Organisasi CRUD
    Route::resource('struktur', StrukturController::class)->except(['show']);
    
    // Services CRUD
    Route::resource('services', AdminServiceController::class)->except(['show']);
    
    // News CRUD
    Route::resource('news', AdminNewsController::class)->except(['show']);
    
    // PPID Documents CRUD
    Route::resource('ppid', AdminPpidController::class)->except(['show']);
    
    // Contact Settings
    Route::get('/contact', [AdminContactController::class, 'edit'])->name('contact.edit');
    Route::put('/contact', [AdminContactController::class, 'update'])->name('contact.update');
    
    // General Settings
    Route::get('/settings', [SettingController::class, 'index'])->name('settings.index');
    Route::put('/settings', [SettingController::class, 'update'])->name('settings.update');
});
