<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sale;
use App\Models\Supplie;
use Illuminate\Support\Facades\DB;

class PurchaseSuppliesController extends Controller
{
    public function show($sale_id,$target){

        //sale_idからsale情報を取得
        $sale = Sale::find($sale_id);
    
        $supplies = Supplie::all();
        $purchasesupplies= new PurchaseSuppliesController;
        return view('purchase-supplies',compact('sale','target','supplies','purchasesupplies'));
    }

    public function tablecheck($supplie_id,$sale_id,$target)
    {
        //Oderテーブルに値が入っているか確認
        \Debugbar::info($supplie_id);

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
