<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLiquidacionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('liquidaciones', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('empresa_id')->unsigned();
            $table->foreign('empresa_id')->references('id')->on('empresas')->onDelete('cascade');
            $table->bigInteger('trabajador_id')->unsigned();
            $table->foreign('trabajador_id')
                ->references('id')
                ->on('trabajadores')
                ->onDelete('cascade');

            $table->date('fecha');
            $table->bigInteger('sueldo_bruto')->default(0);
            $table->bigInteger('total_haber_imponible')->default(0);
            $table->bigInteger('total_haber_no_imponible')->default(0);
            $table->bigInteger('total_haber')->default(0);
            $table->bigInteger('total_renta_imponible')->default(0);
            $table->String('liquido_palabras')->nullable();
            $table->bigInteger('dias_trabajados')->default(0);
            $table->bigInteger('inasistencia')->default(0);
            $table->bigInteger('horas_extras')->default(0);
            $table->Integer('estado');

            $table->timestamps();
        });


        Schema::create('detalle_haberes', function (Blueprint $table) {
            $table->id();
            $table->string('empresa_id');
            $table->bigInteger('liquidacion_id')->unsigned();
            $table->foreign('liquidacion_id')
                ->references('id')
                ->on('liquidaciones')
                ->onDelete('cascade');

            $table->bigInteger('haber_id')->unsigned();
            $table->foreign('haber_id')
                ->references('id')
                ->on('haberes')
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
        Schema::dropIfExists('detalle_haberes');
        Schema::dropIfExists('liquidaciones');
    }
}
