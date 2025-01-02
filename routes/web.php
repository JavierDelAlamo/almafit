<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SugerenciaController;
use App\Http\Controllers\ComentarioController;
use App\Models\User;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/categoria/{nombre}', [HomeController::class, 'showCategoria'])->name('categoria.show');

// Creamos la ruta para las entradas.blade que serán las URL con el slug
Route::get('/entrada/{slug}', [HomeController::class, 'vistaentrada'])->name('entrada.show');

// Creamos la ruta para el formulario de sugerencias
Route::post('/sugerencias', [SugerenciaController::class, 'store'])->name('sugerencias.store');

// Creamos la ruta para almacenar comentarios
Route::post('/comentarios/{entrada}', [ComentarioController::class, 'store'])->name('comentarios.store');

// Creamos la ruta para validar el email
// Route::post('/validar-email', function (Illuminate\Http\Request $request) {
//     $email = $request->input('email');
//     $usuario = User::where('email', $email)->exists();

//     return response()->json(['valido' => $usuario]);
// })->name('validar.email');




