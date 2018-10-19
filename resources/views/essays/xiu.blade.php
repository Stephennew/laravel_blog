@extends('layout.default')
@section('contents')
    <form action="{{ route('essays.update',[$essay]) }}" method="post">
        <div class="form-group">
            <label for="">新闻标题</label>
            <input type="text" name="title" class="form-control" value="{{ $essay->title }}">
        </div>
        <div class="form-group">
            <label for="">新闻内容</label>
            <input type="text" name="content" class="form-control" value="{{ $essay->content }}">
        </div>
        <div class="form-group">
            <label for="">新闻类型</label>
            <select name="cateid" id="" class="form-control">
                <option value="1">{{ $essay->cateid  }}</option>
            </select>
        </div>
        <div class="form-group">
            <label for="">新闻作者</label>
            <input type="text" name="author" class="form-control" value="{{ $essay->author }}">
        </div>
        {{csrf_field()}}
        {{method_field('PUT')}}{{--伪造PUT请求--}}
        <button class="btn btn-info">提交</button>
    </form>
@endsection
