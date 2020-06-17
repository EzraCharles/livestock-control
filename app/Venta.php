<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Venta extends Model
{
    use SoftDeletes;

    public $table = "ventas";

    protected $guarded = ['id', 'created_at', 'updated_at'];

    /**
     * Get the "animal" of the venta.
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

    /**
     * Get "precio" of "venta".
     */
    public function precio()
    {
        return $this->belongsTo('App\Precio');
    }
}
