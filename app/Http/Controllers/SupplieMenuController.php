<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use App\models\Supplier;
use App\models\Supplie;
use App\models\mkids;
use App\models\Sku;
use App\models\Supplie_division;

class SupplieMenuController extends Controller
{
    public function show($supplier_id, $supplie_id){

        $supplier = Supplier::find($supplier_id);
        $supplie = Supplie::find($supplie_id);
        $sku = Sku::where("supplie_id", $supplie_id)->get();
        $supplie_division = Supplie::where("id", $supplie_id)->get("division_id");
        $division_name = Supplie_division::where("id", $supplie_division[0]["division_id"])->get("division_name");


        return view('supplie-menu', compact('supplier', 'supplie', 'sku', 'supplie_division', 'division_name'));
    }

    public function delete($supplier_id, $supplie_id){

        $supplie = Supplie::find($supplie_id);
        $supplie->delete();
        //SKU削除
        if(!empty(\App\models\Sku::where("supplie_id", $supplie_id)->get("id")->toArray())){

          $delete_id  = \App\models\Sku::where("supplie_id", $supplie_id)->get("id")->toArray();
          $id_v = [];
          foreach($delete_id as $ids){
            foreach ($ids as $id) {
              array_push($id_v, $id);
            }
          }
          // \Debugbar::addMessage(count($id_v));
          for($i = 0; $i < count($id_v); $i++){
            // \Debugbar::addMessage($i);
            $delete = \App\models\Sku::find($id_v[$i]);
            $delete->delete();
          }

        }
        $supplies_controller = new SuppliesController();
        return $supplies_controller->show($supplier_id);

    }
}
