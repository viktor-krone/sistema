<?php

use Illuminate\Database\Seeder;
use App\Category;

class CategoriasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categorias = [
            [
                'nombre' => 'categoria1',
                'slug' => 'categoria1',
                'descripcion' => 'primera categoria',
            ],
            [
                'nombre' => 'categoria2',
                'slug' => 'categoria2',
                'descripcion' => 'segunda categoria',
            ],
            [
                'nombre' => 'categoria3',
                'slug' => 'categoria3',
                'descripcion' => 'tercera categoria',
            ],
        ];


        foreach ($categorias as $item){
            $categoria = Category::create([
                'empresa_id'  => '1',
                'nombre' => $item['nombre'],
                'slug' => $item['slug'],
                'descripcion' => $item['descripcion'],

            ]);

        }
    }
}
