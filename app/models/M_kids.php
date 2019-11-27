<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class M_kids extends Model
{
    protected $connection = 'mysql2';

    protected $table = 'm_kids';

    protected $primaryKey = 'KIDS_ID';

    public $incrementing = false;

    // 保育児童台帳マスタ
    public function M_kids_care_ledg()
    {
        return $this->hasOne('App\models\M_kids_care_ledg', 'LEDG_NUM', 'LEDG_NUM');
    }



    public static function group($GP_CD, $WF_YEAR)
    {

        $WC_CD = '0014';
        $WF_CD = '0001';

        $group = \App\models\T_kids_gp_posi::where('WC_CD', $WC_CD)
            ->where('WF_CD', $WF_CD)
            ->where('GP_CD', $GP_CD)
            ->where('WF_YEAR', $WF_YEAR)
            ->join('m_wf_group', function ($join) {
                $join->on('WC_CD', '=', 'm_wf_group.WC_CD')
                    ->where('WF_CD', '=', 'm_wf_group.WF_CD')
                    ->where('GP_CD', '=', 'm_wf_group.GP_CD')
                    ->where('WF_YEAR', '=', 'm_wf_group.WF_YEAR');
            })
            ->get();

        return $group;

    }
}
