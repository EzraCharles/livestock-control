<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TipoPersona extends Model
{
    use SoftDeletes;

    public $table = "tipos_persona";

    protected $guarded = ['id', 'created_at', 'updated_at'];

    /**
     * Get all persons of each "tipo_persona".
     */
    public function personas()
    {
        return $this->hasMany('App\Persona');
    }
}
