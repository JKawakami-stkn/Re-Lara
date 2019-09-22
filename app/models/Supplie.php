<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Supplie extends Model
{
    // use SoftDeletes;

    protected $table = 'supplies';
    protected $primaryKey = 'id';
    protected $dates = ['deleted_at'];

    public function skus()
    {
        return $this->hasMany('App\models\Sku');
    }
}
