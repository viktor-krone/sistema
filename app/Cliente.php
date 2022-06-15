<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class Cliente extends Model
{

    use LogsActivity;

    protected $fillable = [
        'rut',
        'razon',
        'giro',
        'fantasia',
        'email',
        'web',
        'telefono',
        'estado',
        'direccion',
        'comuna_id'
    ];

    //log
    protected static $logAttributes = [
        'rut',
        'razon',
        'giro',
        'fantasia',
        'email',
        'web',
        'telefono',
        'estado',
        'direccion',
        'comuna_id'
    ];
    protected static $logName = 'cliente';

    //only the `deleted` event will get logged automatically
    protected static $recordEvents = ['created','updated','deleted'];


    public function getDescriptionForEvent(string $eventName): string
    {
        return "Este modelo ha sido  {$eventName}";
    }
    //log


    /*public function category() {
        return $this->belongsTo(Category::class);
    }

    public function images(){
        return $this->morphMany('App\Image','imageable');
    }*/
}
