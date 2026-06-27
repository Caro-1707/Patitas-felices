<?php

namespace App\Models;
use App\Http\Controllers\SolicitudController;

use Illuminate\Database\Eloquent\Model;

class SolicitudAdopcion extends Model
{
    protected $table = 'solicitudes_adopcion';

    protected $fillable = [
        'user_id',
        'mascota_id',
        'vivienda',
        'tiene_patio',
        'tiene_otras_mascotas',
        'experiencia_mascotas',
        'motivo_adopcion',
        'tiempo_disponible',
        'estado'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function mascota()
    {
        return $this->belongsTo(Mascota::class);
    }
}
