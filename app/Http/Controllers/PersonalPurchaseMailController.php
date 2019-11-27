<?php

namespace App\Http\Controllers;

use \App\models\Personal_sale;
use \App\models\M_kids;

use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;

class PersonalPurchaseMailController extends Controller
{
    public function show($personal_sale_id){

        // 個人注文情報
        $personal_sale = Personal_sale::find($personal_sale_id);

        // 対象者
        $kid = M_kids::find($personal_sale->kids_id);

        // 対象者メールアドレス
        $mail = $kid->M_kids_care_ledg->M_mail_adr;

        return view('personal-purchase-mail', compact('personal_sale', 'kid', 'mail'));
    }


    public function send($personal_sale_id,  Request $request){

        // 個人注文情報
        $personal_sale = Personal_sale::find($personal_sale_id);

        // 対象者
        $kid = M_kids::find($personal_sale->kids_id);

        // 対象者メールアドレス
        $mail = $kid->M_kids_care_ledg->M_mail_adr;
        
        // メール送信
        $TOKEN_LENGTH = 124; // uuidの長さ
        $bytes = openssl_random_pseudo_bytes($TOKEN_LENGTH);
        $token = bin2hex($bytes);
        
        Mail::send('emails.mail', [
            "Url" => "http://".env('LOCAL_IP')."/Re-Lara/".$token."/ps/".$personal_sale_id,
            "Text" => "URLにアクセスして購入する商品を入力してください。",
        ], function($message) use ($kid, $mail){
            $message
                ->to('partone.info@gmail.com') // 送信元
                ->bcc($mail->MAIL) // 送信先
                ->subject($kid->KIDS_NM_KJ."さんの用品購入用リンク"); // メールタイトル 
        });
        

        $personal_purchase_mail_send_controller = new PersonalPurchaseMailSendController;
        return $personal_purchase_mail_send_controller -> show($personal_sale_id);

        return $mail;
    }
}
