<?php

class TipoProductosTableSeeder extends Seeder
{

    public function run()
    {
        DB::table('tipo_productos')->delete();

        TipoProducto::create([
            'nombre' => 'Fertilizante',
        ]);

        TipoProducto::create([
            'nombre' => 'Agroquimico',
        ]);

        TipoProducto::create([
            'nombre' => 'Semilla',
        ]);

        TipoProducto::create([
            'nombre' => 'Fumigadora',
        ]);

        TipoProducto::create([
            'nombre' => 'Insumos Varios',
        ]);

    }
}
