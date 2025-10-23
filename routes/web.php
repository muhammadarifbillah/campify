<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\penjualController;
use App\Http\Controllers\ProfileController;

Route::get('/penjual/dashboard', [penjualController::class, 'dashboard'])->name('dashboardPenjual');

Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
Route::post('/profile/update', [ProfileController::class, 'update'])->name('profile.update');

Route::get('/stok', [StokController::class, 'index'])->name('stok.index');
Route::post('/stok', [StokController::class, 'store'])->name('stok.store');
Route::get('/stok/edit/{id}', [StokController::class, 'edit'])->name('stok.edit');
Route::post('/stok/update/{id}', [StokController::class, 'update'])->name('stok.update');
Route::get('/stok/delete/{id}', [StokController::class, 'delete'])->name('stok.delete');

