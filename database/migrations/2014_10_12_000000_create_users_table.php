<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->string('rut');
            $table->string('name');
            $table->string('apellidoPaterno')->nullable();
            $table->string('apellidoMaterno')->nullable();
            $table->string('email');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('imagen')->nullable();
            $table->string('api_token')->nullable();
            $table->boolean('estado')->nullable();
            $table->boolean('estado_admin')->nullable();
            $table->bigInteger('empresa_id')->unsigned();
            $table->foreign('empresa_id')
                ->references('id')
                ->on('empresas')
                ->onDelete('cascade');
            $table->rememberToken();
            $table->timestamps();
        });



        Schema::create('token', function (Blueprint $table) {
            $table->id();

            $table->string('token');
            $table->string('fcreacion');
            $table->string('ftermino')->nullable();

            $table->bigInteger('usuario_id')->unsigned();
            $table->foreign('usuario_id')
            ->references('id')
            ->on('empresas')
            ->onDelete('cascade');

            $table->bigInteger('empresa_id')->unsigned();
            $table->foreign('empresa_id')
                ->references('id')
                ->on('empresas')
                ->onDelete('cascade');

            $table->timestamps();
        });


        Schema::create('log_servicio_rest', function (Blueprint $table) {
            $table->id();

            $table->bigInteger('empresa_id')->unsigned();
            $table->foreign('empresa_id')
            ->references('id')
            ->on('empresas')
            ->onDelete('cascade');

            $table->bigInteger('usuario_id')->unsigned();
            $table->foreign('usuario_id')
            ->references('id')
            ->on('empresas')
            ->onDelete('cascade');

            $table->bigInteger('ambiente');
            $table->ipAddress('ip_cliente');
            $table->string('proceso');
            $table->string('metodo');
            $table->longText('entrada')->nullable();
            $table->longText('salida')->nullable();


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
        Schema::dropIfExists('log_servicio_rest');
        Schema::dropIfExists('token');
        Schema::dropIfExists('users');
    }
}
