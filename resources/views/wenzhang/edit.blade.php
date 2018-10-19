@extends('layout.default')
@section('contents')
    @include('layout._errors')
    <form action="{{ route('wenzhang/update',[$wenzhang]) }}" method="post">
        <div class="form-group">
            <label for="">文章标题</label>
            <input type="text" name="title" value="{{ $wenzhang->title }}" class="form-control">
        </div>
        <div class="form-group">
            <label for="">文章内容</label>
            <input type="text" name="content" value="{{ $wenzhang->content }}" class="form-control">
        </div>
        <div class="form-group">
            <label for="">文章分类</label>
            <select name="cateid" id="" class="form-control">
                <option value="">{{ $wenzhang->cateid }}</option>
            </select>
        </div>
        <div class="form-group">
            <label for="">作者</label>
            <input type="text" name="author" value="{{ $wenzhang->author }}" class="form-control">
        </div>
        {{csrf_field()}}
        <button class="btn btn-info">确定</button>
    </form>
@stop
