<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHaberesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('haberes', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('empresa_id')->unsigned();
            $table->foreign('empresa_id')->references('id')->on('empresas')->onDelete('cascade');
            $table->string('codigo',50)->unique();
            $table->string('nombre',50);
            $table->string('descripcion',50);

            $table->bigInteger('tipo_haber_id')->unsigned();
            $table->foreign('tipo_haber_id')
                ->references('id')
                ->on('tipo_haberes')
                ->onDelete('cascade');

            $table->timestamps();
        });

        Schema::create('asignar_haberes', function (Blueprint $table) {
            $table->id();
            $table->date('fecha');
            $table->bigInteger('monto')->unsigned()->default(0);
            $table->string('observacion');

            $table->bigInteger('trabajador_id')->unsigned();
            $table->foreign('trabajador_id')
                ->references('id')
                ->on('trabajadores')
                ->onDelete('cascade');

            $table->bigInteger('haber_id')->unsigned();
            $table->foreign('haber_id')
                ->references('id')
                ->on('haberes')
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
        Schema::dropIfExists('asignar_haberes');
        Schema::dropIfExists('haberes');
    }
}
