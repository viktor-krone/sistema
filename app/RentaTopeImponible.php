<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RentaTopeImponible extends Model
{

    protected $table = 'renta_tope_imponible';

    protected $fillable = [
        'afiliados_afp',
        'afiliados_ips',
        'seguro_cesantia'
    ];


    /*public function vendedor(){
    	return $this->belongsTo('App\Vendedor');
    }*/

    public function indicadorPrevisional()
    {
        return $this->hasOne('App\IndicadorPrevisional');
    }



}
