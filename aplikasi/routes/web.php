<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

// Route::redirect('/', 'login');

Route::get('/', [AuthController::class, 'index']);
Route::post('/login', [AuthController::class, 'authenticate'])->name('login');

Route::view('/home', 'Halaman_depan.main')->middleware(\App\Http\Middleware\CheckLogin::class);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
