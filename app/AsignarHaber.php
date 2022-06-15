<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AsignarHaber extends Model
{
    use LogsActivity;

    protected $table = 'asignar_haberes';
    protected $fillable = ['fecha','monto','observacion','trabajador_id','haber_id'];

    //log
    protected static $logAttributes = ['fecha','monto','observacion','trabajador_id','haber_id'];
    protected static $logName = 'asignar_haberes';

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
