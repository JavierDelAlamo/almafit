<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Entrada;
use App\Models\Categoria;

class HomeController extends Controller
{
    public function index()
    {
        $categorias = Categoria::all();
        $entradas = Entrada::all();
        return view('home', compact('categorias', 'entradas'));
    }

    public function vistaentrada($slug)
    {
        $entrada = Entrada::where('slug', $slug)->first();
        return view('vistaentrada', ['entrada' => $entrada]);
    }

    public function showCategoria($id)
    {
        $categorias = Categoria::all();
        $categoria = Categoria::findOrFail($id);
        $entradas = Entrada::where('categoria_id', $id)->get();
        return view('categoria', compact('categorias', 'categoria', 'entradas'));
    }
}