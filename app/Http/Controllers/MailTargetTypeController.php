<?php

namespace App\Http\Controllers;

use \App\models\Sale;

use Illuminate\Http\Request;

class MailTargetTypeController extends Controller
{
    public function show($sale_id){

        // 販売会
        $sale = Sale::find($sale_id);

        return view('mail-target-type', ['sale'=>$sale]);
        
    }
}
