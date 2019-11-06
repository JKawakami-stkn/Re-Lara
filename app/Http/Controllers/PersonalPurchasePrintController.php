<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PersonalPurchasePrintController extends Controller
{
    public function show(){

        return view('personal-purchase-print');
    }
}
