<?php

namespace App\Http\Controllers;

use App\Models\Sale;
use App\Models\M_kids;
use App\Models\M_wf_group;

use Illuminate\Http\Request;

class MailClassConfirmController extends Controller
{
    public function show($sale_id,  Request $request)
    {

        // 販売会
        $sale = Sale::find($sale_id);

        // 対象者
        $class = M_wf_group::find($request->group);

        // 園児一覧
        $wf_year = (new \DateTime('-3 month'))->format('Y');
        $kids = M_wf_group::kids($request->group, $wf_year);

        return view('mail-class-confirm', compact('sale', 'class', 'kids'));
        
    }

    public function send($sale_id, $kid_id, Request $request){

        // 注文情報
        $sale = Sale::find($sale_id);

        // 対象者
        $kid = M_kids::find($kid_id);

        // 対象者メールアドレス
        $mail = $kid->M_kids_care_ledg->M_mail_adr;
        
        // トークン生成
        $TOKEN_LENGTH = 128; // uuidの長さ
        $bytes = openssl_random_pseudo_bytes($TOKEN_LENGTH);
        $token = bin2hex($bytes);

        // トークン保存
        \App\models\Tokens::create(
            [
                'token' => $token,
                'kids_id' => $kid->KIDS_ID
            ]
        );
        
        Mail::send('emails.mail', [
            "Url" => "http://".env('LOCAL_IP')."/Re-Lara/"."s/".$sale_id."/".$token,
            "Text" => "URLにアクセスして購入する商品を入力してください。",
        ], function($message) use ($kid, $mail){
            $message
                ->to('partone.info@gmail.com') // 送信元
                ->bcc($mail->MAIL) // 送信先
                ->subject($kid->KIDS_NM_KJ."さんの用品購入用リンク"); // メールタイトル 
        });
        
        $mail_send_controller = new MailSendController;
        return $mail_send_controller -> show($sale_id);
    }
}
