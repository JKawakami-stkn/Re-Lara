<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\SupplieRequest;

class SupplieRegistrationController extends Controller
{

    public function __construct(){
        $this->middleware('auth');
    }

     public function show($supplier_id)
    {
        $supplier = \App\models\Supplier::find($supplier_id);

        return view('supplie-registration', ['supplier' => $supplier]);
    }
    

    public function store($supplier_id, SupplieRequest $request)
    {

        $request->session()->regenerateToken();

        \Debugbar::info($request);


        DB::table('supplies')->insert(
            [
                'name' => $request->name,
                'supplier_id' => $supplier_id,
                'price' => $request->name,
            ]
        );

        $supplies_controller = new SuppliesController();
        return  $supplies_controller->show();

    }

}
