<?php

use Illuminate\Database\Seeder;
use App\Vendedor;

class VendedorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $vendedores = [
            [
                'empresa_id' => '1',
                'rut' => '17128579-8',
                'nombre' => 'Victor Ormazabal',
                'comision' => '10',
                'estado' => '1',
            ],
            [
                'empresa_id' => '1',
                'rut' => '22222222-2',
                'nombre' => 'Demo',
                'comision' => '15',
                'estado' => '1',
            ]
        ];

        foreach ($vendedores as $item){
            $vendedor = Vendedor::create([
                'empresa_id'  => $item['empresa_id'],
                'rut'  => $item['rut'],
                'nombre' => $item['nombre'],
                'comision' => $item['comision'],
                'estado' => $item['estado'],

            ]);

        }
    }
}
