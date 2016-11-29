<?php

use Illuminate\Database\Eloquent\SoftDeletingTrait;

class Presupuesto extends Eloquent
{
    use SoftDeletingTrait;

    protected $table = 'presupuestos';

    protected $fillable = array('idCliente', 'fechaPedido', 'fechaVencimiento', 'total');

    protected $softDelete = true;

    public function user()
    {
        return $this->belongsTo('User', 'idCliente');
    }

}
