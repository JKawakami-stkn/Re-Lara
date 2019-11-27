<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class M_kids_care_ledg extends Model
{
    protected $connection = 'mysql2';

    protected $table = 'm_kids_care_ledg';

    protected $primaryKey = 'LEDG_NUM';

    public $incrementing = false;


    // メールアドレス情報
    public function M_mail_adr()
    {
        return $this->hasOne('App\models\M_mail_adr', 'LEDG_NUM', 'LEDG_NUM');
    }

}

