<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateConsultasTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('consultas', function (Blueprint $table) {
            $table->increments('id');

            $table->date('fechaConsulta');
            $table->date('fechaRespuesta');
            $table->string('asunto');
            $table->text('detalle');
            $table->text('respuesta');
            $table->boolean('estado')->default(false);

            $table->unsignedInteger('idCliente');
            $table->foreign('idCliente')->references('id')->on('clientes_web')->onDelete('cascade')->onUpdate('cascade');

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
        Schema::drop('consultas');
    }

}
