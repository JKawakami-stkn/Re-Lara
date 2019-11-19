<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sale;
use App\Models\Order;
use App\Models\M_kids;

class OrderStatusController extends Controller
{
    public function show($sale_id,$target){

          //販売会情報を取得
          $sale = Sale::find($sale_id);

          //園児情報を取得
          $kid = M_kids::find($target);
        
          \Debugbar::info("販売会".$sale_id."園児::".$kid->KIDS_NM_KJ);

          //園児の用品情報を取得
          $orders = Order::where('sale_id', $sale_id)
               ->where('kids_id',$target)
               ->join('supplies','orders.supplie_id','=','supplies.id')
               ->get();

         \Debugbar::info($orders);
        
          return view('order-status',compact("sale","target","orders","kid"));
    }
}
