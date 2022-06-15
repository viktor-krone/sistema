<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sku extends Model
{
    public function category() {
        return $this->belongsTo(Category::class);
    }

    public function images(){
        return $this->morphMany('App\Image','imageable');
    }
}
