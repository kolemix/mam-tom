<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OpenRouterController;

Route::get('/', [App\Http\Controllers\MovieController::class, 'index']);



Route::get('/openrouter', [OpenRouterController::class, 'chat']);

use App\Http\Controllers\MovieControllerDung;

Route::get('/movie-manager/create', [MovieControllerDung::class, 'create'])->name('movie-manager.create');
Route::post('/movie-manager', [MovieControllerDung::class, 'store'])->name('movie-manager.store');



Route::get('/movie-manager', [MovieControllerDung::class, 'index'])->name('movie-manager.index');
Route::get('/movie-manager/create', [MovieControllerDung::class, 'create'])->name('movie-manager.create');
Route::post('/movie-manager', [MovieControllerDung::class, 'store'])->name('movie-manager.store');
