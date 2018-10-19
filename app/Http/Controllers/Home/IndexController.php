<?php

namespace App\Http\Controllers\Home;

use App\Model\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redis;

class IndexController extends Controller
{
    public function index(){

        //尝试获取redis中的数据
        $list = Redis::get('list');
        if($list == false){
            $data = Post::all();
            Redis::set('list',serialize($data),60);//60秒后过期，重新获取
            echo '数据库';
        }else{
            $list = unserialize($list);
            echo 'redis中';
        }
        return view('Home.index.index',compact('list'));
    }

    public function view(Post $post)
    {
        return view('Home.index.view',['post'=>$post]);
    }
}
