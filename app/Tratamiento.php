<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tratamiento extends Model
{
    use SoftDeletes;

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
