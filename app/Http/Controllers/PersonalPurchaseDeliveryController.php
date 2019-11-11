<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PersonalPurchaseDeliveryController extends Controller
{
    public function show($personal_sale_id){

        $personal_sale = \App\models\Personal_sale::find($personal_sale_id);
        $personal_orders = $personal_sale->personal_orders;

        return view('personal-purchase-delivery', ['personal_sales' => $personal_sale, 'personal_orders' => $personal_orders]);
    }

    public function store($personal_sale_id){
        \App\models\Personal_sale::find($personal_sale_id)->delivered_at;
    }
}