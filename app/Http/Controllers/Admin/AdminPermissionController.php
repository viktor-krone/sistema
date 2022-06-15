<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Http\Requests\PermissionRequest;


class AdminPermissionController extends Controller
{

    public function index(Request $request)
    {
        $permissions = Permission::query();

        if ($request->has('search')) {
            $search = $request->get('search');
            $permissions->where(function ($q) use ($search) {
                $q->orWhere('empresa_id', 'like', auth()->user()->empresa_id);
                $q->orWhere('name', 'like', "%$search%");
            });
        }

        return view('admin.permissions.index', [
            'items' => $permissions->paginate(),
            'page' => $request->query('page')
        ]);
    }

    public function create(Request $request) {

      $page = $request->query('page');
      $roles = Role::orderBy('name', 'asc')
          ->where('empresa_id', auth()->user()->empresa_id)
          ->pluck('name', 'id');

      return view('admin.permissions.create', [
          'roles'         => $roles,
          'role_id'       => $request->old('role_id'),
          'page'          => $request->query('page'),
          'cancel_link'   => route('admin.permissions.index', ['page' => $page])
      ]);

    }

    public function store(Request $request) {

      \DB::beginTransaction();

        $permission = Permission::create([
          'display_name' => $request->get('display_name'),
          'name' => $request->get('name'),
          'description' => $request->get('description'),
        ]);

      \DB::commit();

      return redirect()->route('admin.permissions.index')->with([
          'message' => "Se creado el permiso ". $permission->guard_name,
          'level' => 'success'
      ]);

    }

    public function edit(Request $request, $id)
    {
        $page = $request->query('page');

        $editar = 'Si';
        $permission = Permission::findOrFail($id);


        return view('admin.permissions.edit', [
            'model'         => $permission,
            'editar'        => $editar,
            'page'          => $request->query('page'),
            'cancel_link'   => route('admin.permissions.index', ['page' => $page])
        ]);
    }

    public function update(Request $request, $id) {


        \DB::beginTransaction();

          $permission = Permission::findOrFail($id);

          $permission->update([
            'display_name' => $request->get('display_name'),
            'name' => $request->get('name'),
            'description' => $request->get('description'),
          ]);

        \DB::commit();

        return redirect()->route('admin.permissions.index')->with([
            'message' => "Se ha Actualizado el permiso ". $permission->name,
            'level' => 'success'
        ]);

    }
}
