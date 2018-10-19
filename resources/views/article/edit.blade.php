@extends('layout.default')
@section('contents')
    <form action="{{ route('updatee') }}" method="post">
        <input type="hidden" name="id" value="{{ $data->id }}">
        <div class="form-group">
            <label for="">标题</label>
            <input type="text" class="form-control" name="title" value="{{ $data->title }}">
        </div>
        <div class="form-group">
            <label for="">内容</label>
            <input type="text" class="form-control" name="content" value="{{ $data->content }}">
        </div>
        {{ csrf_field() }}
        <button class="btn btn-info">修改</button>
    </form>
@stop
