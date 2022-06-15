<?php

use Illuminate\Database\Seeder;
use App\TipoHaber;
use App\Haber;

class HaberSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->estructura_liquidacion();
    }


    public function estructura_liquidacion(){
        $datos = [
            [
                'codigo' => 'HI1',
                'nombre' => 'Sueldo Mes',
                'descripcion' => '',
                'tipo_haber_id' => '1',
            ],[
                'codigo' => 'HI2',
                'nombre' => 'Sobresueldo1 (Hrs. Extras)',
                'descripcion' => '',
                'tipo_haber_id' => '1',
            ],[
                'codigo' => 'HI3',
                'nombre' => 'Sobresueldo2 (Hrs. Extras)',
                'descripcion' => '',
                'tipo_haber_id' => '1',
            ],[
                'codigo' => 'HI4',
                'nombre' => 'Sobresueldo3 (Hrs. Extras)',
                'descripcion' => '',
                'tipo_haber_id' => '1',
            ],[
                'codigo' => 'HI5',
                'nombre' => 'Comision',
                'descripcion' => '',
                'tipo_haber_id' => '1',
            ],[
                'codigo' => 'HI6',
                'nombre' => 'Bono de Estimulo',
                'descripcion' => '',
                'tipo_haber_id' => '1',
            ],[
                'codigo' => 'HI7',
                'nombre' => 'Bono Produccion',
                'descripcion' => '',
                'tipo_haber_id' => '1',
            ],[
                'codigo' => 'HI8',
                'nombre' => 'Semana Corrida',
                'descripcion' => '',
                'tipo_haber_id' => '1',
            ],[
                'codigo' => 'HI9',
                'nombre' => 'Bonos por Metas',
                'descripcion' => '',
                'tipo_haber_id' => '1',
            ],[
                'codigo' => 'HI10',
                'nombre' => 'Aguinaldo Imponible',
                'descripcion' => '',
                'tipo_haber_id' => '1',
            ],[
                'codigo' => 'HNI1',
                'nombre' => 'Asignacion Familiar',
                'descripcion' => '',
                'tipo_haber_id' => '2',
            ],[
                'codigo' => 'HNI2',
                'nombre' => 'Movilizacion',
                'descripcion' => '',
                'tipo_haber_id' => '2',
            ],[
                'codigo' => 'HNI3',
                'nombre' => 'Colacion',
                'descripcion' => '',
                'tipo_haber_id' => '2',
            ],[
                'codigo' => 'HNI4',
                'nombre' => 'Viaticos',
                'descripcion' => '',
                'tipo_haber_id' => '2',
            ],[
                'codigo' => 'HNI5',
                'nombre' => 'Becas Estudio',
                'descripcion' => '',
                'tipo_haber_id' => '2',
            ],[
                'codigo' => 'HNI6',
                'nombre' => 'Retroactivo Asignacion Familiar',
                'descripcion' => '',
                'tipo_haber_id' => '2',
            ],[
                'codigo' => 'HNI7',
                'nombre' => 'Colacion Obras-Faenas',
                'descripcion' => '',
                'tipo_haber_id' => '2',
            ],[
                'codigo' => 'HNI8',
                'nombre' => 'Aguinaldos no imponibles',
                'descripcion' => '',
                'tipo_haber_id' => '2',
            ],[
                'codigo' => 'HNI9',
                'nombre' => 'indemnizacion Anticipada',
                'descripcion' => '',
                'tipo_haber_id' => '2',
            ],[
                'codigo' => 'HNI10',
                'nombre' => 'Casino',
                'descripcion' => '',
                'tipo_haber_id' => '2',
            ]
        ];

        foreach ($datos as $item){
            Haber::create([
                'codigo'        => $item['codigo'],
                'nombre'        => $item['nombre'],
                'descripcion'   => $item['descripcion'],
                'tipo_haber_id'   => $item['tipo_haber_id'],
            ]);
        }
    }
    public function tipo_haber(){
        $datos = [
            [
                'nombre' => 'Imponible',
                'descripcion' => '',
            ],
            [
                'nombre' => 'No imponible',
                'descripcion' => '',
            ]
        ];

        foreach ($datos as $item){
            TipoHaber::create([
                'rut_empresa'  => '11111111-1',
                'nombre'        => $item['nombre'],
                'descripcion'   => $item['descripcion'],
            ]);
        }
    }
}
