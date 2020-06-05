<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Corral extends Model
{
    public $table = "corrales";

    protected $guarded = ['id', 'created_at', 'updated_at'];

    /**
     * Get the 'tratamientos sanitarios' of each "corral".
     */
    public function tratamientosSanitarios()
    {
        return $this->hasMany('App\TratamientoSanitario');
    }
}
