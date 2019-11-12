<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PersonalPurchaseSuppliesController extends Controller
{
    public function show($personal_sale_id){

        $supplies = \App\models\Supplie::all();
        $personal_sale = \App\models\Personal_sale::find($personal_sale_id);

        return view('personal-purchase-supplies', ['supplies' => $supplies, 'personal_sale' => $personal_sale ]);
    }

    public function store($personal_sale_id){
        
        $personal_sale = \App\models\Personal_sale::find($personal_sale_id);
        $personal_sale->entered_at = date("Y/m/d H:i:s");
        $personal_sale->save();

        $personal_orders = new PersonalOrdersController;
        return $personal_orders->show();
    }
}
