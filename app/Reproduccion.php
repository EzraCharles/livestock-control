<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reproduccion extends Model
{
    public $table = "reproducciones";

    protected $guarded = ['id', 'created_at', 'updated_at'];

    /**
     * Get its "registro".
     */
    public function registro()
    {
        return $this->belongsTo('App\Registro');
    }

    /**
     * Get the reproduction type.
     */
    public function tipoReproduccion()
    {
        return $this->belongsTo('App\TipoReproduccion');
    }
}
