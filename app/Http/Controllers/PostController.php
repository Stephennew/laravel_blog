<?php

namespace App\Http\Controllers;

use App\Model\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;

class PostController extends Controller
{
    //构造函数中使用中间件
    public function __construct()
    {
        //对中间件进行配置，middleware 对需要登录的才能访问的方法做权限验证
        $this->middleware('auth',[
            //除了哪些方法需要验证才可以访问  哪个写的少就写哪一个
            //'except'=>['index'],
            //只对哪些方法需要验证才可以访问
            //'only'=>[],
        ]);
    }
    public function index()
    {
        //验证用户是否登录，登录才可以查看文章列表，未登录的用户不可以查看文章列表
        /*if(Auth::user()==null){
            return redirect()->route('login')->with('danger','请先登录');
        }*/
        $rows = DB::table('post')
            ->join('users','post.authorid','=','users.id')
            ->select('users.name')
            ->get();
        //var_dump($rows);exit;
        $data = Post::paginate('2');
        return view('post.list',compact('data','rows'));
    }

    public function create()
    {
        return view('post.add');
    }

    public function store(Request $request)
    {

        //这里需要获取session中登录的用户，作为文章里面的作者
        Post::create($request->input());
        return redirect()->route('post.index')->with('success','添加成功');
    }

    public function edit(Post $post)
    {
        //很多地放要用的话可以使用授权错略，可以节省很多代码 dry不要重复造轮子，即自己的代码
        $this->authorize('update',$post); //会提示该This action is unauthorized. 该操作未授权
        //在laravel中是通过授权策略来完成的 policy
        if($post->authorid != Auth::user()->id){
            return response('不能修改别人的文章',403);
        }
        return view('post.edit',compact('post'));
    }

    public function update(Request $request,Post $post)
    {
        //var_dump($_POST);exit;
        //Post::create($request->input());

        $post->update($request->input());
        return redirect()->route('post.index')->with('success','修改成功');
    }

    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('post.index')->with('success','删除成功');
    }

    public function show(Request $request,Post $post)
    {

        return view('post.view',compact('post'));
    }

    public function view(Request $request)
    {
        if($request->condition == 'week'){
            DB::connection()->enableQueryLog();//开启查询日志
            $currenttime = date('Y-m-d H:i:s');
            $end = date('Y-m-d H:i:s',strtotime('-1 week'));
           /* DB::select("SELECT date_format(created_at,'%Y-%m-%d') as create_date,
                u.name,pc.cateName,count(p.id) num 
                From post as p 
                JOIN users as u ON p.authorid=u.id 
                JOIN post_cate as pc ON p.postCateid=pc.id 
                WHERE created_at<=:time1 AND created_at>=:time2 
                GROUP BY date_format(created_at,'%Y-%m-%d')
                ORDER BY create_at DESC",['time1'=>$currenttime,'time2'=>$end]);*/
            /*$rows = DB::select("SELECT date_format(created_at,'%Y-%m-%d') as create_date,
                count(created_at) num 
                from post as p
                where created_at >= date(now()) - interval 7 day 
                group by day(created_at)"
            );*/
            $rows = DB::select("SELECT date_format(created_at,'%Y-%m-%d') as create_date,
                count(created_at) num 
                from post as p
                where created_at >= date(now()) - interval 7 day 
                group by date_format(created_at,'%Y-%m-%d')
                ORDER BY created_at DESC "
            );
            var_dump(DB::getQueryLog());exit;
            //var_dump($rows);
        }
    }
}
