<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class M_wf_group extends Model
{
    protected $connection = 'mysql2';

    protected $table = 'm_wf_group';

    protected $primaryKey = ['WC_CD', 'WF_CD', 'GP_CD', 'WF_YEAR'];

    public $incrementing = false;

    public function kids($GP_CD, $WF_YEAR)
    {
        $WC_CD = '0014';
        $WF_CD = '0001';

        $kids = \App\models\T_kids_gp_posi::where('WC_CD', $WC_CD)
            ->where('WF_CD', $WF_CD)
            ->where('GP_CD', $GP_CD)
            ->where('WF_YEAR', $WF_YEAR)
            ->join('m_kids','KIDS_ID','=','m_kids.KIDS_ID')
            ->get();

        return $kids;
    }
}
