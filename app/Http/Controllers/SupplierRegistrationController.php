<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SupplierRegistrationController extends Controller
{

    public function __construct(){
        $this->middleware('auth');
    }

     public function show()
    {
        return view('supplier-registration');
    }
    

    public function store(Request $request)
    {
        \Debugbar::info($request);
        $request->session()->regenerateToken();

        DB::table('suppliers')->insert(
            [
                'name' => $request->name,
                'person_charge' => $request->person_charge,
                'phone_number' => $request->phone_number_1.$request->phone_number_2,
                'postal_code' => $request->postal_code,
                'street_address_1' => $request->street_address_1,
                'street_address_2' => $request->street_address_2,
                'street_address_3' => $request->street_address_3
            ]
        );


        return view('suppliers');

    }

}
