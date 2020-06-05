<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Formulacion extends Model
{
    public $table = "formulaciones";

    protected $guarded = ['id', 'created_at', 'updated_at'];

    /**
     * Get the 'registros' of animals.
     */
    public function formula()
    {
        return $this->belongsTo('App\Formula');
    }
}
