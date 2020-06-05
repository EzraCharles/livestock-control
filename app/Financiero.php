<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Financiero extends Model
{
    public $table = "financieros";

    protected $guarded = ['id', 'created_at', 'updated_at'];

    /**
     * Get the "embarque" of this analysis register.
     */
    public function embarque()
    {
        return $this->belongsTo('App\Embarque');
    }
}
