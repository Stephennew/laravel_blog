@extends('layout.default')
@section('contents')
    @include('layout._errors')
    <form action="{{ route('manager.update',[$manager]) }}" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label for="">用户名</label>
            <input type="text" name="username" class="form-control" value="{{ $manager->username }}">
        </div>
        <div class="form-group">
            <label for="">修改头像</label>
            <input type="file" name="icon" class="form-control">
        </div>
        <div class="form-groupm">
            <label for="">原来的头像</label>
            <img src="{{ \Illuminate\Support\Facades\Storage::url($manager->icon) }}" alt="" class="img-circle">
        </div>
        {{csrf_field()}}
        {{method_field('PUT')}}
        <button class="btn btn-info">提交</button>
    </form>
@endsection
