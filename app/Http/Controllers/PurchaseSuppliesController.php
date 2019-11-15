<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sale;
use App\Models\Supplie;
class PurchaseSuppliesController extends Controller
{
    public function show($sale_id,$target){

        //sale_idからsale情報を取得
        $sale = Sale::find($sale_id);

        $supplies = Supplie::all();
        return view('purchase-supplies',compact('sale','target','supplies'));
    }
}
