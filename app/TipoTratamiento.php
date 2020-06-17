<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TipoTratamiento extends Model
{
    use SoftDeletes;

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
