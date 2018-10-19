@extends('layout.default')
@section('contents')
  <h1>注册用户</h1>
   @include('layout._errors')
    <form action="{{ route('admin/save') }}" method="post">

        <div class="form-group">
            <label for="">用户名</label>
            <input type="text" name="username" class="form-control" value="{{ old('username') }}">
        </div>
        <div class="form-group">
            <label for="">密码</label>
            <input type="text" name="pwd" class="form-control" value="{{ old('pwd') }}">
        </div>
        <div class="form-group">
            <label for="">email</label>
            <input type="text" name="email" class="form-control" value="{{ old('email') }}">
        </div>
        <div class="form-group">
            <label for="">手机号码</label>
            <input type="text" name="tel" class="form-control" value="{{ old('tel') }}">
        </div>
        {{ csrf_field() }}
        <button class="btn btn-block btn-info">注册</button>
    </form>
@endsection
