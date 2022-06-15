<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Cliente;
use Illuminate\Support\Facades\File;
use App\Exports\ClientesExport;
use Maatwebsite\Excel\Facades\Excel;

class AdminClienteController extends Controller
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

        $clientes = Cliente::where('razon','like',"%$razon%")
            ->where('empresa_id', auth()->user()->empresa_id)
            ->orderBy('razon')
            ->paginate(10);

        return view('admin.cliente.index',compact('clientes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $estados_clientes = $this->estados_clientes();

        return view('admin.cliente.create',compact('estados_clientes'));
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

        $urlimagenes = [];


        $cliente = new Cliente;
        $cliente->empresa_id = auth()->user()->empresa_id;
        $cliente->rut =         $request->rut;
        $cliente->razon =       $request->razon;
        $cliente->giro =        $request->giro;
        $cliente->fantasia =    $request->fantasia;
        $cliente->email =       $request->email;
        $cliente->direccion =   $request->direccion;
        $cliente->comuna_id =   $request->comuna_id;


        $cliente->save();



        return redirect()->route('admin.cliente.index')->with('datos','Registro creado correctamente!');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $cliente = Cliente::where('id',$id)
            ->where('empresa_id', auth()->user()->empresa_id)
            ->firstOrFail();

        $estados_clientes = $this->estados_clientes();

        //dd($estados_clientes);

        return view('admin.cliente.show',compact('cliente','estados_clientes'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cliente = Cliente::where('id',$id)
            ->where('empresa_id', auth()->user()->empresa_id)
            ->firstOrFail();

        $estados_clientes = $this->estados_clientes();

        //dd($estados_clientes);

        return view('admin.cliente.edit',compact('cliente','estados_clientes'));
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

        /*$urlimagenes = [];

        if ($request->hasFile('imagenes')) {

            $imagenes = $request->file('imagenes');

            //dd ($imagenes);

            foreach ($imagenes as $imagen) {
                $nombre = time().'_'.$imagen->getClientOriginalName();
                $ruta = public_path().'/imagenes';
                $imagen->move($ruta , $nombre);
                $urlimagenes[]['url'] = '/imagenes/'.$nombre;
            }
            //return $urlimagenes;
        }
        */


        $cliente = Cliente::findOrFail($id);

        $cliente->empresa_id = auth()->user()->empresa_id;
        $cliente->razon = $request->razon;
        $cliente->giro = $request->giro;
        $cliente->fantasia = $request->fantasia;
        $cliente->email = $request->email;
        $cliente->direccion = $request->direccion;
        $cliente->comuna_id = $request->comuna_id;

        $cliente->save();


        return redirect()->route('admin.cliente.edit',$cliente->id)->with('datos','Registro actualizado correctamente!');



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
        $prod= Product::with('images')->findOrFail($id);

        foreach($prod->images as $image) {

            $archivo = substr($image->url,1);

             File::delete($archivo);

            $image->delete();
        }

        //return $prod;
        $prod->delete();
        return redirect()->route('admin.product.index')->with('datos','Registro eliminado correctamente!');

    }


    public function estados_clientes(){
        return [
            '',
            'Nuevo',
            'En Oferta',
            'Popular'
        ];
    }

    public function export()
    {
        return Excel::download(new ClientesExport, 'listado_clientes.xlsx');
    }




}
