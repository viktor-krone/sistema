<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DocumentoItem extends Model
{
    protected $table = 'documento_items';

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'created_at', 'updated_at',
    ];

    public function product(){
    	return $this->belongsTo('App\Product');
    }
}
