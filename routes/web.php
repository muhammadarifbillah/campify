<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\penjualController;
use App\Http\Controllers\ProfileController;

Route::get('/penjual/dashboard', [penjualController::class, 'dashboard'])->name('dashboardPenjual');

Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
Route::post('/profile/update', [ProfileController::class, 'update'])->name('profile.update');

