<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Anticipo;
use App\Trabajador;

class AdminAnticipoController extends Controller
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

        return view('admin.anticipo.index',compact('trabajadores'));
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
        return view('admin.anticipo.create')->with('trabajador',$trabajador);
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
            'fecha' => 'required|max:50',
            //'observacion' => 'required|max:50|unique:categories,slug',

        ]);

        //dd($request);

        $item = new Anticipo();
        $item->empresa_id   = auth()->user()->empresa_id;
        $item->monto        = $request->monto;
        $item->razon          = $request->razon;
        $item->observaciones   = $request->observacion;
        $item->tipo   = $request->tipo;
        $item->fecha   = $request->fecha;
        //$item->trabajador_id   = $request->descripcion;


        $item->save();

        //Anticipo::create($request->all());

        return redirect()->route('admin.anticipo')->with('datos','Registro creado correctamente!');


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

        $trabajadores = Trabajador::where('nombre','like',"%$nombre%")
            ->where('empresa_id', auth()->user()->empresa_id)
            ->orderBy('nombre')
            ->paginate(10);
        return view('admin.remuneracion.ausencias',compact('trabajadores'));
    }
}
