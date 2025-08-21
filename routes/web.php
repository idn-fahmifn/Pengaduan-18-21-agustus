<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// grup admin
Route::prefix('admin')->middleware(['auth', 'verified','admin'])->group(function(){

    // halaman dashboard
    Route::get('dashboard', [DashboardController::class, 'admin'])->name('dashboard');

});

// grup user
Route::prefix('user')->middleware(['auth', 'verified'])->group(function(){

    // halaman dashboard
    Route::get('dashboard', [DashboardController::class, 'user'])->name('dashboard.user');


});





Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
