<?php

use Illuminate\Database\Eloquent\SoftDeletingTrait;

class NotaPedido extends Eloquent
{
    use SoftDeletingTrait;

    protected $table = 'notas_pedido';

    protected $fillable = array('idUsuario', 'idProveedor', 'fechaPedido', 'fechaRecepcion', 'estado');

    protected $softDelete = true;

    public function user()
    {
        return $this->belongsTo('User', 'idUsuario');
    }

    public function proveedor()
    {
        return $this->belongsTo('Proveedor', 'idProveedor');
    }

    public function notaDetallePedido()
    {
        return $this->hasMany('NotaPedidoDetalle', 'idNotaPedido');
    }

    public function getEstadoNotaPedidoAttribute()
    {
        if ($this->estado == 1) {
            return 'ENTREGADA';
        } else {
            return 'PENDIENTE';
        }
    }
}
