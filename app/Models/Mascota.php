<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mascota extends Model
{
       protected $fillable = [
        'categoria_id',
        'nombre',
        'raza',
        'edad',
        'sexo',
        'descripcion',
        'foto',
        'estado'
    ];

    public function categoria()
    {
        return $this->belongsTo(Categoria::class);
    }

    public function solicitudes()
    {
        return $this->hasMany(SolicitudAdopcion::class);
    }
}
