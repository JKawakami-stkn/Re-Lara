<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class M_wf_group extends Model
{
    protected $connection = 'mysql2';

    protected $table = 'm_wf_group';

    protected $primaryKey = 'GP_CD';

    public $incrementing = false;

    /**
     * 今年度の組一覧を取得
     */
    public static function currentYearGroups()
    {
        $WC_CD = '0014';
        $WF_CD = '0001';
        $WF_YEAR = (new \DateTime('-3 month'))->format('Y');

        $groups = M_wf_group::where('WC_CD', $WC_CD)
            ->where('WF_CD', $WF_CD)
            ->where('WF_YEAR', $WF_YEAR)
            ->get();

        return($groups);
    }

    /**
     * 年度と組を指定し、所属している園児の一覧を取得
     */
    public static function kids($GP_CD, $WF_YEAR)
    {
        $WC_CD = '0014';
        $WF_CD = '0001';
        // TODO : 利用するカラムを洗い出し
        $kids = \App\models\T_kids_gp_posi::where('WC_CD', $WC_CD)
            ->where('WF_CD', $WF_CD)
            ->where('GP_CD', $GP_CD)
            ->where('WF_YEAR', $WF_YEAR)
            ->join('m_kids','t_kids_gp_posi.KIDS_ID','=','m_kids.KIDS_ID')
            ->get();

        return $kids;
    }
    #KIDS_IDから組みの名前を持ってくるメソッド
    public static function getgroup($KIDS_ID){
      $WF_CD = "0001";
      $WC_CD = "0014";
      $WF_YEAR = (new \DateTime('-3 month'))->format('Y');
      $GP_CD = \App\models\T_kids_gp_posi::where("KIDS_ID", $KIDS_ID)->where("WF_YEAR", $WF_YEAR)->value("GP_CD");
      $group_neme = M_wf_group::where('WC_CD', $WC_CD)->where('WF_CD', $WF_CD)->where('WF_YEAR', $WF_YEAR)->where('GP_CD', $GP_CD)->value("GP_NM");

      return $group_neme;

    }
}
