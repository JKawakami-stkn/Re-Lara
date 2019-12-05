<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\TargetRequest;
use App\Models\Sale;

class OrdersStatusController extends Controller
{
    public function show($sale_id){
        $groups = \App\models\M_wf_group::currentYearGroups();
        $sale = Sale::find($sale_id);
        $sale_m_wf_group =  $sale->get_sale_m_wf_group($sale_id); 
        return view('orders-status', compact("groups","sale","sale_m_wf_group"));


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

   public function store(TargetRequest $request,$sale_id){
    $request->session()->regenerateToken();

    \App\models\Personal_sale::create(['kids_id' => $request->kids_id, 'deadline' => $request->deadline]);

    $orderstatus = new OrderStatusController;

    $kids = $request->kids_id;
    return $orderstatus->show($sale_id,$kids);
}

}
