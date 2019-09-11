<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Sku extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];
    
    public function supplies(){
        return $this->belongsToMany('App\models\Supplie');
    }
}
