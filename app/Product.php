<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class Product extends Model
{
    use LogsActivity;

    protected $table = 'products';
    protected $fillable = ['nombre', 'slug', 'cantidad', 'precio_actual'];

    //log
    protected static $logAttributes = [
        'nombre', 'slug', 'cantidad', 'precio_actual'
    ];
    protected static $logName = 'producto';

    //only the `deleted` event will get logged automatically
    protected static $recordEvents = ['created','updated','deleted'];


    public function getDescriptionForEvent(string $eventName): string
    {
        return "Este modelo ha sido  {$eventName}";
    }
    //log

    public function category() {
        return $this->belongsTo(Category::class);
    }

    public function images(){
        return $this->morphMany('App\Image','imageable');
    }

    public function stocks(){
    	return $this->hasMany('App\Stock');
    }
}
