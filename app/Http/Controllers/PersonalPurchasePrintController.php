<?php

namespace App\Http\Controllers;

use \App\models\Personal_sale;
use \App\models\Personal_order;
use \App\models\Supplie;
use \App\models\Supplier;
use Illuminate\Http\Request;

class PersonalPurchasePrintController extends Controller
{
    public function show($personal_sale_id){

        // 注文
        $personal_sale = Personal_sale::find($personal_sale_id);

        // 注文された用品一覧
        $personal_orders = $personal_sale->personal_orders;

        // 用品id一覧
        $ordered_supplies_id = Personal_order::where('personal_sale_id', $personal_sale_id)->get('supplie_id');

        // 発注書を送る取引先一覧
        $supplies_id = Supplie::whereIn('id', $ordered_supplies_id)->groupBy('supplier_id')->get('supplier_id');
        $suppliers = Supplier::find($supplies_id);
        \Debugbar::info($suppliers);

        return view('personal-purchase-print', ['personal_sale'=>$personal_sale, 'personal_orders'=>$personal_orders, 'suppliers'=>$suppliers]);
    }
}
