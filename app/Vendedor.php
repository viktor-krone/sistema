<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class Vendedor extends Model
{
    use LogsActivity;
    
    protected $table = 'vendedores';
    protected $fillable=['rut','nombre','comision','estado'];

    //log
    protected static $logAttributes = [
        'rut','nombre','comision','estado'
    ];
    protected static $logName = 'vendedor';

    //only the `deleted` event will get logged automatically
    protected static $recordEvents = ['created','updated','deleted'];


    public function getDescriptionForEvent(string $eventName): string
    {
        return "Este modelo ha sido  {$eventName}";
    }
    //log

    /*public function products(){
        return $this->hasMany(Product::class);
    }*/
}
