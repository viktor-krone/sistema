<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Bodega;

class AdminBodegaController extends Controller
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
        $nombre = $request->get('nombre');

        $bodegas = Bodega::where('nombre','like',"%$nombre%")
            ->where('empresa_id', auth()->user()->empresa_id)
            ->orderBy('nombre')
            ->paginate(10);
        return view('admin.bodega.index',compact('bodegas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.bodega.create');
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
            'nombre' => 'required|max:50|unique:bodegas,nombre',
            'slug' => 'required|max:50|unique:bodegas,slug',

        ]);

        $bodega = new Bodega();
        $bodega->empresa_id   = auth()->user()->empresa_id;
        $bodega->nombre        = $request->nombre;
        $bodega->slug          = $request->slug;
        $bodega->descripcion   = $request->descripcion;
        $bodega->save();
        //Bodega::create($request->all());

        return redirect()->route('admin.bodega.index')->with('datos','Registro creado correctamente!');


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $bodega = Bodega::where('slug',$slug)
            ->where('empresa_id', auth()->user()->empresa_id)
            ->firstOrFail();
        $editar = 'Si';

        return view('admin.bodega.show',compact('bodega','editar'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        $bodega= Bodega::where('slug',$slug)
            ->where('empresa_id', auth()->user()->empresa_id)
            ->firstOrFail();
        $editar = 'Si';

        return view('admin.bodega.edit',compact('bodega','editar'));
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
        $bodega = Bodega::findOrFail($id);

        $request->validate([
            'nombre' => 'required|max:50|unique:bodegas,nombre,'.$bodega->id,
            'slug' => 'required|max:50|unique:bodegas,slug,'.$bodega->id,

        ]);


        //$bodega->empresa_id   = auth()->user()->empresa_id;
        $bodega->nombre        = $request->nombre;
        $bodega->slug          = $request->slug;
        $bodega->descripcion   = $request->descripcion;
        $bodega->save();

        //$bodega->fill($request->all())->save();

        //return $cat;

        return redirect()->route('admin.bodega.index')->with('datos','Registro actualizado correctamente!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $bodega = Bodega::findOrFail($id);
        $bodega->delete();
        return redirect()->route('admin.bodega.index')->with('datos','Registro eliminado correctamente!');


    }
}
