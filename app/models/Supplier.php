<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Supplier extends Model
{
    use SoftDeletes;

    protected $table = 'suppliers';
    protected $primaryKey = 'id';
    protected $dates = ['deleted_at'];
    
    public function supplies()
    {
        return $this->hasMany('App\models\Supplie');
    }
}
