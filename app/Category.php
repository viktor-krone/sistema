<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class Category extends Model
{
    use LogsActivity;

    protected $fillable=['nombre','slug','descripcion'];

    //log
    protected static $logAttributes = [
        'nombre','slug','descripcion'
    ];
    protected static $logName = 'categoria';

    //only the `deleted` event will get logged automatically
    protected static $recordEvents = ['created','updated','deleted'];


    public function getDescriptionForEvent(string $eventName): string
    {
        return "Este modelo ha sido  {$eventName}";
    }
    //log

    public function products(){
        return $this->hasMany(Product::class);
    }
}
