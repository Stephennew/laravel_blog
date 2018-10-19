<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class SmailController extends Controller
{
    static public function send()
    {
        Mail::raw('恭喜注册成功',function ($message){
            $message->subject('提示激活邮件');
            $message->to('myvtcyahoo@163.com');
        });
    }

    /*static public function send()
    {
        $data = ['email'=>$email, 'name'=>$name, 'uid'=>$uid, 'activationcode'=>$code];
        Mail::send('activemail', $data, function($message) use($data)
        {
            $message->to($data['email'], $data['name'])->subject('欢迎注册我们的网站，请激活您的账号！');
        });
    }*/
}
