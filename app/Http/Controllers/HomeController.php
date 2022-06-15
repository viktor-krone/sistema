<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Empresa;
use App\Repositories\DocumentoRepository;

class HomeController extends Controller
{
    private $_documento;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(DocumentoRepository $documento)
    {
        $this->middleware('auth');
        $this->_documento = $documento;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $cotizaciones = count($this->_documento->getCotizacion());
        $empresa = Empresa::find(auth()->user()->empresa_id);
        $productos = $empresa->products->count();

        return view('home',compact('cotizaciones','productos') );
    }

    public function plantillaAdmin()
    {

        $cotizaciones = count($this->_documento->getCotizacion());

        $empresa = Empresa::find(auth()->user()->empresa_id);


        $productos = $empresa->products->count();


        return view('home', compact('cotizaciones','productos') );
    }

    public function IngresarContactoPagina(Request $request)
    {
        echo "ingresar a pagina";
        print_r($request);
    }

}
