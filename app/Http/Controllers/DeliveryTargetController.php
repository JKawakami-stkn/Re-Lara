<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sale;
use App\Http\Requests\TargetRequest;

class DeliveryTargetController extends Controller
{
    public function show($sale_id){
        $groups = \App\models\M_wf_group::currentYearGroups();
        $sale = Sale::find($sale_id);
        $sale_m_wf_group =  $sale->get_sale_m_wf_group($sale_id); 
        return view('delivery-target',compact("groups","sale","sale_m_wf_group"));
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

   public function store($sale_id, TargetRequest $request){

    $request->session()->regenerateToken();
    
    $delivery_check = new DeliveryCheckController;

    return $delivery_check->show($sale_id, $request->kids_id);
    }
}
