<?php

namespace App\Http\Controllers;

use App\Models\Sale;
use App\Models\Supplie;
use App\Models\Order;
use Illuminate\Http\Request;
use App\Http\Requests\PersonalPurchaseSupplieRequest;


class PurchaseSupplieController extends Controller
{

    public function show($sale_id,$target,$supplie_id)
    {
        //販売会情報を取得
        $sale = Sale::find($sale_id);

        //用品情報を取得
        $supplie = Supplie::find($supplie_id);

        //企業情報を取得
        $supplier = $supplie->supplier;

        #skuになかったらエラー出る
        $supplie_color =  \App\models\Sku::where('supplie_id', $supplie_id)->select("color")->distinct()->get()->toArray();
        $supplie_size =  \App\models\Sku::where('supplie_id', $supplie_id)->select("size")->distinct()->get()->toArray();

     return view('purchase-supplie',compact('sale','target','supplie','supplier', "supplie_color", "supplie_size"));
    }

    public function store(PersonalPurchaseSupplieRequest $request,$sale_id,$target,$supplie_id)
    {
        //購入数量の取得
        $quantity = $request->quantity;

        $sku_id = \App\models\Sku::where("supplie_id", $supplie_id)->where("color", $request->color_value)->where("size", $request->size_value)->select("id")->get()->toArray()[0];
        $last_purchase_check = \App\models\Order::where("kids_id", $target)->where("sale_id", $sale_id)->count();
        // //初めての登録か
        // if($last_purchase_check => 1){
        //
        //   //そのskuが既にあるか
        //   if($already_sku == 1){
        //     $order_id = \App\models\Order::where("kids_id", $target)->where("sale_id", $sale_id)->where("sku_id", $sku_id)->select("id")->get();
        //
        //   }
        // }

        $already_sku = \App\models\Order::where("kids_id", $target)->where("sale_id", $sale_id)->where("sku_id", $sku_id)->count();
        if($already_sku == 1){
          \Debugbar::addMessage("既にある");
          $order_id = \App\models\Order::where("kids_id", $target)->where("sale_id", $sale_id)->where("sku_id", $sku_id)->select("id")->get()->toArray()[0];
          $kids_order = \App\models\Order::find($order_id["id"]);
          $kids_order->quantity =  $quantity;
          $kids_order->save();
        }else{
          //値の追加
          $order = new Order;
          $order->sku_id = $sku_id["id"];
          $order->sale_id = $sale_id;
          $order->kids_id= $target;
          $order->quantity = $quantity;
          $order->supplie_id = $supplie_id;
          $order->save();
        }



        $purchasesupplies =new PurchaseSuppliesController;
        return $purchasesupplies->show($sale_id,$target);

    }
}
