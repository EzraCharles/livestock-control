<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Embarque extends Model
{
    public $table = "embarques";

    protected $guarded = ['id', 'created_at', 'updated_at'];

    /**
     * Get the 'registros' of animals.
     */
    public function compras()
    {
        return $this->hasMany('App\Compra');
    }

    /**
     * Get the 'registros' of animals.
     */
    public function rentas()
    {
        return $this->hasMany('App\Renta');
    }

    /**
     * Get the 'registros' of animals.
     */
    public function ventas()
    {
        return $this->hasMany('App\Renta');
    }

    /**
     * Get the "user" who create the "embarque".
     */
    public function usuario()
    {
        return $this->belongsTo('App\User');
    }

    /**
     * Get the "persona" who sell or buy the "embarque".
     */
    public function persona()
    {
        return $this->belongsTo('App\Persona');
    }

    /**
     * Get the analysis "financiero" of the "embarque".
     */
    public function financiero()
    {
        return $this->hasOne('App\Financiero');
    }

    /**
     * Get the analysis "productivo" of the "embarque".
     */
    public function productivo()
    {
        return $this->hasOne('App\Productivo');
    }

}
