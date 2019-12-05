<?php

namespace App\Http\Controllers;

use App\models\Sale;
use App\models\M_wf_group;
use App\models\M_kids;

use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;

class MailAllConfirmController extends Controller
{
    public function show($sale_id)
    {

        // 販売会
        $sale = Sale::find($sale_id);

        // 対象組
        $class = Sale::get_sale_m_wf_group($sale_id);

        
        // 園児一覧
        $kids_data = array();
        foreach($class as $c){

            $wf_year = (new \DateTime('-3 month'))->format('Y');
            $kids = M_wf_group::kids($c->GP_CD, $wf_year);

            // メールアドレス
            $m_kids = array();
            foreach($kids as $kid){
                $m_kid = M_kids::find($kid->KIDS_ID);
                $m_kids[$kid->KIDS_NM_KJ] = $m_kid->M_kids_care_ledg->M_mail_adr->MAIL;
            }

            $kids_data[$c->GP_CD] = $m_kids;

        }

        return view('mail-all-confirm', compact('sale', 'class', 'kids_data'));
        
    }

    public function send($sale_id, Request $request){

        // 対象組
        $class = Sale::get_sale_m_wf_group($sale_id);

        // 園児一覧
        $kids_data = array();

        foreach($class as $c){

            


        }

        foreach($class as $c){
            $wf_year = (new \DateTime('-3 month'))->format('Y');
            $kids = M_wf_group::kids($c->GP_CD, $wf_year);

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
                    "Url" => "http://".env('LOCAL_IP')."/Re-Lara/"."s/".$sale_id."/".$token,
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
        }
        
        $mail_send_controller = new MailSendController;
        return $mail_send_controller -> show($sale_id);
    }
}
