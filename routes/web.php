<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index']);
//Creamos la ruta para las entradas.blade que seran las url con el slug
//Creamos la funcion view
Route::get('/{slug}', [HomeController::class, 'vistaentrada']);
