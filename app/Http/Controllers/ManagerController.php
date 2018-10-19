<?php

namespace App\Http\Controllers;

use App\Model\Manager;
use Illuminate\Http\Request;
use PHPUnit\Framework\MockObject\Matcher\MethodName;

class ManagerController extends Controller
{
    public function index(Request $request)
    {
        $keywords = $request->keywords?$request->keywords:''; //拿到搜索的字符
        $data = Manager::where(function($query) use($keywords){
            if(!empty($keywords)){
                $query->where('username','like','%'.$keywords.'%');
                    //->orwhere('','like','%'.$keywords.'%');
            }
        })
            ->orderby('id','desc')
            ->paginate(2); //分页
        return view('manager.list',compact('data','keywords'));
    }

    public function create()
    {
        return view('manager.add');
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'captcha'=>'required|captcha',
            'icon'=>'required|image'
        ],[
            'icon.required'=>'图片不能为空',
            'icon.image'=>'图片不合法',
            'captcha.required'=>'验证码不能为空',
            'captcha.captcha'=>'验证码错误'
        ]);
        $path = $request->file('icon')->store('public/manager');
        Manager::create([
            'username'=>$request->username,
            'pwd'=>$request->pwd,
            'icon'=>$path
        ]);
        return redirect()->route('manager.index')->with('success','添加成功');
    }

    public function edit(Manager $manager)
    {
        return view('manager.edit',compact('manager'));
    }

    public function update(Request $request,Manager $manager)
    {
        $this->validate($request,[
            'icon'=>'image'
        ],[
            'icon.image'=>'上传的图片有错'
        ]);
        $data = [
           'username'=>$request->username
        ];
        $f = empty($request->icon)?0:1;
        if($f){
            $data['icon'] = $request->file('icon')->store('public/manager');
        }
        $manager->update($data);
        return redirect()->route('manager.index')->with('success','更新成功');

    }

    public function show(Manager $manager)
    {
        return view('manager.view',compact('manager'));
    }

    public function destroy(Manager $manager)
    {
        $manager->delete();
        return redirect()->route('manager.index')->with('success','删除成功');
    }
}
