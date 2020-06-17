<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TipoAnimal extends Model
{
    use SoftDeletes;

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
