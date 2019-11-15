<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    use SoftDeletes;

    
    protected $table = 'orders';
    protected $primaryKey = 'id';
    protected $dates = ['deleted_at'];

    public function kids(){
        return $this->belongsTo('App\models\M_kids');
    }

    public function skus(){
        return $this->belongsTo('App\models\Sku');
    }

    public function sales(){
        return $this->belongsTo('App\models\Sale');
    }
}
