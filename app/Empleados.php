<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Empleados extends Model
{
    
    protected $fillable = [
        'nombres',
        'apellidos',
        'identificacion',
        'telefono',
        'cargo_id',
        'pais_id',
        'ciudad_id',
    ];

    public function getRouteKeyName()
    {
        return 'url';
    }
}
