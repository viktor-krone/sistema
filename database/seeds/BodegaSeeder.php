<?php

use Illuminate\Database\Seeder;
use App\Bodega;

class BodegaSeeder extends Seeder
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
                'nombre' => 'Santiago',
                'slug' => 'santiago',
                'descripcion' => 'primera bodega ubicada en santiago',
            ],
            [
                'nombre' => 'Talca',
                'slug' => 'talca',
                'descripcion' => 'segunda bodega ubicada en talca',
            ],
            [
                'nombre' => 'Arica',
                'slug' => 'arica',
                'descripcion' => 'tercera bodega ubicada en arica',
            ],
        ];

        foreach ($items as $item){
            Bodega::create([
                'empresa_id'  => '1',
                'nombre' => $item['nombre'],
                'slug' => $item['slug'],
                'descripcion' => $item['descripcion'],

            ]);

        }
    }
}
