<?php

namespace App\Http\Controllers;

use App\Model\Goods;
use Illuminate\Http\Request;

class GoodsController extends Controller
{
    public function index()
    {
        $data = Goods::paginate(1);
        return view('goods.list',compact('data'));
        
    }

    public function create()
    {
        return view('goods.add');
    }
    
    public function store(Request $request)
    {
        $this->validate($request,[
           'captcha'=>'required|captcha'
        ],[
            'captcha.required'=>'验证码不能为空',
            'captcha.captcha'=>'验证不正确'
        ]);
        $path = $request->file('conver')->store('public/goods');
        Goods::create([
            'goodsname'=>$request->goodsname,
            'sn'=>$request->sn,
            'num'=>$request->num,
            'conver'=>$path
        ]);
        return redirect()->route('goods.index')->with('success','添加成功');
    }

    public function edit(Goods $good)
    {
        return view('goods.edit',compact('good'));
    }

    public function update(Request $request,Goods $good)
    {
        //$path = $request->file('conver')->store('public/goods');
        Goods::create([
            'goodsname'=>$request->goodsname,
            'sn'=>$request->sn,
            'num'=>$request->num,
            //'conver'=>$path
        ]);
        return redirect()->route('goods.index')->with('success','修改成功');
    }

    public function show(Request $request,Goods $good)
    {
        return view('goods.view',compact('good'));
    }

    public function destroy(Goods $good)
    {
        $good->delete();
        return redirect()->route('goods.index')->with('success','删除成功');
    }
}

