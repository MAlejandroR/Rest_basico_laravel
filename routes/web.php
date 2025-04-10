<?php

require_once base_path('app/Http/Swagger.php');
require_once base_path('app/Http/Controllers/Swagger.php');


use App\Http\Controllers\AlumnoController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LanguageController;



//Route::get('/', fn()=>view ("login);
Route::view('/',"home")->name('home');
Route::view('/admin',"admin")->name('admin');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::resource("/alumnos", AlumnoController::class)->middleware("auth");
Route::get('language/{locale}', LanguageController::class)->name('language');
