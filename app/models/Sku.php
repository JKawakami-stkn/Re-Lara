<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Sku extends Model
{
    use SoftDeletes;

    protected $table = 'skus';
    protected $primaryKey = 'id';
    protected $dates = ['deleted_at'];
    
}
