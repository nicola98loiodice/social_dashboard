<?php

use App\Http\Controllers\PublicController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PublicController::class, 'homepage'])->name('homepage');
Route::get('/dashboard', [PublicController::class, 'dashboard'])->name('dashboard');
Route::get('/user/{id}', [PublicController::class, 'user'])->name('user');