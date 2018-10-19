@extends('layout.default')
@section('contents')
    <form action="{{ route('post.update',[$post]) }}" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label for="">文章标题</label>
            <input type="text" name="title" class="form-control" value="{{ $post->title }}">
        </div>
        <div class="form-group">
            <label for="">文章内容</label>
            <input type="text" name="content" class="form-control" value="{{ $post->content }}">
        </div>
        <div class="form-group">
            <label for="">文章分类</label>
            <input type="text" name="postCateid" class="form-control" value="{{ $post->postCateid }}">
        </div>
        {{csrf_field()}}
        {{ method_field('PUT') }}
        <button class="btn btn-info">确定修改</button>
    </form>
@endsection

