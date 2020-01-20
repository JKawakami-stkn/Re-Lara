<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Supplier;

class SuppliersController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

     public function show()
    {   
        $suppliers_data = Supplier::all();
        
        return view('suppliers', ['suppliers_data' => $suppliers_data]);
    }

}
