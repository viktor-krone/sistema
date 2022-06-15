<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Haber extends Model
{
    protected $table = 'haberes';
    protected $fillable = ['codigo','nombre','descripcion','tipo_haber_id '];

    /*
    public function haber(){
        return $this->hasMany(Product::class);
    }
    */
}
