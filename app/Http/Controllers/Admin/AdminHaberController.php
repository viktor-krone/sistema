<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Haber;
use App\AsignarHaber;
use App\TipoHaber;
use App\Trabajador;

class AdminHaberController extends Controller
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
        $fecha = $request->get('fecha');

        $haberes = AsignarHaber::where('fecha','like',"%$fecha%")
            ->where('empresa_id', auth()->user()->empresa_id)
            ->orderBy('fecha')
            ->paginate(10);

        return view('admin.haber.index',compact('haberes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $trabajadores = Trabajador::where('empresa_id', auth()->user()->empresa_id);
        $haberes = Haber::where('empresa_id', auth()->user()->empresa_id);
        return view('admin.haber.create',compact('haberes','trabajadores'));
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
            'fecha' => 'required|max:50|unique:asignar_haberes,fecha',
            'haber_id' => 'required|max:50',
            'monto' => 'required|max:50',

        ]);

        $asignarhaber = new  AsignarHaber();
        $asignarhaber->empresa_id = auth()->user()->empresa_id;
        $asignarhaber->fecha = $request->fecha;
        $asignarhaber->monto = $request->monto;
        $asignarhaber->observacion = $request->observacion;
        $asignarhaber->trabajador_id = $request->trabajador_id;
        $asignarhaber->haber_id = $request->haber_id;
        $asignarhaber->save();

        //AsignarHaber::create($request->all());

        return redirect()->route('admin.haber.index')->with('datos','Registro creado correctamente!');


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        /*$bodega = Bodega::where('slug',$slug)->firstOrFail();
        $editar = 'Si';

        return view('admin.bodega.show',compact('bodega','editar'));*/
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        /*$bodega= Bodega::where('slug',$slug)->firstOrFail();
        $editar = 'Si';

        return view('admin.bodega.edit',compact('bodega','editar'));*/
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
        /*$bodega = Bodega::findOrFail($id);

        $request->validate([
            'nombre' => 'required|max:50|unique:bodegas,nombre,'.$bodega->id,
            'slug' => 'required|max:50|unique:bodegas,slug,'.$bodega->id,

        ]);


        $bodega->fill($request->all())->save();

        //return $cat;

        return redirect()->route('admin.bodega.index')->with('datos','Registro actualizado correctamente!');*/
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        /*$bodega = Bodega::findOrFail($id);
        $bodega->delete();
        return redirect()->route('admin.bodega.index')->with('datos','Registro eliminado correctamente!');
        */

    }
}
