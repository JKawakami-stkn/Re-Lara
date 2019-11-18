<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DeliveryCheckController extends Controller
{
    public function show($sale_id, $kid_id){

        $sale = \App\models\Sale::find($sale_id);
        $kid = \App\models\M_kids::find($kid_id);
        $orders = \App\models\Order::where('sale_id', $sale_id)->get();

        return view('delivery-check', compact('sale', 'kid', 'orders'));
    }

    public function store($sale_id, $kid_id){

        // TODO : 引き渡し日時を保存
        
        $sale_menu = new SaleMenuController;
        
        return $sale_menu->show($sale_id);
    }

}
