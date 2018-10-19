@extends('layout.default')
@section('contents')
    <table class="table">
        <tr>
            <td>ID</td>
            <td>title</td>
            <td>content</td>
            <td>create_at</td>
            <td>update_at</td>
            <td>操作</td>
        </tr>
        @foreach($data as $v)
            <tr class="active">
                <td>{{$v->id}}</td>
                <td><a href="{{route('show',['id'=>$v->id])}}">{{$v->title}}</a></td>
                <td><a href="{{ route('show',['id'=>$v->id]) }}">{{$v->content}}</a></td>
                <td>{{$v->created_at}}</td>
                <td>{{$v->updated_at}}</td>
                <td>
                    <a href="{{ route('edit',['id'=>$v->id]) }}" class="btn btn-warning">修改</a>  |
                    <a href="{{ route('del',['id'=>$v->id]) }}" class="btn btn-danger">删除</a>
                </td>
            </tr>

        @endforeach
        <a href="{{ 'add' }}" class="btn btn-info">添加数据</a>
    </table>
@endsection





