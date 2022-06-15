<?php

use Illuminate\Database\Seeder;

class PreviredSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $this->afps();
        $this->tramos();
        $this->contratos();

    }


    public function afps(){
        $datos = [
            [
                'nombre' => 'Capital',
                'descripcion' => '',
            ],
            [
                'nombre' => 'Cuprum',
                'descripcion' => '',
            ],
            [
                'nombre' => 'Habitat',
                'descripcion' => '',
            ],
            [
                'nombre' => 'PlanVital',
                'descripcion' => '',
            ],
            [
                'nombre' => 'ProVida',
                'descripcion' => '',
            ],
            [
                'nombre' => 'Modelo',
                'descripcion' => '',
            ],
            [
                'nombre' => 'Uno',
                'descripcion' => '',
            ],
        ];

        foreach ($datos as $item){
            DB::insert(
                'insert into afps (nombre, descripcion) values (?, ?)',
                [$item['nombre'], $item['descripcion']]
            );
        }
    }

    public function tramos(){

        $datos = [
            [
                'nombre' => 'A',
                'descripcion' => '',
            ],
            [
                'nombre' => 'B',
                'descripcion' => '',
            ],
            [
                'nombre' => 'C',
                'descripcion' => '',
            ],
            [
                'nombre' => 'D',
                'descripcion' => '',
            ]
        ];

        foreach ($datos as $item){
            DB::insert(
                'insert into tramos (nombre, descripcion) values (?, ?)',
                [$item['nombre'], $item['descripcion']]
            );
        }
    }

    public function contratos(){

        $datos = [
            [
                'nombre' => 'Plazo Indefinido',
                'descripcion' => '',
            ],
            [
                'nombre' => 'Plazo Fijo',
                'descripcion' => '',
            ],
            [
                'nombre' => 'Plazo Indefinido 11 años o más (*)',
                'descripcion' => '',
            ],
            [
                'nombre' => 'Trabajador de Casa Particular (**)',
                'descripcion' => '',
            ]
        ];

        foreach ($datos as $item){
            DB::insert(
                'insert into contratos (nombre, descripcion) values (?, ?)',
                [$item['nombre'], $item['descripcion']]
            );
        }
    }

}
