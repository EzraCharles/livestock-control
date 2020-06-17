<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MasterSanitario extends Model
{
    use SoftDeletes;

    public $table = "master_sanitarios";

    protected $guarded = ['id', 'created_at', 'updated_at'];

    /**
     * Get the "user" who create the "master_sanitario".
     */
    public function usuario()
    {
        return $this->belongsTo('App\User');
    }

    /**
     * Get all "tratamientos sanitarios" of the day.
     */
    public function tratamientosSanitarios()
    {
        return $this->hasMany('App\TratamientoSanitario');
    }
}
