<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\Supplie;
use App\models\Sale;

class SaleRegistrationController extends Controller
{
    public function show()
    {   
        //用品情報取得
        $supplies = Supplie::all();

        //組情報
        return view('sale-registration',compact('supplies'));
    }

    public function store(Request $request)
    {   
        //F5での更新制御
        $request->session()->regenerateToken(); 

        //用品情報を取得
        $supplies = $request->supplie; 

        //salesテーブルに値を登録
         $sale = Sale::create(['name' => $request->sale_name]);

        //salesテーブルとsuppliesテーブルとの紐付け処理
        $sale->Supplie()->sync($supplies);


        
        return view('sales');

    }
}
