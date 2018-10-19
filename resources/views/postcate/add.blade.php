@extends('layout.default')
@section('contents')
    <form action="{{ route('postcate.store') }}" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label for="">分类名称</label>
            <input type="text" name="cateName" class="form-control">
        </div>
        {{ csrf_field() }}
        <button class="btn btn-info">添加</button>
    </form>
@endsection
