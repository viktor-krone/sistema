<?php

use Illuminate\Database\Seeder;
use App\TipoCliente;

class TipoClienteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tipos = [
            [
                'nombre' => 'cliente'
            ],
            [
                'nombre' => 'proveedor'
            ],
            [
                'nombre' => 'extranjero'
            ],
        ];

        foreach ($tipos as $key => $item) {
            $tipos = TipoCliente::create([
                'nombre'  => $item['nombre']
            ]);
        }

    }
}
