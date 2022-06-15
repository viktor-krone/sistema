<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class Vacacion extends Model
{
    use LogsActivity;
    
    protected $table = 'vacaciones';
    protected $fillable = [
        'dias_tomados',
        'razon',
        'observaciones',
        'tipo',
        'inicio',
        'trabajador_id'
    ];

    //log
    protected static $logAttributes = [
        'dias_tomados',
        'razon',
        'observaciones',
        'tipo',
        'inicio',
        'trabajador_id'
    ];
    protected static $logName = 'vacacion';

    //only the `deleted` event will get logged automatically
    protected static $recordEvents = ['created','updated','deleted'];


    public function getDescriptionForEvent(string $eventName): string
    {
        return "Este modelo ha sido  {$eventName}";
    }
    //log

    public function trabajador(){
        return $this->belongsTo('App\Trabajador');
    }
}
