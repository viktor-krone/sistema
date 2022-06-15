<?php
/**
 * Created by PhpStorm.
 * User: marcelo
 * Date: 25-03-16
 * Time: 07:42 PM
 */

namespace App\Helpers;
use App\Vacacion;
use App\Anticipo;

class MyHelper {

    public static function vacationDays($date){
        $date_current = new \DateTime();
        $fecha_inicio =  new \DateTime($date);
        $difference = $date_current->diff($fecha_inicio);
        $year_difference = $difference->format('%y');
        $vacation_days = 0;
        if($year_difference <= 5){
            $vacation_days = $year_difference*15;
        }elseif($year_difference > 5 && $year_difference <= 10){
            $vacation_days = 75+($year_difference-5)*20;
        }elseif($year_difference > 10){
            $vacation_days = 75+100+($year_difference-10)*30;
        }
        return $vacation_days;
    }

    public static function vacationTaken($id){
        $days_taken = Vacacion::where('trabajador_id',$id)
        ->where('tipo', [0,2])
        ->sum('dias_tomados');

        return $days_taken;
    }

    public static function montoSolicitado($id){
        $monto_solicitado = Anticipo::where('trabajador_id',$id)
        ->where('tipo', '0')
        ->sum('monto');

        return $monto_solicitado;
    }
    public static function montoPagado($id){
        $monto_pagado = Anticipo::where('trabajador_id',$id)
        ->where('tipo', '1')
        ->sum('monto');

        return $monto_pagado;
    }

    public static function stateWorker($state){
        return ($state == 1)? 'ACTIVO' : 'RETIRADO';
    }
}
