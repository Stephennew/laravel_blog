@extends('layout.default')
@section('contents')
    <table class="table-bordered table">
        <tr>
            <td>ID</td>
            <td>文章分类</td>
            <td>操作</td>
        </tr>
        @foreach($data as $v)
            <tr>
                <td>{{ $v->id}}</td>
                <td>{{ $v->cateName}}</td>
                <td>
                    <a href="{{ route('postcate.edit',[$v]) }}" class="btn btn-warning">修改</a>
                    <form action="{{ route('postcate.destroy',[$v]) }}" method="post" enctype="multipart/form-data">
                        {{csrf_field()}}
                        {{method_field('DELETE')}}
                        <button class="btn btn-danger">删除</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
    {{ $data->links() }}
@endsection