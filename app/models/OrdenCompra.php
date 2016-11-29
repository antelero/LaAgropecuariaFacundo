<?php

use Illuminate\Database\Eloquent\SoftDeletingTrait;

class OrdenCompra extends Eloquent
{
    use SoftDeletingTrait;

    protected $table = 'ordenes_compra';

    protected $fillable = array('idCliente', 'fechaPedido', 'fechaVencimiento', 'total');

    protected $softDelete = true;

    public function user()
    {
        return $this->belongsTo('User', 'idCliente');
    }

    public function ordenDetalleCompra()
    {
        return $this->hasMany('OrdenCompraDetalle', 'idOrdenCompra');
    }

    public function getEstadoOrdenCompraAttribute()
    {
        if ($this->estado == 1) {
            return 'PAGADA';
        } else {
            return 'IMPAGA';
        }
    }
}
