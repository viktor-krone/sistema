<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(EmpresaSeeder::class);
        $this->call(PermissionSeeder::class);
        $this->call(RoleSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(ClienteSeeder::class);
        $this->call(CategoriasSeeder::class);
        $this->call(ProductoSeeder::class);
        $this->call(VendedorSeeder::class);
        $this->call(TipoClienteSeeder::class);
        $this->call(TrabajadorSeeder::class);
        $this->call(LiquidacionSeeder::class);
        $this->call(ComunaRegionSeeder::class);
        $this->call(TipoMovimientoSeeder::class);
        $this->call(BodegaSeeder::class);
        $this->call(PreviredSeeder::class);
    }
}
