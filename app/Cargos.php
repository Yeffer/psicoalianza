<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cargos extends Model
{
    protected $fillable = [
        'nombre',
    ];


    public function getRouteKeyName()
    {
        return 'url';
    }
}
