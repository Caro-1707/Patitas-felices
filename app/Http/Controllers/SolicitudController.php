<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\SolicitudAdopcion;
use Illuminate\Support\Facades\Mail;
use App\Mail\SolicitudAprobadaMail;
use Illuminate\Http\Request;
use App\Models\Mascota;
use App\Mail\SolicitudRechazadaMail;


class SolicitudController extends Controller
{
      public function create($id)
    {
        $mascota = Mascota::findOrFail($id);

        return view('adopcion.formulario', compact('mascota'));
    }

   public function store(Request $request)
{
    solicitudAdopcion::create([
        'user_id' => Auth::id(),
        'mascota_id' => $request->mascota_id,
        'vivienda' => $request->vivienda,
        'tiene_patio' => $request->tiene_patio,
        'tiene_otras_mascotas' => $request->tiene_otras_mascotas,
        'experiencia_mascotas' => $request->experiencia_mascotas,
        'motivo_adopcion' => $request->motivo_adopcion,
        'tiempo_disponible' => $request->tiempo_disponible,
        'estado' => 'Pendiente'
    ]);

    return redirect()->route('home')
        ->with('success', 'Solicitud enviada correctamente');
}

public function index()
{
    $solicitudes = SolicitudAdopcion::with(['user', 'mascota'])
        ->latest()
        ->get();

    return view('admin.solicitudes', compact('solicitudes'));
}

public function aprobar($id)
{
    $solicitud = SolicitudAdopcion::with(['user', 'mascota'])
        ->findOrFail($id);

    // Cambiar estado de la solicitud
    $solicitud->estado = 'Aprobada';
    $solicitud->save();

    // Cambiar estado de la mascota
    $mascota = $solicitud->mascota;
    $mascota->estado = 'Adoptada'; // o "No disponible"
    $mascota->save();

    // Enviar correo
    Mail::to($solicitud->user->email)
        ->send(new SolicitudAprobadaMail(
            $solicitud->user,
            $solicitud->mascota
        ));

    return back()->with(
        'success',
        'Solicitud aprobada y correo enviado.'
    );
}

public function rechazar($id)
{
    $solicitud = SolicitudAdopcion::with(['user', 'mascota'])
        ->findOrFail($id);

    $solicitud->estado = 'Rechazada';
    $solicitud->save();

    Mail::to($solicitud->user->email)
        ->send(new SolicitudRechazadaMail(
            $solicitud->user,
            $solicitud->mascota
        ));

    return back()->with(
        'success',
        'Solicitud rechazada y correo enviado.'
    );
}

public function destroy($id)
{
    $solicitud = SolicitudAdopcion::findOrFail($id);

    $solicitud->delete();

    return redirect()->back()->with(
        'success',
        'Solicitud eliminada correctamente.'
    );
}
}
