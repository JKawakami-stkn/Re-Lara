<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Personal_order;
use App\Http\Requests\PersonalPurchaseSupplieRequest;

class PersonalPurchaseSupplieController extends Controller
{
    public function show($personal_sale_id, $supplie_id){

        $supplie = \App\models\Supplie::find($supplie_id);
        $personal_sale = \App\models\Personal_sale::find($personal_sale_id);
        $personal_order = \App\models\Personal_order::where('personal_sale_id', $personal_sale_id)->where('supplie_id', $supplie_id)->get();
        #skuになかったらエラー出る
        $supplie_color =  \App\models\Sku::where('supplie_id', $supplie_id)->select("color")->distinct()->get()->toArray();
        $supplie_size =  \App\models\Sku::where('supplie_id', $supplie_id)->select("size")->distinct()->get()->toArray();
        return view('personal-purchase-supplie', ['supplie' => $supplie, 'personal_sale' => $personal_sale, 'personal_order' => $personal_order, "supplie_size" => $supplie_size, "supplie_color" => $supplie_color]);
    }
    public function store($personal_sale_id, $supplie_id, PersonalPurchaseSupplieRequest $request)
    {
        $request->session()->regenerateToken();

        \Debugbar::info( empty($request->personal_order_id) );
        $supplie_sku =  \App\models\Sku::where('supplie_id', $supplie_id)->where('size', $request->size_value)->where("color", $request->color_value)->select("id")->get()->toArray()[0];
        \Debugbar::info($supplie_sku["id"]);
        \Debugbar::info($supplie_sku);


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
        /*
        // 登録
        if(empty($request->personal_order_id)){

            $personal_order = \App\models\Personal_order::create([
                'personal_sale_id' => $personal_sale_id,
                'supplie_id' => $supplie_id,
                'sku_id' => $supplie_sku["id"], #/ : sku対応
                'quantity' =>  $request->quantity,
            ]);
        // 編集
        }else{
            $personal_order =\App\models\Personal_order::find($request->personal_order_id);
            $personal_order->sku_id =  $supplie_sku["id"]; // TODO : sku対応
            $personal_order->quantity = $request->quantity;
            $personal_order->save();
        }
        */


        $personal_purchase_supplies_controller = new PersonalPurchaseSuppliesController();
        return $personal_purchase_supplies_controller->show($personal_sale_id);
    }
}
