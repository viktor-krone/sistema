<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Trabajador;
use App\Cargo;
use App\DatoLaboral;
use App\Departamento;


class AdminTrabajadorController extends Controller
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

        $trabajadores = Trabajador::where('nombre','like',"%$nombre%")
            ->where('empresa_id', auth()->user()->empresa_id)
            ->orderBy('nombre')
            ->paginate(10);
        return view('admin.trabajador.index',compact('trabajadores'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cargos = Cargo::where('empresa_id', auth()->user()->empresa_id)->get();
        $departamentos = Departamento::where('empresa_id', auth()->user()->empresa_id)->get();
        return view('admin.trabajador.create',compact('cargos','departamentos') );
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
            'rut' => 'required|max:50|unique:trabajadores,rut',
            'nombre' => 'required|max:50',
            'apellido_paterno' => 'required|max:50',
            'apellido_materno' => 'required|max:50',
            'email' => 'required|max:50',
            'inicio' => 'required|max:50',
            'fecha_nacimiento' => 'required|max:50',
            'sueldo' => 'required|max:50',
            'estado_civil_id' => 'required|max:50',
            'sexo_id' => 'required|max:50',
            'direccion' => 'required|max:50',

        ]);

        $trabajador = new Trabajador;
        $trabajador->empresa_id = auth()->user()->empresa_id;
        $trabajador->rut = $request->rut;
        $trabajador->nombre = $request->nombre;
        $trabajador->segundo_nombre = $request->segundo_nombre;
        $trabajador->apellido_paterno = $request->apellido_paterno;
        $trabajador->apellido_materno = $request->apellido_materno;
        $trabajador->fecha_nacimiento = $request->fecha_nacimiento;
        $trabajador->email = $request->email;
        $trabajador->telefono = $request->telefono;
        $trabajador->inicio = $request->inicio;
        $trabajador->termino = $request->termino;
        $trabajador->sueldo = $request->sueldo;
        $trabajador->foto = $request->imagen;
        $trabajador->estado = $request->estado;
        $trabajador->estado_civil_id = $request->estado_civil_id;
        $trabajador->estado_militar_id = $request->estado_militar_id;
        $trabajador->sexo_id = $request->sexo_id;
        $trabajador->nivel_estudio_id = $request->nivel_estudio_id;
        $trabajador->direccion = $request->direccion;
        $trabajador->comuna_id = $request->comuna_id;
        $trabajador->save();


        $datosLaborales = new DatoLaboral;
        $datosLaborales->empresa_id = auth()->user()->empresa_id;
        $datosLaborales->trabajador_id = $trabajador->id;
        $datosLaborales->cargo_id = $request->cargo_id;
        $datosLaborales->departamento_id = $request->departamento_id;
        $datosLaborales->tipo_contrato_id = $request->tipo_contrato_id;

        $datosLaborales->estado_laboral_id = 1;
        $datosLaborales->sueldo = $request->sueldo;
        $datosLaborales->tipo_gratificacion_id = 1;
        $datosLaborales->seguro_cesantia_id = 1;
        $datosLaborales->tipo_trabajador_id = 1;
        $datosLaborales->save();





        return redirect()->route('admin.trabajador.index')->with('datos','Registro creado correctamente!');


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $trabajador = Trabajador::where('id',$id)
            ->where('empresa_id', auth()->user()->empresa_id)
            ->firstOrFail();
        $editar = 'Si';

        return view('admin.trabajador.show',compact('trabajador','editar'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $trabajador = Trabajador::where('id',$id)
            ->where('empresa_id', auth()->user()->empresa_id)
            ->firstOrFail();
        $editar = 'Si';

        $sexos = $trabajador->sexo();
        $estado_militar = $trabajador->estado_militar();
        $estado_civil = $trabajador->estado_civil();
        $nivel_estudio = $trabajador->nivel_estudio();

        return view('admin.trabajador.edit',
            compact(
                'trabajador',
                'sexos',
                'estado_militar',
                'estado_civil',
                'nivel_estudio',
                'editar'
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
            'nombre' => 'required|max:50',
            'apellido_paterno' => 'required|max:50',
            'apellido_materno' => 'required|max:50',
            'email' => 'required|max:50',
            'inicio' => 'required|max:50',
            'fecha_nacimiento' => 'required|max:50',
            'sueldo' => 'required|max:50',
            'estado_civil_id' => 'required|max:50',
            'estado_militar_id' => 'required',
            'nivel_estudio_id' => 'required',
            'sexo_id' => 'required|max:50',
            'direccion' => 'required|max:50',

        ]);

        $item = Trabajador::findOrFail($id);
            //->where('empresa_id', auth()->user()->empresa_id);

        //dd($request->estado_civil_id);

        $item->nombre = $request->nombre;
        $item->segundo_nombre = $request->segundo_nombre;
        $item->apellido_paterno = $request->apellido_paterno;
        $item->apellido_materno = $request->apellido_materno;
        $item->fecha_nacimiento = $request->fecha_nacimiento;
        $item->email = $request->email;
        $item->telefono = $request->telefono;
        $item->inicio = $request->inicio;
        $item->termino = $request->termino;
        $item->sueldo = $request->sueldo;
        $item->foto = $request->imagen;
        $item->estado = $request->estado;
        $item->estado_civil_id = $request->estado_civil_id;
        $item->estado_militar_id = $request->estado_militar_id;
        $item->sexo_id = $request->sexo_id;
        $item->nivel_estudio_id = $request->nivel_estudio_id;
        $item->direccion = $request->direccion;
        $item->comuna_id = $request->comuna_id;
        $item->save();



        return redirect()->route('admin.trabajador.index')->with('datos','Registro actualizado correctamente!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $trabajador = Trabajador::findOrFail($id)
            ->where('empresa_id', auth()->user()->empresa_id);
        $trabajador->delete();
        return redirect()->route('admin.trabajador.index')->with('datos','Registro eliminado correctamente!');


    }




}
