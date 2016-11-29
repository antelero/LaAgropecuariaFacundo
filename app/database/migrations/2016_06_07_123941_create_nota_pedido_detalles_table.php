<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNotaPedidoDetallesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	 public function up()
    {
        Schema::create('nota_pedido_detalles', function (Blueprint $table) {
            $table->increments('id');

            $table->unsignedInteger('idNotaPedido');
            $table->foreign('idNotaPedido')->references('id')->on('notas_pedido')->onDelete('cascade')->onUpdate('cascade');

            $table->unsignedInteger('idProducto');
            $table->foreign('idProducto')->references('id')->on('productos')->onDelete('cascade')->onUpdate('cascade');

            $table->integer('cantidad');

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
        Schema::drop('nota_pedido_detalles');
    }
}
