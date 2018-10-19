@extends('layout.default')
@section('contents')
    <form action="{{ route('articlecate/update',[$articlecate]) }}" method="post">
        <div class="form-group">
            <label for="">新闻标题</label>
            <input type="text" name="title" class="form-control" value="{{ $articlecate->title }}">
        </div>
        <div class="form-group">
            <label for="">新闻内容</label>
            <textarea name="desc" id="" cols="30" rows="10">{{ $articlecate->desc }}</textarea>
        </div>
        {{ csrf_field() }}
        <button class="btn btn-info">确定</button>
    </form>
@endsection
