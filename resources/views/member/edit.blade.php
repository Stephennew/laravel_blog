@extends('layout.default')
@section('contents')
    <form action="{{ route('update') }}" method="post">
        <input type="hidden" name="id" value="{{ $data->id }}">
        <div class="form-group">
            <label for="">姓名</label>
            <input type="text" class="form-control" name="name" value="{{ $data->name }}">
        </div>
        <div class="form-group">
            <label for="">电话</label>
            <input type="text" class="form-control" name="telphone" value="{{ $data->telphone }}">
        </div>
        <div class="form-group">
            <label for="">email</label>
            <input type="text" class="form-control" name="email" value="{{ $data->email }}">
        </div>
        <div class="form-group">
            <label for="">身份证</label>
            <input type="text" class="form-control" name="card" value="{{ $data->card }}">
        </div>
        <div class="form-group">
            <label for="">姓名</label>
            <input type="text" class="form-control" name="signature" value="{{ $data->signature }}">
        </div>
        <div class="form-group">
            <label for="">姓名</label>
            <textarea name="intro" id="" cols="30" rows="10">{{ $data->intro }}</textarea>
        </div>
        {{ csrf_field() }}
        <button class="btn btn-info">确定</button>
    </form>
@stop
