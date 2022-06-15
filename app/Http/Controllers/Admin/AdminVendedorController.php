<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Exports\VendedoresExport;
use Maatwebsite\Excel\Facades\Excel;

use App\Vendedor;

class AdminVendedorController extends Controller
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

        $vendedores = Vendedor::where('nombre','like',"%$nombre%")
            ->where('empresa_id', auth()->user()->empresa_id)
            ->orderBy('nombre')
            ->paginate(10);
        return view('admin.vendedor.index',compact('vendedores'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.vendedor.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         /*$cat = new Category();
        $cat->nombre        = $request->nombre;
        $cat->slug          = $request->slug;
        $cat->descripcion   = $request->descripcion;
        $cat->save();

        return $cat;
        */

        //return Category::create($request->all());


        $request->validate([
            'rut' => 'required|max:50|unique:vendedores,rut',
            'nombre' => 'required|max:50',
            'comision' => 'required|min:0'
        ]);

        //Vendedor::create($request->all());

        $vendedor = new Vendedor();
        $vendedor->empresa_id = auth()->user()->empresa_id;
        $vendedor->rut = $request->rut;
        $vendedor->nombre = $request->nombre;
        $vendedor->comision = $request->comision;
        $vendedor->estado = isset($request->estado)?$request->estado:0;
        $vendedor->save();


        return redirect()->route('admin.vendedor.index')->with('datos','Registro creado correctamente!');


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $vendedor = Vendedor::where('id',$id)
            ->where('empresa_id', auth()->user()->empresa_id)
            ->firstOrFail();
        $editar = 'Si';

        return view('admin.vendedor.show',compact('vendedor','editar'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $vendedor = Vendedor::where('id',$id)
            ->where('empresa_id', auth()->user()->empresa_id)
            ->firstOrFail();
        $editar = 'Si';

        return view('admin.vendedor.edit',compact('vendedor','editar'));
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
        $vendedor= Vendedor::findOrFail($id);
        /*$vendedor = Vendedor::where('id', $id)
            ->where('empresa_id', auth()->user()->empresa_id)
            ->get();*/


        $request->validate([
            'nombre' => 'required|max:50|unique:vendedores,nombre,'.$vendedor->id,
        ]);

        $vendedor->fill($request->all())->save();

        return redirect()->route('admin.vendedor.index')->with('datos','Registro actualizado correctamente!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $vendedor = Vendedor::findOrFail($id)
            ->where('empresa_id', auth()->user()->empresa_id)
            ->get();
        $vendedor->delete();

        return redirect()->route('admin.vendedor.index')->with('datos','Registro eliminado correctamente!');


    }

    public function export()
    {
        return Excel::download(new VendedoresExport, 'listado_vendedores.xlsx');
    }


}
