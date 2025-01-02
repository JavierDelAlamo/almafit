<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comentario;
use App\Models\User;
use App\Models\Entrada;
use Illuminate\Support\Facades\Auth;

class ComentarioController extends Controller
{
    public function store(Request $request, Entrada $entrada)
    {
        $request->validate([
            'entrada_id' => 'required|exists:entradas,id',
            'cuerpo' => 'required|string',
        ]);

        $user = User::where('email', $request->email)->first();

        if (!$user) {
            return redirect()->back()->with('error', 'Solo usuarios registrados pueden comentar esta entrada.');
        }

        Comentario::create([
            'entrada_id' => $request->entrada_id,
            'user_comentario' => Auth::user()->name,
            'email' => Auth::user()->email,
            'cuerpo' => $request->cuerpo,
        ]);
    
        return redirect()->back()->with('success', 'Comentario Enviado.');
    }
}
