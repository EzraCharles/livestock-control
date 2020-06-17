<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Alimentacion extends Model
{
    use SoftDeletes;

    public $table = "alimentaciones";

    protected $guarded = ['id', 'created_at', 'updated_at'];

    /**
     * Get the 'formula' of the 'alimentacion'.
     */
    public function formula()
    {
        return $this->hasMany('App\Formula');
    }

    /**
     * Get the 'tipo_alimentacion' of the 'alimentacion'.
     */
    public function tipoAlimentacion()
    {
        return $this->belongsTo('App\Formula');
    }

    /**
     * Get its "registro".
     */
    public function registro()
    {
        return $this->belongsTo('App\Registro');
    }
}
