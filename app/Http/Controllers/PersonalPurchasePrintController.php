<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PersonalPurchasePrintController extends Controller
{
    public function show($personal_sale_id){

        $personal_sale = \App\models\Personal_sale::find($personal_sale_id);
        $personal_orders = $personal_sale->personal_orders;
        $suppliers = \App\models\Supplier::all();
        
        return view('personal-purchase-print', ['personal_sale'=>$personal_sale, 'personal_orders'=>$personal_orders, 'suppliers'=>$suppliers]);
    }
}
