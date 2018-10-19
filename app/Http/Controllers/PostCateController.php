<?php

namespace App\Http\Controllers;

use App\Model\PostCate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PostCateController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth',[
           //除了
            //'except'=>[''];
            //'only'=>[];
        ]);
    }
    public function index()
    {
        $data = PostCate::paginate(1);
        return view('postcate.list',compact('data'));
    }

    public function create()
    {
        return view('postcate.add');
    }

    public function store(Request $request)
    {
        PostCate::create($request->input());
        return redirect()->route('postcate.index')->with('success','添加成功');
    }

    public function edit(PostCate $postcate)
    {
        
        return view('postcate.edit',compact('postcate'));
    }

    public function update(Request $request,PostCate $postcate)
    {
        $postcate->update($request->input());
        //DB::table('post_cate')->where(['id'=>$postcate->id])->update(['cateName'=>$postcate->cateName]);
        return redirect()->route('postcate.index')->with('success','修改成功');
    }

    public function destroy(PostCate $postcate)
    {
        $postcate->delete();
        return redirect()->route('postcate.index')->with('success','删除成功');
    }

}
