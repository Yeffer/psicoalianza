<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ciudades extends Model
{
    protected $fillable = [
        'nombre',
    ];


    public function getRouteKeyName()
    {
        return 'url';
    }
}
