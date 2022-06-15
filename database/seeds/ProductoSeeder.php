<?php

use Illuminate\Database\Seeder;
use App\Product;

class ProductoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $productos = [
            [
                'nombre' => 'telefono',
                'slug' => 'telefono',
                'cantidad' => '100',
                'precio_actual' => '70000',
                'precio_anterior' => '65000',
                'porcentaje_descuento' => '10',
                'descripcion_corta' => '',
                'descripcion_larga' => '',
                'especificaciones' => '',
                'datos_de_interes' => '',
                'estado' => 'Nuevo',
                'sliderprincipal' => 'No',
                'activo' => 'No',
                'category_id'=> '2',
                'empresa_id' => '1'
            ],
            [
                'nombre' => 'Computador',
                'slug' => 'computador',
                'cantidad' => '30',
                'precio_actual' => '230000',
                'precio_anterior' => '200000',
                'porcentaje_descuento' => '10',
                'descripcion_corta' => '',
                'descripcion_larga' => '',
                'especificaciones' => '',
                'datos_de_interes' => '',
                'estado' => 'Nuevo',
                'sliderprincipal' => 'No',
                'activo' => 'No',
                'category_id'=> '1',
                'empresa_id' => '1'
            ],
            [
                'nombre' => 'Tablet',
                'slug' => 'tablet',
                'cantidad' => '4',
                'precio_actual' => '130000',
                'precio_anterior' => '100000',
                'porcentaje_descuento' => '10',
                'descripcion_corta' => '',
                'descripcion_larga' => '',
                'especificaciones' => '',
                'datos_de_interes' => '',
                'estado' => 'Nuevo',
                'sliderprincipal' => 'No',
                'activo' => 'No',
                'category_id'=> '1',
                'empresa_id' => '1'
            ],
            [
                'nombre' => 'Coca-cola',
                'slug' => 'coca-cola',
                'cantidad' => '400',
                'precio_actual' => '700',
                'precio_anterior' => '600',
                'porcentaje_descuento' => '10',
                'descripcion_corta' => '',
                'descripcion_larga' => '',
                'especificaciones' => '',
                'datos_de_interes' => '',
                'estado' => 'Nuevo',
                'sliderprincipal' => 'No',
                'activo' => 'No',
                'category_id'=> '1',
                'empresa_id' => '1'
            ],
        ];

        foreach ($productos as $item){
            $user = Product::create([
                'nombre' => $item['nombre'],
                'slug' => $item['slug'],
                'cantidad' => $item['cantidad'],
                'precio_actual' => $item['precio_actual'],
                'precio_anterior' => $item['precio_anterior'],
                'porcentaje_descuento' => $item['porcentaje_descuento'],
                'descripcion_corta' => $item['descripcion_corta'],
                'descripcion_larga' => $item['descripcion_larga'],
                'especificaciones' => $item['especificaciones'],
                'datos_de_interes' => $item['datos_de_interes'],
                'estado' => $item['estado'],
                'sliderprincipal' => $item['sliderprincipal'],
                'activo' => $item['activo'],
                'category_id' => $item['category_id'],
                'empresa_id'  => $item['empresa_id'],
            ]);

        }


    }
}
