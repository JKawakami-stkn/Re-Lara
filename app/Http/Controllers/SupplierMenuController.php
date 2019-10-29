<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\Supplier;

class SupplierMenuController extends Controller
{
    public function show($supplierid){
        $supplier = \App\models\Supplier::find($supplierid);
        return view('supplier-menu', ["supplier" => $supplier]);
    }

    public function delete($supplierid){
        $supplier = \App\models\Supplier::find($supplierid);
        $supplier->delete();
        $suppliers_controller =new SuppliersController;
        return $suppliers_controller -> show();
    }
}
