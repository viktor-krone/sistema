<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class Sucursal extends Model
{
    use LogsActivity;

    protected $table = 'sucursales';
    protected $fillable = [
        'empresa_id',
        'bodega_id',
        'nombre',
        'slug',
        'descripcion'
    ];

    //log
    protected static $logAttributes = [
        'empresa_id',
        'bodega_id',
        'nombre',
        'slug',
        'descripcion'
    ];
    protected static $logName = 'sucursal';

    //only the `deleted` event will get logged automatically
    protected static $recordEvents = ['created','updated','deleted'];


    public function getDescriptionForEvent(string $eventName): string
    {
        return "Este modelo ha sido  {$eventName}";
    }
    //log

    public function bodega() {
        return $this->belongsTo(Bodega::class);
    }

}
