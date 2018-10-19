@extends('layout.default')
@section('contents')
    <h1>后台</h1>
    <a href="{{ route('num.view',['condition'=>'week']) }}">获取最近一周每人每天的发布文章</a>
    @include('layout._notice')
    <table class="table table-bordered">
        <tr>
            <td>ID</td>
            <td>文章标题</td>
            <td>文章内容</td>
            <td>文章分类</td>
            <td>文章作者</td>
            <td>文章发布时间</td>
            <td>操作</td>
        </tr>
        @foreach($data as $v)
            <tr>
                <td>{{ $v->id }}</td>
                <td><a href="{{ route('post.show',[$v]) }}">{{ $v->title }}</a></td>
                <td>{{ $v->content }}</td>
                <td>{{ $v->fenlei['cateName'] }}</td>
                {{--<td>{{ $v->zuozhe['name'] }}</td>--}}
                @foreach($rows as $n)
                    <td>{{ $n->name }}</td>
                @endforeach
                <td>{{ $v->created_at }}</td>
                <td>
                    <a href="{{ route('post.edit',[$v]) }}" class="btn btn-warning">修改</a>
                    <form action="{{route('post.destroy',[$v])}}" method="post" enctype="multipart/form-data">
                        {{ csrf_field()  }}
                        {{ method_field('DELETE') }}
                        <button class="btn btn-danger">删除</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
    {{ $data->links() }}
@endsection


