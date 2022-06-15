<?php

use Illuminate\Database\Seeder;
//use DB;

class TipoMovimientoSeeder extends Seeder
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
                'nombre' => 'Ingreso'
            ],
            [
                'nombre' => 'Egreso'
            ]
        ];

        foreach ($tipos as $key => $item) {
            DB::table('movimiento_tipos')->insert(
                ['nombre' => $item]
            );
        }

    }
}
