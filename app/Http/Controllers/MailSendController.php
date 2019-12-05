<?php

namespace App\Http\Controllers;

use \App\models\Sale;

use Illuminate\Http\Request;

class MailSendController extends Controller
{
    public function show($sale_id){

        // 注文情報
        $sale = Sale::find($sale_id);

        return view('mail-send', compact('sale'));
    }
}
