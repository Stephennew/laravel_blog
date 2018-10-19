<?php

namespace App\Http\Controllers;

use App\Model\ArticleCate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ArticleCateController extends Controller
{
    public function index()
    {
        $data = ArticleCate::all();
        return view('articlecate.index',compact('data'));
    }

    public function add()
    {
        return view('articlecate.add');
    }

    public function save(Request $request)
    {
       /* $this->validate($request,[
           'title'=>'required|min:6|max:50',
           'desc'=>'required|max:200'
        ],[
        'title.required'=>'新闻标题不能为空',
        'title.min'=>'标题最少6个字',
        'title.max'=>'新闻标题最多50字',
        'desc.required'=>'内容不能为空',
        'desc.max'=>'内容最多200字'
        ]);*/
        $res = DB::insert('insert into article_cates(title,`desc`) VALUES (?,?)',[$request->title,$request->desc]);
        session()->flash('success','添加成功');
        return redirect()->route('articlecate/index');
    }

    public function edit(ArticleCate $articlecate)
    {

        //var_dump($articleCate);exit;
        return view('articlecate.edit',compact('articlecate'));
    }

    public function update(Request $request,ArticleCate $articlecate)
    {
       /* $this->validate($request,[

        ]);*/
       $articlecate->update($request->input());
       return redirect()->route('articlecate/index');
    }

    public function del(Request $request)
    {
        $request->delete();
        return redirect()->route('articlecate/index');
    }

    public function show(ArticleCate $articlecate)
    {
        return view('articlecate.show',compact('articlecate'));
    }
}
