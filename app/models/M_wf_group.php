<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class M_wf_group extends Model
{
    protected $connection = 'mysql2';

    protected $table = 'm_wf_group';

    protected $primaryKey = ['id', 'WF_YEAR'];

    public $incrementing = false;
}
