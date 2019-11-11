<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\Sale;

class SaleMenuController extends Controller
{
    public function show($sale_id){
        \Debugbar::info($sale_id);
        $sale= Sale::find($sale_id);
        return view('sale-menu',['sale'=>$sale]);
    }
}
