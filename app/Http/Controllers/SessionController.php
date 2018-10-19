<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SessionController extends Controller
{
    //配置中间件middleware
    public function __construct()
    {
        //这个登录页面只有未登录的用户才可访问，已经登录的用户不可以访问
        //用过中间件的判断用户是否登录
        $this->middleware('guest',[
            'only'=>['login']
        ]);
        $this->middleware('auth',[
            'only'=>['destroy']
        ]);
    }
    public function login()
    {
        return view('session.login');
    }

    public function check(Request $request)
    {
            /*$this->validate($request,[
                'name'=>'required',
                'password'=>'required',
                'captcha'=>'required|captcha'
            ]);
            if(Auth::attempt(['name'=>$request->name,'password'=>$request->password],$request->has('remember'))){
                //认证通过跳转到首页
                return redirect()->route('user.index')->with('success','登录成功');
            }else{

                return back()-with('danger','用户或密码错误')->withInput();
            }*/

            $this->validate($request,[
                'name'=>'required',
                'password'=>'required',
                'captcha'=>'required|captcha'
            ]);
            if(Auth::attempt(['name'=>$request->name,'password'=>$request->password],$request->has('remember'))){
                //认证通过跳转到后台首页,当访问某一个需要登录的页面需要登录，登录后跳转到上一次访问的页面使用intended
                //友好的跳转，增加用户体验
                return redirect()->intended(route('post.index'))->with('success','登录成功');
                //return redirect()->route('post.index')->with('success','登录成功');
                //return redirect()->action('PostController@index')->with('success','登录成功');
            }else{
                //回退，并且填写的数据依然在
                return back()->with('danger','用户名或密码错误')->withInput();
            }
    }

    public function destroy()
    {
        Auth::logout();//删除用户的session
        return redirect()->route('login')->with('success','退出成功');
    }
}
