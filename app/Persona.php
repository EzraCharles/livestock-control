<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Persona extends Model
{
    use SoftDeletes;

    public $table = "personas";

    protected $guarded = ['id', 'created_at', 'updated_at'];

     /**
     * Get the animals for the person "productor".
     */
    public function animales()
    {
        return $this->hasMany('App\Animal');
    }

    /**
     * Get the 'embarque' selled or bought.
     */
    public function embarques()
    {
        return $this->hasMany('App\Embarque');
    }

    /**
     * Get the person type.
     */
    public function tipoPersona()
    {
        return $this->belongsTo('App\TipoPersona');
    }
}
