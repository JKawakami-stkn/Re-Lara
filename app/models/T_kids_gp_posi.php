<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class T_kids_gp_posi extends Model
{
    protected $connection = 'mysql2';

    protected $table = 't_kids_gp_posi';

    protected $primaryKey = ['KIDS_ID', 'WF_YEAR'];

    public $incrementing = false;
}
