<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PersonalPurchaseCheckController extends Controller
{
    public function show($personal_sale_id){

        $personal_sale = \App\models\Personal_sale::find($personal_sale_id);
        $personal_orders = $personal_sale->personal_orders;

        return view('personal-purchase-check', ['personal_sales' => $personal_sale, 'personal_orders' => $personal_orders]);
    }
}
