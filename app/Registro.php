<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Registro extends Model
{
    use SoftDeletes;

    public $table = "registros";

    protected $guarded = ['id', 'created_at', 'updated_at'];

    /**
     * Get the "animal" for the register.
     */
    public function animal()
    {
        return $this->belongsTo('App\Animal');
    }

    /**
     * Get the "reproduccion" of the register.
     */
    public function reproduccion()
    {
        return $this->hasOne('App\Reproduccion');
    }

    /**
     * Get the "alimentacion" of the register.
     */
    public function alimentacion()
    {
        return $this->hasOne('App\Alimentacion');
    }

}
