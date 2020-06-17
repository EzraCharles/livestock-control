<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Financiero extends Model
{
    use SoftDeletes;

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
