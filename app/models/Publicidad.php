<?php

use Illuminate\Database\Eloquent\SoftDeletingTrait;

class Publicidad extends Eloquent
{
    use SoftDeletingTrait;

    protected $table = 'publicidades';

    protected $fillable = array('nombre', 'detalle', 'ubicacion', 'email', 'imagen');

    protected $softDelete = true;

}
