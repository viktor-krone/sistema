<?php

use Illuminate\Database\Seeder;
use App\Cliente;

class ClienteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $clientes = [
            [
                'rut' => '17128579-8',
                'razon' => 'victor',
                'giro' => 'sin giro',
                'fantasia' => 'sin fantasia',
                'email' => 'victor@softnet.cl',
                'web' => '',
                'telefono' => '929292',
                'estado' => '1',
                'direccion' => 'peralillo',
                'comuna_id' => '1',
                'empresa_id' => '1',
            ],
            [
                'rut' => '22222222-2',
                'razon' => 'demo',
                'giro' => 'demo',
                'fantasia' => 'demo',
                'email' => 'demo@demo.cl',
                'web' => '',
                'telefono' => '929292',
                'estado' => '1',
                'direccion' => 'santiago',
                'comuna_id' => '1',
                'empresa_id' => '1',
            ],
            [
                'rut' => '76017114-k',
                'razon' => 'softnet',
                'giro' => 'desarrollo de software',
                'fantasia' => '',
                'email' => 'softnet@softnet.cl',
                'web' => '',
                'telefono' => '929292',
                'estado' => '1',
                'direccion' => 'santiago',
                'comuna_id' => '1',
                'empresa_id' => '1',
            ],
        ];

        foreach ($clientes as $item){
            $cliente = Cliente::create([
                'empresa_id'  => $item['empresa_id'],
                'rut'   => $item['rut'],
                'razon' => $item['razon'],
                'giro'  => $item['giro'],
                'fantasia'  => $item['fantasia'],
                'email' => $item['email'],
                'web'   => $item['web'],
                'telefono'  => $item['telefono'],
                'estado'    => $item['estado'],
                'direccion' => $item['direccion'],
                'comuna_id' => $item['comuna_id'],
            ]);
        }
    }
}
