<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoTratamiento extends Model
{
    public $table = "tipos_tratamiento";

    protected $guarded = ['id', 'created_at', 'updated_at'];

    /**
     * Get all "tratamientos".
     */
    public function trartamientos()
    {
        return $this->hasMany('App\Tratamiento');
    }
}
