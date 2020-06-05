<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TratamientoSanitario extends Model
{
    public $table = "tratamiento_sanitarios";

    protected $guarded = ['id', 'created_at', 'updated_at'];

    /**
     * Get the "animal" of the "tratamiento sanitario".
     */
    public function animal()
    {
        return $this->belongsTo('App\Animal');
    }

    /**
     * Get the "precio"/price of the "Compra"/sell.
     */
    public function precio()
    {
        return $this->belongsTo('App\Precio');
    }

    /**
     * Get the "precio"/price of the "Compra"/sell.
     */
    public function corral()
    {
        return $this->belongsTo('App\Corral');
    }

    /**
     * Get the "master sanitario" or the acumulated daily registers.
     */
    public function masterSanitario()
    {
        return $this->belongsTo('App\MasterSanitario');
    }
}
