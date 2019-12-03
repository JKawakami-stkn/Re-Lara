<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sale;
use App\Models\Order;
use App\Models\M_kids;

class ParentCartController extends Controller
{
    public function show($sale_id, $token){

        //販売会情報を取得
        $sale = Sale::find($sale_id);

        //園児情報を取得
        $kid_id = \App\models\Tokens::where('token', $token)->get('kids_id');
        $kid = \App\models\M_kids::find($kid_id);

        $target = $kid_id->first()['kids_id'];

        #\Debugbar::info("販売会".$sale_id."園児::".$kid->KIDS_NM_KJ);
 
        //園児の用品情報を取得
        $orders = Order::where('sale_id', $sale_id)
                    ->where('kids_id',$target)
                    ->get();

        #\Debugbar::info($orders);
        #sku表示
        $Sale = Sale::find($sale_id);
        $sku_ids = Order::where("sale_id", $sale_id)->where("kids_id", $target)->select("sku_id")->get()->toArray();
        $sku_data = [];
        foreach($sku_ids as $sku_id){
          foreach ($sku_id as $key => $value){
          $sku_v = \App\models\Sku::where("id", $value)->select("size", "color")->get()->toArray();
          $sku_data[$value] = $sku_v[0];
          }
        }

        return view('parent-cart',compact("sale","token","target","orders","kid","sku_data"));
     }

    // TODO : 注文確定日時を保存
    public function store($sale_id, $target){

        // $personal_sale = \App\models\Personal_sale::find($personal_sale_id);
        // $personal_sale->entered_at = date("Y/m/d H:i:s");
        // $personal_sale->save();

        return "ここでおわり";
    }

    public function delete($sale_id, $target, $order_id){

        // 削除処理
        $order = \App\models\Order::find($order_id);
        $order->delete();

        return $this->show($sale_id, $target);
    }
}