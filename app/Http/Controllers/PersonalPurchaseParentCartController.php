<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PersonalPurchaseParentCartController extends Controller
{
    public function show($personal_sale_id, $token){

        $personal_sale = \App\models\Personal_sale::find($personal_sale_id);
        $personal_orders = $personal_sale->personal_orders;
        $personal_sku_ids = \App\models\Personal_order::where("personal_sale_id", $personal_sale_id)->select("sku_id")->get()->toArray();
        $personal_sku_data = [];
        foreach($personal_sku_ids as $sku_id){
          foreach ($sku_id as $key => $value){
          $sku_v = \App\models\Sku::where("id", $value)->select("size", "color")->get()->toArray();
          $personal_sku_data[$value] = $sku_v[0];
          }
        }
        
        return view('parent-cart', compact('token', 'personal_sale', 'personal_orders', "personal_sku_data"));
    }

    public function store($personal_sale_id, $token){
        
      $personal_sale = \App\models\Personal_sale::find($personal_sale_id);
      $personal_sale->entered_at = date("Y/m/d H:i:s");
      $personal_sale->save();

      return "ここで終わり";
    }

    public function delete($personal_sale_id, $token, $personal_order_id){

      // 削除処理
      $personal_order = \App\models\Personal_order::find($personal_order_id);
      $personal_order->delete();

      return $this->show($personal_sale_id, $token);
    }
}
