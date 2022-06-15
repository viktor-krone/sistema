<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use \DB;

class Trabajador extends Model
{
    protected $table = 'trabajadores';

    protected $fillable = [
        'rut',
        'nombre',
        'telefono',
        'foto',
        'inicio',
        'termino',
        'email',
        'estado',
    ];

    public function datoLaboral(){
        return $this->belongsTo('App\DatoLaboral');
    }

    public function vacaciones(){
        return $this->hasMany('App\Vacacion');
    }

    public static function sexo() {
        return DB::table('sexo')->get();
    }
    public static function estado_militar() {
        return DB::table('estado_militar')->get();
    }
    public static function estado_civil() {
        return DB::table('estado_civil')->get();
    }
    public static function nivel_estudio() {
        return DB::table('nivel_estudio')->get();
    }
}
