<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Exports\UsersExport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Str;

use App\User;

class AdminUserController extends Controller
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


        $nombre = $request->get('name');

        $usuarios = User::where('name','like',"%$nombre%")
            ->where('empresa_id', auth()->user()->empresa_id)
            ->orderBy('name')
            ->paginate(10);


        return view('admin.user.index',compact('usuarios'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

        $user = new User;
        $page = $request->get('page');
        //$roles = Role::query();

        if($user->hasRole('super-administrador')){
            $roles = Role::orderBy('display_name', 'asc')
                ->where('empresa_id', auth()->user()->empresa_id)
                ->pluck('display_name', 'id');
        }else{
            $roles = Role::where('name','!=','super-administrador')
                ->where('empresa_id', auth()->user()->empresa_id)
                ->orderBy('display_name', 'asc')->pluck('display_name', 'id');
        }




        return view('admin.user.create',compact('user','roles') );
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
            'rut' => 'required|max:50',
            'name' => 'required|max:50',
            'email' => 'required|max:50',
            'password' => 'required|max:50',

        ]);


        $api_token = Str::random(30);
        $password = bcrypt($request->has('password'));

        \DB::beginTransaction();

        $user = new User();
        $user->rut        = $request->rut;
        $user->name        = $request->name;
        $user->apellidoPaterno        = $request->apellidoPaterno;
        $user->apellidoMaterno        = $request->apellidoMaterno;
        $user->email        = $request->email;
        //$user->email_verified_at        = '';
        $user->password        = $password;
        $user->imagen        = $request->imagen;
        $user->api_token        = $api_token;
        $user->estado        = 1;
        $user->estado_admin        = 0;
        $user->empresa_id        = auth()->user()->empresa_id;
        //$user->remember_token        = '';

        $user->save();

/*          $user = User::create(array_merge(
              [
                  'password' => $password,
                  'status' => $request->has('status') ?? 'inactive',
                  'hidden' => $request->has('hidden'),
                  'api_token' => $api_token,
                  'empresa_id' => auth()->user()->empresa_id
              ],
              $request->all()
          ));
*/

          $user->roles()->attach($request->input('role_id'));

        \DB::commit();

        /*return redirect()->route('dashboard::users.index')->with([
            'message' => 'Se ha creado con éxito al usuario [' . $user->completeName() . ']',
            'level' => 'success'
        ]);*/


        /*
        $user = new User();
        dd($request);
        $user->rut = $request->get('rut');
        $user->name = $request->get('name');
        $user->apellidoPaterno = $request->get('apellidoPaterno');
        $user->apellidoMaterno = $request->get('apellidoMaterno');
        $user->email = $request->get('email');
        $user->password = bcrypt($request->get('password'));
        $user->imagen = '';
        $user->estado = '';
        $user->save();
        //$user->password = bcrypt($request->get('password'));

        $user->roles()->attach($request->input('role_id'));*/

        //User::create($request->all());

        return redirect()->route('admin.user.index')->with('datos','Registro creado correctamente!');


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::where('id',$id)->firstOrFail();
        $editar = 'Si';

        if($user->hasRole('super-administrador')){
            $roles = Role::orderBy('display_name', 'asc')
                ->where('empresa_id', auth()->user()->empresa_id)
                ->pluck('display_name', 'id');
        }else{
            $roles = Role::where('name','!=','super-administrador')
                ->where('empresa_id', auth()->user()->empresa_id)
                ->orderBy('display_name', 'asc')
                ->pluck('display_name', 'id');
        }

        return view('admin.user.show',compact('user','editar','roles'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::where('id',$id)
            ->where('empresa_id', auth()->user()->empresa_id)
            ->firstOrFail();
        $editar = 'Si';

        if($user->hasRole('super-administrador')){
            $roles = Role::where('empresa_id', auth()->user()->empresa_id)
                ->orderBy('display_name', 'asc')
                ->pluck('display_name', 'id');
        }else{
            $roles = Role::where('name','!=','super-administrador')
                ->where('empresa_id', auth()->user()->empresa_id)
                ->orderBy('display_name', 'asc')
                ->pluck('display_name', 'id');
        }


        return view('admin.user.edit',compact('user','roles','editar'));
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
        $user = User::where('empresa_id', auth()->user()->empresa_id)
            ->findOrFail($id);
            //->where('empresa_idA', auth()->user()->empresa_id);


        $request->validate([
            'rut' => 'required|max:50,'.$user->id,
            'name' => 'required|max:50,'.$user->id,
            'email' => 'required|max:50,'.$user->id,
        ]);



        //$user->fill($request->all())->save();

        $user->update(array_merge(
            [
                'estado' => $request->has('status') ?? '0',
            ],
            $request->except('rut','password', 'confirm_password')
        ));

        // Verifico si vino el password de ser distinto de vacio lo actualizo.
        if (strlen(trim($request->get('password'))) > 0){
            $user->password = bcrypt($request->get('password'));
            $user->save();
        }

        $user->roles()->sync($request->input('role_id'));


        return redirect()->route('admin.user.index')->with('datos','Registro actualizado correctamente!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id)
            ->where('empresa_id', auth()->user()->empresa_id);
        $user->delete();

        return redirect()->route('admin.user.index')->with('datos','Registro eliminado correctamente!');


    }

    public function export()
    {
        return Excel::download(new UsersExport, 'listado_usuarios.xlsx');
    }
}
