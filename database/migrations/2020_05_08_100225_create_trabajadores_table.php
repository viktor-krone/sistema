<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTrabajadoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('estado_civil', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->timestamps();
        });
        Schema::create('estado_militar', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->timestamps();
        });
        Schema::create('sexo', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->timestamps();
        });
        Schema::create('nivel_estudio', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->timestamps();
        });

        Schema::create('trabajadores', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('empresa_id')->unsigned();
            $table->foreign('empresa_id')->references('id')->on('empresas')->onDelete('cascade');
            $table->string('rut');
            $table->string('nombre');
            $table->string('segundo_nombre')->nullable();
            $table->string('apellido_paterno')->nullable();
            $table->string('apellido_materno')->nullable();
            $table->bigInteger('telefono')->nullable();
            $table->string('foto')->nullable();
            $table->date('fecha_nacimiento')->nullable();
            $table->date('inicio')->nullable();
            $table->date('termino')->nullable();
            $table->bigInteger('sueldo');

            $table->unsignedBigInteger('estado_civil_id')->nullable();
            $table->foreign('estado_civil_id')
                ->references('id')
                ->on('estado_civil')
                ->onDelete('cascade');
            $table->unsignedBigInteger('estado_militar_id')->nullable();
            $table->foreign('estado_militar_id')
                ->references('id')
                ->on('estado_militar')
                ->onDelete('cascade');
            $table->unsignedBigInteger('sexo_id')->nullable();
            $table->foreign('sexo_id')
                ->references('id')
                ->on('sexo')
                ->onDelete('cascade');
            $table->unsignedBigInteger('nivel_estudio_id')->nullable();
            $table->foreign('nivel_estudio_id')
                ->references('id')
                ->on('nivel_estudio')
                ->onDelete('cascade');

            $table->string('direccion');
            $table->bigInteger('comuna_id');
            $table->string('email')->unique();
            $table->smallInteger('estado')->default('0');

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
        Schema::dropIfExists('trabajadores');
        Schema::dropIfExists('estado_civil');
        Schema::dropIfExists('estado_militar');
        Schema::dropIfExists('sexo');
        Schema::dropIfExists('nivel_estudio');
    }
}
