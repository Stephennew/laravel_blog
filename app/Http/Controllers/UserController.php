<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function create()
    {
        return view('user.add');
    }

    public function store(Request $request)
    {
        /*$user = new User();
        $user->name = $request->name;
        $user->password = bcrypt($request->password);
        $user->remember_token = str_random(50); //自动登录相关，随机字符串
        $user->save();
        return redirect()->route('login')->with('success','注册成功');*/
        //return redirect()->action('SessionController@login')->with('success','注册成功');
        $this->validate($request,[
            'name'=>'required',
            'password'=>'required',
            'email'=>'required',
            'icon'=>'required|image',
            'captcha'=>'required|captcha'
        ]);
        //var_dump($_POST);exit;
        $path = $request->file('icon')->store('/public/user');
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password); //对密码进行加密
        $user->remember_token = str_random(50);//生成一个随机字符串 该随机字符串用来做自动登录使用
        $user->icon = $path;
        $user->save();
        SmailController::send();//注册成功发送邮件
        return redirect()->route('login')->with('success','注册成功');
    }

    public function index()
    {
        $user = Auth::user();//从session中获取用户的登录信息
        return view('user.index',compact('user'));

    }

    public function edit()
    {
        
    }

    public function update()
    {
        
    }

    public function destroy()
    {
        
    }

    public function show()
    {

    }

}
