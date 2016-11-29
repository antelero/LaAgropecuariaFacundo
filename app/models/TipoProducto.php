<?php

use Illuminate\Database\Eloquent\SoftDeletingTrait;

class TipoProducto extends Eloquent
{
    use SoftDeletingTrait;

    protected $table = 'tipo_productos';

    protected $fillable = array('nombre');

    protected $softDelete = true;

    public function Producto()
    {
        return $this->hasMany('Producto', 'idTipoProducto');
    }
}
