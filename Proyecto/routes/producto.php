<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductoController;

Route::get('producto/index', [ProductoController::class, 'index'])->middleware(['auth']);
Route::get('producto/create', [ProductoController::class, 'create'])->middleware(['auth']);
Route::post('producto/create', [ProductoController::class, 'store']);
Route::get('producto/edit/{id}', [ProductoController::class, 'edit']);
Route::post('producto/update/{id}', [ProductoController::class, 'update']);
Route::post('producto/destroy/{id}', [ProductoController::class, 'destroy']);

Route::get('producto/get-semana', [ProductoController::class, 'getSemana']);
