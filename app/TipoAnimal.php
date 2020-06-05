<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoAnimal extends Model
{
    public $table = "tipos_animal";

    protected $guarded = ['id', 'created_at', 'updated_at'];

     /**
     * Get all the animals by type.
     */
    public function animales()
    {
        return $this->hasMany('App\Animal');
    }
}
