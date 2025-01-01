<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SugerenciaController;

Route::get('/', [HomeController::class, 'index']);

//Creamos la ruta para las entradas.blade que seran las url con el slug
//Creamos la funcion view
Route::get('/{slug}', [HomeController::class, 'vistaentrada']);

//Creamos la ruta para el formulario de sugerencias
Route::post('/sugerencias', [SugerenciaController::class, 'store'])->name('sugerencias.store');




