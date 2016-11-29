<?php

class AdministradorTableSeeder extends Seeder
{

    public function run()
    {
        DB::table('clientes_web')->delete();

        User::create([
            'idProvincia'      => 9,
            'email'            => 'rodri_6369_DJN@yahoo.com.ar',
            'password'         => Hash::make('123456'),
            'passwordTemporal' => '',
            'codigoActivacion' => '',
            'estado'           => 1,
            'nombre'           => 'Facundo',
            'apellido'         => 'Jerez',
            'dni'              => '35932479',
            'fechaNacimiento'  => '1992-05-19',
            'direccion'        => 'Los Perales - El Suncho Este 51',
            'localidad'        => 'S.S. de Jujuy',
            'telefono'         => '',
            'avatar'           => '',
        ]);
    }
}
