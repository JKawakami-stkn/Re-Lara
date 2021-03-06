<?php

namespace App\Http\Controllers;

use App\Models\Sale;
use App\Models\M_kids;
use App\Models\M_wf_group;

use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;

class MailClassConfirmController extends Controller
{
    public function show($sale_id,  Request $request)
    {

        // 販売会
        $sale = Sale::find($sale_id);

        // 対象組
        $class = M_wf_group::find($request->group);

        // 園児一覧
        $wf_year = (new \DateTime('-3 month'))->format('Y');
        $kids = M_wf_group::kids($request->group, $wf_year);

        // メールアドレス
        $m_kids = array();
        foreach($kids as $kid){
            $m_kid = M_kids::find($kid->KIDS_ID);
            $m_kids[$kid->KIDS_NM_KJ] = $m_kid->M_kids_care_ledg->M_mail_adr->MAIL;
        }

        \Debugbar::info($m_kids);

        return view('mail-class-confirm', compact('sale', 'class', 'm_kids'));
        
    }

    public function send($sale_id, $class_id, Request $request){

        // 注文情報
        $sale = Sale::find($sale_id);

        // 園児一覧
        $wf_year = (new \DateTime('-3 month'))->format('Y');
        $kids = M_wf_group::kids($class_id, $wf_year);

        
        
        foreach($kids as $kid){

            // 対象園児
            $m_kid = M_kids::find($kid->KIDS_ID);

            // 対象園児メールアドレス
            $mail = $m_kid->M_kids_care_ledg->M_mail_adr->MAIL;

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
            
            \Debugbar::info($m_kid);
        
            Mail::send('emails.mail', [
                "Url" => "http://".env('LOCAL_IP')."/".env('PROJECT_NAME')."/s/".$sale_id."/".$token,
                "Text" => "URLにアクセスして購入する商品を入力してください。",
            ], function($message) use ($m_kid, $mail){
                $message
                    ->to('partone.info@gmail.com') // 送信元
                    ->bcc($mail) // 送信先
                    ->subject($m_kid->KIDS_NM_KJ."さんの用品購入用リンク"); // メールタイトル 
            });
            
            // メールサーバーによる制限
            sleep(5);
        
        }
        
        $mail_send_controller = new MailSendController;
        return $mail_send_controller -> show($sale_id);
    }
}
