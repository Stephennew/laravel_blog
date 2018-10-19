@extends('layout.default')
@section('contents')

    <form action="{{ route('essays.store') }}" method="post" enctype="multipart/form-data">
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
            <select name="cateid" id="" class="form-control">
                <option value="1">1</option>
            </select>
        </div>
        <div class="form-group">
            <label for="">图片上传</label>
            <input type="file" name="conver">
        </div>
        <div class="form-group">
            <label for="">文章作者</label>
            <input type="text" name="author" class="form-control">
        </div>
        {{csrf_field()}}
        <button class="btn btn-info">提交</button>
    </form>

@stop

