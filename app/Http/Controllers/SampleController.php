<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class SampleController extends Controller
{

    public function show()
    {
        // 販売会とユーザーを識別するのためのトークン生成
        $TOKEN_LENGTH = 32;//16*2=32バイト
        $bytes = openssl_random_pseudo_bytes($TOKEN_LENGTH);
        $token = bin2hex($bytes);

        // Mail::sendで送信できる.
        // 第1引数に、テンプレートファイルのパスを指定し、
        // 第2引数に、テンプレートファイルで使うデータを指定する
        Mail::send('emails.user_register', [
            "actionUrl" => "http://localhost/Re-Lara/home",
            "actionText" => $token,
        ], function($message) {

            // 第3引数にはコールバック関数を指定し、
            // その中で、送信先やタイトルの指定を行う.
            $message
                ->to('laravel@gmail.com') // 送信元
                ->bcc('j.kawakami.sotuken@gmail.com') // 送信先
                ->subject("(販売会名)の用品購入用URLです"); // メールタイトル 
        });

        return view('sample');
    }
}
