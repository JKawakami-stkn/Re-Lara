<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{    
    use SoftDeletes;

    protected $table = 'sales';
    protected $primaryKey = 'id';
    protected $dates = ['deleted_at'];

}
