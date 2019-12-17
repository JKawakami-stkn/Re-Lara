<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\Sale;

class SaleMenuController extends Controller
{
    public function show($sale_id){
        
        $sale= Sale::find($sale_id);

        $groups = [];

        $groups_data = \App\models\Sale::get_sale_m_wf_group($sale->id);
        foreach($groups_data as $group_data){
            array_push($groups, $group_data->GP_NM);
        }

        return view('sale-menu', compact('sale', 'groups'));
    }
}
