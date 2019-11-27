<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tokens extends Model
{
    use SoftDeletes;

    protected $table = 'tokens';

    protected $primaryKey = 'id';

    public $incrementing = false;

    protected $dates = ['deleted_at'];

    protected $guarded = array('id', 'deleted_at', 'created_at', 'updated_at');
}
