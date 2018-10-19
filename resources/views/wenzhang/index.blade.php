@extends('layout.default')
@section('contents')
    @include('layout._notice')
    <h1>文章列表</h1>
    <a href="{{ route('wenzhang/add') }}" class="btn btn-info">添加数据</a>
    <a href="{{ route('wenzhang/num',['d'=>'day']) }}">今天文章数</a>
    <a href="{{ route('wenzhang/num',['d'=>'month']) }}">当月文章数</a>
    <div>
        <form action="{{ route('wenzhang/num') }}" method="get">
           <div class="form-group">
               <input type="hidden" name="d" value="area">
               <label for="">起始日期</label>
               <input type="date" name="start" class="form-control">
               <label for="">结束日期</label>
               <input type="date" name="end" class="form-control">
           </div>
            <button class="btn btn-info">查询</button>

        </form>
    </div>
    <table class="table">
        <tr>
            <td>ID</td>
            <td>新闻标题</td>
            <td>新闻内容</td>
            <td>新闻分类</td>
            <td>作者</td>
            <td>新闻发布时间</td>
            <td>新闻更新时间</td>
            <td>操作</td>
        </tr>
        @foreach($data as $v)
            <tr>
               <td>{{$v->id}}</td>
               <td><a href="{{ route('wenzhang/show',[$v]) }}">{{$v->title}}</a></td>
               <td>{{$v->content}}</td>
                <td>{{$arr[$v->cateid]}}</td>
               <td>{{$v->author}}</td>
               <td>{{$v->created_at}}</td>
               <td>{{$v->updated_at}}</td>
                <td>
                    <a href="{{ route('wenzhang/edit',[$v]) }}" class="btn btn-warning btn-xs">修改</a>
                    <a href="{{ route('wenzhang/del',[$v]) }}" class="btn btn-danger btn-xs">删除</a>
                </td>
            </tr>
        @endforeach
    </table>
    {{$data->links()}}
@endsection

