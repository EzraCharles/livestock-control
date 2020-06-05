<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoAlimentacion extends Model
{
    public $table = "tipo_alimentaciones";

    protected $guarded = ['id', 'created_at', 'updated_at'];

    /**
     * Get the 'alimentaciones' of the 'alimentacion' type.
     */
    public function alimentaciones()
    {
        return $this->hasMany('App\Alimentacion');
    }
}
