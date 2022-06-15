<?php

use Illuminate\Database\Seeder;

class TipoMovimientoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $now = \Carbon\Carbon::now();

        $tipos = [
            [
                'nombre' => 'Ingreso',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'nombre' => 'Egreso',
                'created_at' => $now,
                'updated_at' => $now
            ]
        ];

        foreach ($tipos as $key => $item) {
            DB::table('movimiento_tipos')->insert(
                ['nombre' => $item]
            );
        }
    }
}
