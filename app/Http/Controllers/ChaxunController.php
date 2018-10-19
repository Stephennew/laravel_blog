<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ChaxunController extends Controller
{
    public function index()
    {
        //链表查询
        /*$rows = DB::table('chaxuns')
            ->join('post_cate','chaxuns.product_cate','=','post_cate.id')
            ->select('chaxuns.*','post_cate.cateName')
            ->get();
        foreach ($rows as $v)
        {
           foreach ($v as $a)
           {
               echo $str = '<table border="1px">';
               echo '<td>'.$a.'</td>';
               echo $str.='</table>';
           }
        }*/

        //获取一张表的所有数据
        /*$rows = DB::table('chaxuns')->get();
        foreach($rows as $row)
        {
            echo $row->product_name;
        }*/

        //从表中获取一行 first()
        $rows = DB::table('chaxuns')->where('product_name','嘻嘻')->get(); //获取满足条件的所有数据
        $rows = DB::table('chaxuns')->where('product_name','嘻嘻')->first();//从满足条件的结果集中获取一行
        //从表中获取一列 value()
        $rows = DB::table('chaxuns')->where('product_name','嘻嘻')->value('product_name');

        //获取数据列 值列表

        $rows = DB::table('chaxuns')->where('product_name','嘻嘻')->pluck('product_name');

        //可以给该值列表指定一个键名，但是必须是该表中的其他字段名，某则报错
        $rows = DB::table('chaxuns')->where('product_name','嘻嘻')->pluck('product_name','product_sn');
        //组块结果集  //处理数据量非常大的情况下
        /*$rows = DB::table('chaxuns')->orderBy('id','desc')->chunk(3,function ($chaxuns){
                foreach ($chaxuns as $v)
                {
                    foreach ($v as $a)
                    {
                        echo $a.'<br/>';
                    }
                }
                echo '____________________________________3条';
        });*/
        //可以同通过返回false 来终止chunk() 执行
        /*$rows = DB::table('chaxuns')->orderBy('id','desc')->chunk(3,function ($chaxuns){
            foreach ($chaxuns as $v)
            {
                foreach ($v as $a)
                {
                    echo $a.'<br/>';
                    return false;
                }
            }

        });*/

        //聚合函数max min avg count sum
        $rows = DB::table('chaxuns')->count(); __LINE__; //直接返回统计后的记过集条数

        $rows = DB::table('chaxuns')->min('product_num');
        $rows = DB::table('chaxuns')->max('product_num');

        $rows = DB::table('chaxuns')->avg('product_num');//可以直接统计某个字段内所有数据的平均值


        //判断记录是否存在  exists   doesntExists
        $rows = DB::table('chaxuns')->where('product_num',50)->exists();
        $rows =DB::table('chaxuns')->where('id',1)->doesntExist();

        // select 子句
        //获取指定字段的值
        $rows  = DB::table('chaxuns')->select('id','product_num')->get();
        //distinct 强制查询返回不重复的值
        $rows = DB::table('chaxuns')->distinct()->select('product_num')->get();
        //如果已经有一个查询构建起实例，但是需要在添加一个字段，可以使用 addSelect()增加列
        $rows =DB::table('chaxuns')->select('id');
        $rows = $rows->addSelect('product_sn')->get();

        //原生表达式
        //原生语句会以字符串的形式注入查询，所以这里尤其要注意避免 SQL 注入攻击。

        $rows = DB::table('chaxuns')->select(DB::raw("count(*) as sum"))->get();

        $rows = DB::table('chaxuns')->selectRaw('? * product_num as num',[2])->get();

        $rows =DB::table('chaxuns')->whereRaw('product_num = ?',[20])->first();
        $rows =DB::table('chaxuns')->whereRaw('product_num =?',[20])->orWhereRaw('product_status = ?',[1])->pluck('product_num');


        $rows = DB::table('chaxuns')->whereRaw('id = ?',[1])->get();

        //$rows =DB::table('chaxuns')->selectRaw('*')->groupBy('product_name')->havingRaw('product_num = ?',[20])->get();

        $rows =DB::table('chaxuns')->orderByRaw('id DESC')->get();

        //$rows = DB::table('chaxuns')->selectRaw('*')->orderByRaw('id DESC')->havingRaw('product_num > ?',[20])->get();


        $rows =DB::table('chaxuns')
            ->join('post_cate','chaxuns.product_cate','=','post_cate.id')
            ->join('users','chaxuns.product_sn','=','users.id')
            ->select('chaxuns.id','chaxuns.product_name','post_cate.cateName','users.name')
            ->get();

        $rows =DB::table('chaxuns')
            ->leftJoin('post_cate','chaxuns.product_cate','=','post_cate.id')
            ->select('chaxuns.id','chaxuns.product_name','post_cate.cateName')
            ->get();

        //交叉连接，生成一个笛卡尔乘积
        $rows =DB::table('chaxuns')
            ->crossJoin('post_cate')
            ->select('chaxuns.id','chaxuns.product_name','post_cate.cateName')
            ->get();


        /*高级连接语句 高级连接语句
你还可以指定更多的高级连接子句，传递一个闭包到  join 方法作为第二个参数，该闭包将会接收一个  JoinClause 对象用于指定  join 子句约束：*/
        $rows =DB::table('chaxuns')
            ->join('post_cate',function ($join){
                //可以接多个条件  orOn()
                $join->on('chaxuns.product_cate','=','post_cate.id');
            })
            ->select('chaxuns.id','post_cate.cateName')
            ->get();

        $rows = DB::table('chaxuns')
            ->join('post_cate',function ($join){
                $join->on('chaxuns.product_cate','=','post_cate.id')
                    ->where('post_cate.id','=','1');
            })
            ->select('chaxuns.id','chaxuns.product_name','post_cate.cateName')
            ->get();




        //union  联合查询
        $first =DB::table('chaxuns')
            ->whereNull('product_num');
        $rows = DB::table('chaxuns')
            ->whereNull('product_status')  //字段内容为空null 满足条件
            ->union($first)
            ->get();

        //where 条件
        $rows = DB::table('chaxuns')->where('product_num','!=','20')->get();

        $rows  =DB::table('chaxuns')->where('product_num','20')->get(); //简单的两个值相比较

        $rows =DB::table('chaxuns')->where('product_name','like','_女')->get();

        $rows =DB::table('chaxuns')->where([['product_num','=','20'],['product_cate','=','1']])->get();

        $rows =DB::table('chaxuns')->where('product_num',20)->orWhere('product_sn',2)->get();
        //whereBetween 两者之间
        $rows = DB::table('chaxuns')->whereBetween('product_num',[1,50])->get();
        $rows =DB::table('chaxuns')->whereNotBetween('product_num',[20,50])->get();

        $rows = DB::table('chaxuns')->whereIn('product_num',[20,50])->get();

        $rows = DB::table('chaxuns')->whereNotIn('product_num',[20,50])->get();

        $rows =DB::table('chaxuns')->whereNull('product_status')->get();

        $rows =DB::table('chaxuns')->whereNotNull('product_status')->get();

        $rows =DB::table('chaxuns')->whereDate('created_at','2018-10-19')->get();
        var_dump($rows);
    }
}
