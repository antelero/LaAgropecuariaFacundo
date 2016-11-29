<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateOrdenesCompraTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ordenes_compra', function (Blueprint $table) {
            $table->increments('id');

            $table->unsignedInteger('idCliente');
            $table->foreign('idCliente')->references('id')->on('clientes_web')->onDelete('cascade')->onUpdate('cascade');

            $table->date('fechaPedido');
            $table->decimal('total', 7, 2);
            $table->boolean('estado')->default(false);

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('ordenes_compra');
    }

}
