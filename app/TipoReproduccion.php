<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoReproduccion extends Model
{
    public $table = "tipos_reproduccion";

    protected $guarded = ['id', 'created_at', 'updated_at'];

    /**
     * Get all "registro".
     */
    public function reproducciones()
    {
        return $this->hasMany('App\Reproduccion');
    }
}
