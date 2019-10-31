<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PersonalOrdersController extends Controller
{

    public function show(){

        $personal_sales = \App\models\Personal_sale::all();

        return view('personal-orders', ['personal_sales' => $personal_sales]);
    }

}