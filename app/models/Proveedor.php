<?php

use Illuminate\Database\Eloquent\SoftDeletingTrait;

class Proveedor extends Eloquent
{
    use SoftDeletingTrait;

    protected $table = 'proveedores';

    protected $fillable = array('nombre', 'detalle', 'email', 'direccion', 'telefono', 'imagen', 'estado');

    protected $softDelete = true;


}
