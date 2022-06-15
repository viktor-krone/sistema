<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LiquidacionDescuento extends Model
{
    protected $table = 'detalle_descuentos';

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'created_at', 'updated_at',
    ];

    /*public function product(){
    	return $this->belongsTo('App\Product');
    }*/
}
