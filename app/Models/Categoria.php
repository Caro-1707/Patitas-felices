<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    protected $table = 'categoria';

    protected $fillable = [
        'nombre',
        'descripcion'
    ];

    public function mascotas()
    {
        return $this->hasMany(Mascota::class);
    }
}
