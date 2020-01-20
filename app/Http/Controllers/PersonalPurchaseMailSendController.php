<?php

namespace App\Http\Controllers;

use \App\models\Personal_sale;
use \App\models\M_kids;

use Illuminate\Http\Request;

class PersonalPurchaseMailSendController extends Controller
{
    public function show($personal_sale_id){

        // 個人注文情報
        $personal_sale = Personal_sale::find($personal_sale_id);

        // 対象者
        $kid = M_kids::find($personal_sale->kids_id);

        // 対象者メールアドレス
        $mail = $kid->M_kids_care_ledg->M_mail_adr;

        
        return view('personal-purchase-mail-send', compact('personal_sale', 'kid', 'mail'));
        
    }
}
