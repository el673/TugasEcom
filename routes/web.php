<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TipeController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\DetailController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\CheckOutController;
use App\Http\Controllers\KeranjangController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProductController;

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

// Authentication Routes
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Admin Routes
Route::middleware(['auth', 'is_admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
    Route::get('/users', [AdminController::class, 'users'])->name('users');
    Route::delete('/users/{user}', [AdminController::class, 'destroyUser'])->name('users.destroy');
});

// Resource Routes for Admin
Route::middleware(['auth', 'is_admin'])->group(function () {
    Route::resource('barang', BarangController::class);
    Route::resource('tipe', TipeController::class);
});

// User Routes (Protected)
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', function () {
        if (auth()->user()->role === 'admin') {
            return redirect()->route('admin.dashboard');
        }
        return view('dashboard');
    })->name('dashboard');

    Route::get('/keranjang', [KeranjangController::class, 'index']);
    Route::get('/checkout', [CheckOutController::class, 'index']);
});

// Public Routes (Both admin and users can access)
Route::get('/', function () {
    if (auth()->check()) {
        if (auth()->user()->role === 'admin') {
            return redirect()->route('admin.dashboard');
        }
        return redirect()->route('dashboard');
    }
    return redirect()->route('login');
});

Route::get('/home', [HomeController::class, 'index']);
Route::get('/produk', [ProdukController::class, 'index']);
Route::get('/detail', [DetailController::class, 'index']);

// Read-only routes for Barang and Tipe (accessible by both admin and users)
Route::get('/barang', [BarangController::class, 'index'])->name('barang.index');
Route::get('/tipe', [TipeController::class, 'index'])->name('tipe.index');

Route::get('/barangapi', function () {
    return view('barangapi');
});

// Route untuk user melihat produk
Route::get('/products', [ProductController::class, 'index'])->name('products.index');
