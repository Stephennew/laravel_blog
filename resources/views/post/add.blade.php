@extends('layout.default')
@section('contents')
    <form action="{{ route('post.store') }}" method="post" enctype="multipart/form-data">

        <div class="form-group">
            <label for="">文章标题</label>
            <input type="text" name="title" class="form-control" value="{{ old('title') }}">
        </div>
        <div class="form-group">
            <label for="">文章标题</label>
            <input type="text" name="content" class="form-control" value="{{ old('content') }}">
        </div>
        <div class="form-group">
            <label for="">文章分类</label>
            <select name="postCateid" id="" class="form-control">
                <option value="1">1</option>
                <option value="2">2</option>
            </select>
        </div>
        <div class="form-group">
            <label for="">文章封面</label>
            <input type="file" name="conver" class="form-control">
        </div>
        {{ csrf_field() }}
        <button class="btn btn-info">添加</button>
    </form>
@endsection
