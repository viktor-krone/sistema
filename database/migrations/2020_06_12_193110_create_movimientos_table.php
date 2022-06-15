<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMovimientosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('movimientos', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('empresa_id')->unsigned();
            $table->foreign('empresa_id')
                ->references('id')
                ->on('empresas')
                ->onDelete('cascade');
            $table->bigInteger('sucursal_id')->unsigned();
            $table->foreign('sucursal_id')
                ->references('id')
                ->on('sucursales')
                ->onDelete('cascade');
            $table->bigInteger('movimiento_tipo_id')->unsigned();
            $table->foreign('movimiento_tipo_id')
                ->references('id')
                ->on('movimiento_tipos')
                ->onDelete('cascade');

            $table->dateTime('fecha', 0);
            $table->bigInteger('folio');

            $table->bigInteger('usuario_id')->unsigned();
            $table->foreign('usuario_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');

            $table->timestamps();
        });
        Schema::create('movimiento_items', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('movimiento_id')
                ->unsigned();
            $table->foreign('movimiento_id')
                ->references('id')
                ->on('movimientos')
                ->onDelete('cascade');
            $table->bigInteger('producto_id')->unsigned();
            $table->foreign('producto_id')
                ->references('id')
                ->on('products')
                ->onDelete('cascade');
            $table->bigInteger('cantidad')->unsigned();
            $table->bigInteger('precio')->unsigned();
            $table->bigInteger('costo')->default(0);

            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('movimiento_items');
        Schema::dropIfExists('movimientos');
    }
}
