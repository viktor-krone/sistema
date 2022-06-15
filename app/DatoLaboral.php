<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DatoLaboral extends Model
{
    protected $table = 'datos_laborales';

    protected $fillable = [
        'trabajador_id',
        'cargo_id',
        'departamento_id',
        'tipo_contrato_id',
        'estado_laboral_id',
        'sueldo',
        'tipo_gratificacion_id',
        'seguro_cesantia_id',
        'tipo_trabajador_id',
    ];

    /*public function products(){
        return $this->hasMany(Product::class);
    }*/
}
