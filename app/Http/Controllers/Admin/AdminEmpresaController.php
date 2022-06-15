<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Empresa;
use App\User;
//use App\Role;
use Spatie\Activitylog\Models\Activity;

class AdminEmpresaController extends Controller
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

        $empresas = Empresa::orderBy('razon')
            ->paginate(10);

        return view('admin.empresa.index',compact('empresas'));
    }

    /**
     * Display a listing of the log.
     *
     * @return \Illuminate\Http\Response
     */
    public function log(Request $request)
    {

        $logs = Activity::all();

        return view('admin.empresa.log',compact('logs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.empresa.create');
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
            'rut_empresa' => 'required|max:50|unique:empresas,rut_empresa',
            'razon' => 'required|max:50|unique:empresas,razon',

        ]);

        $urlimagenes = [];
        if ($request->hasFile('imagenes')) {
            $imagenes = $request->file('imagenes');
            //dd ($imagenes);
            foreach ($imagenes as $key => $imagen) {
                $nombre = time().'_'.$imagen->getClientOriginalName();
                $ruta = public_path().'/empresas';
                $imagen->move($ruta , $nombre);
                $urlimagenes[$key]['url'] = '/empresas/'.$nombre;
                $urlimagenes[$key]['empresa_id'] = auth()->user()->empresa_id;
            }
            //return $urlimagenes;
        }


        $empresa = new Empresa();
        $empresa->rut_empresa  = $request->rut_empresa;
        $empresa->razon        = $request->razon;
        $empresa->fantasia   = $request->fantasia;
        $empresa->telefono   = $request->telefono;
        $empresa->web   = $request->web;
        $empresa->email   = $request->email;
        $empresa->direccion   = $request->direccion;
        $empresa->estado   = 1;
        $empresa->save();


        $role = Role::create([
            'empresa_id'  => $empresa->id,
            'display_name'  => 'Super Administrador',
            'name'          => Str::slug('Super Administrador'),
            'hidden'        => true
        ]);
        $role->syncPermissions(Permission::all());

        $user = User::create([
            'rut' => '17128579-8',
            'name' => 'victor',
            'apellidoPaterno' => 'ormazabal',
            'apellidoMaterno' => 'devia',
            'email' => 'victor@softnet.cl',
            'password' => bcrypt('12344321'),
            'api_token' => Str::random(30),
            'estado' => '1',
            'role' => 'super-administrador',
            'empresa_id' => $empresa->id
        ]);

        $user->assignRole('super-administrador');


        $empresa->images()->createMany($urlimagenes);

        return redirect()->route('admin.empresa.index')->with('datos','Registro creado correctamente!');


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($rut_empresa)
    {
        $empresa = Empresa::where('rut_empresa',$rut_empresa)->firstOrFail();
        $editar = 'Si';

        return view('admin.empresa.show',compact('empresa','editar'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($rut_empresa)
    {
        $empresa = Empresa::where('rut_empresa',$rut_empresa)->firstOrFail();
        $editar = 'Si';

        return view('admin.empresa.edit',compact('empresa','editar'));
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
        $empresa = Empresa::findOrFail($id);

        $request->validate([
            'rut_empresa' => 'required|max:50|unique:empresas,rut_empresa,'.$empresa->id,
            'razon' => 'required|max:50',
            'fantasia' => 'required|max:50',
            'email' => 'required|max:50|unique:empresas,rut_empresa,'.$empresa->id

        ]);

        $urlimagenes = [];
        if ($request->hasFile('imagenes')) {
            $imagenes = $request->file('imagenes');
            //dd ($imagenes);
            foreach ($imagenes as $key => $imagen) {
                $nombre = time().'_'.$imagen->getClientOriginalName();
                $ruta = public_path().'/empresas';
                $imagen->move($ruta , $nombre);
                $urlimagenes[$key]['url'] = '/empresas/'.$nombre;
                $urlimagenes[$key]['empresa_id'] = auth()->user()->empresa_id;
            }
            //return $urlimagenes;
        }

        $empresa->rut_empresa = $request->rut_empresa;
        $empresa->razon = $request->razon;
        $empresa->fantasia = $request->fantasia;
        $empresa->email = $request->email;
        $empresa->save();

        //$empresa->images()->createMany($urlimagenes);

        $flight = $empresa->images()
            ->where('empresa_id', auth()->user()->empresa_id)
            ->update(['url' => $urlimagenes[$key]['url']]);

        return redirect()->route('admin.empresa.index')->with('datos','Registro actualizado correctamente!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $empresa = Empresa::findOrFail($id);
        $empresa->delete();

        return redirect()->route('admin.empresa.index')->with('datos','Registro eliminado correctamente!');


    }
}
