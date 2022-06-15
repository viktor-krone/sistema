<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDatosLaboralesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cargos', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('empresa_id')->unsigned();
            $table->foreign('empresa_id')->references('id')->on('empresas')->onDelete('cascade');
            $table->string('nombre',50)->unique();
            $table->string('slug',50)->unique();
            $table->string('descripcion')->nullable();
            $table->timestamps();
        });
        Schema::create('tipo_contratos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre',50)->unique();
            $table->string('descripcion')->nullable();
            $table->timestamps();
        });
        Schema::create('estado_laboral', function (Blueprint $table) {
            $table->id();
            $table->string('nombre',50)->unique();
            $table->string('descripcion')->nullable();
            $table->timestamps();
        });
        Schema::create('tipo_gratificacion', function (Blueprint $table) {
            $table->id();
            $table->string('nombre',50)->unique();
            $table->string('descripcion')->nullable();
            $table->timestamps();
        });
        /*Schema::create('seguro_cesantia', function (Blueprint $table) {
            $table->id();
            $table->string('nombre',50)->unique();
            $table->string('descripcion')->nullable();
            $table->timestamps();
        });*/
        Schema::create('tipo_trabajador', function (Blueprint $table) {
            $table->id();
            $table->string('nombre',50)->unique();
            $table->string('descripcion')->nullable();
            $table->timestamps();
        });

        Schema::create('datos_laborales', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('empresa_id')->unsigned();
            $table->foreign('empresa_id')->references('id')->on('empresas')->onDelete('cascade');
            $table->bigInteger('trabajador_id')->unsigned();
            $table->foreign('trabajador_id')
                ->references('id')
                ->on('trabajadores')
                ->onDelete('cascade');

            $table->bigInteger('cargo_id')->unsigned();
            $table->foreign('cargo_id')
                ->references('id')
                ->on('cargos')
                ->onDelete('cascade');

            $table->bigInteger('departamento_id')->unsigned();
            $table->foreign('departamento_id')
                ->references('id')
                ->on('departamentos')
                ->onDelete('cascade');

            $table->bigInteger('tipo_contrato_id')->unsigned();
            $table->foreign('tipo_contrato_id')
                ->references('id')
                ->on('tipo_contratos')
                ->onDelete('cascade');

            $table->bigInteger('estado_laboral_id')->unsigned();
            $table->foreign('estado_laboral_id')
                ->references('id')
                ->on('estado_laboral')
                ->onDelete('cascade');

            $table->bigInteger('sueldo')->unsigned();

            $table->bigInteger('tipo_gratificacion_id')->unsigned();
            $table->foreign('tipo_gratificacion_id')
                ->references('id')
                ->on('tipo_gratificacion')
                ->onDelete('cascade');

            /*$table->bigInteger('seguro_cesantia_id')->unsigned();
            $table->foreign('seguro_cesantia_id')
                ->references('id')
                ->on('seguro_cesantia')
                ->onDelete('cascade');*/

            $table->bigInteger('tipo_trabajador_id')->unsigned();
            $table->foreign('tipo_trabajador_id')
                ->references('id')
                ->on('tipo_trabajador')
                ->onDelete('cascade');

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
        Schema::dropIfExists('datos_laborales');
        Schema::dropIfExists('tipo_trabajador');
        Schema::dropIfExists('seguro_cesantia');
        Schema::dropIfExists('tipo_gratificacion');
        Schema::dropIfExists('estado_laboral');
        Schema::dropIfExists('tipo_contratos');
        Schema::dropIfExists('cargos');//crud

    }
}
