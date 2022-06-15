<?php

use Illuminate\Database\Seeder;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->permisos();

    }


    public function permisos(){
        $permisos = [
          ['display_name' => 'Ver Sección Control de Acceso'],
          ['display_name' => 'Listar logs'],

          //clientes
          ['display_name' => 'Ver clientes'],
          ['display_name' => 'Listar clientes'],
          ['display_name' => 'Crear clientes'],
          ['display_name' => 'Editar clientes'],
          ['display_name' => 'Eliminar clientes'],
          ['display_name' => 'Exportar clientes'],

          //proveedores
          ['display_name' => 'Ver proveedores'],
          ['display_name' => 'Listar proveedores'],
          ['display_name' => 'Crear proveedores'],
          ['display_name' => 'Editar proveedores'],
          ['display_name' => 'Eliminar proveedores'],

          //productos
          ['display_name' => 'Ver Productos'],
          ['display_name' => 'Listar Productos'],
          ['display_name' => 'Crear Productos'],
          ['display_name' => 'Editar Productos'],
          ['display_name' => 'Eliminar Productos'],

          //skus
          ['display_name' => 'Ver Skus'],
          ['display_name' => 'Listar Skus'],
          ['display_name' => 'Crear Skus'],
          ['display_name' => 'Editar Skus'],
          ['display_name' => 'Eliminar Skus'],

          //categorias
          ['display_name' => 'Ver Categorias'],
          ['display_name' => 'Listar Categorias'],
          ['display_name' => 'Crear Categorias'],
          ['display_name' => 'Editar Categorias'],
          ['display_name' => 'Eliminar Categorias'],

          //vendedores
          ['display_name' => 'Crear Vendedores'],
          ['display_name' => 'Listar Vendedores'],
          ['display_name' => 'Editar Vendedores'],
          ['display_name' => 'Eliminar Vendedores'],


          ['display_name' => 'Ver Usuarios'],
          ['display_name' => 'Listar Usuarios'],
          ['display_name' => 'Crear Usuarios'],
          ['display_name' => 'Editar Usuarios'],
          ['display_name' => 'Eliminar Usuarios'],
          ['display_name' => 'Exportar Usuarios'],

          ['display_name' => 'Listar Roles'],
          ['display_name' => 'Crear Roles'],
          ['display_name' => 'Editar Roles'],
          ['display_name' => 'Eliminar Roles'],

          ['display_name' => 'Listar Permisos'],
          ['display_name' => 'Crear Permisos'],
          ['display_name' => 'Editar Permisos'],
          ['display_name' => 'Eliminar Permisos'],

          //categorias
          ['display_name' => 'Ver Empresas'],
          ['display_name' => 'Listar Empresas'],
          ['display_name' => 'Crear Empresas'],
          ['display_name' => 'Editar Empresas'],
          ['display_name' => 'Eliminar Empresas'],

          //cotizacion
          ['display_name' => 'Ver Cotizacion'],
          ['display_name' => 'Listar Cotizaciones'],
          ['display_name' => 'Crear Cotizacion'],
          ['display_name' => 'Editar Cotizacion'],
          ['display_name' => 'Eliminar Cotizacion'],
          //nota de venta
          ['display_name' => 'Ver Nota Venta'],
          ['display_name' => 'Listar Nota Ventas'],
          ['display_name' => 'Crear Nota Venta'],
          ['display_name' => 'Editar Nota Venta'],
          ['display_name' => 'Eliminar Nota Venta'],








          //lineas
          ['display_name' => 'Listar Lineas'],                  //26
          ['display_name' => 'Crear Lineas'],                   //27
          ['display_name' => 'Editar Lineas'],                  //28

          //bodegas
          ['display_name' => 'Listar Bodegas'],               //
          ['display_name' => 'Crear Bodegas'],                //
          ['display_name' => 'Editar Bodegas'],               //
          //sucursales
          ['display_name' => 'Listar Sucursales'],               //
          ['display_name' => 'Crear Sucursales'],                //
          ['display_name' => 'Editar Sucursales'],               //

          ['display_name' => 'Gestion Comercial'],                //
          ['display_name' => 'Tesoreria'],                //
          ['display_name' => 'Inventario'],                //
          ['display_name' => 'Remuneraciones'],                //
          ['display_name' => 'Administracion'],                //

        ];

        foreach ($permisos as $item){
            Permission::create([
                'display_name'  => $item['display_name'],
                'name'          => Str::slug($item['display_name'])
            ]);
        }


    }
}
