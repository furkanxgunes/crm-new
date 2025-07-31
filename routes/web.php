<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware('auth')->group(function () {
    // ... diğer rotalar buraya gelecek

    Route::resource('services', App\Http\Controllers\ServiceController::class);
    Route::resource('customers', App\Http\Controllers\CustomerController::class); // YENİ EKLENEN SATIR

     // YENİ PET ROTALARI
    Route::get('/customers/{customer}/pets/create', [App\Http\Controllers\PetController::class, 'create'])->name('pets.create');
    Route::post('/customers/{customer}/pets', [App\Http\Controllers\PetController::class, 'store'])->name('pets.store');
});
require __DIR__.'/auth.php';
