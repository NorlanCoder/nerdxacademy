<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\registerController;
use App\Http\Controllers\formationController;

Route::get('/', [formationController::class, 'home']);

Route::get('/home', [formationController::class, 'home'])->name('home');

Route::get('/formations/{formation}', [formationController::class, 'show'])->name('formation.show');

Route::any('/formation/register', [registerController::class, 'store'])->name('formation.register');

Route::get('/formation/register/confirmation', [registerController::class, 'confirmation'])->name('formation.register.confirmation');

Route::get('/clear', function () {

    Artisan::call('route:clear');
    Artisan::call('storage:link', []);
});

Route::middleware('auth')->group(function () {

    Route::get('/index', [formationController::class, 'index'])->name('index');

    Route::put('/formations/update/{formation}', [formationController::class, 'update'])->name('formation.update');

    Route::get('/formation/create', [formationController::class, 'create'])->name('formation.create');

    Route::post('/formations/store', [formationController::class, 'store'])->name('formation.store');

    Route::get('/formations/{formation}/edit', [formationController::class, 'edit'])->name('formation.edit');

    Route::get('/formation/registers', [registerController::class, 'index'])->name('formation.registers.index');

    Route::delete('/formations/destroy/{formation}', [formationController::class, 'destroy'])->name('formation.destroy');
});

Route::get('/clear', function () {
    Storage::deleteDirectory('public');
    Storage::makeDirectory('public');

    Artisan::call('route:clear');
    Artisan::call('storage:link', []);
});


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


require __DIR__ . '/auth.php';
