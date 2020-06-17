<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Animal extends Model
{
    use SoftDeletes;

    public $table = "animales";

    protected $guarded = ['id', 'created_at', 'updated_at'];

    /**
     * Get the "proveedor" that owns the animals.
     */
    public function persona()
    {
        return $this->belongsTo('App\Persona');
    }

    /**
     * Get the "animal type".
     */
    public function tipoAnimal()
    {
        return $this->belongsTo('App\TipoAnimal');
    }

    /**
     * Get the 'registros' of the animal.
     */
    public function registros()
    {
        return $this->hasMany('App\Registro');
    }

    /**
     * Get the "compra" register of the animal.
     */
    public function compra()
    {
        return $this->hasOne('App\Compra');
    }

    /**
     * Get the "venta" register of the animal.
     */
    public function venta()
    {
        return $this->hasOne('App\Venta');
    }

    /**
     * Get the "renta" register of the animal.
     */
    public function renta()
    {
        return $this->hasOne('App\Renta');
    }

    /**
     * Get the 'tratamientos sanitarios' of the animal.
     */
    public function tratamientosSanitarios()
    {
        return $this->hasMany('App\TratamientoSanitario');
    }
}
