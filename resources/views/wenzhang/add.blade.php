@extends('layout.default')
@section('contents')
    @include('layout._errors')
    <form action="{{ route('wenzhang/save') }}" method="post">
        <div class="form-group">
            <label for="">文章标题</label>
            <input type="text" name="title" class="form-control">
        </div>
        <div class="form-group">
            <label for="">文章内容</label>
            <input type="text" name="content" class="form-control">
        </div>
        <div class="form-group">
            <label for="">文章分类</label>
            <select name="cateid" class="form-control">
                @for($i=1;$i<=count($arr);$i++)
                <option value="1">{{ $arr[$i] }}</option>
                @endfor
            </select>
        </div>
        <div class="form-group">
            <label for="">文章作者</label>
            <input type="text" name="author" class="form-control">
        </div>
        {{csrf_field()}}
        <button class="btn btn-info">添加文章</button>
    </form>
@endsection

