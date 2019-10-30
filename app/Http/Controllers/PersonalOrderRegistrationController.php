<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\PersonalOrderRequest;

class PersonalOrderRegistrationController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    
    public function show(){
        return view('personal-order-registration');
    }

    public function store(PersonalOrderRequest $request){

        $request->session()->regenerateToken();
        
        $personal_orders_controller = new PersonalOrdersController();
        return $personal_orders_controller->show();
    }
}
