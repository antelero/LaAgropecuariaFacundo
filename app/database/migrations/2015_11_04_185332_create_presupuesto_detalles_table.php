<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePresupuestoDetallesTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('presupuesto_detalles', function (Blueprint $table) {
            $table->increments('id');

            $table->unsignedInteger('idPresupuesto');
            $table->foreign('idPresupuesto')->references('id')->on('presupuestos')->onDelete('cascade')->onUpdate('cascade');

            $table->unsignedInteger('idProducto');
            $table->foreign('idProducto')->references('id')->on('productos')->onDelete('cascade')->onUpdate('cascade');

            $table->integer('cantidad');
            $table->decimal('precio', 7, 2);
            $table->integer('descuento');

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
        Schema::drop('presupuesto_detalles');
    }

}
