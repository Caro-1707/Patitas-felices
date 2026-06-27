<?php

namespace App\Http\Controllers;

use App\Models\Mascota;
use App\Models\Categoria;
use Illuminate\Http\Request;

class homeController extends Controller
{
       public function index(Request $request)
{
    $categorias = Categoria::all();

    $mascotas = Mascota::with('categoria')
        ->where('estado', 'Disponible');

    if ($request->categoria_id) {
        $mascotas->where('categoria_id', $request->categoria_id);
    }

    $mascotas = $mascotas->get();

    return view('usuario.home', compact('mascotas', 'categorias'));
}

  public function filtrarCategoria($id)
{
    $mascotas = Mascota::with('categoria')
        ->where('categoria_id', $id)
        ->where('estado', 'Disponible')
        ->get();

    $categorias = Categoria::all();

    return view('usuario.home', compact('mascotas', 'categorias'));
}
}
