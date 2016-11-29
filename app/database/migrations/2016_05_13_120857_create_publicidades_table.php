<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePublicidadesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('publicidades', function (Blueprint $table) {
            $table->increments('id');

            $table->string('nombre');
            $table->text('detalle');
            $table->enum('ubicacion', array('primer', 'segundo', 'tercer', 'cuarto', 'quinto', 'sexto', 'septimo', 'octavo', 'ningun'))->default('ningun');
            $table->string('email')->unique();
            $table->string('imagen');

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
		Schema::drop('publicidades');
	}

}


