<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sale;
use App\Models\Supplie;
use DebugBar\DebugBar;
use Illuminate\Support\Facades\DB;

class PurchaseSuppliesController extends Controller
{
    public function show($sale_id,$target){

        //sale_idからsale情報を取得
        $sale = Sale::find($sale_id);

        $supplies = $sale->Supplie;
        $division_id = "1";
        $supp_divi = \App\models\Supplie_division::get();
        $purchasesupplies= new PurchaseSuppliesController;
        return view('purchase-supplies',compact('sale','target','supplies','purchasesupplies','division_id', 'supp_divi'));
    }
    public function load($sale_id, $target, $division_id){
      $sale = Sale::find($sale_id);
      $sale_in_supplie = $sale->Supplie;
      // \Debugbar::info($sale_in_supplie);
      // foreach ($sale_in_supplie as $supplie) {
      //   \Debugbar::info($supplie->division_id);
      // }
      if($division_id == "1"){
        $supplies = $sale_in_supplie;
      }else{
        $supplies = $sale_in_supplie->where("division_id", $division_id);
      }

      $sale = Sale::find($sale_id);
      $supp_divi = \App\models\Supplie_division::get();
      $purchasesupplies= new PurchaseSuppliesController;
      return view('purchase-supplies',compact('sale','target','supplies','purchasesupplies','supp_divi', 'division_id'));
    }

    public function tablecheck($supplie_id,$sale_id,$target)
    {
        //Oderテーブルに値が入っているか確認
        $condition = DB::table('orders')->where([
            ['supplie_id', '=', $supplie_id],
            ['sale_id', '=',$sale_id ],
            ['kids_id', '=',$target ],
            ])->exists();

        if($condition){
             return '購入状態：購入済';
        }else{
             return '購入状態：未購入';
        }
    }
}
