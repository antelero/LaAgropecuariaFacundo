<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateClientesWebTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clientes_web', function (Blueprint $table) {
            $table->increments('id');

            $table->string('email')->unique();
            $table->string('password');
            $table->string('passwordTemporal');
            $table->string('codigoActivacion');
            $table->boolean('estado')->default(false);
            $table->boolean('empleado')->default(false);
            $table->enum('tipo', [ 'admin', 'usuario', 'cliente' ])->default('cliente');

            $table->string('nombre');
            $table->string('apellido');
            $table->string('dni');
            $table->date('fechaNacimiento');
            $table->string('direccion');

            $table->unsignedInteger('idProvincia');
            $table->foreign('idProvincia')->references('id')->on('provincias')->onDelete('cascade')->onUpdate('cascade');

            $table->string('localidad');
            $table->string('telefono');
            $table->string('avatar');

            $table->rememberToken();
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
        Schema::drop('clientes_web');
    }

}
