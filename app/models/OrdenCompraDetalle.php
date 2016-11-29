<?php

use Illuminate\Database\Eloquent\SoftDeletingTrait;

class OrdenCompraDetalle extends Eloquent
{
    use SoftDeletingTrait;

    protected $table = 'orden_compra_detalles';

    protected $fillable = array('idOrdenCompra', 'idProducto', 'cantidad', 'precio');

    protected $softDelete = true;

    public function producto()
    {
        return $this->belongsTo('Producto', 'idProducto');
    }

    public function ordenCompra()
    {
        return $this->belongsTo('OrdenCompra', 'idOrdenCompra');
    }
}
