<?php

use App\Http\Controllers\BeritaController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProfilKoperasiController;
use App\Http\Controllers\StrukturOrganisasiController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Models\Produk;
use App\Models\Berita;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Redirect root to public homepage
Route::redirect('/', '/koperasi_merput_windujanten');

// Public Routes - /koperasi_merput_windujanten
Route::prefix('koperasi_merput_windujanten')->name('public.')->group(function () {
    Route::get('/', function () {
        $produks = Produk::where('stok', '>', 0)->get();
        $beritas = Berita::orderBy('created_at', 'desc')->take(3)->get();
        $pengumumanPenting = Berita::where('is_penting', true)->latest()->first();
        return view('home', compact('produks', 'beritas', 'pengumumanPenting'));
    })->name('home');

    Route::get('/produk', [ProdukController::class, 'index'])->name('produk.index');
    Route::get('/produk/{produk}', [ProdukController::class, 'show'])->name('produk.show');
    Route::get('/berita', [BeritaController::class, 'index'])->name('berita.index');
    Route::get('/berita/{berita}', [BeritaController::class, 'show'])->name('berita.show');
    Route::get('/profil', [ProfilKoperasiController::class, 'index'])->name('profil.index');
    Route::get('/struktur', [StrukturOrganisasiController::class, 'index'])->name('struktur.index');
});

// Admin Routes - /kopmerput-admin (requires auth and is_admin)
Route::prefix('kopmerput-admin')->name('admin.')->group(function () {
    // Public admin prefix route: redirect to login or dashboard
    Route::get('/', function () {
        if (Auth::check() && Auth::user()->is_admin) {
            return redirect()->route('admin.dashboard');
        }
        return redirect()->route('admin.login');
    });

    // Guest routes (login only)
    Route::middleware('guest')->group(function () {
        Route::get('login', [App\Http\Controllers\Auth\AuthenticatedSessionController::class, 'create'])->name('login');
        Route::post('login', [App\Http\Controllers\Auth\AuthenticatedSessionController::class, 'store']);
    });

    // Protected routes
    Route::middleware(['auth', 'is_admin'])->group(function () {
        // Dashboard
        Route::get('dashboard', function () {
            $profil = App\Models\ProfilKoperasi::first();
            $struktur = App\Models\StrukturOrganisasi::orderBy('urutan')->get();
            return view('admin.dashboard', compact('profil', 'struktur'));
        })->name('dashboard');
        
        // Profile
        Route::get('profile', function () {
            return view('admin.profile');
        })->name('profile');
        Route::patch('profile', [ProfileController::class, 'update'])->name('profile.update');
        Route::put('password', [ProfileController::class, 'updatePassword'])->name('password.update');
        
        Route::post('logout', [App\Http\Controllers\Auth\AuthenticatedSessionController::class, 'destroy'])->name('logout');
        
        Route::resource('profil', ProfilKoperasiController::class)->only([
            'index', 'create', 'store', 'edit', 'update'
        ])->names([
            'index' => 'profil.index',
            'create' => 'profil.create',
            'store' => 'profil.store',
            'edit' => 'profil.edit',
            'update' => 'profil.update',
        ]);
        
        Route::resource('struktur', StrukturOrganisasiController::class)->names([
            'index' => 'struktur.index',
            'create' => 'struktur.create',
            'store' => 'struktur.store',
            'edit' => 'struktur.edit',
            'update' => 'struktur.update',
            'destroy' => 'struktur.destroy',
        ]);
        
        Route::resource('category', CategoryController::class)->names([
            'index' => 'category.index',
            'create' => 'category.create',
            'store' => 'category.store',
            'show' => 'category.show',
            'edit' => 'category.edit',
            'update' => 'category.update',
            'destroy' => 'category.destroy',
        ]);
        
        Route::resource('produk', ProdukController::class)->names([
            'index' => 'produk.index',
            'create' => 'produk.create',
            'store' => 'produk.store',
            'show' => 'produk.show',
            'edit' => 'produk.edit',
            'update' => 'produk.update',
            'destroy' => 'produk.destroy',
        ]);
        
        Route::resource('berita', BeritaController::class)->names([
            'index' => 'berita.index',
            'create' => 'berita.create',
            'store' => 'berita.store',
            'show' => 'berita.show',
            'edit' => 'berita.edit',
            'update' => 'berita.update',
            'destroy' => 'berita.destroy',
        ]);
    });
});


