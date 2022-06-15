<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Product;
use App\Sku;
use App\Cliente;

class AutocompleteController extends Controller
{
    public function __construct() {
        $this->middleware('auth:api');
    }

    public function autocomplete(Request $request) {

        $palabraabuscar = $request->get('palabraabuscar');

        $Productos = Product::where('nombre','like','%'.$palabraabuscar .'%')
        ->where('empresa_id', auth()->user()->empresa_id)
        ->orderBy('nombre')
        ->get();

        $resultados=[];

        foreach ($Productos as $prod) {

            $encontrartexto =  stristr($prod->nombre, $palabraabuscar);
            $prod->encontrar = $encontrartexto;

            $recortar_palabra = substr($encontrartexto, 0, strlen($palabraabuscar));
            $prod->substr = $recortar_palabra;

            $prod->name_negrita =  str_ireplace($palabraabuscar, "<b>$recortar_palabra</b>",$prod->nombre);

            $resultados[] = $prod;
        }


        return  $resultados;
    }

    public function autocompleteCliente(Request $request) {

        $palabraabuscar = $request->get('palabraabuscar');

        $clientes = Cliente::where('razon','like','%'.$palabraabuscar .'%')
            ->where('empresa_id', auth()->user()->empresa_id)
            ->orderBy('razon')
            ->get();

        $resultados=[];

        foreach ($clientes as $cliente) {

            /*$encontrartexto =  stristr($cliente->rut, $palabraabuscar);
            $cliente->encontrar = $encontrartexto;*/

            //$recortar_palabra = substr($encontrartexto, 0, strlen($palabraabuscar));
            //$cliente->substr = $recortar_palabra;

            $cliente->name_negrita =  str_ireplace($palabraabuscar, "<b>$cliente->rut</b>",$cliente->razon);

            $resultados[] = $cliente;
        }


        return  $resultados;
    }
    public function autocompleteProducto(Request $request) {

        $palabraabuscar = $request->get('palabraabuscar');

        $productos = Product::where('nombre','like','%'.$palabraabuscar .'%')
            ->where('empresa_id', auth()->user()->empresa_id)
            ->orderBy('nombre')
            ->get();

        $resultados=[];

        foreach ($productos as $producto) {

            /*$encontrartexto =  stristr($cliente->rut, $palabraabuscar);
            $cliente->encontrar = $encontrartexto;*/

            //$recortar_palabra = substr($encontrartexto, 0, strlen($palabraabuscar));
            //$cliente->substr = $recortar_palabra;

            $producto->name_negrita =  str_ireplace($palabraabuscar, "<b>$producto->codigo</b>",$producto->nombre);

            $resultados[] = $producto;
        }


        return  $resultados;
    }
    public function autocompleteSku(Request $request) {

        $palabraabuscar = $request->get('palabraabuscar');

        $skus = Sku::where('nombre','like','%'.$palabraabuscar .'%')
            ->where('empresa_id', auth()->user()->empresa_id)
            ->orderBy('nombre')
            ->get();

        $resultados=[];

        foreach ($skus as $sku) {

            /*$encontrartexto =  stristr($cliente->rut, $palabraabuscar);
            $cliente->encontrar = $encontrartexto;*/

            //$recortar_palabra = substr($encontrartexto, 0, strlen($palabraabuscar));
            //$cliente->substr = $recortar_palabra;

            $sku->name_negrita =  str_ireplace($palabraabuscar, "<b>$sku->codigo</b>",$sku->nombre);

            $resultados[] = $sku;
        }


        return  $resultados;
    }
}
