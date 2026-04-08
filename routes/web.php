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