<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\models\Sale;

class SalesTopController extends Controller
{
    public function show(){
        //Saleモデルから一覧データを取得
         $sales= Sale::all();
         $radio_name = null;
        return view('sales',compact('sales', 'radio_name'));
    }

    public function load($radio_name){
      if($radio_name == "none"){
        $sales = Sale::orderBy("id", "desc")->get();
      }elseif($radio_name == "up_sort"){
        $sales = Sale::orderBy("deadline", "asc")->get();
      }else{
        $sales = Sale::orderBy("deadline", "desc")->get();
      }
     return view('sales',compact('sales', 'radio_name'));
    }
}
