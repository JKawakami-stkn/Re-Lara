<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\Supplie;
use App\models\Sale;
use App\models\M_wf_group;
use App\models\Supplie_division;
class SaleRegistrationController extends Controller
{
    public function show()
    {
        //用品情報取得
        $supplies = Supplie::all();

        //組情報
        $Mwfgroup = new M_wf_group;
        $kumis = $Mwfgroup->currentYearGroups();
        $supp_divi = \App\models\Supplie_division::get();
        return view('sale-registration',compact('supplies','kumis',"supp_divi"));
    }

    public function load($division_id){
      //用品情報取得
      $supplies = Supplie::all();
      //組情報
      \Debugbar::info($division_id);
      \Debugbar::addMessage("成功");
      $Mwfgroup = new M_wf_group;
      $kumis = $Mwfgroup->currentYearGroups();
      $supp_divi = \App\models\Supplie_division::get();
      return view('sale-registration',compact('supplies','kumis',"supp_divi"));
    }

    public function store(Request $request)
    {
        //F5での更新制御
        $request->session()->regenerateToken();

        //salesテーブルに値を登録
         $sale = Sale::create(['name' => $request->sale_name]);

         //用品情報を取得
        $supplies = $request->supplie;

        //salesテーブルとsuppliesテーブルとの紐付け処理
        $sale->Supplie()->sync($supplies);

        //組み情報を取得
        $kumi = $request->kumis;

        // //saleテーブルとm_wf_groupテーブルとの紐付け処理
        $sale->sale_m_wf_group($sale->id,$kumi);

        $saletop = new SalesTopController;
        return $saletop->show();

    }
}
