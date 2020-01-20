<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SuppliesController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

     public function show($supplier_id)
    {

        $supplier = \App\models\Supplier::find($supplier_id);
        $supplies = \App\models\Supplier::find($supplier_id)->supplies;

        return view('supplies', ['supplies' => $supplies, 'supplier' => $supplier]);
    }
}
