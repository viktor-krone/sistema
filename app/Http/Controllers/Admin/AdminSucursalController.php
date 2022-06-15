<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Bodega;
use App\Sucursal;

class AdminSucursalController extends Controller
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

        $sucursales = Sucursal::where('nombre','like',"%$nombre%")
            ->where('empresa_id', auth()->user()->empresa_id)
            ->orderBy('nombre')
            ->paginate(10);
        return view('admin.sucursal.index',compact('sucursales'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {


        $bodegas = Bodega::where('empresa_id', auth()->user()->empresa_id)
            ->orderBy('nombre')
            ->get();

        return view('admin.sucursal.create',compact('bodegas'));
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
            'nombre' => 'required|max:50|unique:sucursales,nombre',
            'slug' => 'required|max:50|unique:sucursales,slug',

        ]);

        $sucursal = new Sucursal();
        $sucursal->empresa_id   = auth()->user()->empresa_id;
        $sucursal->bodega_id     = $request->bodega_id;
        $sucursal->nombre        = $request->nombre;
        $sucursal->slug          = $request->slug;
        $sucursal->descripcion   = $request->descripcion;
        $sucursal->save();

        return redirect()->route('admin.sucursal.index')->with('datos','Registro creado correctamente!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $sucursal = Sucursal::where('slug',$slug)
            ->where('empresa_id', auth()->user()->empresa_id)
            ->firstOrFail();
        $editar = 'Si';

        return view('admin.sucursal.show',compact('sucursal','editar'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        $sucursal = Sucursal::where('slug',$slug)
            ->where('empresa_id', auth()->user()->empresa_id)
            ->firstOrFail();


        $bodegas = Bodega::where('empresa_id', auth()->user()->empresa_id)
            ->orderBy('nombre')
            ->get();

        $editar = 'Si';

        return view('admin.sucursal.edit',compact('sucursal','editar','bodegas'));
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
        $sucursal = Sucursal::findOrFail($id);

        $request->validate([
            'nombre' => 'required|max:50|unique:sucursales,nombre,'.$sucursal->id,
            'slug' => 'required|max:50|unique:sucursales,slug,'.$sucursal->id,

        ]);


        $sucursal->bodega_id     = $request->bodega_id;
        $sucursal->nombre        = $request->nombre;
        $sucursal->slug          = $request->slug;
        $sucursal->descripcion   = $request->descripcion;
        $sucursal->save();


        return redirect()->route('admin.sucursal.index')->with('datos','Registro actualizado correctamente!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $sucursal = Sucursal::findOrFail($id);
        $sucursal->delete();
        return redirect()->route('admin.sucursal.index')->with('datos','Registro eliminado correctamente!');

    }
}
