<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class IndicadorPrevisional extends Model
{

    protected $table = 'indicador_previsionales';

    public function rentaTopeImponible(){
        return $this->hasOne('App\RentaTopeImponible');
    }
    public function rentaMinimaImponible(){
        return $this->hasOne('App\RentaMinimaImponible');
    }




}
