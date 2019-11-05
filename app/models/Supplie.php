<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Supplie extends Model
{
    use SoftDeletes;

    protected $table = 'supplies';
    protected $primaryKey = 'id';
    protected $dates = ['deleted_at'];

    public function supplier()
    {
        return $this->belongsTo('App\models\Supplier');
    }

    public function skus()
    {
        return $this->hasMany('App\models\Sku');
    }
}
