<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateProductosTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('productos', function (Blueprint $table) {
            $table->increments('id');

            $table->string('nombre');
            $table->text('detalle');
            $table->integer('cantidad');
            $table->decimal('precio', 7, 2);
            $table->string('imagen');
            $table->boolean('estado')->default(false);
            $table->boolean('promocion')->default(false);
            $table->integer('porcentajePromocion');

            $table->unsignedInteger('idTipoProducto');
            $table->foreign('idTipoProducto')->references('id')->on('tipo_productos')->onDelete('cascade')->onUpdate('cascade');

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
        Schema::drop('productos');
    }

}
