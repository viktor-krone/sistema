<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDescuentosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('descuentos', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('empresa_id')->unsigned();
            $table->foreign('empresa_id')->references('id')->on('empresas')->onDelete('cascade');
            $table->string('nombre',50)->unique();
            $table->string('descripcion')->nullable();
            $table->timestamps();
        });
        Schema::create('detalle_descuentos', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('liquidacion_id')->unsigned();
            $table->foreign('liquidacion_id')
                ->references('id')
                ->on('liquidaciones')
                ->onDelete('cascade');
            $table->bigInteger('descuento_id')->unsigned();
            $table->foreign('descuento_id')
                ->references('id')
                ->on('descuentos')
                ->onDelete('cascade');
            $table->bigInteger('monto')->default(0);

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
        Schema::dropIfExists('detalle_descuentos');
        Schema::dropIfExists('descuentos');
    }
}
