<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class M_kids extends Model
{
    protected $connection = 'mysql2';

    protected $table = 'm_kids';

    protected $primaryKey = 'KIDS_ID';

    public $incrementing = false;
}
