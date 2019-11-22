<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class DeliveryCheckController extends Controller
{
    public function show($sale_id, $kid_id){

        $sale = \App\models\Sale::find($sale_id);
        $kid = \App\models\M_kids::find($kid_id);
        $orders = \App\models\Order::where('sale_id', $sale_id)
                    ->where('kids_id',$kid_id)
                    ->get();

        #sku表示
        $Sale = \App\models\Sale::find($sale_id);
        $sku_ids = \App\models\Order::where("sale_id", $sale_id)->where("kids_id", $kid_id)->select("sku_id")->get()->toArray();
        $sku_data = [];
        foreach($sku_ids as $sku_id){
          foreach ($sku_id as $key => $value){
          $sku_v = \App\models\Sku::where("id", $value)->select("size", "color")->get()->toArray();
          $sku_data[$value] = $sku_v[0];
          }
        }
        \Debugbar::info($orders);

        return view('delivery-check', compact('sale', 'kid', 'orders',"sku_data"));
    }

    public function store($sale_id, $kid_id){

        // TODO : 引き渡し日時を保存

        $sale_menu = new SaleMenuController;

        return $sale_menu->show($sale_id);
    }

}
