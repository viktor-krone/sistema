<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $this->rolSuperAdmin();

        $this->roles();

    }

    public function rolSuperAdmin(){
        //asignar un super administrador
        $role = Role::create([
            'empresa_id'  => '1',
            'display_name'  => 'Super Administrador',
            'name'          => Str::slug('Super Administrador'),
            'hidden'        => true
        ]);
        $role->syncPermissions(Permission::all());

        $role = Role::create([
            'empresa_id'  => '2',
            'display_name'  => 'Super Administrador',
            'name'          => Str::slug('Super Administrador'),
            'hidden'        => true
        ]);
        $role->syncPermissions(Permission::all());
    }

    public function roles(){
        $roles = [
            [
                'empresa_id'  => '1',
                'display_name' => 'Vendedor',
                'hidden' => true,
                'permissions' => [2,3,4,5,6]
            ],[
                'empresa_id'  => '1',
                'display_name' => 'Administrador',
                'hidden' => false,
                'permissions' => [2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29,30]
            ],[
                'empresa_id'  => '1',
                'display_name' => 'Demo',
                'hidden' => true,
                'permissions' => [2,14,17,20,23]
            ],[
                'empresa_id'  => '2',
                'display_name' => 'Demo',
                'hidden' => false,
                'permissions' => [2,3,4,5,6,7]
            ]
        ];

        foreach ($roles as $item){
            $role = Role::create([
                'empresa_id'  => $item['empresa_id'],
                'display_name'  => $item['display_name'],
                'name'          => Str::slug($item['display_name']),
                'hidden'        => $item['hidden']
            ]);

            $permissions = Permission::whereIn('id',$item['permissions'])->get();
            $role->syncPermissions($permissions);
        }


    }

}
