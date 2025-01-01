<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SugerenciaController;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/categoria/{nombre}', [HomeController::class, 'showCategoria'])->name('categoria.show');

// Creamos la ruta para las entradas.blade que serán las URL con el slug
Route::get('/entrada/{slug}', [HomeController::class, 'vistaentrada'])->name('entrada.show');

// Creamos la ruta para el formulario de sugerencias
Route::post('/sugerencias', [SugerenciaController::class, 'store'])->name('sugerencias.store');




