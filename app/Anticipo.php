<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class Anticipo extends Model
{
    use LogsActivity;
    
    protected $table = 'anticipos';
    protected $fillable = [
        'monto',
        'razon',
        'observaciones',
        'tipo',
        'fecha',
        'trabajador_id'
    ];
    //log
    protected static $logAttributes = [
        'monto',
        'razon',
        'observaciones',
        'tipo',
        'fecha',
        'trabajador_id'
    ];
    protected static $logName = 'anticipo';

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
