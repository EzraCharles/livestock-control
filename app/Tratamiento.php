<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tratamiento extends Model
{
    public $table = "tratamientos";

    protected $guarded = ['id', 'created_at', 'updated_at'];

    /**
     * Get the treatment type.
     */
    public function tipoTratamiento()
    {
        return $this->belongsTo('App\TipoTratamiento');
    }
}
