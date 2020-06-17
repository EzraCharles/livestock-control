<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TipoReproduccion extends Model
{
    use SoftDeletes;

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
