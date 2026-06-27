<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;

class CategoriaController extends Controller
{
   public function index()
{
    $categorias = Categoria::all();

    return view('admin.admin-crear-categoria', compact('categorias'));
}
    public function create()
    {
        return view('admin.admin-crear-categorias.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|max:255'
        ]);

        Categoria::create([
            'nombre' => $request->nombre
        ]);

        return redirect()
            ->route('categoria.index')
            ->with('success', 'Categoría creada correctamente');
    }

    public function edit(Categoria $categoria)
    {
        return view('admin.editar-categoria', compact('categoria'));
    }

    public function update(Request $request, Categoria $categoria)
    {
        $request->validate([
            'nombre' => 'required|max:255'
        ]);

        $categoria->update([
            'nombre' => $request->nombre
        ]);

        return redirect()
            ->route('categoria.index')
            ->with('success', 'Categoría actualizada');
    }

    public function destroy(Categoria $categoria)
{
    $categoria->delete();

    return redirect()
        ->route('categoria.index')
        ->with('success', 'Categoría eliminada');
}
}