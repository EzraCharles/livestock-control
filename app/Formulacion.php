<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Formulacion extends Model
{
    use SoftDeletes;

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
