@extends('layout.default')
@section('contents')
    <form action="{{ route('articlecate/save') }}" method="post">
        <div class="form-group">
            <label for="">新闻分类名称</label>
            <input type="text" name="title" class="form-control">
        </div>
        <div class="form-group">
            <label for="">新闻描述</label>
            <textarea name="desc" id="" cols="30" rows="10"></textarea>
        </div>
        {{ csrf_field() }}
        <button class="btn btn-info btn-block">确定</button>
    </form>
@stop

