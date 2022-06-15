<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\DocumentoRepository;

class DocNotaVentaController extends Controller
{
    //private $_client;
	//private $_product;
    private $_documento;

	public function __construct(
		//ClientRepository $client,
		//ProductRepository $product,
        DocumentoRepository $documento,
        FolioRepository $folio
	){
        //$this->middleware('auth');

        //$this->_client = $client;
		//$this->_product = $product;
        $this->_documento = $documento;
        $this->_folio = $folio;
	}


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return "";
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function notaventa(Request $request)
    {
        dd("stop admin doc controller");

        /*$data = (object)[
            'tipo' => $request->input('tipo'),
            'folio' => $this->_folio->getFolio($request->input('tipo')),
            'fecha' => $request->input('fecha'),
            'vendedor_id' => $request->input('vendedor'),
            'forma_pago_id' => $request->input('forma_pago'),
            'iva' => $request->input('iva'),
            'subTotal' => $request->input('subTotal'),
            'total' => $request->input('total'),
            'cliente_id' => $request->input('client_id'),
            'detalles' => []
        ];

        foreach ($request->input('details') as $d) {
            //dd($d['precio_actual']);

            $data->detalles[] = (object)[
                'product_id' => $d['id'],
                'cantidad'   => $d['cantidad'],
                'precio'  => $d['precio_actual'],
                'total'      => $d['total']
            ];
        }

        return $this->_documento->save($data);*/


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
