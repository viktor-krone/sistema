<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDocumentosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('documentos', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('empresa_id')->unsigned();
            $table->foreign('empresa_id')->references('id')->on('empresas')->onDelete('cascade');
            $table->bigInteger('tipo_id')->unsigned();
            $table->bigInteger('folio')->unsigned();
            $table->bigInteger('cliente_id')->unsigned();
            $table->bigInteger('vendedor_id')->unsigned();
            $table->bigInteger('forma_pago_id')->unsigned();
            $table->bigInteger('estado_id')->unsigned();
            $table->Date('fecha');
            $table->decimal('iva', 10,2);
            $table->decimal('subTotal', 10,2);
            $table->decimal('total', 10,2);
            $table->foreign('cliente_id')->references('id')->on('clientes')->onDelete('cascade');
            $table->foreign('vendedor_id')->references('id')->on('vendedores')->onDelete('cascade');
            //$table->foreign('forma_pago_id')->references('id')->on('formas_pagos')->onDelete('cascade');
            $table->timestamps();
        });

        Schema::create('documento_items', function (Blueprint $table) {
            $table->BigInteger('documento_id')->unsigned();
            $table->BigInteger('product_id')->unsigned();
            $table->decimal('cantidad', 10,2);
            $table->decimal('precio', 10,2);
            $table->decimal('tipo_descuento', 10,2)->default(0);
            $table->decimal('descuento', 10,2)->default(0);
            $table->decimal('valor_descuento', 10,2)->default(0);
            $table->decimal('total', 10,2);
            $table->foreign('documento_id')
                ->references('id')
                ->on('documentos')
                ->onDelete('cascade');
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
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
        Schema::dropIfExists('documento_items');
        Schema::dropIfExists('documentos');

    }
}
