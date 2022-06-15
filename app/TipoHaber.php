<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoHaber extends Model
{
    protected $table = 'tipo_haberes';
    protected $fillable = ['nombre'];

    /*
    public function haber(){
        return $this->hasMany(Product::class);
    }
    */
}
