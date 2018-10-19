<?php

namespace App\Http\Controllers;

use App\Model\Article;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;

class ArticleController extends Controller
{
    public function articleIndex()
    {
        $data = Article::all();
        return view('article.index',['data'=>$data]);
    }

    public function articleAdd()
    {
        //展示添加页面
        return view('article.add');
    }

    public function articleSave(Request $request)
    {
        Article::create([
            'title'=>$request->title,
            'content'=>$request->content
        ]);

        return redirect('article/index');
    }

    public function articleShow(Request $request)
    {
        $data = Article::find($request->id);
        return view('article.show',['data'=>$data]);
    }

    public function articleEdit(Request $request)
    {

        $data = Article::find($request->id);
        return view('article.edit',['data'=>$data]);
    }


    public function articleUpdatee(Request $request)
    {

        Article::where('id', $request->id)->update(['title'=>$request->title,'content'=>$request->content]);
        /*$data = Article::find($request->id);
        $data->title = $request->title;
        $data->content = $request->content;
        $data->save();*/
        return redirect('article/index');
    }

    public function articleDel(Request $request)
    {
        /*$data = Article::find($request->id);
        $data->delete();*/

        Article::destroy([$request->id]);

        //Article::where('id',$request->id)->delete();

        return redirect('article/index');
    }

}
