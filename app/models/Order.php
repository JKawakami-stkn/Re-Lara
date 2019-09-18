<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use SoftDeletes;

    
    protected $table = 'orders';
    protected $primaryKey = 'id';
    protected $dates = ['deleted_at'];

    public function kids(){
        // return $this->belongsToMany('App\models\');
    }

    public function skus(){
        return $this->belongsToMany('App\models\Sku');
    }

    public function sales(){
        return $this->belongsToMany('App\models\Sale');
    }
}
