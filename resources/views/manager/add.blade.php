@extends('layout.default')
@section('contents')
    @include('layout._errors')
    <form action="{{ route('manager.store') }}" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label for="">用户名</label>
            <input type="text" name="username" class="form-control">
        </div>
        <div class="form-group">
            <label for="">密码</label>
            <input type="password" name="pwd" class="form-control">
        </div>
        <div class="form-group">
            <label for="">头像</label>
            <input type="file" name="icon" class="form-control">
        </div>
        <input id="captcha" class="form-control" name="captcha" >
        <img class="thumbnail captcha" src="{{ captcha_src('flat') }}" onclick="this.src='/captcha/flat?'+Math.random()" title="点击图片重新获取验证码">

        {{ csrf_field() }}
        <button class="btn btn-info"> 提交</button>
    </form>
@endsection
