<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sale;
use App\Models\Order;
use App\Models\M_kids;

class OrderStatusController extends Controller
{
      public function show($sale_id, $target){

            //販売会情報を取得
            $sale = Sale::find($sale_id);

            //園児情報を取得
            $kid = M_kids::find($target);
            
            \Debugbar::info("販売会".$sale_id."園児::".$kid->KIDS_NM_KJ);

            //園児の用品情報を取得
            //TODO : 削除済みの注文を非表示にする
            $orders = Order::where('sale_id', $sale_id)
                        ->where('kids_id',$target)
                        ->get();

            \Debugbar::info($orders);
        
            return view('order-status',compact("sale","target","orders","kid"));
      }

      // TODO : 注文確定日時を保存
      public function store($sale_id, $target){
        
            // $personal_sale = \App\models\Personal_sale::find($personal_sale_id);
            // $personal_sale->entered_at = date("Y/m/d H:i:s");
            // $personal_sale->save();
      
            $sale_menu = new SaleMenuController;
            return $sale_menu->show($sale_id);
      }

      public function delete($sale_id, $target, $order_id){

            // 削除処理
            $order = \App\models\Order::find($order_id);
            $order->delete();

            return $this->show($sale_id, $target);
      }

}
