@extends('layout.default')
@section('contents')
    <form action="{{ route('login.check') }}" method="post">
        <div class="form-group">
            <label for="">账号</label>
            <input type="text" name="name" class="form-control" value="{{ old('name') }}">
        </div>
        <div class="form-group">
            <label for="">密码</label>
            <input type="text" name="password" class="form-control" value="{{ old('password') }}">
        </div>
        <div class="checkbox">
            <label for="">
                <input type="checkbox" name="remember"  value="1" @if(old('remember')) checked="checked" @endif>记住我
            </label>
        </div>
        <input id="captcha" class="form-control" name="captcha" >
        <img class="thumbnail captcha" src="{{ captcha_src('flat') }}" onclick="this.src='/captcha/flat?'+Math.random()" title="点击图片重新获取验证码">
        {{ csrf_field() }}
        <button class="btn btn-info">登录</button>
    </form>
@endsection
