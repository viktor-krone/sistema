<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Documento extends Model
{
    public function detalles(){
    	return $this->hasMany('App\DocumentoItem');
    }

    public function movimientos(){
    	return $this->hasMany('App\Movimiento');
    }

    public function cliente(){
    	return $this->belongsTo('App\Cliente');
    }
    public function vendedor(){
    	return $this->belongsTo('App\Vendedor');
    }
}
