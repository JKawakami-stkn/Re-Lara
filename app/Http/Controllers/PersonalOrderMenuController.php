<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PersonalOrderMenuController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    
    public function show($personal_sale_id){

        $personal_sale = \App\models\Personal_sale::find($personal_sale_id);

        $kid = \App\models\M_kids::find($personal_sale->kids_id);

        return view('personal-order-menu', compact('personal_sale', 'kid'));
    }
}
