<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Formula extends Model
{
    use SoftDeletes;

    public $table = "formulas";

    protected $guarded = ['id', 'created_at', 'updated_at'];

    /**
     * Get the elements and quantities of the formula.
     */
    public function formulaciones()
    {
        return $this->hasMany('App\Formulacion');
    }

    /**
     * Get the 'alimentaciones' using the 'formula'.
     */
    public function tipoAlimentaciones()
    {
        return $this->hasOne('App\TipoAlimentacion');
    }

}
