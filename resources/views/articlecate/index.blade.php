@extends('layout.default')
@section('contents')
    <h1>新闻分类添加</h1>
    <a href="{{ route('articlecate/add') }}" class="btn btn-info">添加数据</a>
    <table class="table">
        <tr>
            <td>ID</td>
            <td>title</td>
            <td>desc</td>
            <td>操作</td>
        </tr>
        @foreach($data as $v)
            <tr>
                <td>{{ $v->id }}</td>
                <td><a href="{{ route('articlecate/show',[$v]) }}">{{ $v->title }}</a></td>
                <td>{{ $v->desc }}</td>
                <td>
                    <a href="{{ route('articlecate/edit',[$v]) }}" class="btn btn-warning">修改</a>
                    <a href="{{ route('articlecate/del',[$v]) }}" class="btn btn-danger">删除</a>
                </td>
            </tr>
        @endforeach
    </table>
@endsection

