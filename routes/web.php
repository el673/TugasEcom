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
Route::middleware(['auth', 'admin'])->prefix('admin')->group(function () {
    // Admin Dashboard
    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');

    // Admin Users Management
    Route::get('/users', function () {
        return view('admin.users');
    })->name('admin.users');

    // Admin Barang Management
    Route::get('/barang/create', [BarangController::class, 'create'])->name('barang.create');
    Route::post('/barang', [BarangController::class, 'store'])->name('barang.store');
    Route::get('/barang/{id}/edit', [BarangController::class, 'edit'])->name('barang.edit');
    Route::put('/barang/{id}', [BarangController::class, 'update'])->name('barang.update');
    Route::delete('/barang/{id}', [BarangController::class, 'destroy'])->name('barang.destroy');

    // Admin Tipe Management
    Route::get('/tipe/create', [TipeController::class, 'create'])->name('tipe.create');
    Route::post('/tipe', [TipeController::class, 'store'])->name('tipe.store');
    Route::get('/tipe/{id}/edit', [TipeController::class, 'edit'])->name('tipe.edit');
    Route::put('/tipe/{id}', [TipeController::class, 'update'])->name('tipe.update');
    Route::delete('/tipe/{id}', [TipeController::class, 'destroy'])->name('tipe.destroy');
});

// User Routes (Protected)
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/keranjang', [KeranjangController::class, 'index']);
    Route::get('/checkout', [CheckOutController::class, 'index']);
});

// Public Routes (Both admin and users can access)
Route::get('/', function () {
    return view('welcome');
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
