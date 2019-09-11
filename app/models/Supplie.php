<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Supplie extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];
}
