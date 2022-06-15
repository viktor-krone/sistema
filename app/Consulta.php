<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Consulta extends Model
{

    protected $fillable = [
        'ip',
        'navegador',
        'fecha',
        'rut',
        'nombre',
        'email',
        'asunto',
        'mensaje'
    ];

    
}
