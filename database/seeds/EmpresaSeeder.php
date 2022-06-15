<?php

use Illuminate\Database\Seeder;
use App\Empresa;

class EmpresaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        $empresas = [
            [
                'rut_empresa' => '17128579-8',
                'razon' => 'Cronsoft',
                'fantasia' => 'Cronsoft',
                'telefono' => '89682819',
                'fax' => '-',
                'email' => 'victor.ormazabal3@gmail.com',
                'web' => 'www.cronsoft.cl',
                'direccion' => 'santiago',
                'estado' => '1',
            ],
            [
                'rut_empresa' => '99999999-9',
                'razon' => 'Demo',
                'fantasia' => 'Demo',
                'telefono' => '222222',
                'fax' => '-',
                'email' => 'demo@demo.cl',
                'web' => '',
                'direccion' => 'santiago',
                'estado' => '1',
            ],
        ];

        foreach ($empresas as $item){
            $empresa = Empresa::create([
                'rut_empresa'  => $item['rut_empresa'],
                'razon' => $item['razon'],
                'fantasia' => $item['fantasia'],
                'telefono' => $item['telefono'],
                'fax' => $item['fax'],
                'email' => $item['email'],
                'web' => $item['web'],
                'direccion' => $item['direccion'],
                'estado' => $item['estado'],
            ]);

        }

    }
}
