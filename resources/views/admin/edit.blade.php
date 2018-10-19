@extends('layout.default')
@section('contents')
    <h>修改用户信息</h>
    @include('layout._errors')
    <form action="{{ route('admin/update',[$admin]) }}" method="post">
        <div class="form-group">
            <label for="">用户名</label>
            <input type="text" name="username" value="{{ $admin->username }}">
        </div>
        <div class="form-group">
            <label for="">密码</label>
            <input type="text" name="pwd" value="{{ $admin->pwd }}">
        </div>
        <div class="form-group">
            <label for="">emial</label>
            <input type="text" name="email" value="{{ $admin->email }}">
        </div>
        <div class="form-group">
            <label for="">电话号码</label>
            <input type="text" name="tel" value="{{ $admin->tel }}">
        </div>
        {{ csrf_field() }}
        <button class="btn btn-info">提交</button>
    </form>
@stop
