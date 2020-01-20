<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\Supplie;
use App\models\Sale;

class PersonalPurchaseSuppliesController extends Controller
{
    public function show($personal_sale_id){

        $supplies = \App\models\Supplie::all();
        $personal_sale = \App\models\Personal_sale::find($personal_sale_id);

        $division_id = "1";
        $supp_divi = \App\models\Supplie_division::get();
        return view('personal-purchase-supplies', compact('supplies', 'personal_sale', 'division_id', 'supp_divi'));
    }

    public function load($personal_sale_id, $division_id){
      if($division_id == "1"){
        $supplies = Supplie::all();
      }else{
        $supplies = Supplie::where("division_id", $division_id)->get();
      }
      $personal_sale = \App\models\Personal_sale::find($personal_sale_id);

      
      $supp_divi = \App\models\Supplie_division::get();
      return view('personal-purchase-supplies', compact('supplies', 'personal_sale', 'division_id', 'supp_divi'));
    }

}
