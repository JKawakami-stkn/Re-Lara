<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PersonalPurchaseDeliveryController extends Controller
{
    public function show($personal_sale_id){

        $personal_sale = \App\models\Personal_sale::find($personal_sale_id);
        $personal_orders = $personal_sale->personal_orders;

        return view('personal-purchase-delivery', ['personal_sale' => $personal_sale, 'personal_orders' => $personal_orders]);
    }

    public function store($personal_sale_id){
        
        $personal_sale = \App\models\Personal_sale::find($personal_sale_id);
        $personal_sale->delivered_at = date("Y/m/d H:i:s");
        $personal_sale->save();

        $personal_orders = new PersonalOrdersController;
        return $personal_orders->show();

    }
}