<?php

use Illuminate\Database\Seeder;
use App\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $usuarios = [
            [
                'rut' => '17128579-8',
                'name' => 'victor',
                'apellidoPaterno' => 'ormazabal',
                'apellidoMaterno' => 'devia',
                'email' => 'victor@softnet.cl',
                'password' => bcrypt('12344321'),
                'estado' => '1',
                'estado_admin' => '1',
                'role' => 'super-administrador',
                'empresa_id' => 1
            ],
            [
                'rut' => '17128579-8',
                'name' => 'victor',
                'apellidoPaterno' => 'ormazabal',
                'apellidoMaterno' => 'devia',
                'email' => 'victor@softnet.cl',
                'password' => bcrypt('12344321'),
                'estado' => '1',
                'estado_admin' => '0',
                'role' => 'super-administrador',
                'empresa_id' => 2
            ],
            [
                'rut' => '17128579-8',
                'name' => 'Demo',
                'apellidoPaterno' => 'demo',
                'apellidoMaterno' => 'demo',
                'email' => 'demo@demo.cl',
                'password' => bcrypt('demodemo'),
                'estado' => '1',
                'estado_admin' => '0',
                'role' => 'administrador',
                'empresa_id' => 2
            ],
            [
                'rut' => '1111-1',
                'name' => 'Pedro',
                'apellidoPaterno' => 'Perez',
                'apellidoMaterno' => 'Pereira',
                'email' => 'pepe@pepe.cl',
                'password' => bcrypt('12344321'),
                'estado' => '1',
                'estado_admin' => '0',
                'role' => 'super-administrador',
                'empresa_id' => 1
            ],
            [
                'rut' => '2222-2',
                'name' => 'Pablo',
                'apellidoPaterno' => 'Picazo',
                'apellidoMaterno' => 'Picazo',
                'email' => 'pablo@pablo.cl',
                'password' => bcrypt('pablopablo'),
                'estado' => '1',
                'estado_admin' => '0',
                'role' => 'super-administrador',
                'empresa_id' => 2
            ],
        ];

        foreach ($usuarios as $item){
            $user = User::create([
                'rut'  => $item['rut'],
                'name'  => $item['name'],
                'apellidoPaterno' => $item['apellidoPaterno'],
                'apellidoMaterno' => $item['apellidoMaterno'],
                'email' => $item['email'],
                'password' => $item['password'],
                'api_token' => Str::random(30),
                'estado' => $item['estado'],
                'estado_admin' => $item['estado_admin'],
                'empresa_id' => $item['empresa_id']
            ]);

            $user->assignRole($item['role']);
        }




        $token['token'] = '12344321';
        $token['fcreaion'] = '2020-01-01';
        $token['ftermino'] = '2021-12-12';
        $token['usuario_id'] = '1';
        $token['empresa_id'] = '1';

        DB::insert('insert into token (token,fcreacion,ftermino,usuario_id,empresa_id) values (?,?,?,?,?)', [$token['token'],$token['fcreaion'],$token['ftermino'],$token['usuario_id'],$token['empresa_id']]);


    }
}
