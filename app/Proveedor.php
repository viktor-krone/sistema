<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class Proveedor extends Model
{

    use LogsActivity;
    
    protected $table = 'clientes';

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
    protected static $logName = 'proveedor';

    //only the `deleted` event will get logged automatically
    protected static $recordEvents = ['created','updated','deleted'];


    public function getDescriptionForEvent(string $eventName): string
    {
        return "Este modelo ha sido  {$eventName}";
    }
    //log


    public function tipoclientes() {
        return $this->belongsToMany('App\TipoCliente');
    }

    /*public function category() {
        return $this->belongsTo(Category::class);
    }

    public function images(){
        return $this->morphMany('App\Image','imageable');
    }*/
}
