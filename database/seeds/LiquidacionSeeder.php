<?php

use Illuminate\Database\Seeder;
use App\Liquidacion;
use App\Cargo;
use App\Departamento;

class LiquidacionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->cargos();
        $this->tipo_contratos();
        $this->estado_laboral();
        $this->tipo_gratificacion();
        $this->departamentos();
        //$this->seguro_cesantia();
        $this->tipo_trabajador();
    }




    public function cargos(){
        $permisos = [
            [
                'empresa_id' => '1',
                'nombre' => 'Administracion',
                'descripcion' => 'Administracion',
            ],
            [
                'empresa_id' => '1',
                'nombre' => 'Desarrollo',
                'descripcion' => 'Desarrollo',
            ],
            [
                'empresa_id' => '1',
                'nombre' => 'Ventas',
                'descripcion' => 'Ventas',
            ],
        ];

        foreach ($permisos as $item){
            Cargo::create([
                'empresa_id'  => $item['empresa_id'],
                'nombre'        => $item['nombre'],
                'slug'          => Str::slug($item['nombre']),
                'descripcion'   => $item['descripcion'],
            ]);
        }
    }
    public function departamentos(){
        $departamentos = [
            [
                'empresa_id' => '1',
                'nombre' => 'Ejecutivo de ventas',
                'descripcion' => '',
            ],
            [
                'empresa_id' => '1',
                'nombre' => 'Diseñador Grafico',
                'descripcion' => '',
            ],
            [
                'empresa_id' => '1',
                'nombre' => 'Gerente comercial',
                'descripcion' => '',
            ],
        ];

        foreach ($departamentos as $item){
            Departamento::create([
                'empresa_id'  => $item['empresa_id'],
                'nombre'        => $item['nombre'],
                'slug'          => Str::slug($item['nombre']),
                'descripcion'   => $item['descripcion'],
            ]);
        }
    }
    public function tipo_contratos(){
        $tipo_contratos = [
            [
                'nombre' => 'Indefinido',
                'descripcion' => 'Indefinido',
            ],
            [
                'nombre' => 'Plazo fijo',
                'descripcion' => 'Plazo fijo',
            ]
        ];

        foreach ($tipo_contratos as $item){
            DB::insert(
                'insert into tipo_contratos (nombre, descripcion) values (?, ?)',
                [$item['nombre'], $item['descripcion']]
            );
        }
    }
    public function seguro_cesantia(){
        $datos = [
            [
                'nombre' => 'Si',
                'descripcion' => '',
            ],
            [
                'nombre' => 'No',
                'descripcion' => '',
            ]
        ];

        foreach ($datos as $item){
            DB::insert(
                'insert into seguro_cesantia (nombre, descripcion) values (?, ?)',
                [$item['nombre'], $item['descripcion']]
            );
        }
    }
    public function tipo_trabajador(){
        $datos = [
            [
                'nombre' => 'Activo No pensionado',
                'descripcion' => '',
            ],
            [
                'nombre' => 'Pensionado y cotiza',
                'descripcion' => '',
            ],
            [
                'nombre' => 'Pensionado y No cotiza',
                'descripcion' => '',
            ],
            [
                'nombre' => 'Activo > 65 años',
                'descripcion' => '',
            ]
        ];

        foreach ($datos as $item){
            DB::insert(
                'insert into tipo_trabajador (nombre, descripcion) values (?, ?)',
                [$item['nombre'], $item['descripcion']]
            );
        }
    }
    public function estado_laboral(){
        $estado_laborales = [
            [
                'nombre' => 'Indefinido',
                'descripcion' => 'Indefinido',
            ],
            [
                'nombre' => 'Plazo fijo',
                'descripcion' => 'Plazo fijo',
            ]
        ];

        foreach ($estado_laborales as $item){
            DB::insert(
                'insert into estado_laboral (nombre, descripcion) values (?, ?)',
                [$item['nombre'], $item['descripcion']]
            );
        }
    }
    public function tipo_gratificacion(){
        $tipo_gratificaciones = [
            [
                'nombre' => '25 % mensual con tope',
                'descripcion' => '',
            ],
            [
                'nombre' => '25 % mensual sin tope',
                'descripcion' => '',
            ],
            [
                'nombre' => 'Anual',
                'descripcion' => '',
            ],
            [
                'nombre' => 'Con tope T/evento',
                'descripcion' => '',
            ],
            [
                'nombre' => 'Sin (No aplica)',
                'descripcion' => '',
            ]
        ];

        foreach ($tipo_gratificaciones as $item){
            DB::insert(
                'insert into tipo_gratificacion (nombre, descripcion) values (?, ?)',
                [$item['nombre'], $item['descripcion']]
            );
        }
    }
}
