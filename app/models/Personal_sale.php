<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Personal_sale extends Model
{
    use SoftDeletes;

    protected $table = 'personal_sales';
    protected $primaryKey = 'id';
    protected $dates = ['deleted_at'];

    public function personal_orders()
    {
        return $this->hasMany('App\models\Personal_order');
    }
}
