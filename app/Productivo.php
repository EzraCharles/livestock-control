<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Productivo extends Model
{
    use SoftDeletes;

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
