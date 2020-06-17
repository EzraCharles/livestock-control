<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Precio extends Model
{
    use SoftDeletes;

    public $table = "precios";

    protected $guarded = ['id', 'created_at', 'updated_at'];

    /**
     * Get the 'compras' of the "precio" stablished.
     */
    public function compras()
    {
        return $this->hasMany('App\Compra');
    }

    /**
     * Get the 'ventas' of the "precio" stablished.
     */
    public function ventas()
    {
        return $this->hasMany('App\Venta');
    }
}
