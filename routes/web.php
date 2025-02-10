<?php

use App\Http\Controllers\CarController;
use Illuminate\Support\Facades\Route;

Route::get('/cars', [CarController::class, 'bladeIndex'])->name('cars.index');
Route::get('/cars/edit/{id}', [CarController::class, 'edit'])->name('cars.edit');
Route::post('/cars/update/{id}', [CarController::class, 'updateBlade'])->name('cars.update');
Route::delete('/cars/delete/{id}', [CarController::class, 'destroyBlade'])->name('cars.destroy');
Route::post('/cars/store', [CarController::class, 'storeBlade'])->name('cars.store');

