@extends('layout.default')
@section('contents')
    <form action="{{ route('postcate.update',[$postcate]) }}" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label for="">分类名称</label>
            <input type="text" name="cateName" class="form-control" value="{{ $postcate->cateName }}">
            {{ csrf_field() }}
            {{ method_field('PUT') }}
            <button class="btn btn-info">确定修改</button>
        </div>
    </form>
@endsection

