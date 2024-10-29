<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticuloController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/articulos', [ArticuloController::class, 'index']);
Route::get('/articulos-create', [ArticuloController::class, 'create']);
Route::get('/articulos-show/{id}', [ArticuloController::class, 'show']);