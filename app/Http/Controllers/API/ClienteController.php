<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Cliente;

use Illuminate\Support\Facades\File;

class ClienteController extends Controller
{
    public function __construct() {
        $this->middleware('auth:api');
    }

    public function index()
    {

        //return Cliente::all();;

        return Cliente::where('empresa_id', auth()->user()->empresa_id)
               ->get();
    }

    public function show($rut)
    {
        $cliente = Cliente::where('rut',$rut)
            ->where('empresa_id', auth()->user()->empresa_id)
            ->first();

        if ($cliente) {
            return 'Rut existe';
        }
        else {
            return 'Rut Disponible';
        }

    }


    public function clientesMasVendidos(){

    }







}
