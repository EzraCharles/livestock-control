<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Compra extends Model
{
    use SoftDeletes;

    public $table = "compras";

    protected $guarded = ['id', 'created_at', 'updated_at'];

    /**
     * Get the "animal" of the compra.
     */
    public function animal()
    {
        return $this->hasOne('App\Animal');
    }

    /**
     * Get the "embarque".
     */
    public function embarque()
    {
        return $this->belongsTo('App\Embarque');
    }

    /**
     * Get the "precio"/price of the "Compra"/sell.
     */
    public function precio()
    {
        return $this->belongsTo('App\Precio');
    }

}
