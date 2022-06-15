<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Departamento;

class AdminDepartamentoController extends Controller
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

        $departamentos = Departamento::where('nombre','like',"%$nombre%")
            ->where('empresa_id', auth()->user()->empresa_id)
            ->orderBy('nombre')
            ->paginate(10);
        return view('admin.departamento.index',compact('departamentos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.departamento.create');
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

        Departamento::create($request->all());

        return redirect()->route('admin.departamento.index')->with('datos','Registro creado correctamente!');


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $departamento = Departamento::where('slug',$slug)
            ->where('empresa_id', auth()->user()->empresa_id)
            ->firstOrFail();
        $editar = 'Si';

        return view('admin.departamento.show',compact('departamento','editar'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        $departamento= Departamento::where('slug',$slug)
            ->where('empresa_id', auth()->user()->empresa_id)
            ->firstOrFail();
        $editar = 'Si';

        return view('admin.departamento.edit',compact('departamento','editar'));
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
        $departamento = Departamento::findOrFail($id)
            ->where('empresa_id', auth()->user()->empresa_id);

        $request->validate([
            'nombre' => 'required|max:50|unique:bodegas,nombre,'.$departamento->id,
            'slug' => 'required|max:50|unique:bodegas,slug,'.$departamento->id,

        ]);

        $departamento->fill($request->all())->save();

        //return $cat;

        return redirect()->route('admin.departamento.index')->with('datos','Registro actualizado correctamente!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $departamento = Departamento::findOrFail($id);
        $departamento->delete();

        return redirect()->route('admin.departamento.index')->with('datos','Registro eliminado correctamente!');


    }
}
