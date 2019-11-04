<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PersonalOrderSuppliesController extends Controller
{
    public function show($personal_sale_id){

        $personal_sale = \App\models\Personal_sale::find($personal_sale_id);

        \Debugbar::info($personal_sale);

        return view('personal-order-supplies', ['personal_sale' => $personal_sale]);
    }
}
