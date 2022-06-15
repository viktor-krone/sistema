<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Vacacion;
use App\Trabajador;

class AdminVacacionController extends Controller
{

    public function __construct() {

        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $trabajadores = Trabajador::where('estado',1)
            ->where('empresa_id', auth()->user()->empresa_id)
            ->orderBy('rut')
            ->paginate(10);

        return view('admin.vacacion.index',compact('trabajadores'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($trabajador_id)
    {
        //dd($trabajador_id);
        $trabajador = Trabajador::where('id',$trabajador_id)
            ->where('empresa_id', auth()->user()->empresa_id)
            ->firstOrFail();
        //dd($trabajador);
        return view('admin.vacacion.create')->with('trabajador',$trabajador);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
            'razon' => 'required|max:150',
            'dias_tomados' => 'required|max:50',
            'inicio' => 'required|max:50',
            //'observacion' => 'required|max:50|unique:categories,slug',

        ]);

        //dd($request);
        $vacacion = new Vacacion();
        $vacacion->empresa_id = auth()->user()->empresa_id;
        $vacacion->dias_tomados  = $request->dias_tomados;
        $vacacion->razon   = $request->razon;
        $vacacion->observaciones  = $request->observaciones;
        $vacacion->tipo  = $request->tipo;

        //Vacacion::create($request->all());

        return redirect()->route('admin.vacacion')->with('datos','Registro creado correctamente!');


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        /*$ausencia = Ausencia::where('slug',$slug)->firstOrFail();
        $editar = 'Si';

        return view('admin.ausencia.show',compact('ausencia','editar'));*/
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        /*$ausencia = Ausencia::where('slug',$slug)->firstOrFail();
        $editar = 'Si';

        return view('admin.ausencia.edit',compact('ausencia','editar'));*/
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
        /*$ausencia = Ausencia::findOrFail($id);

        $request->validate([
            'nombre' => 'required|max:50|unique:vacaciones,nombre,'.$cat->id,
            'slug' => 'required|max:50|unique:vacaciones,slug,'.$cat->id,

        ]);

        $vacacion->fill($request->all())->save();

        //return $cat;

        return redirect()->route('admin.ausencia.index')->with('datos','Registro actualizado correctamente!');*/
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        /*$ausencia = Ausencia::findOrFail($id);
        $ausencia->delete();
        return redirect()->route('admin.ausencia.index')->with('datos','Registro eliminado correctamente!');*/


    }



    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function ausencias(Request $request)
    {

        $nombre = $request->get('nombre');

        $trabajadores = Trabajador::where('nombre','like',"%$nombre%")->orderBy('nombre')->paginate(2);
        return view('admin.remuneracion.ausencias',compact('trabajadores'));
    }
}
