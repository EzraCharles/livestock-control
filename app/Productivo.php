<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Productivo extends Model
{
    public $table = "productivos";

    protected $guarded = ['id', 'created_at', 'updated_at'];

    /**
     * Get the "embarque" of the analysis register.
     */
    public function embarque()
    {
        return $this->belongsTo('App\Embarque');
    }
}
