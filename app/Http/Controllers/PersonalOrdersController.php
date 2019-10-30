<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PersonalOrdersController extends Controller
{

    public function show(){
        return view('personal-orders');
    }

}