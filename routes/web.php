<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OpenRouterController;
use App\Http\Controllers\Controller1;

// Xóa route MovieController bị trùng
Route::get('/', [Controller1::class, 'index']);
Route::get('/theloai/{id}', [Controller1::class, 'genre']);
Route::get('/movie/{id}', [Controller1::class, 'detail']);
Route::post('/timkiem', [Controller1::class, 'search']);


Route::get('/openrouter', [OpenRouterController::class, 'chat']);


Route::get('/openrouter', [OpenRouterController::class, 'chat']);

use App\Http\Controllers\MovieControllerDung;

Route::get('/movie-manager/create', [MovieControllerDung::class, 'create'])->name('movie-manager.create');
Route::post('/movie-manager', [MovieControllerDung::class, 'store'])->name('movie-manager.store');



Route::get('/movie-manager', [MovieControllerDung::class, 'index'])->name('movie-manager.index');
Route::get('/movie-manager/create', [MovieControllerDung::class, 'create'])->name('movie-manager.create');
Route::post('/movie-manager', [MovieControllerDung::class, 'store'])->name('movie-manager.store');

use App\Http\Controllers\MovieControllerBang;

Route::get('/movie-manager', [MovieControllerBang::class, 'index'])
     ->name('movie-manager.index');

Route::get('/movie-manager/{id}', [MovieControllerBang::class, 'show'])
     ->name('movie-manager.show');

Route::delete('/movie-manager/{id}', [MovieControllerBang::class, 'destroy'])
     ->name('movie-manager.destroy');

Route::get('/movie-manager/create', [MovieControllerBang::class, 'create'])->name('movie-manager.create');
Route::post('/movie-manager', [MovieControllerBang::class, 'store'])->name('movie-manager.store');

