<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class Empresa extends Model
{

    use LogsActivity;

    public function users(){
        return $this->hasMany(User::class);
    }
    public function products(){
        return $this->hasMany('App\Product');
    }

    public function images(){
        return $this->morphOne('App\Image','imageable');
    }

}
