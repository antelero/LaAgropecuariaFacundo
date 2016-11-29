<?php

use Illuminate\Database\Eloquent\SoftDeletingTrait;

class Servicio extends Eloquent
{
    use SoftDeletingTrait;

    protected $table = 'servicios';

    protected $fillable = array('nombre', 'detalle', 'precio', 'imagen', 'estado');

    protected $softDelete = true;

    public function scopeServicio($query, $nombre)
    {
        // if (trim($nombre) != '') {
        return $query->where('nombre', 'LIKE', '%' . $nombre . '%');
        // }
    }

}
