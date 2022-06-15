<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Consulta;

class PaginaController extends Controller
{
    private $_documento;


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
    }

    function getBrowser($user_agent){
        if(strpos($user_agent, 'MSIE') !== FALSE)
            return 'Internet explorer';
        elseif(strpos($user_agent, 'Edge') !== FALSE) //Microsoft Edge
            return 'Microsoft Edge';
        elseif(strpos($user_agent, 'Trident') !== FALSE) //IE 11
            return 'Internet explorer';
        elseif(strpos($user_agent, 'Opera Mini') !== FALSE)
            return "Opera Mini";
        elseif(strpos($user_agent, 'Opera') || strpos($user_agent, 'OPR') !== FALSE)
            return "Opera";
        elseif(strpos($user_agent, 'Firefox') !== FALSE)
            return 'Mozilla Firefox';
        elseif(strpos($user_agent, 'Chrome') !== FALSE)
            return 'Google Chrome';
        elseif(strpos($user_agent, 'Safari') !== FALSE)
            return "Safari";
        else
            return 'Otro';

    }

    public function IngresarContactoPagina(Request $request)
    {
        //obtiene navegador
        $navegador = $_SERVER['HTTP_USER_AGENT'];
        //$navegador = getBrowser($user_agent);

        //$ip = $_SERVER['HTTP_CLIENT_IP'] ? $_SERVER['HTTP_CLIENT_IP'] : ($_SERVER['HTTP_X_FORWARDED_FOR'] ? $_SERVER['HTTP_X_FORWARDED_FOR'] : $_SERVER['REMOTE_ADDR']);
        $ipaddress = '';
        if (getenv('HTTP_CLIENT_IP'))
            $ipaddress = getenv('HTTP_CLIENT_IP');
        else if(getenv('HTTP_X_FORWARDED_FOR'))
            $ipaddress = getenv('HTTP_X_FORWARDED_FOR');
        else if(getenv('HTTP_X_FORWARDED'))
            $ipaddress = getenv('HTTP_X_FORWARDED');
        else if(getenv('HTTP_FORWARDED_FOR'))
            $ipaddress = getenv('HTTP_FORWARDED_FOR');
        else if(getenv('HTTP_FORWARDED'))
           $ipaddress = getenv('HTTP_FORWARDED');
        else if(getenv('REMOTE_ADDR'))
            $ipaddress = getenv('REMOTE_ADDR');
        else
            $ipaddress = 'UNKNOWN';

        //$navegador = $_SERVER['HTTP_USER_AGENT'];

        $fecha = date("Y-m-d h:i:s", strtotime(Date('Y-m-d h:i:s')));

        $return = (object)[
    		'response' => false
    	];

        $query = new Consulta();
        $query->ip = $ipaddress;
        $query->navegador = $navegador;
        $query->fecha = $fecha;
        $query->rut = $request->rut;
        $query->nombre = $request->nombre;
        $query->email = $request->email;
        $query->asunto = $request->asunto;
        $query->mensaje = $request->mensaje;
        $query->save();
        $insertedId = $query->id;
        if ($insertedId) {
            // code...
            $return->response = true;
        }

        return json_encode($return);

    }

}
