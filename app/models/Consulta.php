<?php

use Illuminate\Database\Eloquent\SoftDeletingTrait;

class Consulta extends Eloquent
{
    use SoftDeletingTrait;

    protected $table = 'consultas';

    protected $fillable = array('idCliente', 'fecha', 'detalle', 'respuesta', 'estado');

    protected $softDelete = true;

     public function user()
    {
        return $this->belongsTo('User', 'idCliente');
    }

    public function getEstadoConsultaAttribute()
    {
        if ($this->estado == 1) {
            return 'CONTESTADO';
        } else {
            return 'PENDIENTE';
        }
    }


}
