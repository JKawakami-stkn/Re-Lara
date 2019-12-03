<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\Sale;
use App\models\M_wf_group;
use App\models\Supplie;
use App\Http\Requests\SaleRequest;

class SaleEditController extends Controller
{
    public function show($sale_id){

        $sale = Sale::find($sale_id);
        
         //用品情報取得
         $supplies = Supplie::all();

         //組情報
         $Mwfgroup = new M_wf_group;
         $kumis = $Mwfgroup->currentYearGroups(); 
         
        return view('sale-edit',compact('supplies','kumis','sale'));
    }

    public function store(SaleRequest $request){
         
        //F5での更新制御
        $request->session()->regenerateToken();

        //salesテーブルに値を登録
        $sale = Sale::find($request->saleid);

        $sale->name = $request->sale_name;
        $sale->save();

        //用品情報を取得
        $supplies = $request->supplie; 

        //salesテーブルとsuppliesテーブルとの紐付け処理
        $sale->Supplie()->sync($supplies);
  
        //組み情報を取得
        $kumi = $request->kumis;
  
        // //saleテーブルとm_wf_groupテーブルとの紐付け処理
        $sale->sale_m_wf_group($sale->id,$kumi);

        $salemenu = new SaleMenuController;
        return $salemenu->show($sale->id);
    }
}
