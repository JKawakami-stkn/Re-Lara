<?php

namespace App\Http\Controllers;

use App\Models\Sale;

use Illuminate\Http\Request;

class MailPersonalSelectController extends Controller
{
    public function show($sale_id){
        $groups = \App\models\M_wf_group::currentYearGroups();
        $sale = Sale::find($sale_id);
        return view('mail-personal-select',compact("groups","sale"));
    }

    public function load($sale_id,$gp_cd){

        // 絞り込みに使用する現在年度を取得
        $wf_year = (new \DateTime('-3 month'))->format('Y');

        $data = \App\models\M_wf_group::kids($gp_cd, $wf_year)
            ->toArray();

        // jsonを返す
        return response()->json(
            $data,
            200, [],
            JSON_UNESCAPED_UNICODE
        );
   }
}
