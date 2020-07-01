<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TipoAlimentacion extends Model
{
    use SoftDeletes;

    public $table = "tipos_alimentacion";

    protected $guarded = ['id', 'created_at', 'updated_at'];

    /**
     * Get the 'alimentaciones' of the 'alimentacion' type.
     */
    public function alimentaciones()
    {
        return $this->hasMany('App\Alimentacion');
    }

    /**
     * Get the 'formula' of the 'tipo_alimentacion'.
     */
    public function formula()
    {
        return $this->belongsTo('App\Formula');
    }
}
