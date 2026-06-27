<?php

namespace App\Http\Controllers;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\EstadisticasExport;
use App\Models\Mascota;
use App\Models\Categoria; 

class MascotaController extends Controller
{
    public function store(Request $request)
{
    $request->validate([
        'categoria_id' => 'required',
        'nombre' => 'required',
        'raza' => 'required',
        'edad' => 'required',
        'sexo' => 'required',
        'descripcion' => 'required',
        'foto' => 'nullable|image',
        'estado' => 'required'
    ]);

    $rutaFoto = null;

    if ($request->hasFile('foto')) {
        $rutaFoto = $request->file('foto')->store('mascotas', 'public');
    }

    Mascota::create([
        'categoria_id' => $request->categoria_id,
        'nombre' => $request->nombre,
        'raza' => $request->raza,
        'edad' => $request->edad,
        'sexo' => $request->sexo,
        'descripcion' => $request->descripcion,
        'foto' => $rutaFoto,
        'estado' => $request->estado,
    ]);

    return redirect()
        ->route('mascota.index')
        ->with('success', 'Mascota creada correctamente');
}

public function update(Request $request, Mascota $mascota)
{
    $request->validate([
        'categoria_id' => 'required',
        'nombre' => 'required',
        'raza' => 'required',
        'edad' => 'required',
        'sexo' => 'required',
        'descripcion' => 'required',
        'estado' => 'required'
    ]);

    $datos = [
        'categoria_id' => $request->categoria_id,
        'nombre' => $request->nombre,
        'raza' => $request->raza,
        'edad' => $request->edad,
        'sexo' => $request->sexo,
        'descripcion' => $request->descripcion,
        'estado' => $request->estado,
    ];

    if ($request->hasFile('foto')) {
        $rutaFoto = $request->file('foto')
            ->store('mascotas', 'public');

        $datos['foto'] = $rutaFoto;
    }

    $mascota->update($datos);

    return redirect()
        ->route('mascota.index')
        ->with('success', 'Mascota actualizada correctamente');
}


public function create()
{
    $categorias = Categoria::all();

    return view('admin.admin-crear-mascota', compact('categorias'));
}

public function index()
{
    $mascotas = Mascota::with('categoria')->get();

    return view('admin.mascota', compact('mascotas'));
}

public function edit(Mascota $mascota)
{
    $categorias = Categoria::all();

    return view(
        'admin.editar-mascota',
        compact('mascota', 'categorias')
    );
}

public function destroy(Mascota $mascota)
{
    $mascota->delete();

    return redirect()
        ->route('mascota.index')
        ->with('success', 'Mascota eliminada correctamente');
}

public function reportePDF()
{
    $mascotas = Mascota::with('categoria')->get();

    $pdf = Pdf::loadView('reportes.mascotas', compact('mascotas'));

    return $pdf->download('Reporte_Mascotas.pdf');
}

public function exportarEstadisticas()
{
    return Excel::download(
        new EstadisticasExport,
        'Estadisticas_Patitas_Felices.xlsx'
    );
}
}