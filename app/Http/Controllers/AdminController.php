<?php

namespace App\Http\Controllers;

use App\Model\Admin;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $rows = Admin::all();
        return view('admin.index',compact('rows'));
    }

    public function add()
    {
        return view('admin.add');
    }

    public function save(Request $request)
    {
        //对数据进行验证
        //validate
        /* $this->validate($request,[
             'username'=>'required|min:3|max:20',
             'email'=>'required',
             'tel'=>[
                 'required',
                 'regex:/^1\d{10}$/'
             ],
             'pwd'=>[
                 'required',
                 'regex:/^[a-z A-Z 0-9]{6}$/'
             ]
         ],[//错误信息
             'username.required'=>'用户名不能为空',
             'username.min'=>'用户名最小3位',
             'username.max'=>'用户名最大20位',
             'email.required'=>'邮箱不能为空',
             'tel.required'=>'电话号码不能为空',
             'tel.regex'=>'电话号码不合法',
             'pwd.required'=>'密码不能为空',
             'pwd.regex'=>'密码必须是字母数字下划线组成且6位'
         ]);*/

        $admin = new Admin();
        $admin->username = $request->username;
        $admin->email = $request->email;
        $admin->tel = $request->tel;
        $admin->pwd = $request->pwd;
        $admin->save();

        //session()->flash('success','添加成功');
        return redirect(route('admin/index'));
    }

    public function edit(Admin $admin)
    {
        return view('admin.edit',compact('admin'));
    }

    public function update(Admin $admin,Request $request)
    {
        $this->validate($request,[
            'username'=>'required|min:6|max:20',
            'pwd'=>[
                'required',
                'regex:/^[a-z A-Z 0-9]{6}$/'
            ],
            'email'=>'required',
            'tel'=>[
                'required',
                'regex:/^1\d{10}$/'
            ]
        ],[
            'username.required'=>'用户名不能为空',
            'username.min'=>'用户名最小6位',
            'username.max'=>'用户名最大20位',
            'pwd.required'=>'密码不能为空',
            'pwd.regex'=>'密码只能是字母数字且6位',
            'email.required'=>'邮箱不能为空',
            'tel.required'=>'电话号码不能为空',
            'tel.regex'=>'电话号码不合法'
        ]);
        //Admin::create([数据]);
        //$admin->update($request->input());直接input() 获取所有的数据
        $admin->update([ //可以自定需要更新那些数据
            'username'=>$request->username,
            'pwd'=>$request->pwd,
            'tel'=>$request->tel,
            'email'=>$request->email
        ]);

        session()->flash('success','更新成功');
        return redirect('admin/index');
    }

    public function del(Admin $admin)
    {
        $admin->delete();
        session()->flash('success',$admin->username.'删除成功');
        return redirect('admin/index');
    }
}
