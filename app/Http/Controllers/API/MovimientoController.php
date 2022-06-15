<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\MovimientoRepository;
use App\Repositories\FolioRepository;

class MovimientoController extends Controller
{
    private $_movimiento;
    private $_folio;

	public function __construct(
        MovimientoRepository $movimiento,
        FolioRepository $folio
	){
        $this->_movimiento = $movimiento;
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
    public function movimiento(Request $request)
    {

        $data = (object)[
            'bodega_id' => $request->input('bodega_id'),
            'folio' =>  $this->_folio->getFolio('500'),
            'movimiento_tipo_id' => $request->input('tipo_id'),
            'fecha' => $request->input('fecha'),

            'detalles' => []
        ];

        foreach ($request->input('details') as $d) {
            $data->detalles[] = (object)[
                'producto_id' => $d['id'],
                'cantidad' => $d['cantidad'],
                'precio' => $d['precio_actual'],
                'costo' => $d['costo']
            ];
        }

        return $this->_movimiento->save($data);


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
