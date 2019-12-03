<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\SupplierRequest;

class SupplierRegistrationController extends Controller
{

    public function __construct(){
        $this->middleware('auth');
    }

     public function show()
    {
        return view('supplier-registration');
    }
    

    public function store(SupplierRequest $request)
    {
        
        $request->session()->regenerateToken();

        $postal_code = substr($request->postal_code,0,3) . "-" . substr($request->postal_code,3);

        DB::table('suppliers')->insert(
            [
                'name' => $request->name,
                'person_charge' => $request->person_charge,
                'phone_number' => $request->phone_number_1."-".$request->phone_number_2."-".$request->phone_number_3,
                'postal_code' => $postal_code,
                'street_address_1' => $request->street_address_1,
                'street_address_2' => $request->street_address_2,
                'street_address_3' => $request->street_address_3,
            ]
        );

        $suppliers_controller = new SuppliersController();
        return  $suppliers_controller -> show();

    }

}
