<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePresupuestosTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('presupuestos', function (Blueprint $table) {
            $table->increments('id');

            $table->unsignedInteger('idCliente');
            $table->foreign('idCliente')->references('id')->on('clientes_web')->onDelete('cascade')->onUpdate('cascade');

            $table->date('fechaPedido');
            $table->decimal('total', 7, 2);

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
        Schema::drop('presupuestos');
    }

}
