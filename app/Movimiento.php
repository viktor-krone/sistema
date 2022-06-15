<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Movimiento extends Model
{
    protected $table = 'movimientos';
    protected $fillable = [
        'empresa_id',
        'sucursal_id',
        'movimiento_tipo_id',
        'fecha',
        'folio',
        'usuario_id'
    ];

    public function detalles(){
    	return $this->hasMany('App\MovimientoItem');
    }

    /*public function cliente(){
    	return $this->belongsTo('App\Cliente');
    }
    public function vendedor(){
    	return $this->belongsTo('App\Vendedor');
    }*/
}
