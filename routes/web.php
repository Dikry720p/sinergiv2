<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PerangkatController;
use App\Http\Controllers\TarifController;
use App\Models\User;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [PerangkatController::class, 'index'])->name('dashboard');
    Route::post('/perangkat', [PerangkatController::class, 'store'])->name('perangkat.store');
    Route::get('/perangkat/{id}', [PerangkatController::class, 'show'])->name('perangkat.show');
    Route::put('/perangkat/{id}', [PerangkatController::class, 'update'])->name('perangkat.update');
    Route::delete('/perangkat/{id}', [PerangkatController::class, 'destroy'])->name('perangkat.destroy');
    Route::post('/perangkat/{id}/toggle-status', [PerangkatController::class, 'toggleStatus'])->name('perangkat.toggle-status');
    Route::get('/tarif', [TarifController::class, 'index'])->name('tarif.index');
    Route::put('/tarif', [TarifController::class, 'update'])->name('tarif.update');
});

Route::get('/user', [UserController::class, 'index'])->name('user');
Route::get('/energy', [PerangkatController::class, 'index'])->name('energy');

//profile
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::resource('users', UserController::class);
});

require __DIR__ . '/auth.php';

// // users(pengguna/admin/pemilik)
Route::middleware('auth')->group(function () {
    Route::get('/users/{user}/edit', [UserController::class, 'edit'])->name('users.edit');
    Route::put('/users/{user}', [UserController::class, 'update'])->name('users.update');
});
