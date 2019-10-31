<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Requests\PersonalOrderRequest;

class PersonalOrderRegistrationController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    
    public function show(){
        
        $personal_sales = \App\models\M_wf_group::all();
        
        return view('personal-order-registration');
    }

    public function change(){
        //
    }

    public function store(PersonalOrderRequest $request){

        $request->session()->regenerateToken();
        
        $personal_orders_controller = new PersonalOrdersController();
        return $personal_orders_controller->show();
    }
}
