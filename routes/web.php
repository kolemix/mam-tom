<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OpenRouterController;

Route::get('/', [App\Http\Controllers\MovieController::class, 'index']);



Route::get('/openrouter', [OpenRouterController::class, 'chat']);


use App\Http\Controllers\MovieControllerBang;

Route::get('/movie-manager', [MovieControllerBang::class, 'index'])
     ->name('movie-manager.index');

Route::get('/movie-manager/{id}', [MovieControllerBang::class, 'show'])
     ->name('movie-manager.show');

Route::delete('/movie-manager/{id}', [MovieControllerBang::class, 'destroy'])
     ->name('movie-manager.destroy');

Route::get('/movie-manager/create', [MovieControllerBang::class, 'create'])->name('movie-manager.create');
Route::post('/movie-manager', [MovieControllerBang::class, 'store'])->name('movie-manager.store');
