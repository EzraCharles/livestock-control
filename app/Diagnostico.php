<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Diagnostico extends Model
{
    public $table = "diagnosticos";

    protected $guarded = ['id', 'created_at', 'updated_at'];


}
