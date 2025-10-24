<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\penjualController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\Stokcontroller;
use App\Http\Controllers\SearchProductController;
use App\Http\Controllers\AuthController;

// Halaman utama (landing page) diarahkan ke login
Route::get('/', [AuthController::class, 'showLogin'])->name('login');

// Halaman register
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');

// Proses login dan register
Route::post('/login', [AuthController::class, 'login'])->name('login.process');
Route::post('/register', [AuthController::class, 'register'])->name('register.process');


Route::get('/penjual/dashboard', [penjualController::class, 'dashboard'])->name('dashboardPenjual');

// Profil pengguna
Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
Route::post('/profile/update', [ProfileController::class, 'update'])->name('profile.update');

Route::get('/products', [ProductController::class, 'index'])->name('products.index');
Route::get('/products/create', [ProductController::class, 'create'])->name('products.create');
Route::post('/products/store', [ProductController::class, 'store'])->name('products.store');
Route::get('/products/edit/{id}', [ProductController::class, 'edit'])->name('products.edit');
Route::post('/products/{id}', [ProductController::class, 'update'])->name('products.update');
Route::get('/products/delete/{id}', [ProductController::class, 'destroy'])->name('products.destroy');

Route::get('/stok', [StokController::class, 'index'])->name('stok.index');
Route::post('/stok', [StokController::class, 'store'])->name('stok.store');
Route::get('/stok/edit/{id}', [StokController::class, 'edit'])->name('stok.edit');
Route::post('/stok/update/{id}', [StokController::class, 'update'])->name('stok.update');
Route::get('/stok/delete/{id}', [StokController::class, 'delete'])->name('stok.delete');

Route::get('/search-products', [SearchProductController::class, 'index'])->name('search-products');

Route::get('/stok/reset', function () {
    session()->forget('stok');
    return redirect('/stok')->with('success', 'Data stok berhasil direset!');
});
