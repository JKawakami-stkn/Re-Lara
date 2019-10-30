<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class mkids extends Model
{
    protected $connection = 'mysql2';
    protected $table = 'M_KIDS';
    protected $primaryKey = 'KIDS_ID';
}
