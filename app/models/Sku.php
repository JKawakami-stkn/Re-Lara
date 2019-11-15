<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Sku extends Model
{
    use SoftDeletes;

    protected $table = 'skus';
    protected $primaryKey = 'id';
    protected $dates = ['deleted_at'];

}
