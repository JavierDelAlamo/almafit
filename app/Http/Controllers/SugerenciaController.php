<?php

namespace App\Http\Controllers;

use App\Models\Sugerencia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SugerenciaController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            // 'nombre' => 'required|string|max:255',
            // 'email' => 'required|email|max:255',
            'nombre' => 'required|string',
            'email' => 'required|string',
            'mensaje' => 'required|string',
        ]);

        Sugerencia::create($request->all());

        // Devolver una respuesta JSON
        return response()->json(['success' => true]);
    }
}