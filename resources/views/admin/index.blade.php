@extends('layout.default')
@section('contents')
    <a href="{{ route('admin/add')}}" class="btn btn-info">添加数据</a>
    @include('layout.notice')
    <table class="table">
        <tr>
            <td>ID</td>
            <td>username</td>
            <td>email</td>
            <td>tel</td>
            <td>操作</td>
        </tr>
        @foreach($rows as $v)
            <tr>
                <td>{{ $v->id }}</td>
                <td>{{ $v->username }}</td>
                <td>{{ $v->email }}</td>
                <td>{{ $v->tel }}</td>
                <td>
                    <a href="{{ route('admin/edit',[$v]) }}" class="btn btn-warning btn-xs">修改</a>
                    <a href="{{ route('admin/del',[$v])}}" class="btn btn-danger btn-xs">删除</a>
                </td>
            </tr>
        @endforeach
    </table>
@endsection

