<?php

namespace App\Http\Controllers;

use App\Model\ArticleCate;
use App\Model\Wenzhang;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class WenzhangController extends Controller
{
    public function index()
    {
        $cate = ArticleCate::all();
        $arr = [];
        foreach($cate as $v){
            $arr[$v->id] = $v->title;
        }
        $shuju  = DB::table('wenzhangs')
            ->join('article_cates','wenzhangs.cateid','article_cates.id')
            ->select('wenzhangs.cateid','article_cates.title')
            ->get();
        var_dump($shuju);exit;

        $data = Wenzhang::paginate(3);
        return view('wenzhang.index',compact('data','arr'));
    }

    public function add()
    {
        $cate = ArticleCate::all();
        $arr = [];
        foreach ($cate as $v){
            $arr[$v->id] = $v->title;
        }
        //$data = Wenzhang::all();
        return view('wenzhang/add',compact('arr'));
    }


    public function save(Request $request)
    {
        $this->validate($request,[
           'title'=>'required|max:50',
            'content'=>'required|max:150',
            'cateid'=>'required',
            'author'=>'required|max:50'
        ],[
            'title.required'=>'新闻标题不能为空',
            'title.max'=>'新闻标题最多50字',
            'content.required'=>'新闻内容不能为空',
            'content.max'=>'新闻内容最多150字',
            'cateid.required'=>'分类不能为空',
            'author.required'=>'作者不能为空',
            'author.max'=>'作者超出指定长度'
        ]);
        Wenzhang::create($request->input());
        //session()->flash('success','添加数据成功');
        session()->flash('success','用户添加成功');
        return redirect(route('wenzhang/index'));
    }
    
    public function edit(Wenzhang $wenzhang,Request $request)
    {
        $this->validate($request,[
            'title'=>'required|max:50',
            'content'=>'required|max:150',
            'cateid'=>'required',
            'author'=>'required|max:50'
        ],[
            'title.required'=>'新闻标题不能为空',
            'title.max'=>'新闻标题最多50字',
            'content.required'=>'新闻内容不能为空',
            'content.max'=>'新闻内容最多150字',
            'cateid.required'=>'分类不能为空',
            'author.required'=>'作者不能为空',
            'author.max'=>'作者超出指定长度'
        ]);
        session()->flash('success','修改成功');
        return view('wenzhang.edit',compact('wenzhang'));
    }

    
    public function update(Request $request,Wenzhang $wenzhang)
    {
        $wenzhang->update($request->input());
        return redirect()->route('wenzhang/index');
    }

    public function del(Wenzhang $wenzhang,Request $request)
    {
        session()->flash('success',$request->author.'删除成功');
        $wenzhang->delete();
        return redirect()->route('wenzhang/index');
    }

    public function show(Wenzhang $wenzhang)
    {
        return view('wenzhang.show',compact('wenzhang'));
    }

    public function num(Wenzhang $wenzhang,Request $request)
    {
        $rows = DB::table('wenzhangs')->get();
        if($request->d === 'day')
        {
            $start = date('Y-m-d:00:00:00',time());
            $end = date('Y-m-d:23:59:59',time());
            $sum = DB::select("select count(*) as `sum`  from wenzhangs where created_at>='{$start}' AND created_at<='{$end}'");
            $sum = $sum[0]->sum;
            /*$currentday = [];
            $sum=0;
            foreach($rows as $key => $v){
                if(date('Y-m-d',strtotime($v->created_at)) == $time){
                $currentday[$key] = $v;
                $sum++;
                }
            }*/
            return view('wenzhang.tian',['da0y'=>$sum]);

        }
        if($request->d === 'month'){

            //DB::connection()->enableQueryLog();  // 开启QueryLog
            $start = date('Y-m-01 00:00:00',time());
            $end = date('Y-m-d H:i:s',time());
            $sum = DB::select("select count(*) as `sum` from wenzhangs where created_at>='{$start}' AND created_at<='{$end}'");

            //$log = DB::getQueryLog();
            //var_dump($log);exit;
            $sum = $sum[0]->sum;
            /*$currentmonth = [];
            $sum = 0;
            foreach ($rows as $key => $v){
                if(date('Y-m',strtotime($v->created_at) == $time)){
                    $currentmonth[$key] = $v;
                    $sum++;
                }
            }*/
            return view('wenzhang.yue',['month'=>$sum]);
        }
        if($request->d === 'area'){
            //$rows = DB::table('wenzhangs')->whereBetween('created_at',)->get();
            //strtotime($request->start);
            $start = date('Y-m-d',strtotime($request->start));
            $end = date('Y-m-d',strtotime($request->end));
            $sum = DB::select("select count(*) as `sum` from wenzhangs where created_at >='{$start}' AND created_at<='{$end}'");
            $sum = $sum[0]->sum;
            /*$start = strtotime($request->start);
            $end = strtotime($request->end);
            $area = [];
            $sum = 0;
            foreach ($rows as $key => $v){
                $s = strtotime($v->created_at);
                if($s>=$start && $s<=$end){
                    $sum++;
                    $area[$key]  = $v;
                }
            }*/
            return view('wenzhang.area',compact('start','end','sum'));
        }

    }
}
