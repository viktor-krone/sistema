<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clientes', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('empresa_id')->unsigned();
            $table->foreign('empresa_id')->references('id')->on('empresas')->onDelete('cascade');
            $table->string('rut');
            $table->string('razon', 80);
            $table->string('giro', 80);
            $table->string('fantasia', 80)->nullable();
            $table->string('email');
            $table->string('web')->nullable();
            $table->integer('telefono')->nullable();
            $table->boolean('estado')->default(0);
            $table->string('direccion',80);
            $table->bigInteger('comuna_id');

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
        Schema::dropIfExists('clientes');
    }
}
