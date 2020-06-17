<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Reproduccion extends Model
{
    use SoftDeletes;

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
