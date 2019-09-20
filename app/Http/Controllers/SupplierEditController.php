<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use \App\models\Supplier;
use App\Http\Requests\SupplierRequest;

class SupplierEditController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

     public function show($supplier_id)
    {
        $supplier =Supplier::find($supplier_id);

        return view('supplier-edit', ['supplier' => $supplier]);
    }
    

    public function edit(SupplierRequest $request, $supplier_id)
    {

        $supplier = Supplier::find($supplier_id);

        \Debugbar::info($supplier);
        $supplier->name = $request->name;
        $supplier->person_charge = $request->person_charge;
        $supplier->phone_number = $request->phone_number_1.$request->phone_number_2;
        $supplier->postal_code = $request->postal_code;
        $supplier->street_address_1 =  $request->street_address_1;
        $supplier->street_address_2 = $request->street_address_2;
        $supplier->street_address_3 = $request->street_address_3;
        $supplier->save();

        $suppliers_controller = new SuppliersController();
        return $suppliers_controller->show();

    }
}
