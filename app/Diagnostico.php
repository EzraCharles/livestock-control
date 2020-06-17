<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Diagnostico extends Model
{
    use SoftDeletes;

    public $table = "diagnosticos";

    protected $guarded = ['id', 'created_at', 'updated_at'];


}
