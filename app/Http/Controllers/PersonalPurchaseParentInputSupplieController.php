<?php

namespace App\Http\Controllers;

use App\Models\Personal_order;
use Illuminate\Http\Request;

class PersonalPurchaseParentInputSupplieController extends Controller
{
    public function show($personal_sale_id, $token, $supplie_id){
        
        $supplie = \App\models\Supplie::find($supplie_id);
        $personal_sale = \App\models\Personal_sale::find($personal_sale_id);
        $personal_order = \App\models\Personal_order::where('personal_sale_id', $personal_sale_id)->where('supplie_id', $supplie_id)->get();
        #skuになかったらエラー出る
        $supplie_color =  \App\models\Sku::where('supplie_id', $supplie_id)->select("color")->distinct()->get()->toArray();
        $supplie_size =  \App\models\Sku::where('supplie_id', $supplie_id)->select("size")->distinct()->get()->toArray();
        return view('personal-purchase-parent-input-supplie', compact('token', 'supplie', 'personal_sale', 'personal_order', "supplie_size", "supplie_color"));

    }

    public function store($personal_sale_id, $token, $supplie_id, Request $request){
        $request->session()->regenerateToken();

        $supplie_sku =  \App\models\Sku::where('supplie_id', $supplie_id)->where('size', $request->size_value)->where("color", $request->color_value)->select("id")->get()->toArray()[0];

        //追加
        $quantity = $request->quantity;

        $sku_id = \App\models\Sku::where("supplie_id", $supplie_id)->where("color", $request->color_value)->where("size", $request->size_value)->select("id")->get()->toArray()[0];
        $already_sku = \App\models\Personal_order::where("personal_sale_id", $personal_sale_id)->where("sku_id", $sku_id)->count();
        if($already_sku == 1){
          \Debugbar::addMessage("既にある");
          $order_id = \App\models\Personal_order::where("personal_sale_id", $personal_sale_id)->where("sku_id", $sku_id)->select("id")->get()->toArray()[0];
          $kids_order = \App\models\Personal_order::find($order_id["id"]);
          $kids_order->quantity =  $quantity;
          $kids_order->save();
        }else{
          //値の追加
          $order = new Personal_order;
          $order->personal_sale_id = $personal_sale_id;
          $order->supplie_id = $supplie_id;
          $order->sku_id = $sku_id["id"];
          $order->quantity = $quantity;
          $order->save();
        }

        $personal_purchase_parent_input_supplie_list_controller = new PersonalPurchaseParentInputSupplieListController();
        return $personal_purchase_parent_input_supplie_list_controller->show($personal_sale_id, $token);
    }
}
