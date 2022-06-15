<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoCliente extends Model
{
    protected $table = 'tipoClientes';
    //protected $fillable = ['nombre'];

    public function clientes() {
        return $this->belongsToMany('App\Cliente');
    }
    public function proveedores() {
        return $this->belongsToMany('App\Proveedor');
    }


}
