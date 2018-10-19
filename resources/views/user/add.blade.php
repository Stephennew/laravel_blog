@extends('layout.default')
@section('contents')
    <form action="{{ route('user.store') }}"  method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label for="">用户名</label>
            <input type="text" name="name" class="form-control">
        </div>
        <div class="form-group">
            <label for="">密码</label>
            <input type="text" name="password" class="form-control">
        </div>
        <div class="form-group">
            <label for="">邮箱</label>
            <input type="email" name="email" class="form-control">
        </div>
        <div class="form-group">
            <label for="">头像</label>
            <input type="file" name="icon" class="form-control">
        </div>
        <input type="text" class="form-control" name="captcha">
        <img class="thumbnail captcha" src="{{ captcha_src('flat') }}" onclick="this.src='/captcha/flat?'+Math.random()" title="点击图片重新获取验证码">
        {{ csrf_field() }}
        <button class="btn btn-info">注册</button>
    </form>
@endsection

