<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PersonalPurchaseDeliveryController extends Controller
{
    public function show($personal_sale_id){

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
        return view('personal-purchase-delivery', ['personal_sale' => $personal_sale, 'personal_orders' => $personal_orders, "personal_sku_data" => $personal_sku_data]);
    }

    public function store($personal_sale_id, Request $request){

        // 引き渡し日を記録
        if( $request->cb ){
            foreach( $request->cb as $cb ){
                $personal_order = \App\models\Personal_order::find($cb);
                $personal_order->delivery_at = date("Y/m/d H:i:s");
                $personal_order->save();
            }
        }
        

        $personal_order_menu = new PersonalOrderMenuController;
        return $personal_order_menu->show($personal_sale_id);

    }
}
