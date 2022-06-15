<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Company;
use App\Http\Requests\RoleRequest;

class AdminRoleController extends Controller
{
    public function __construct() {

        $this->middleware('auth');
    }

    public function index(Request $request) {

          /*$roles = Role::query();
          return view('admin.roles.index', [
              'items'   => $roles->paginate(),
              'page'    => $request->query('page')
          ]);*/



        $roles = Role::where('empresa_id', auth()->user()->empresa_id)
        ->get();

        return view('admin.roles.index',compact('roles'));


    }

      public function create(Request $request) {

        $page = $request->query('page');
        $permissions = Permission::orderBy('name', 'asc')
            ->pluck('name', 'id');

        return view('admin.roles.create', [
            'cancel_link'   => route('admin.roles.index', ['page' => $page]),
            'permissions'   => $permissions,
            'permission_id' => (!is_null(old('permission_id')))? old('permission_id'):[],
            'page'          => $page,

        ]);

      }

      public function store(Request $request)
      {
          \DB::beginTransaction();

            $role = Role::create([
                'empresa_id' => auth()->user()->empresa_id,
                'name' => $request->get('name'),
                'display_name' => $request->get('display_name'),
                'description' => $request->get('description'),
            ]);

            $permissions = Permission::whereIn('id',$request->get('permission_id'))
                ->get();

            $role->syncPermissions($permissions);

          \DB::commit();

          return redirect()->route('admin.roles.index')->with([
              'message' => "Se ha Actualizado el role ". $role->display_name,
              'level'   => 'success'
          ]);
      }

      public function edit(Request $request, $id) {
          $role = Role::findOrFail($id);
          $page = $request->query('page');

          $permissions = Permission::orderBy('name', 'asc')
            ->pluck('name', 'id');
          $editar = 'Si';


          return view('admin.roles.edit', [
              'model'          => $role,
              'editar'        => $editar,
              'permissions'    => $permissions,
              'permission_id'  => $request->old('permission_id', $role->permissions->pluck('id')->toArray()),
              'page'           => $request->query('page'),
              'cancel_link'   => route('admin.roles.index', ['page' => $page]),
          ]);
      }

      public function update(Request $request, $id)
      {

          \DB::beginTransaction();

            $role = Role::findOrFail($id);

            $role->update([
              'display_name' => $request->get('display_name'),
              'name'         => $request->get('name'),
              'description'  => $request->get('description'),
            ]);


            $permissions = Permission::whereIn('id',$request->get('permission_id'))
                ->get();

            $role->syncPermissions($permissions);

          \DB::commit();

          return redirect()->route('admin.roles.index')->with([
              'message' => "Se ha Actualizado el role ". $role->name,
              'level' => 'success'
          ]);
      }

      public function destroy(Role $role)
      {
          $role->delete();

          return back()->with('info', 'Rol eliminado con éxito');
      }
}
