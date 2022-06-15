<?php

namespace App\Repositories;

use App\Liquidacion;
use App\LiquidacionDescuento;
use App\LiquidacionHaber;
use DB;

class LiquidacionRepository {
    private $model;

    public function __construct(){
        $this->model = new Liquidacion();
    }

    public function get($id) {
        return $this->model->find($id);
    }

    public function getAll() {
        return $this->model->orderBy('id', 'desc')->get();
    }
    public function getLiquidacion() {
        return $this->model->orderBy('id', 'desc')->get();
    }

    public function save($data) {

    	$return = (object)[
    		'response' => false
    	];

    	try{
    		DB::beginTransaction();
            $this->model->trabajador_id = $data->trabajador_id;
            $this->model->fecha = $data->fecha;
            $this->model->sueldo_bruto = $data->sueldo_bruto;
            $this->model->total_haber_imponible = $data->total_haber_imponible;
            $this->model->total_haber_no_imponible = $data->total_haber_no_imponible;
            $this->model->total_haber = $data->total_haber;
            $this->model->total_renta_imponible = $data->total_renta_imponible;
            $this->model->total_liquido = $data->total_liquido;
            $this->model->liqido_palabras = $data->liqido_palabras;
            $this->model->dias_trabajados = $data->dias_trabajados;
            $this->model->dias_trabajados = $data->dias_trabajados;
            $this->model->inasistencia = $data->inasistencia;
            $this->model->horas_no_trabajadas = $data->horas_no_trabajadas;
            $this->model->horas_extras = $data->horas_extras;
            $this->model->estado = $data->estado;

	    	$this->model->save();

	    	$haberes = [];
	    	foreach ($data->detalles as $d) {
	    		$obj = new LiquidacionHaber;

                $obj->liquidacion_id = $d->liquidacion_id;
                $obj->haber_id = $d->haber_id;
                $obj->monto = $d->monto;

	    		$haberes[] = $obj;
	    	}

            $descuentos = [];
	    	foreach ($data->detalles as $d) {
	    		$obj = new LiquidacionDescuento;

                $obj->liquidacion_id = $d->liquidacion_id;
                $obj->descuento_id = $d->descuento_id;
                $obj->monto = $d->monto;

	    		$descuentos[] = $obj;
	    	}

	        $this->model->detalleDescuentos()->saveMany($descuentos);
	        $return->response = true;

    		DB::commit();
    	}catch(\Exception $e){
            dd($e);
    		DB::rollBack();
    	}

        return json_encode($return);
    }
}
