<?php

namespace App\Repositories;

use App\Stock;
use App\Movimiento;
use App\MovimientoItem;
use DB;

class MovimientoRepository {
    private $model;

    public function __construct(){
        $this->model = new Movimiento();
    }

    public function get($id) {
        return $this->model->find($id);
    }

    public function getAll() {
        return $this->model->orderBy('id', 'desc')->get();
    }
    public function getAjuste($id) {
        return $this->model->where('id', $id)->orderBy('id', 'desc')->get();
    }

    public function save($data) {

    	$return = (object)[
    		'response' => false
    	];

    	try{
    		DB::beginTransaction();
            //dd($data);
            //historial
            $this->model->empresa_id = auth()->user()->empresa_id;
            $this->model->bodega_id = $data->bodega_id;
            $this->model->movimiento_tipo_id = $data->movimiento_tipo_id;
            //$this->model->documento_id = $data->documento_id;
            $this->model->folio = $data->folio;
            $this->model->fecha = $data->fecha;
            $this->model->usuario_id = auth()->user()->id;
	    	$this->model->save();

	    	$detalles = [];
	    	foreach ($data->detalles as $d) {
	    		$obj = new MovimientoItem;

	    		$obj->producto_id = $d->producto_id;
                $obj->cantidad = $d->cantidad;
                $obj->precio = $d->precio;
                $obj->costo = (int)$d->costo;

	    		$detalles[] = $obj;
	    	}
            $this->model->save();
            //historial

            //stock
            $stock = new Stock();
            $stock->actualizar_stock($detalles, $data->bodega_id, $data->movimiento_tipo_id);

            //stock
            //dd($detalles);
	        $this->model->detalles()->saveMany($detalles);
	        $return->response = true;

    		DB::commit();
    	}catch(\Exception $e){
            dd($e);
    		DB::rollBack();
    	}

        return json_encode($return);
    }
}
