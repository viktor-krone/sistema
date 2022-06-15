<?php

use Illuminate\Database\Seeder;
use App\Sucursal;

class SucursalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $items = [
            [
                'empresa_id' => 1,
                'bodega_id' => 1,
                'nombre' => 'Santiago',
                'slug' => 'santiago',
                'descripcion' => 'primera bodega ubicada en santiago',
            ],
            [
                'empresa_id' => 1,
                'bodega_id' => 2,
                'nombre' => 'Talca',
                'slug' => 'talca',
                'descripcion' => 'segunda bodega ubicada en talca',
            ],
            [
                'empresa_id' => 2,
                'bodega_id' => 1,
                'nombre' => 'Arica',
                'slug' => 'arica',
                'descripcion' => 'tercera bodega ubicada en arica',
            ],
            [
                'empresa_id' => 2,
                'bodega_id' => 2,
                'nombre' => 'Arica',
                'slug' => 'arica',
                'descripcion' => 'tercera bodega ubicada en arica',
            ],
        ];

        foreach ($items as $item){
            Sucursal::create([
                'empresa_id'  => $item['empresa_id'],
                'bodega_id'  => $item['bodega_id'],
                'nombre' => $item['nombre'],
                'slug' => $item['slug'],
                'descripcion' => $item['descripcion'],

            ]);

        }
    }
}
