<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class M_mail_adr extends Model
{
    protected $connection = 'mysql2';

    protected $table = 'm_mail_adr';

    protected $primaryKey = ['LEDG_NUM', 'GURD_NUM'];
    
    public $incrementing = false;
}
