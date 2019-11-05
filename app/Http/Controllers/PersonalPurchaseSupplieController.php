<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PersonalPurchaseSupplieController extends Controller
{
    public function show($personal_sale_id, $supplie_id){

        $supplie = \App\models\Supplie::find($supplie_id);
        $personal_sale = \App\models\Personal_sale::find($personal_sale_id);
        $personal_order = \App\models\Personal_order::where('personal_sale_id', $personal_sale_id)->where('supplie_id', $supplie_id)->get();

        return view('personal-purchase-supplie', ['supplie' => $supplie, 'personal_sale' => $personal_sale, 'personal_order' => $personal_order]);
    }
}
