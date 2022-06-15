<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Cargo;

class AdminCargoController extends Controller
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

        $cargos = Cargo::where('nombre','like',"%$nombre%")
            ->where('empresa_id', auth()->user()->empresa_id)
            ->orderBy('nombre')
            ->paginate(10);
        return view('admin.cargo.index',compact('cargos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.cargo.create');
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
            'nombre' => 'required|max:50|unique:cargos,nombre',
            'slug' => 'required|max:50|unique:cargos,slug',

        ]);

        $cargo = new Cargo();
        $cargo->empresa_id   = auth()->user()->empresa_id;
        $cargo->nombre        = $request->nombre;
        $cargo->slug          = $request->slug;
        $cargo->descripcion   = $request->descripcion;
        $cargo->save();
        //Cargo::create($request->all());

        return redirect()->route('admin.cargo.index')->with('datos','Registro creado correctamente!');


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $cargo = Cargo::where('slug',$slug)
            ->where('empresa_id', auth()->user()->empresa_id)
            ->firstOrFail();
        $editar = 'Si';

        return view('admin.cargo.show',compact('cargo','editar'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        $cargo = Cargo::where('slug',$slug)
        ->where('empresa_id', auth()->user()->empresa_id)
        ->firstOrFail();
        $editar = 'Si';

        return view('admin.cargo.edit',compact('cargo','editar'));
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
        $cargo = Cargo::findOrFail($id)
            ->where('empresa_id', auth()->user()->empresa_id);

        $request->validate([
            'nombre' => 'required|max:50|unique:cargos,nombre,'.$cargo->id,
            'slug' => 'required|max:50|unique:cargos,slug,'.$cargo->id,

        ]);

        $cargo->nombre        = $request->nombre;
        $cargo->slug          = $request->slug;
        $cargo->descripcion   = $request->descripcion;
        $cargo->save();


        return redirect()->route('admin.cargo.index')->with('datos','Registro actualizado correctamente!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cargo = Cargo::findOrFail($id)
            ->where('empresa_id', auth()->user()->empresa_id);
        $cargo->delete();
        return redirect()->route('admin.cargo.index')->with('datos','Registro eliminado correctamente!');


    }
}
