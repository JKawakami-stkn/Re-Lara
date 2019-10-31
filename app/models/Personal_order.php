<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Personal_order extends Model
{
    use SoftDeletes;

    protected $table = 'personal_orders';
    protected $primaryKey = 'id';
    protected $dates = ['deleted_at'];
    protected $guarded = ['id'];
}
