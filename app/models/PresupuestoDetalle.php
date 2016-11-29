<?php

use Illuminate\Database\Eloquent\SoftDeletingTrait;

class PresupuestoDetalle extends Eloquent
{
    use SoftDeletingTrait;

    protected $table = 'presupuesto_detalles';

    protected $fillable = array('idPresupuesto', 'idProducto', 'cantidad', 'precio');

    protected $softDelete = true;

    public function producto()
    {
        return $this->belongsTo('Producto', 'idProducto');
    }

    public function presupuesto()
    {
        return $this->belongsTo('Presupuesto', 'idPresupuesto');
    }
}
