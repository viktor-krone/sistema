<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Proveedor;
use App\TipoCliente;
use Illuminate\Support\Facades\File;

class AdminProveedorController extends Controller
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
        $razon = $request->get('razon');

        $proveedores = Proveedor::where('razon','like',"%$razon%")
            ->where('empresa_id', auth()->user()->empresa_id)
            ->orderBy('razon')
            ->paginate(10);

        return view('admin.proveedor.index',compact('proveedores'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $estados_proveedores = $this->estados_proveedores();

        $tipoClientes = TipoCliente::where('empresa_id', auth()->user()->empresa_id)
            ->orderBy('id', 'asc')
            ->pluck('nombre', 'id');


        return view('admin.proveedor.create',compact('estados_proveedores','tipoClientes'));
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
            'rut' => 'required',
            'razon' => 'required',
            'giro' => 'required',
            'email' => 'required',
            'direccion' => 'required',
            'comuna_id' => 'required',

        ]);

        $listadoTipoClientes = TipoCliente::find($request->get('tipoClientes_id'));

        $proveedor = new Proveedor;
        $proveedor->empresa_id   = auth()->user()->empresa_id;
        $proveedor->rut =                  $request->rut;
        $proveedor->razon =                $request->razon;
        $proveedor->giro =                 $request->giro;
        $proveedor->fantasia =             $request->fantasia;
        $proveedor->email =             $request->email;
        $proveedor->direccion =             $request->direccion;
        $proveedor->comuna_id =             $request->comuna_id;


        $proveedor->save();

        $proveedor->tipoclientes()->sync($listadoTipoClientes);



        return redirect()->route('admin.proveedor.index')->with('datos','Registro creado correctamente!');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $proveedor = Proveedor::where('id',$id)
            ->where('empresa_id', auth()->user()->empresa_id)
            ->firstOrFail();

        $estados_proveedores = $this->estados_proveedores();

        //dd($estados_proveedores);

        return view('admin.proveedor.show',compact('proveedor','estados_proveedores'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $proveedor = Proveedor::findOrFail($id)
            ->where('empresa_id', auth()->user()->empresa_id);

        $tipoClientes = TipoCliente::where('empresa_id', auth()->user()->empresa_id)
            ->orderBy('id', 'asc')
            ->pluck('nombre', 'id');

        $estados_proveedores = $this->estados_proveedores();
        $tipoSelected = $proveedor->tipoclientes->pluck('id')->toArray();


        return view('admin.proveedor.edit',
        compact(
            'proveedor',
            'estados_proveedores',
            'tipoClientes',
            'tipoSelected'
            )
        );
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

        $request->validate([
            'rut' => 'required',
            'razon' => 'required',
            'email' => 'required',

        ]);

        //dd($request);
        //tipoClientes_id

        $proveedor = Proveedor::findOrFail($id);

        $proveedor->empresa_id = auth()->user()->empresa_id;
        $proveedor->razon = $request->razon;
        $proveedor->giro = $request->giro;
        $proveedor->fantasia = $request->fantasia;
        $proveedor->email = $request->email;
        $proveedor->direccion = $request->direccion;
        $proveedor->comuna_id = $request->comuna_id;


        //$listadoTipoClientes = TipoCliente::whereIn('id',$request->get('tipoClientes_id'))->get()->toArray();
        //dd($request);
        //$proveedor->tipoclientes()->detach();

        $listadoTipoClientes = TipoCliente::find($request->get('tipoClientes_id'))
            ->where('empresa_id', auth()->user()->empresa_id);
        //dd($listadoTipoClientes);
        //$user = App\User::find(1);
        //$user->roles()->attach($roleId);

        //$user->roles()->sync([1, 2, 3]);
        //$proveedor->tipoclientes()->attach($listadoTipoClientes);
        $proveedor->tipoclientes()->sync($listadoTipoClientes);


        $proveedor->save();


        return redirect()->route('admin.proveedor.edit',$proveedor->id)->with('datos','Registro actualizado correctamente!');



        //return $request->all();

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        /*$prod= Product::with('images')->findOrFail($id);

        foreach($prod->images as $image) {

            $archivo = substr($image->url,1);

             File::delete($archivo);

            $image->delete();
        }

        //return $prod;
        $prod->delete();
        return redirect()->route('admin.product.index')->with('datos','Registro eliminado correctamente!');*/

    }


    public function estados_proveedores(){
        return [
            '',
            'Nuevo',
            'En Oferta',
            'Popular'
        ];
    }





}
