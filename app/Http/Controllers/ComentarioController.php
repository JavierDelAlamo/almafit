<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comentario;
use App\Models\Entrada;
use Illuminate\Support\Facades\Auth;

class ComentarioController extends Controller
{
    public function store(Request $request, Entrada $entrada)
    {
        $request->validate([
            'cuerpo' => 'required|string',
        ]);

        Comentario::create([
            'entrada_id' => $entrada->id,
            'user_comentario' => Auth::user()->name,
            'email' => Auth::user()->email,
            'cuerpo' => $request->cuerpo,
        ]);

        return redirect()->back()->with('success', 'Comentario agregado exitosamente.');
    }
}
