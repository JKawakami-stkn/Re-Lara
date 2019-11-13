<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sale;

class DeliveryTargetController extends Controller
{
    public function show($sale_id){
        $groups = \App\models\M_wf_group::currentYearGroups();
        $sale = Sale::find($sale_id);
        return view('delivery-target',compact("groups","sale"));
    }

    public function load($gp_cd){

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

   public function store(PersonalOrderRequest $request,$sale_id){
    $request->session()->regenerateToken();

    \App\models\Personal_sale::create(['kids_id' => $request->kids_id, 'deadline' => $request->deadline]);
    $salemenu = new SaleMenuController;
    return $salemenu->show($sale_id);
    }
}
