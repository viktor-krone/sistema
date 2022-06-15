<?php

use Illuminate\Database\Seeder;
use App\Trabajador;

class TrabajadorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $items = [
            ['nombre' => 'Soltero'],
            ['nombre' => 'Casado'],
            ['nombre' => 'Divorciado'],
            ['nombre' => 'Separado'],
            ['nombre' => 'Viudo']
        ];

        foreach ($items as $key => $item) {
            DB::insert('insert into estado_civil (nombre) values (?)', [$item['nombre']]);
        }

        $items = [
            ['nombre' => 'Realizado'],
            ['nombre' => 'Eximido'],
            ['nombre' => 'Cumplido'],
            ['nombre' => 'Postergado'],
            ['nombre' => 'Inscrito'],
            ['nombre' => 'Sin Servicio Militar']
        ];

        foreach ($items as $key => $item) {
            DB::insert('insert into estado_militar (nombre) values (?)', [$item['nombre']]);
        }
        $items = [
            ['nombre' => 'Femenino'],
            ['nombre' => 'Masculino'],
        ];

        foreach ($items as $key => $item) {
            DB::insert('insert into sexo (nombre) values (?)', [$item['nombre']]);
        }
        $items = [
            ['nombre' => 'Basico'],
            ['nombre' => 'Medio'],
            ['nombre' => 'Tecnico'],
            ['nombre' => 'Universitario'],
        ];

        foreach ($items as $key => $item) {
            DB::insert('insert into nivel_estudio (nombre) values (?)', [$item['nombre']]);
        }
    }
}
