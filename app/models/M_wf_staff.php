<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class M_wf_staff extends Model
{
    protected $connection = 'mysql2';

    protected $table = 'm_wf_staff';

    protected $primaryKey = 'STAF_ID';

    public $incrementing = false;
}
