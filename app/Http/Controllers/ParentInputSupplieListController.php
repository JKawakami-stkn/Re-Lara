<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\models\Sale;

class ParentInputSupplieListController extends Controller
{
    public function show($sale_id, $token){

        // 対象ユーザーを絞り込み
        $kids_id = \App\models\Tokens::where('token', $token)->get('kids_id');
        $kid = \App\models\M_kids::find($kids_id);

        $target = \App\models\Tokens::where('token', $token)->get('kids_id')->first()["kids_id"];

        //sale_idからsale情報を取得
        $sale = Sale::find($sale_id);
    
        $supplies = $sale->Supplie;

        $purchasesupplies= new PurchaseSuppliesController;

        return view('parent-input-supplie-list',compact('token', 'sale', 'target','kid','supplies','purchasesupplies'));
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
