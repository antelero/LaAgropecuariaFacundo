<?php

use Illuminate\Database\Eloquent\SoftDeletingTrait;

class Producto extends Eloquent
{
    use SoftDeletingTrait;

    protected $table = 'productos';

    protected $fillable = array('idTipoProducto', 'nombre', 'detalle', 'cantidad', 'precio', 'imagen', 'estado');

    protected $softDelete = true;

    public function tipoProducto()
    {
        return $this->belongsTo('TipoProducto', 'idTipoProducto');
    }

    public function scopeProducto($query, $nombre)
    {
        // if (trim($nombre) != '') {
        return $query->where('nombre', 'LIKE', '%' . $nombre . '%');
        // }
    }

    public function getPromocionProductoAttribute()
    {
        if ($this->promocion == 1) {
            return 'SI';
        } else {
            return 'NO';
        }
    }
}
