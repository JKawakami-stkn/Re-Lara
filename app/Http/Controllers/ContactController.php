<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactController extends Controller
{
     public function show() {
        return view('contact');
    }

    public function ajax() {
        // データ取得処理
        return response()->json(['result' => true]);
        //return view('contact');
    }
}
