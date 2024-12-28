<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Entrada;

class HomeController extends Controller
{
public function index(){
    $entradas=Entrada::all();
    return view('home',['entradas'=>$entradas]);
}
public function vistaentrada($slug){
    $entrada=Entrada::where('slug',$slug)->first();
    return view('vistaentrada',['entrada'=>$entrada]);
}


}