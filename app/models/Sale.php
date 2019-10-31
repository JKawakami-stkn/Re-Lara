<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Sale extends Model
{    
    use SoftDeletes;
    protected $table = 'sales';
    protected $primaryKey = 'id';
    protected $dates = ['deleted_at'];
    protected $guarded = ['id'];

    public function Supplie()
    {
      return $this->belongsToMany('App\models\Supplie');
    }
}
