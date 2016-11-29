<?php

use Illuminate\Database\Eloquent\SoftDeletingTrait;

class NotaPedidoDetalle extends Eloquent
{
    use SoftDeletingTrait;

    protected $table = 'nota_pedido_detalles';

    protected $fillable = array('idNotaPedido', 'idProducto', 'cantidad');

    protected $softDelete = true;

    public function producto()
    {
        return $this->belongsTo('Producto', 'idProducto');
    }

    public function notaPedido()
    {
        return $this->belongsTo('notaPedido', 'idNotaPedido');
    }
}
