<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Renta extends Model
{
    public $table = "rentas";

    protected $guarded = ['id', 'created_at', 'updated_at'];

    /**
     * Get the "animal" of the renta.
     */
    public function animal()
    {
        return $this->hasOne('App\Animal');
    }

    /**
     * Get its "embarque.
     */
    public function embarque()
    {
        return $this->belongsTo('App\Embarque');
    }
}
