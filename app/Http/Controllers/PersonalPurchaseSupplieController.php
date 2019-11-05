<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PersonalPurchaseSupplieController extends Controller
{
    public function show($personal_sale_id, $supplie_id){

        $supplie = \App\models\Supplie::find($supplie_id);
        $personal_sale = \App\models\Personal_sale::find($personal_sale_id);
        $personal_order = \App\models\Personal_order::where('personal_sale_id', $personal_sale_id)->where('supplie_id', $supplie_id)->get();

        return view('personal-purchase-supplie', ['supplie' => $supplie, 'personal_sale' => $personal_sale, 'personal_order' => $personal_order]);
    }

    public function store($personal_sale_id, $supplie_id, Request $request)
    {
        $request->session()->regenerateToken();

        \Debugbar::info( empty($request->personal_order_id) );

        // 登録
        if(empty($request->personal_order_id)){

            $personal_order = \App\models\Personal_order::create([
                'personal_sale_id' => $personal_sale_id,
                'supplie_id' => $supplie_id,
                'sku_id' => 0, // TODO : sku対応
                'quantity' =>  $request->quantity,
            ]);
        // 編集
        }else{
            $personal_order =\App\models\Personal_order::find($request->personal_order_id);
            $personal_order->sku_id = 0; // TODO : sku対応
            $personal_order->quantity = $request->quantity;
            $personal_order->save();
        }

        $personal_purchase_supplies_controller = new PersonalPurchaseSuppliesController();
        return $personal_purchase_supplies_controller->show($personal_sale_id);
    }
}
