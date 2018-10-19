@extends('layout.default')
@section('contents')
    @include('layout._notice')
    <a href="{{ route('manager.create') }}" class="btn btn-info">添加数据</a>
    <table class="table">
        <tr>
            <td>ID</td>
            <td>用户名</td>
            <td>头像</td>
            <td>操作</td>
        </tr>
        @foreach($data as $v)
            <tr>
                <td>{{ $v->id }}</td>
                <td><a href="{{ route('manager.show',[$v]) }}">{{ $v->username }}</a></td>
                <td><img width="50px" class="img-circle" src="{{ \Illuminate\Support\Facades\Storage::url($v->icon) }}" alt=""></td>
                <td>
                    <a href="{{ route('manager.edit',[$v]) }}" class="btn btn-warning">修改</a>
                    <form action="{{route('manager.destroy',[$v])}}" method="post">
                        {{csrf_field()}}
                        {{ method_field('DELETE') }}
                        <button class="btn btn-danger">删除</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
    {{ $data->appends(['keywords'=>$keywords])->links() }}
    <script src="/js/jQuery.js"></script>
    <script>
        var $url = "{{route('manager.index')}}";
        $(document).ready(function(){
            $(".form-box").attr("action",$url);
        });
    </script>
@endsection
