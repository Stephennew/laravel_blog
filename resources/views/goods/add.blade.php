@extends('layout.default')
@section('contents')
    <form action="{{ route('goods.store') }}" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label for="">商品名称</label>
            <input type="text" name="goodsname" class="form-control">
        </div>
        <div class="form-group">
            <label for="">商品编号</label>
            <input type="text" name="sn" class="form-control">
        </div>
        <div class="form-group">
            <label for="">商品库存</label>
            <input type="text" name="num" class="form-control">
        </div>
        <div class="form-group">
            <label for="">商品图片</label>
            <input type="file" class="img-circle" name="conver">
        </div>
        <input id="captcha" class="form-control" name="captcha" >
        <img class="thumbnail captcha" src="{{ captcha_src('flat') }}" onclick="this.src='/captcha/flat?'+Math.random()" title="点击图片重新获取验证码">
        {{csrf_field()}}
        <button class="btn btn-info">提交</button>
    </form>
@endsection


