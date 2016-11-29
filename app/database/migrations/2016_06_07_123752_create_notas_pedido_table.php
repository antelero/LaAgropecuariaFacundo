<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNotasPedidoTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('notas_pedido', function (Blueprint $table) {
            $table->increments('id');

            $table->unsignedInteger('idUsuario');
            $table->foreign('idUsuario')->references('id')->on('clientes_web')->onDelete('cascade')->onUpdate('cascade');

            $table->unsignedInteger('idProveedor');
            $table->foreign('idProveedor')->references('id')->on('proveedores')->onDelete('cascade')->onUpdate('cascade');

            $table->date('fechaPedido');
            $table->date('fechaRecepcion');
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
        Schema::drop('notas_pedido');
	}

}
