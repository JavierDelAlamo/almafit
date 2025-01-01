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
        $categorias = Categoria::all();
        $entrada = Entrada::where('slug', $slug)->first();
        return view('vistaentrada', compact('categorias', 'entrada'));
    }

    public function showCategoria($nombre)
    {
        $categorias = Categoria::all();
        $categoria = Categoria::where('nombre', $nombre)->firstOrFail();
        $entradas = Entrada::where('categoria_id', $categoria->id)->get();
        return view('categoria', compact('categorias', 'categoria', 'entradas'));
    }
}