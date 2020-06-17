<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Renta extends Model
{
    use SoftDeletes;

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
