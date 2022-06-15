<?php

namespace App\Repositories;

use App\Documento;
use App\Movimiento;
use App\DocumentoItem;
use DB;

class DocumentoRepository {
    private $model;
    private $movimiento;

    public function __construct(){
        $this->model = new Documento();
        $this->movimiento = new Movimiento();
    }

    public function get($id) {
        return $this->model->find($id);
    }

    public function getAll() {
        return $this->model->orderBy('id', 'desc')->get();
    }
    public function getCotizacion() {
        return $this->model->where('tipo_id', '777')
            ->where('empresa_id', auth()->user()->empresa_id)
            ->orderBy('id', 'desc')
            ->get();
    }
    public function getDocTributarios() {
        return $this->model->where('tipo_id', '33')
            ->where('empresa_id', auth()->user()->empresa_id)
            ->orderBy('id', 'desc')
            ->get();
    }
    public function getNotasVentas() {
        return $this->model->where('tipo_id', '780')
            ->where('empresa_id', auth()->user()->empresa_id)
            ->orderBy('id', 'desc')
            ->get();
    }

    public function save($data) {

    	$return = (object)[
    		'response' => false
    	];

    	try{
    		DB::beginTransaction();

    		$this->model->empresa_id = auth()->user()->empresa_id;
    		$this->model->tipo_id = $data->tipo;
    		$this->model->folio = $data->folio;
    		$this->model->fecha = $data->fecha;
    		$this->model->vendedor_id = $data->vendedor_id;
    		$this->model->forma_pago_id = $data->forma_pago_id;
    		$this->model->estado_id = 1;

    		$this->model->iva = $data->iva;
	    	$this->model->subTotal = $data->subTotal;
	    	$this->model->total = $data->total;
	    	$this->model->cliente_id = $data->cliente_id;

	    	$this->model->save();

	    	$detalles = [];
	    	foreach ($data->detalles as $d) {
	    		$obj = new DocumentoItem;

	    		$obj->product_id = $d->product_id;
	    		$obj->cantidad = $d->cantidad;
	    		$obj->precio = $d->precio;
	    		$obj->tipo_descuento = 0;
	    		$obj->descuento = 0;
	    		$obj->valor_descuento = $d->valor_descuento;
	    		$obj->total = $d->total;

	    		$detalles[] = $obj;

                $movimiento = new Movimiento;
                $movimiento->empresa_id = auth()->user()->empresa_id;
                $movimiento->sucursal_id = 1;
                $movimiento->movimiento_tipo_id = 2;
                $movimiento->fecha = Date('Y-m-d');
                $movimiento->folio = 1;
                $movimiento->usuario_id = 1;

                //$movimientos[] = $mov;
                $movimiento->save();


	    	}

	        $this->model->detalles()->saveMany($detalles);



            $return->response = true;

    		DB::commit();
    	}catch(\Exception $e){
            dd($e);
    		DB::rollBack();
    	}

        return json_encode($return);
    }

    /*public function updateEstadoCotizacion($data) {

    	$return = (object)[
    		'response' => false
    	];

    	try{
    		DB::beginTransaction();

            $updateCotizacion = $this->model::find(1):where('tipo_id', 777);
            $updateCotizacion->estado_id = 1;
            $updateCotizacion->save();

            DB::commit();
    	}catch(\Exception $e){
            dd($e);
    		DB::rollBack();
    	}

        return json_encode($return);

    }*/
}
