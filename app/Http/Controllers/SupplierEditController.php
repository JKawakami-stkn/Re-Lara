<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\SupplierRequest;

class SupplierEditController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

     public function show()
    {
       //
    }
    

    public function edit(SupplierRequest $request)
    {
        //
    }
}
