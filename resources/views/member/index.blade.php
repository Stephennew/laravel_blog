@extends('layout.default')
@section('contents')
    <table class="table table-bordered">
        <tr>
            <td>ID</td>
            <td>name</td>
            <td>telphone</td>
            <td>email</td>
            <td>brithday</td>
            <td>signatrue</td>
            <td>intro</td>
            <td>created_at</td>
            <td>updated_at</td>
            <td>操作</td>
        </tr>
        @foreach($data as $v)
            <tr>
                <td>{{$v->id}}</td>
                <td><a href="{{route('view',['id'=>$v->id])}}">{{$v->name}}</a></td>
                <td>{{$v->telphone}}</td>
                <td>{{$v->email}}</td>
                <td>{{$v->brithday}}</td>
                <td>{{$v->signature}}</td>
                <td>{{$v->intro}}</td>
                <td>{{$v->created_at}}</td>
                <td>{{$v->updated_at}}</td>
                <td>
                    <a href="{{ route('edit',['id'=>$v->id]) }}" class="btn btn-warning">修改</a>
                    <a href="{{ route('del',['id'=>$v->id]) }}" class="btn btn-danger">删除</a>
                </td>
            </tr>
        @endforeach
        <a href="{{ route('add') }}" class="btn btn-info">添加数据</a>
    </table>
@stop
