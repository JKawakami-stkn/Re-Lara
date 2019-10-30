<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use App\models\Supplier;
use App\models\Supplie;
use App\models\mkids;

class SupplieMenuController extends Controller
{
    public function show($supplier_id, $supplie_id){
        $supplier = Supplier::find($supplier_id);
        $supplie = Supplie::find($supplie_id);
        \Debugbar::info(mkids::all());
        return view('supplie-menu', compact('supplier', 'supplie'));
    }

    public function delete($supplier_id, $supplie_id){

        $supplie = Supplie::find($supplie_id);
        $supplie->delete();
        \Debugbar::info($supplie);
        
        $supplies_controller = new SuppliesController();
        return $supplies_controller->show($supplier_id);

    }
}
