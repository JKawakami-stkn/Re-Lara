<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\models\Sale;

class SalesTopController extends Controller
{
    public function show(){
        //Saleモデルから一覧データを取得
         $sales= Sale::all();
        return view('sales',compact('sales'));
    }
}
