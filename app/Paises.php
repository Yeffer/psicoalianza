<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Paises extends Model
{
    protected $fillable = [
        'nombre',
    ];


    public function getRouteKeyName()
    {
        return 'url';
    }
}
