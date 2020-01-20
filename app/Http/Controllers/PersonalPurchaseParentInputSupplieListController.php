<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PersonalPurchaseParentInputSupplieListController extends Controller
{
    public function show($personal_sale_id, $token){

        // 対象ユーザーを絞り込み
        $kids_id = \App\models\Tokens::where('token', $token)->get('kids_id');
        $kid = \App\models\M_kids::find($kids_id);

        $supplies = \App\models\Supplie::all();
        $personal_sale = \App\models\Personal_sale::find($personal_sale_id);

        return view('personal-purchase-parent-input-supplie-list', compact('token', 'supplies', 'personal_sale'));
    }
}
