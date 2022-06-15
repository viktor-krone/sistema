<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Liquidacion;
use App\Trabajador;
use App\AsignarHaber;
use App\Vacacion;
use App\IndicadorPrevisional;
use App\Repositories\LiquidacionRepository;

class AdminLiquidacionController extends Controller
{
    private $_liquidacion;
    public function __construct(
        LiquidacionRepository $liquidacion
    ) {
        $this->middleware('auth');
        $this->_liquidacion = $liquidacion;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $liquidaciones = $this->_liquidacion->getLiquidacion();

        return view(
            'admin.liquidacion.index', [
                'model' => $liquidaciones
            ]
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $trabajadores = Trabajador::where('empresa_id', auth()->user()->empresa_id);
        //dd($vendedores);

        return view('admin.liquidacion.create',compact('trabajadores') );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $fecha = $request->fecha;
        $trabajador_id = $request->trabajador;

        /*$asignacion_haber = AsignarHaber::find($trabajador);
        dd($asignacion_haber);
        $sueldo_base = $asignacion_haber->trabajador->sueldo;
        $dato_laboral = $trabajador->datoLaboral;
*/


        $trabajador = Trabajador::find($trabajador_id);
        //$dias_trabajados = Vacacion::where('trabajador_id',$trabajador_id)->get();
        //dd($dias_trabajados);

        $sueldo_base = $trabajador->sueldo;

        $dias_base = 30;
        $dias_trabajados = 30;
        $dias_semanales = 7;
        $horas_semanales = 45;

        $horas_extras = 12;
        $dias_inasistencia = $dias_base - $dias_trabajados;
        $minutos_atrasos = 35;

        $valor_asignacion_titulo = ($sueldo_base * 10)/100;

        $valor_hora_ordinaria = (($sueldo_base / $dias_trabajados) * $dias_semanales) / $horas_semanales;
        $valor_hora_extra = $valor_hora_ordinaria * (1 + 0.6);


        $valor_atrasos = $valor_hora_ordinaria * ($minutos_atrasos / 60);
        $valor_total_horas_extras = $valor_hora_extra * $horas_extras;

        //sumar haberes imponibles
        $total_imponible = $sueldo_base;
        $base_gratificacion = $total_imponible * 0.25;


        //buscar datos por mes
        $datosPrevisionales = IndicadorPrevisional::find(1);
        //gratificacion mensual
        $suma_remunerativos = $sueldo_base + $valor_total_horas_extras + $valor_asignacion_titulo - $valor_atrasos;



        dd( $suma_remunerativos, $datosPrevisionales->rentaTopeImponible);
        dd( $sueldo_base, $asignacion_titulo );



        dd($request->fecha);
        dd($request->trabajador);









    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $liquidacion = $this->_liquidacion->get($id);

        return view('admin.liquidacion.show', [
                'model' => $liquidacion
            ]
        );

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    /*public function edit($slug)
    {
        $cat= Category::where('slug',$slug)->firstOrFail();
        $editar = 'Si';

        return view('admin.category.edit',compact('cat','editar'));
    }*/

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    /*public function update(Request $request, $id)
    {
        $cat= Category::findOrFail($id);

        $request->validate([
            'nombre' => 'required|max:50|unique:categories,nombre,'.$cat->id,
            'slug' => 'required|max:50|unique:categories,slug,'.$cat->id,

        ]);

        $cat->fill($request->all())->save();

        //return $cat;

        return redirect()->route('admin.category.index')->with('datos','Registro actualizado correctamente!');
    }*/

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    /*public function destroy($id)
    {
        $cat= Category::findOrFail($id);
        $cat->delete();
        return redirect()->route('admin.category.index')->with('datos','Registro eliminado correctamente!');


    }*/
}
