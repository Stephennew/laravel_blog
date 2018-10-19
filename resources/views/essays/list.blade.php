@extends('layout.default')
@section('contents')
    @include('layout._notice')
    <table class="table">
        <tr>
            <td>ID</td>
            <td>文章标题</td>
            <td>文章作者</td>
            <td>文章内容</td>
            <td>文章分类</td>
            <td>发布时间</td>
            <td>图片</td>
            <td>操作</td>
        </tr>
        @foreach($data as $v)
            <tr>
                <td>{{ $v->id }}</td>
                <td><a href="{{ route('essays.show',[$v]) }}">{{ $v->title }}</a></td>
                <td>{{ $v->author }}</td>
                <td>{{ $v->content }}</td>
                <td>{{ $v->dsa->title }}</td>
                <td>{{ $v->created_at }}</td>
                <td><img class="img-circle" src="{{ \Illuminate\Support\Facades\Storage::url($v->conver)}}" alt=""></td>
                <td>
                    <a href="{{ route('essays.edit',[$v]) }}" class="btn btn-warning">修改</a>
                    <form action="{{ route('essays.destroy',[$v]) }}" method="post">
                        {{method_field('DELETE')}}
                        {{csrf_field()}}
                        <button class="btn btn-danger">删除</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
    {{ $data->links()  }}
@endsection



