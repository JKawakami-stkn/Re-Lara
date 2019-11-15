<?php

namespace App\Http\Controllers;

use App\Models\Sale;
use App\Models\Supplie;
use App\Models\Order;
use Illuminate\Http\Request;


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
        
     return view('purchase-supplie',compact('sale','target','supplie','supplier'));
    }

    public function store(Request $request,$sale_id,$target,$supplie_id)
    {
        //購入数量の取得
        $quantity = $request->quantity;

        //値の追加
        $order = new Order;
        $order->sale_id = $sale_id;
        $order->kids_id= $target;
        $order->sku_id = 0;
        $order->quantity = $quantity;
        $order->supplie_id = $supplie_id;
        $order->save();


        $purchasesupplies =new PurchaseSuppliesController;
        return $purchasesupplies->show($sale_id,$target);

    }
}
