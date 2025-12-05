<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

// --- IMPORT CONTROLLER ---
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AcademicController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\DosenController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\GalleryController;
use App\Http\Controllers\Admin\FacilityController;
use App\Http\Controllers\Admin\AchievementController;
use App\Http\Controllers\Admin\OrganizationController;
use App\Http\Controllers\Admin\SettingController;

// [BARU] IMPORT CONTROLLER MANAJEMEN USER
use App\Http\Controllers\Admin\UserController;

// [PENTING] IMPORT CONTROLLER & MODEL AKREDITASI
use App\Http\Controllers\Admin\AkreditasiController; 
use App\Models\Akreditasi; 

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// ====================================================
// 1. ROUTE PUBLIK (FRONTEND) - Bisa diakses siapa saja
// ====================================================

Route::get('/', [HomeController::class, 'index'])->name('home');

// Profil Jurusan (General)
Route::get('/tentang-jurusan', [HomeController::class, 'about'])->name('about');

// --- PROFIL: SEJARAH ---
Route::get('/sejarah', function () {
    return view('frontend.academic.sejarah');
})->name('sejarah');

// --- PROFIL: AKREDITASI (DENGAN FILTER PUBLISHED) ---
Route::get('/akreditasi', function () {
    // Cari data terbaru yang statusnya SUDAH DITERBITKAN (Published)
    // Data yang statusnya 'draft' TIDAK AKAN MUNCUL disini
    $akreditasi = Akreditasi::where('status', 'published')
                            ->latest()
                            ->first(); 
    
    // Kirim data ke view (jika tidak ada data published, variabel akan null)
    return view('frontend.academic.akreditasi', compact('akreditasi')); 
})->name('akreditasi');


// Route Dosen
Route::get('/dosen', [HomeController::class, 'dosen'])->name('dosen');

// Route Berita
Route::get('/berita', [HomeController::class, 'posts'])->name('posts');
Route::get('/berita/{slug}', [HomeController::class, 'postDetail'])->name('posts.show');

// Route Galeri & Organisasi & Prestasi
Route::get('/galeri', [HomeController::class, 'gallery'])->name('gallery');
Route::get('/organisasi', [HomeController::class, 'organizations'])->name('organizations');
Route::get('/prestasi', [HomeController::class, 'achievements'])->name('achievements');

// ----------------------------------------------------
// GROUP ROUTE AKADEMIK
// URL: /akademik/... | Nama Route: academic....
// ----------------------------------------------------
Route::prefix('akademik')->name('academic.')->group(function () {
    
    // 1. Visi Misi
    Route::get('/visi-misi', function () {
        return view('frontend.academic.visimisi');
    })->name('visimisi');

    // 2. Struktur Organisasi
    Route::get('/struktur-organisasi', [AcademicController::class, 'structure'])->name('structure');

    // 3. Kurikulum
    Route::get('/kurikulum', [AcademicController::class, 'curriculum'])->name('curriculum');

    // 4. Fasilitas
    Route::get('/fasilitas', [AcademicController::class, 'facilities'])->name('facilities');
});


// ====================================================
// 2. ROUTE AUTHENTICATION
// ====================================================
Auth::routes(['register' => false]);


// ====================================================
// 3. ROUTE ADMIN (BACKEND)
// ====================================================
Route::prefix('admin')->middleware(['auth', 'is_admin'])->name('admin.')->group(function () {
    
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    
    Route::resource('dosen', DosenController::class);
    Route::resource('categories', CategoryController::class);
    Route::resource('posts', PostController::class);
    Route::resource('facilities', FacilityController::class);
    Route::resource('achievements', AchievementController::class);
    Route::resource('organizations', OrganizationController::class);
    
    Route::resource('galleries', GalleryController::class)->only(['index', 'store', 'destroy']);

    Route::get('/settings', [SettingController::class, 'index'])->name('settings.index');
    Route::put('/settings', [SettingController::class, 'update'])->name('settings.update');
    Route::get('/academic-settings', [SettingController::class, 'academic'])->name('academic.settings');

    // --- ROUTE ADMIN AKREDITASI (FULL CRUD) ---
    Route::resource('akreditasi', AkreditasiController::class);

    // --- MANAJEMEN USER (TAMBAHAN BARU) ---
    Route::resource('users', UserController::class);
});