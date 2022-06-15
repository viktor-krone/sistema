<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MovimientoItem extends Model
{
    protected $table = 'movimiento_items';

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'created_at', 'updated_at',
    ];

    public function producto(){
    	return $this->belongsTo('App\Product');
    }
}
