<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Liquidacion extends Model
{
    protected $table = "liquidaciones";
    
    public function detalleHaberes(){
    	return $this->hasMany('App\LiquidacionHaber');
    }
    public function detalleDescuentos(){
    	return $this->hasMany('App\LiquidacionDescuento');
    }

    public function trabajador(){
    	return $this->belongsTo('App\Trabajador');
    }
    /*public function vendedor(){
    	return $this->belongsTo('App\Vendedor');
    }*/
}
