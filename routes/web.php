<?php

use App\Http\Controllers\PublicController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PublicController::class, 'homepage'])->name('homepage');
// rotta view dashboard
Route::get('/dashboard', [PublicController::class, 'dashboard'])->name('dashboard');
// rotta dettaglio utente
Route::get('/user/{id}', [PublicController::class, 'user'])->name('user');


// rotte per modello deleteusers
Route::post('/user/{id}/delete', [PublicController::class, 'deleteUser'])->name('user.delete');
Route::post('/user/{id}/restore', [PublicController::class, 'restoreUser'])->name('user.restore');
Route::get('/deleted-users', [PublicController::class, 'deletedUsers'])->name('deleted.users');