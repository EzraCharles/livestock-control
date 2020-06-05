<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoPersona extends Model
{
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
