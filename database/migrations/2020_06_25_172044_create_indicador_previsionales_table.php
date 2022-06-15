<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIndicadorPrevisionalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('previred', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('periodo')->unsigned();
            $table->bigInteger('mes')->unsigned();
            $table->double('uf',12,2)->default(0);
            $table->double('utm',12,2)->unsigned();
            $table->timestamps();
        });



        Schema::create('renta_tope_imponible', function (Blueprint $table) {
            $table->id();

            $table->bigInteger('previred_id')->unsigned();
            $table->foreign('previred_id')
                ->references('id')
                ->on('previred')
                ->onDelete('cascade');

            $table->bigInteger('afiliados_afp')->unsigned();
            $table->bigInteger('afiliados_ips')->unsigned();
            $table->bigInteger('no_remuneracionales')->unsigned();
            $table->timestamps();
        });
        Schema::create('renta_minima_imponible', function (Blueprint $table) {
            $table->id();

            $table->bigInteger('previred_id')->unsigned();
            $table->foreign('previred_id')
                ->references('id')
                ->on('previred')
                ->onDelete('cascade');

            $table->bigInteger('dependientes_independientes')->unsigned();
            $table->bigInteger('menor18_mayor65')->unsigned();
            $table->bigInteger('casa_particular')->unsigned();
            $table->bigInteger('fines_no_remuneracionales')->unsigned();

            $table->timestamps();

        });
        Schema::create('ahorro_previsional_voluntario', function (Blueprint $table) {
            $table->id();

            $table->bigInteger('previred_id')->unsigned();
            $table->foreign('previred_id')
                ->references('id')
                ->on('previred')
                ->onDelete('cascade');

            $table->bigInteger('tope_mensual')->unsigned();
            $table->bigInteger('tope_anual')->unsigned();

            $table->timestamps();

        });
        Schema::create('deposito_convenido', function (Blueprint $table) {
            $table->id();

            $table->bigInteger('previred_id')->unsigned();
            $table->foreign('previred_id')
                ->references('id')
                ->on('previred')
                ->onDelete('cascade');

            $table->bigInteger('tope_anual')->unsigned();
            $table->timestamps();
        });

        Schema::create('contratos', function (Blueprint $table) {
            $table->id();

            $table->string('nombre',50)->nullable();
            $table->string('descripcion')->nullable();
            $table->timestamps();
        });

        Schema::create('seguro_cesantia', function (Blueprint $table) {
            $table->id();

            $table->bigInteger('previred_id')->unsigned();
            $table->foreign('previred_id')
                ->references('id')
                ->on('previred')
                ->onDelete('cascade');

            $table->bigInteger('contrato_id')->unsigned();
            $table->foreign('contrato_id')
                ->references('id')
                ->on('contratos')
                ->onDelete('cascade');

            $table->double('empleador',12,2)->default(0);
            $table->double('trabajador',12,2)->default(0);


            $table->timestamps();
        });

        Schema::create('afps', function (Blueprint $table) {
            $table->id();

            $table->string('nombre',50)->nullable();
            $table->string('descripcion')->nullable();
            $table->timestamps();
        });

        Schema::create('tasa_afp_trabajadores', function (Blueprint $table) {
            $table->id();

            $table->bigInteger('previred_id')->unsigned();
            $table->foreign('previred_id')
                ->references('id')
                ->on('previred')
                ->onDelete('cascade');

            $table->bigInteger('afp_id')->unsigned();
            $table->foreign('afp_id')
                ->references('id')
                ->on('afps')
                ->onDelete('cascade');

            $table->double('tasa_afp',12,2)->default(0);
            $table->double('sis',12,2)->default(0);
            $table->double('tasa_afp_independientes',12,2)->default(0);
            $table->timestamps();
        });

        Schema::create('tramos', function (Blueprint $table) {
            $table->id();

            $table->string('nombre',50)->nullable();
            $table->string('descripcion')->nullable();
            $table->timestamps();
        });


        Schema::create('asignacion_familiar', function (Blueprint $table) {
            $table->id();

            $table->bigInteger('previred_id')->unsigned();
            $table->foreign('previred_id')
                ->references('id')
                ->on('previred')
                ->onDelete('cascade');

            $table->bigInteger('tramo_id')->unsigned();
            $table->foreign('tramo_id')
                ->references('id')
                ->on('tramos')
                ->onDelete('cascade');

            $table->bigInteger('monto')->unsigned();
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

        Schema::dropIfExists('asignacion_familiar');
        Schema::dropIfExists('tramos');
        Schema::dropIfExists('tasa_afp_trabajadores');
        Schema::dropIfExists('afps');
        Schema::dropIfExists('seguro_cesantia');
        Schema::dropIfExists('contratos');
        Schema::dropIfExists('deposito_convenido');
        Schema::dropIfExists('ahorro_previsional_voluntario');
        Schema::dropIfExists('renta_minima_imponible');
        Schema::dropIfExists('renta_tope_imponible');
        Schema::dropIfExists('previred');


    }
}
