<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PersonalPurchaseCheckController extends Controller
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

        // \Debugbar::info($personal_sku_data["1"]["color"]);
        // \Debugbar::info($personal_orders[0]->sku_id);
        return view('personal-purchase-check', ['personal_sale' => $personal_sale, 'personal_orders' => $personal_orders, "personal_sku_data" => $personal_sku_data]);
    }

    public function store($personal_sale_id){
        
      $personal_sale = \App\models\Personal_sale::find($personal_sale_id);
      $personal_sale->entered_at = date("Y/m/d H:i:s");
      $personal_sale->save();

      $personal_orders = new PersonalOrdersController;
      return $personal_orders->show();
    }
}
