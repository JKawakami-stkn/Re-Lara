<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PersonalOrderCheckController extends Controller
{
    public function show(){
        return view('personal-order-check');
    }
}
