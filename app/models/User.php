<?php

use Illuminate\Auth\Reminders\RemindableInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\UserTrait;
use Illuminate\Database\Eloquent\SoftDeletingTrait;

class User extends Eloquent implements UserInterface, RemindableInterface
{
    use UserTrait, RemindableTrait, SoftDeletingTrait;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'clientes_web';

    protected $softDelete = true;

    protected $fillable = array('idProvincia', 'email', 'password', 'passwordTemporal', 'codigoActivacion', 'estado', 'tipo', 'empleado', 'nombre', 'apellido', 'dni', 'fechaNacimiento', 'direccion', 'localidad', 'telefono', 'avatar');

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = array('password', 'remember_token');

    public function provincia()
    {
        return $this->belongsTo('Provincia', 'idProvincia');
    }



    public function getNombreCompletoAttribute()
    {
        return $this->nombre . ' ' . $this->apellido;
    }

   public function getTipoUsuarioAttribute()
    {
        switch ($this->tipo) {
            case 'admin':
                return 'Administrador';
                break;

            case 'usuario':
                return 'Empleado';
                break;

            case 'cliente':
                return 'Cliente';
                break;

            default:
                return 'Cliente';
                break;
        }
    }

    public function getTipoUsuarioEstiloAttribute()
    {
        switch ($this->tipo) {
            case 'admin':
                return 'bg-blue';
                break;

            case 'usuario':
                return 'bg-yellow';
                break;

            case 'cliente':
                return 'bg-aqua';
                break;

            default:
                return 'bg-aqua';
                break;
        }
    }

    public function getEstadoUsuarioAttribute()
    {
        if ($this->estado == 1) {
            return 'Habilitado';
        } else {
            return 'Deshabilitado';
        }
    }
}
