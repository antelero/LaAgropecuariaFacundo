<?php

use Illuminate\Database\Eloquent\SoftDeletingTrait;

class Provincia extends Eloquent
{
    use SoftDeletingTrait;

    protected $table = 'provincias';

    protected $fillable = array('nombre');

    protected $softDelete = true;
}
