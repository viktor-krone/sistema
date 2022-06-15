<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Proveedor;

use Illuminate\Support\Facades\File;

class ProveedorController extends Controller
{
    public function __construct() {
        $this->middleware('auth:api');
    }

    public function index()
    {
        return Proveedor::where('empresa_id', auth()->user()->empresa_id);
    }

    public function show($rut)
    {
        $proveedor = Proveedor::where('rut',$rut)
        ->where('empresa_id', auth()->user()->empresa_id)
        ->first();
        if ($proveedor) {
            return 'Rut existe';
        }
        else {
            return 'Rut Disponible';
        }

    }




}
