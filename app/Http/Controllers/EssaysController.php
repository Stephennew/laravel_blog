<?php

namespace App\Http\Controllers;

use App\Model\Essays;
use Illuminate\Http\Request;

class EssaysController extends Controller
{
    public function index()
    {
        $data = Essays::paginate(3);
        return view('essays.list',compact('data'));
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'conver'=>'required|file'
        ],[
           'conver.required'=>'必须上传图片'
        ]);
        //获取上传的图片，并保存
        $path = $request->file('conver')->store('public/essays');


        session()->flash('success','添加成功');
        Essays::create([
            'title'=>$request->title,
            'content'=>$request->input('content'),
            'author'=>$request->author,
            'cateid'=>$request->cateid,
            'conver'=>$path
        ]);

        return redirect(route('essays.index'));

    }

    public function create()
    {
        return view('essays.create');
    }

    public function destroy(Request $request,Essays $essay)
    {
        $essay->delete();
        return redirect()->route('essays.index')->with('succuess','删除成功');
    }

    public function update(Request $request)
    {
        Essays::create($request->input());
        return redirect()->route('essays.index')->with('success','更新成功');
    }

    public function show(Request $request,Essays $essay)
    {
        return view('essays.view',compact('essay'));
    }

    public function edit(Essays $essay)
    {
        return view('essays.xiu',compact('essay'));
    }
}
