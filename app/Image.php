<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $fillable = [
        'empresa_id',
        'url',
        'imageable_type',
        'imageable_id'
    ];

    public function imageable(){
        return $this->morphTo();
    }

}
